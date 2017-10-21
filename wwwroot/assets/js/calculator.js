/**
 * Created by paulstolk on 21-10-17.
 */

$(function(){
    console.log("Calculator loaded");

    $("#convert").on("click", function() {
        console.log("Start converting");

        var errors = 0;
        //check fields
        if($("#currency1").val().length < 1) {
            alert("You need to select a currency to convert from");
            errors = 1
        }
        if($("#currency2").val().length < 1) {
            alert("You need to select a currency to convert to");
            errors = 1
        }
        if($("#amount1").val().length < 1) {
            alert("You need to fill in an amount to convert");
            errors = 1
        }

        if(errors !== 1) {
            console.log("No errors, start converting");

            var convertData = {
                base: $("#currency1").val(),
                to: $("#currency2").val(),
                amount: $("#amount1").val()
            };

            $.ajax({
                type: "POST",
                url: "/api/convert",
                data: convertData,
                success: function (converted) {
                    $("#amount2").val(converted);
                },
                error: function() {
                    alert("Something went wrong, please try again");
                }
            });
        }


    });

});