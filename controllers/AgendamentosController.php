<?php

class AgendamentosController extends controller {

    private $url;
    private $log;
    private $usuario;
    private $agendamentos;
    private $especialidade;

    public function __construct() {

        $this->usuario = new Usuarios();
        if (!$this->usuario->logado()) {
            header('Location: ' . URL . '/login');
        }

        $this->url = new Urls();
        if (!$this->url->verificaUrlSessaoUsuario()) {
            header('Location: ' . URL . '/home');
        }

        $this->log = new Logs();
        $this->agendamentos = new Agendamentos();
        $this->especialidade = new Especialidades();
    }

    public function agenda() {

        $dados['especialidades'] = $this->especialidade->listaTodasEspecialidades();

        $this->loadTemplate('agendamentos/agenda', $dados);
    }

    public function cadastrarAgendaPorEspecialidade() {

        try {

            if ($this->post()) {

                $this->agendamentos->setDataInicial(!empty($_POST['dataInicial']) ? $_POST['dataInicial'] : null);
                $this->agendamentos->setDataFinal(!empty($_POST['dataFinal']) ? $_POST['dataFinal'] : null);

                $dias = array(
                    'segunda' => !empty($_POST['segunda']) ? $_POST['segunda'] : null,
                    'terca' => !empty($_POST['terca']) ? $_POST['terca'] : null,
                    'quarta' => !empty($_POST['quarta']) ? $_POST['quarta'] : null,
                    'quinta' => !empty($_POST['quinta']) ? $_POST['quinta'] : null,
                    'sexta' => !empty($_POST['sexta']) ? $_POST['sexta'] : null);

                $retorno = $this->agendamentos->gravaAgendaPorEspecialidades($dias);
                echo json_encode($retorno);
            }
        } catch (Exception $exc) {
            $this->log->logError(__CLASS__, __FUNCTION__, $exc->getMessage(), $_SESSION['usuario']['id_usuario']);
        }
    }

    public function validaSeExisteOutraAgendaAtiva() {

        if ($this->post()) {

            echo $this->agendamentos->validaSeExisteOutraAgendaAtiva($_POST['status']);
        }
    }

    public function listagem() {

        $dados['agendasEspecialidades'] = $this->agendamentos->buscaTodasAgendasPorEspecialidades();
        $this->loadTemplate('agendamentos/listagem', $dados);
    }

    public function existentes($id) {

        $agendaEspecialidades = $this->agendamentos->buscaAgendaAtiva();
        $dados['paciente'] = $this->agendamentos->buscarDadosPacienteSemAgendamento($id);

        if (empty($dados['paciente'])) {
            header('Location: ' . URL . '/home');
        }

        $dados['alunos'] = $this->usuario->buscarAlunosParaRenderizarAgenda();

        if (!empty($agendaEspecialidades)) {
            foreach ($agendaEspecialidades as $agenda) {
                switch ($agenda['id_agenda_dias']) {
                    case 1:
                        $dados['segunda'][] = $agenda;
                        break;
                    case 2:
                        $dados['terca'][] = $agenda;
                        break;
                    case 3:
                        $dados['quarta'][] = $agenda;
                        break;
                    case 4:
                        $dados['quinta'][] = $agenda;
                        break;
                    case 5:
                        $dados['sexta'][] = $agenda;
                        break;
                }
            }
        }

        $this->loadTemplate('agendamentos/existentes', $dados);
    }

    public function vinculacao() {

        $agendaEspecialidades = $this->agendamentos->buscaAgendaAtiva();
        $dados['cores'] = $this->especialidade->buscaEspecialidadesPorCores();
        $dados['alunos'] = $this->usuario->buscarAlunosParaRenderizarAgenda();

        if (!empty($agendaEspecialidades)) {
            foreach ($agendaEspecialidades as $agenda) {
                switch ($agenda['id_agenda_dias']) {
                    case 1:
                        $dados['segunda'][] = $agenda;
                        break;
                    case 2:
                        $dados['terca'][] = $agenda;
                        break;
                    case 3:
                        $dados['quarta'][] = $agenda;
                        break;
                    case 4:
                        $dados['quinta'][] = $agenda;
                        break;
                    case 5:
                        $dados['sexta'][] = $agenda;
                        break;
                }
            }
        } else {
            $dados = array();
        }

        $this->loadTemplate('agendamentos/vinculacao', $dados);
    }

    public function buscaUltimoPacienteCadastrado() {

        try {

            if ($this->post()) {

                $dadosPaciente = $this->agendamentos->buscarDadosPacienteSemAgendamento(null);

                if (is_null($dadosPaciente)) {
                    echo $dadosPaciente;
                } else if (count($dadosPaciente) > 1) {
                    $especialidades = "";
                    foreach ($dadosPaciente as &$paciente) {

                        $especialidades .= $paciente['especialidade'] . ' | ';
                    }

                    $dadosPaciente[0]['especialidade'] = $especialidades;
                }

                echo json_encode($dadosPaciente[0]);
            }
        } catch (Exception $exc) {
            $this->log->logError(__CLASS__, __FUNCTION__, $exc->getMessage(), $_SESSION['usuario']['id_usuario']);
        }
    }

    public function buscaPacientesAlunoSelecionado() {

        if ($this->post()) {            
            echo json_encode($this->agendamentos->buscaPacientesAlunoSelecionado($_POST['id']));
        }
    }

    public function buscaMeusPacientes() {

        if ($this->post()) {

            echo json_encode($this->agendamentos->buscaPacientesAlunoSelecionado($_SESSION['usuario']['id_pessoa']));
        }
    }

    public function gravaAgendaInicialPaciente() {

        try {

            if ($this->post()) {

                $idAluno = trim($_POST['idAluno']);
                $idPaciente = trim($_POST['idPaciente']);
                $sessoes = [
                    'primeiraSessao' => [
                        'data' => trim($_POST['dataPrimeiraSessao']),
                        'horaInicio' => trim($_POST['horaInicioPrimeiraSessao']),
                        'horaFim' => trim($_POST['horaFimPrimeiraSessao'])
                    ],
                    'segundaSessao' => [
                        'data' => trim($_POST['dataSegundaSessao']),
                        'horaInicio' => trim($_POST['horaInicioSegundaSessao']),
                        'horaFim' => trim($_POST['horaFimSegundaSessao'])
                    ],
                    'terceiraSessao' => [
                        'data' => trim($_POST['dataTerceiraSessao']),
                        'horaInicio' => trim($_POST['horaInicioTerceiraSessao']),
                        'horaFim' => trim($_POST['horaFimTerceiraSessao'])
                    ],
                    'quartaSessao' => [
                        'data' => trim($_POST['dataQuartaSessao']),
                        'horaInicio' => trim($_POST['horaInicioQuartaSessao']),
                        'horaFim' => trim($_POST['horaFimQuartaSessao'])
                    ],
                    'quintaSessao' => [
                        'data' => trim($_POST['dataQuintaSessao']),
                        'horaInicio' => trim($_POST['horaInicioQuintaSessao']),
                        'horaFim' => trim($_POST['horaFimQuintaSessao'])
                    ],
                    'sextaSessao' => [
                        'data' => trim($_POST['dataSextaSessao']),
                        'horaInicio' => trim($_POST['horaInicioSextaSessao']),
                        'horaFim' => trim($_POST['horaFimSextaSessao'])
                    ],
                    'setimaSessao' => [
                        'data' => trim($_POST['dataSetimaSessao']),
                        'horaInicio' => trim($_POST['horaInicioSetimaSessao']),
                        'horaFim' => trim($_POST['horaFimSetimaSessao'])
                    ],
                    'oitavaSessao' => [
                        'data' => trim($_POST['dataOitavaSessao']),
                        'horaInicio' => trim($_POST['horaInicioOitavaSessao']),
                        'horaFim' => trim($_POST['horaFimOitavaSessao'])
                    ],
                    'nonaSessao' => [
                        'data' => trim($_POST['dataNonaSessao']),
                        'horaInicio' => trim($_POST['horaInicioNonaSessao']),
                        'horaFim' => trim($_POST['horaFimNonaSessao'])
                    ],
                    'decimaSessao' => [
                        'data' => trim($_POST['dataDecimaSessao']),
                        'horaInicio' => trim($_POST['horaInicioDecimaSessao']),
                        'horaFim' => trim($_POST['horaFimDecimaSessao'])
                    ]
                ];

                $retorno = $this->agendamentos->gravaAgendaInicialPaciente($sessoes, $idAluno, $idPaciente);
                echo json_encode($retorno);
            }
        } catch (Exception $exc) {
            $this->log->logError(__CLASS__, __FUNCTION__, $exc->getMessage(), $_SESSION['usuario']['id_usuario']);
        }
    }

}
