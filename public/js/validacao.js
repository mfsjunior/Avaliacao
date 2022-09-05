$().ready(function() {
    $('#form_cadastro').validate({
        rules: {
            nome: {
                required: true
            },
            email: {
                required: true,
                email: true
            }
        },
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        messages: {
            nome: {
                required: "Este campo não pode ser vazio"
            },
            email: {
                required: "Este campo não pode ser vazio",
                email: "Email com formato inválido"
            }
        }
    });
});