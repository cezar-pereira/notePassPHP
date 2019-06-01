jQuery(document).ready(function() {

    //--->  FORMFORM LOGIN
    jQuery('#formLogin').submit(function() {
        var dados = jQuery(this).serialize();
        jQuery.ajax({
            type: "POST",
            url: "../controls/loginController.php",
            data: dados,
            success: function(data) {
                $("#resposta").html(data);
            }
        });
        return false;
    });

    //--->  FORM RECUPERAR SENHA
    jQuery('#formForgotPassword').submit(function() {
        var dados = jQuery(this).serialize();
        jQuery.ajax({
            type: "POST",
            url: "../controls/forgotPasswordController.php",
            data: dados,
            success: function(data) {
                $("#resposta").html(data);
            }
        });
        return false;
    });

    //--->  FORM RECUPERAR SENHA MODAL
    jQuery('#formModalForgotPassword').submit(function() {
        var dados = jQuery(this).serialize();
        jQuery.ajax({
            type: "POST",
            url: "../controls/modalControls/forgotPasswordController.php",
            data: dados,
            success: function(data) {
                $("#resposta").html(data);
            }
        });
        return false;
    });

    //--->  FORM REGISTRO
    jQuery('#formRegister').submit(function() {
        var dados = jQuery(this).serialize();
        jQuery.ajax({
            type: "POST",
            url: "../controls/registerController.php",
            data: dados,
            success: function(data) {
                $("#resposta").html(data);
            }
        });
        return false;
    });

    //--->  FORM ADICIONAR SERVICO
    jQuery('#addService').submit(function() {
        var dados = jQuery(this).serialize();
        jQuery.ajax({
            type: "POST",
            url: "../controls/modalControls/addServiceController.php",
            data: dados,
            success: function(data) {
                $("#resposta").html(data);
            }
        });
        return false;
    });

    //--->  FORM MUDAR SENHA
    jQuery('#changePassword').submit(function() {
        var dados = jQuery(this).serialize();
        jQuery.ajax({
            type: "POST",
            url: "../controls/modalControls/changePasswordController.php",
            data: dados,
            success: function(data) {
                $("#resposta").html(data);
            }
        });
        return false;
    });
});