/**
 * Created by markc on 14/01/2017.
 */

$(document).ready(function () {

    $('#customer_name').on('changed.bs.select', function (e, clickedIndex, newValue, oldvalue) {

        var customer_name = $('.selectpicker option:selected').val();
        var customers = injection["customers"];
        console.log(customers);
        for (var j = 0; j < customers.length; j++) {
            if (customers[j].name == customer_name) {
                $("form").find("#customer_address").val(customers[j].address);
                $("form").find("#customer_description").val(customers[j].description);
                $("form").find("#customer_postal_code").val(customers[j].postal_code);
                $("form").find("#customer_city").val(customers[j].city);
            }
        }
    });

    $('.tr_clone').on('changed.bs.select', function (e, clickedIndex, newValue, oldvalue) {
        var product_serial = $('#products_table option:selected').val();
        var products = injection["products"];
        console.log(products);
        for (var j = 0; j < products.length; j++) {
            if (products[j].name == customer_name) {
                $("form").find("#customer_address").val(products[j].address);
                $("form").find("#customer_description").val(products[j].description);
                $("form").find("#customer_postal_code").val(products[j].postal_code);
                $("form").find("#customer_city").val(products[j].city);
            }
        }
    });

    $(".add-row").click(function () {

        var tr = $(".tr_clone:last-child").clone().appendTo("#products_table tbody");
        $('#products_table tbody tr:last').find('.bootstrap-select').replaceWith(function () {
            return $('select', this);
        });
        $('.selectpicker').selectpicker();

    });

    $("#products_table").on('click', '#remove', function () {
        $(this).parent().parent().remove();
    });

});
