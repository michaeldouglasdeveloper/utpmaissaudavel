var pacientes = {

    init: function () {

        $('#cep').on('blur', pacientes.buscaCep);
        $('#cpf').on('blur', pacientes.validaCpf);
        $('#limpar').on('click', pacientes.limparCampos);
        $('#gravar').on('click', pacientes.validaCamposForm);
    },
    buscaCep: function () {

        var cep = $('#cep').val();

        $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {

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

        var cpf = $('#cpf').val();

        $.ajax({
            url: URL + '/pessoas/validaCpf',
            type: 'POST',
            data: {cpf: cpf},
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

        $('#idPessoa').val("");
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
            return;
        }

        if ($('#data_nascimento').val() === '') {
            $('#data_nascimento').focus();
            $('#data_nascimento').css('border', '1px solid red');
            return;
        }

        if ($('#sexo').val() === 'Selecione') {
            swal("Atenção!", "Selecione uma opção válida!", "error");
            $('#sexo').css('border', '1px solid red');
            return;
        }

        if ($('#mae').val() === '') {
            $('#mae').focus();
            $('#mae').css('border', '1px solid red');
            return;
        }

        if ($('#sexo').val() === '') {
            $('#sexo').focus();
            $('#sexo').css('border', '1px solid red');
            return;
        }

        if ($('#cpf').val() === '') {
            $('#cpf').focus();
            $('#cpf').css('border', '1px solid red');
            return;
        }

        if ($('#rg').val() === '') {
            $('#rg').focus();
            $('#rg').css('border', '1px solid red');
            return;
        }

        if ($('#email').val() === '') {
            $('#email').focus();
            $('#email').css('border', '1px solid red');
            return;
        }

        if ($('#residencial').val() === '') {
            $('#residencial').focus();
            $('#residencial').css('border', '1px solid red');
            return;
        }

        if ($('#celular').val() === '') {
            $('#celular').focus();
            $('#celular').css('border', '1px solid red');
            return;
        }

        if ($('#contato').val() === '') {
            $('#contato').focus();
            $('#contato').css('border', '1px solid red');
            return;
        }

        if ($('#cep').val() === '') {
            $('#cep').focus();
            $('#cep').css('border', '1px solid red');
            return;
        }

        if ($('#rua').val() === '') {
            $('#rua').focus();
            $('#rua').css('border', '1px solid red');
            return;
        }

        if ($('#bairro').val() === '') {
            $('#bairro').focus();
            $('#bairro').css('border', '1px solid red');
            return;
        }

        if ($('#cidade').val() === '') {
            $('#cidade').focus();
            $('#cidade').css('border', '1px solid red');
            return;
        }

        if ($('#estado').val() === '') {
            $('#estado').focus();
            $('#estado').css('border', '1px solid red');
            return;
        }

        if ($('#numero').val() === '') {
            $('#numero').focus();
            $('#numero').css('border', '1px solid red');
            return;
        }

        if ($('#complemento').val() === '') {
            $('#complemento').focus();
            $('#complemento').css('border', '1px solid red');
            return;
        }

        if ($('#unidade').val() === 'Selecione') {
            swal("Atenção!", "Selecione uma opção válida!", "error");
            $('#unidade').css('border', '1px solid red');
            return;
        }

        if ($('#especialidade').val() === 'Selecione') {
            swal("Atenção!", "Selecione uma opção válida!", "error");
            $('#especialidade').css('border', '1px solid red');
            return;
        }

        if ($('#convenio').val() === 'Selecione') {
            swal("Atenção!", "Selecione uma opção válida!", "error");
            $('#convenio').css('border', '1px solid red');
            return;
        }

        pacientes.gravar;
    },
    gravar: function () {

        $.ajax({
            type: 'POST',
            url: 'cadastrar',
            data: {
                nome: $('#nome').val(),
                dataNascimento: $('#data_nascimento').val(),
                mae: $('#mae').val(),
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
                especialidade: $('#especialidade').val(),
                convenio: $('#convenio').val()

            },
            success: function (retorno) {

                if (retorno) {
                    swal({
                        text: "Cadastro realizado com Sucesso!",
                        type: "success",
                        confirmButtonText: "OK"
                    }, function () {
                        window.location = URL + '/pacientes/visualizar';

                    });
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
    }
};
$(document).ready(function () {
    pacientes.init();
});