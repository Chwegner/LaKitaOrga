/**
 * User: OstSan
 * © : 2019
 */
$(function () {
    $("#hint").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: URL_AJAX,
                data: {
                    hint: request.term
                },
                dataType: "json",
                type: "POST",
                success: function (data) {
                    response(data);
                }
            });
        },
        minLength: 2,
        select: function (event, ui) {
            $('#hint').val(ui.item.label);
            $('#hint_id').val(ui.item.value);
            return false;
        }
    });

    $("#hint_1").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: URL_AJAX,
                data: {
                    hint_1: request.term
                },
                dataType: "json",
                type: "POST",
                success: function (data) {
                    response(data);
                }
            });
        },
        minLength: 2,
        select: function (event, ui) {
            $('#hint_1').val(ui.item.label);
            $('#hint_id_1').val(ui.item.value);
            return false;
        }
    });

    $("#hint_2").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: URL_AJAX,
                data: {
                    hint_2: request.term
                },
                dataType: "json",
                type: "POST",
                success: function (data) {
                    response(data);
                }
            });
        },
        minLength: 2,
        select: function (event, ui) {
            $('#hint_2').val(ui.item.label);
            $('#hint_id_2').val(ui.item.value);
            return false;
        }
    });

});