var urls = {

    init: function () {
        $('#gravar').on('click', urls.cadastrar);
    },

    cadastrar: function () {

        var url = $('#url').val();
        var val = [];
        $(':checkbox:checked').each(function (i) {
            val[i] = $(this).val();
        });

        $.ajax({
            type: 'POST',
            url: 'cadastrar',
            data: {
                url: url,
                perfis: val
            },
            success: function (result) {

                if (result) {

                    swal({
                        title: "Cadastrado com Sucesso!",
                        icon: "success"
                    });

                    setTimeout(function () {
                        window.location = URL + '/urls/visualizar';
                    }, 1000);

                } else {
                    swal({
                        type: 'warning',
                        title: 'Perfil já cadastrado com este nome',
                        confirmButtonText: 'OK'
                    });
                }
            }
        });
    }
};
$(document).ready(function () {
    urls.init();
});