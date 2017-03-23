$(document).ready(function () {

    $('input[type=checkbox]').click(function () {
        if ($(this).attr('data') == 'uf') {
            var json = new Array();

            $('input[type=checkbox]').each(function () {
                if ($(this).attr('data') == 'uf') {
                    if ($(this).prop('checked')) {
                        json.push($(this).prop('value'));
                    }
                }
            });

            if (json.length >= 1) {
                console.log(JSON.stringify(json));

                $.getJSON("http://localhost:82/projeto01/index.php/home/getJsonCidades", { 'chaves': JSON.stringify(json) })
                .done(function (data) {
                    console.log("second success");
                    console.log(JSON.stringify(data));

                })
                .fail(function () {
                    console.log("error");
                })
                .always(function () {
                    console.log("complete");
                });

            }



        }
    });

});



/*
console.log($(this).prop('value'));
console.log($(this).prop('checked'));
console.log('----------');
*/