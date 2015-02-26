$.validator.setDefaults({
    submitHandler: function() {
        ("#frmcotizacion").submit();
    }
});
$().ready(function() {
//            // validate the comment form when it is submitted
//            $("#commentForm").validate();

    // validate signup form on keyup and submit
    $("#frmcotizacion").validate({
        rules: {
            company: "required",
            rcompany: "required",
            ncamiones: {
                required: true
            },
            ndrivers: {
                required: true
            },
            millas: {
                required: true
            },
            perdidas: {
                required: true
            },
//                    topic: {
//                        required: "#newsletter:checked"
//                    },
            anion: "required"
        },
        messages: {
            company: "Por favor indique el nombre de la empresa",
            rcompany: "Por favor indique el nombre de el representante",
            ncamiones: {
                required: "Por favor indique la cantidad de camiones"
            },
            ndrivers: {
                required: "Por favor indique la cantidad de drivers"
            },
            millas: {
                required: "Por favor indique las millas recorridas"
            },
            perdidas: "Por favor indique el rango de perdidas",
            anion: "Por favor indique el tiempo del negocio"
        }
    });

});
