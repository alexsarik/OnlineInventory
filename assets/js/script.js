/**
 * Created by markc on 14/01/2017.
 */

$(document).ready(function () {

    $('.customer_name').on('changed.bs.select', function (e) {
        var customer_address = $("form").find("#customer_address").val();
        var customer_description = $("form").find("#customer_description").val();
        var customer_postal_code = $("form").find("#customer_postal_code").val();
        var customer_city = $("form").find("#customer_city").val();
        console.log(customer_address, customer_description, customer_city, customer_postal_code);
    });

    $('.tr_clone').on('changed.bs.select', function (e) {
        console.log($(this));
    });

    $(".add-row").click(function () {

        var tr = $(".tr_clone:last-child").clone().appendTo("#products_table tbody");
        $('#products_table tbody tr:last').find('.bootstrap-select').replaceWith(function () {
            return $('select', this);
        });
        $('.selectpicker').selectpicker('refresh');

    });

    $("#products_table").on('click', '#remove', function () {
        $(this).parent().parent().remove();
    });

});
