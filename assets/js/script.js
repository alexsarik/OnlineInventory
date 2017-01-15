/**
 * Created by markc on 14/01/2017.
 */

$(document).ready(function () {


    $('#customer_name').on('changed.bs.select', function (e) {

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

    $

    $("#products_table").on('changed.bs.select', 'select', function (e) {
        var table = $(this);

        var selected_value = $(e.currentTarget).val();
        var products = injection["products"];
        console.log(e.currentTarget);
        for (var j = 0; j < products.length; j++) {

            if (products[j].serial == selected_value) {

                var parent = $(this).parents(".tr_clone");

                parent.find(".product_description").text(products[j].description);
                parent.find(".product_model").text(products[j].model);
                parent.find(".product_location").text(products[j].location);
                parent.find(".product_purchase_price").text(products[j].purchase_price);
                parent.find(".product_sale_price").text(products[j].sale_price);
                parent.find(".product_quantity").text(products[j].quantity);
            }
        }
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
