/**
 * Created by markc on 14/01/2017.
 */

$(document).ready(function () {


    $("#form-customer-info").on('changed.bs.select','select', function (e) {

        var section1 = $('.section-1');
        var section2 = $('.section-2')
        var selected_value = $(this).val();
        var customers = injection["customers"];
        console.log(parent);
        for (var j = 0; j < customers.length; j++) {

            if (customers[j].id == selected_value) {

                section1.find("#description").val(customers[j].description);
                section2.find("#address").val(customers[j].address);
                section2.find("#postal_code").val(customers[j].postal_code);
                section2.find("#city").val(customers[j].city);
            }
        }
    });



    $("#products_table").on('changed.bs.select', 'select', function (e) {

        var parent = $(this).parents(".tr_clone");
        var selected_value = $(e.currentTarget).val();
        var products = injection["products"];
        console.log(e.currentTarget);
        for (var j = 0; j < products.length; j++) {
            if (products[j].serial == selected_value) {
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
