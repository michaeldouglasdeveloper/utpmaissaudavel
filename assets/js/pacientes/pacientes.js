var pacientes = {

    init: function () {

        especialidades = [];

        date = new Date();
        days = {1: '01', 2: '02', 3: '03', 4: '04', 5: '05', 6: '06', 7: '07', 8: '08', 9: '09'};
        months = {1: '01', 2: '02', 3: '03', 4: '04', 5: '05', 6: '06', 7: '07', 8: '08', 9: '09', 10: '10', 11: '11', 11: '12'};

        if (date.getDate() <= 9) {
            currentDate = days[date.getDate()] + '/' + months[date.getMonth() + 1] + '/' + date.getFullYear();
        } else {
            currentDate = date.getDate() + '/' + months[date.getMonth() + 1] + '/' + date.getFullYear();
        }

        $('#cep').on('blur', pacientes.buscaCep);
        $('#cpf').on('blur', pacientes.validaCpf);
        $('#limpar').on('click', pacientes.limparCampos);
        $('#gravar').on('click', pacientes.validaCamposForm);
        $('#data_nascimento').on('blur', pacientes.validarIdadePessoa);
        $('#btn-editar-agenda-paciente').on('click', pacientes.abreCamposEdicao);
    },

    buscaCep: function () {

        $.getJSON("https://viacep.com.br/ws/" + $('#cep').val() + "/json/?callback=?", function (dados) {

            if (!("erro" in dados)) {

                $("#rua").val(dados.logradouro);
                $("#bairro").val(dados.bairro);
                $("#cidade").val(dados.localidade);
                $("#estado").val(dados.uf);
                $("#numero").focus();
            }
        });
    },

    validaCpf: function () {

        $.ajax({
            url: URL + '/pessoas/validaCpf',
            type: 'POST',
            data: {cpf: $('#cpf').val()},
            dataType: 'json',
            success: function (result) {

                if (result) {
                    $("#cpf").val("");
                    $("#cpf").focus();
                    $('#cpf').css('border', '1px solid red');
                    swal("Atenção!", "Já existe outra pessoa cadastrada com este CPF, favor verificar!", "error");
                    return;
                }
            }
        });
    },

    limparCampos: function () {

        $('#nome').val("");
        $('#data_nascimento').val("");
        $('#mae').val("");
        $('#cpf').val("");
        $('#rg').val("");
        $('#email').val("");
        $('#residencial').val("");
        $('#celular').val("");
        $('#contato').val("");
        $('#cep').val("");
        $('#rua').val("");
        $('#bairro').val("");
        $('#cidade').val("");
        $('#estado').val("");
        $('#numero').val("");
        $('#complemento').val("");
    },

    validaCamposForm: function () {

        if ($('#nome').val() === '') {
            $('#nome').focus();
            $('#nome').css('border', '1px solid red');
            swal("Atenção!", "Campo nome não pode ficar vazio!", "error");
            return;
        }
        if ($('#data_nascimento').val() === '') {
            $('#data_nascimento').focus();
            $('#data_nascimento').css('border', '1px solid red');
            swal("Atenção!", "Campo Data de Nascimento não pode ficar vazio!", "error");
            return;
        }

        if ($('#data_nascimento').val().length < 10) {
            $('#data_nascimento').focus();
            $('#data_nascimento').css('border', '1px solid red');
            swal("Atenção!", "Informe uma data válida!", "error");
            return false;
        }

        if ($('#responsavel').val() === '') {
            $('#responsavel').focus();
            $('#responsavel').css('border', '1px solid red');
            swal("Atenção!", "Campo Responsável não pode ficar vazio!", "error");
            return;
        }

        if ($('#sexo').val() === 'Selecione') {
            $('#data_nascimento').focus();
            $('#sexo').css('border', '1px solid red');
            swal("Atenção!", "Selecione uma opção válida!", "error");
            return;
        }
        if ($('#rg').val() === '') {
            $('#rg').focus();
            $('#rg').css('border', '1px solid red');
            swal("Atenção!", "Campo RG não pode ficar vazio!", "error");
            return;
        }        
        if ($('#cep').val() === '') {
            $('#cep').focus();
            $('#cep').css('border', '1px solid red');
            swal("Atenção!", "Campo CEP  não pode ficar vazio!", "error");
            return;
        }
        if ($('#rua').val() === '') {
            $('#rua').focus();
            $('#rua').css('border', '1px solid red');
            swal("Atenção!", "Campo Rua  não pode ficar vazio!", "error");
            return;
        }
        if ($('#bairro').val() === '') {
            $('#bairro').focus();
            $('#bairro').css('border', '1px solid red');
            swal("Atenção!", "Campo Bairro  não pode ficar vazio!", "error");
            return;
        }
        if ($('#cidade').val() === '') {
            $('#cidade').focus();
            $('#cidade').css('border', '1px solid red');
            swal("Atenção!", "Campo Cidade  não pode ficar vazio!", "error");
            return;
        }
        if ($('#estado').val() === '') {
            $('#estado').focus();
            $('#estado').css('border', '1px solid red');
            swal("Atenção!", "Campo Estado  não pode ficar vazio!", "error");
            return;
        }
        if ($('#numero').val() === '') {
            $('#numero').focus();
            $('#numero').css('border', '1px solid red');
            swal("Atenção!", "Campo Número  não pode ficar vazio!", "error");
            return;
        }        
        if ($('#celular').val() === '') {
            $('#celular').focus();
            $('#celular').css('border', '1px solid red');
            swal("Atenção!", "Campo Telefone Celular não pode ficar vazio!", "error");
            return;
        }
        if ($('#contato').val() === '') {
            $('#contato').focus();
            $('#contato').css('border', '1px solid red');
            swal("Atenção!", "Campo Telefone Para Contato não pode ficar vazio!", "error");
            return;
        }

        if ($('#unidade').val() === 'Selecione') {
            swal("Atenção!", "Selecione uma opção válida!", "error");
            $('#unidade').css('border', '1px solid red');
            return;
        }

        $(':checkbox:checked').each(function (i) {
            especialidades[i] = $(this).val();
        });

        if (especialidades.length === 0) {
            swal("Atenção!", "Selecione pelo menos uma especialidade para o paciente!", "error");
            return;
        }

        if ($('#convenio').val() === 'Selecione') {
            swal("Atenção!", "Selecione uma opção válida!", "error");
            $('#convenio').css('border', '1px solid red');
            return;
        }

        pacientes.gravar();
    },

    gravar: function () {

        $.ajax({
            type: 'POST',
            url: 'cadastrar',
            data: {
                nome: $('#nome').val(),
                dataNascimento: $('#data_nascimento').val(),
                responsavel: $('#responsavel').val(),
                sexo: $('#sexo').val(),
                cpf: $('#cpf').val(),
                rg: $('#rg').val(),
                email: $('#email').val(),
                residencial: $('#residencial').val(),
                celular: $('#celular').val(),
                contato: $('#contato').val(),
                cep: $('#cep').val(),
                rua: $('#rua').val(),
                bairro: $('#bairro').val(),
                cidade: $('#cidade').val(),
                estado: $('#estado').val(),
                numero: $('#numero').val(),
                complemento: $('#complemento').val(),
                unidade: $('#unidade').val(),
                especialidades: especialidades,
                convenio: $('#convenio').val()

            },
            success: function (retorno) {

                if (retorno) {
                    swal({
                        text: "Cadastro realizado com Sucesso!",
                        type: "success",
                        confirmButtonText: "OK"
                    });
                    window.location = URL + '/agendamentos/vinculacao';
                } else {
                    swal({
                        type: 'warning',
                        title: 'Ocorreu algum erro ao realizar o cadastro, revise todos os dados informados',
                        confirmButtonText: 'OK'
                    });
                    return;
                }
            }
        });
    },

    validarIdadePessoa: function () {

        if (pacientes.convertData($('#data_nascimento').val()) > pacientes.convertData(currentDate)) {
            $('#data_nascimento').focus();
            $('#data_nascimento').css('border', '1px solid red');
            swal("Atenção!", "Informe uma data válida!", "error");
            $('#data_nascimento').val('');
            return false;
        }

        var valorInput = $('#data_nascimento').val();

        var anoNascimento = valorInput.slice(6);

        var date = new Date();
        var anoAtual = date.getFullYear();

        var idade = anoAtual - anoNascimento;

        if (idade <= 12) {

            $('#label-responsavel-paciente').html("");
            $('#input-responsavel-paciente').html("");

            var labelResponsavel = "Nome Responsavel *";
            var inputResponsavel = "<input type='text' id='responsavel' name='responsavel' required='required' class='form-control col-md-7 col-xs-12'>";            

            $('#label-responsavel-paciente').append(labelResponsavel);
            $('#input-responsavel-paciente').append(inputResponsavel);
            $('#responsavel').focus();
        } else {

            $('#label-responsavel-paciente').html("");
            $('#input-responsavel-paciente').html("");
        }
    },

    abreCamposEdicao: function () {

        $('#data-primeira-sessao').prop('readonly', false);
        $('#hora-inicio-primeira-sessao').prop('readonly', false);
        $('#hora-fim-primeira-sessao').prop('readonly', false);
        $('#data-segunda-sessao').prop('readonly', false);
        $('#hora-inicio-segunda-sessao').prop('readonly', false);
        $('#hora-fim-segunda-sessao').prop('readonly', false);
        $('#data-terceira-sessao').prop('readonly', false);
        $('#hora-inicio-terceira-sessao').prop('readonly', false);
        $('#hora-fim-terceira-sessao').prop('readonly', false);
        $('#data-quarta-sessao').prop('readonly', false);
        $('#hora-inicio-quarta-sessao').prop('readonly', false);
        $('#hora-fim-quarta-sessao').prop('readonly', false);
        $('#data-quinta-sessao').prop('readonly', false);
        $('#hora-inicio-quinta-sessao').prop('readonly', false);
        $('#hora-fim-quinta-sessao').prop('readonly', false);
        $('#data-sexta-sessao').prop('readonly', false);
        $('#hora-inicio-sexta-sessao').prop('readonly', false);
        $('#hora-fim-sexta-sessao').prop('readonly', false);
        $('#data-setima-sessao').prop('readonly', false);
        $('#hora-inicio-setima-sessao').prop('readonly', false);
        $('#hora-fim-setima-sessao').prop('readonly', false);
        $('#data-oitava-sessao').prop('readonly', false);
        $('#hora-inicio-oitava-sessao').prop('readonly', false);
        $('#hora-fim-oitava-sessao').prop('readonly', false);
        $('#data-nona-sessao').prop('readonly', false);
        $('#hora-inicio-nona-sessao').prop('readonly', false);
        $('#hora-fim-nona-sessao').prop('readonly', false);
        $('#data-decima-sessao').prop('readonly', false);
        $('#hora-inicio-decima-sessao').prop('readonly', false);
        $('#hora-fim-decima-sessao').prop('readonly', false);

        $('#btn-salvar-alteracoes-agenda-paciente').html("");
        var btn = "<button id='edit-agenda' name='edit-agenda' class='edit-agenda btn btn-success btn-xs'>Salvar Alterações</button>";
        $('#btn-salvar-alteracoes-agenda-paciente').append(btn);

        $('.edit').hide();
    },

    convertData: function (data) {

        var dia = data.split("/")[0];
        var mes = data.split("/")[1];
        var ano = data.split("/")[2];

        return ano + '-' + ("0" + mes).slice(-2) + '-' + ("0" + dia).slice(-2);

    }
};
$(document).ready(function () {
    pacientes.init();
});