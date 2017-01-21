/**
 * Created by markc on 14/01/2017.
 */

 $(document).ready(function () {

 	

 	$("#products_table").on("update", function (e) {
 		var subtotal = $("#sale_subtotal").text();
 		var total = $("#sale_total");
 		console.log("ADDED A ROW");

 	});

 	$("#products_table").on("change", "input", function (e) {

 		var tr = $(this).parents(".tr_clone");
 		var unit_price = tr.find(".sale_price input").val();
 		var quantity = tr.find(".quantity input").val();
 		var total = tr.find(".total").text(unit_price * quantity + " €");
 		tr.find(".total").trigger("total-updated");
 		console.log("PRODUCTS TABLE ON CHANGE INPUT");
 	});

 	$("#form-customer-info").on('changed.bs.select', 'select', function (e) {

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
 		var selected_value = $(this).val();
 		var products = injection["products"];
 		for (var j = 0; j < products.length; j++) {
 			if (products[j].id == selected_value) {
 				parent.find(".description").text(products[j].description);

 				parent.find(".total").text(products[j].sale_price + " €");
 				parent.find(".sale_price input").val(products[j].sale_price);
 				parent.find(".quantity input").val(1);
 				parent.find(".quantity input").attr("name");
 				parent.find(".quantity input").attr("name", "products[" + products[j].id + "]");
 				parent.find(".quantity input").attr("max", products[j].quantity);
 			}
 		}
 	});


 	$(".add-row").click(function () {

 		var tr = $(".tr_clone:last-child").clone();
 		tr.appendTo("#products_table tbody");

 		var tr_quantity = tr.find(".quantity input");

 		$('#products_table tbody tr:last').find('.bootstrap-select').replaceWith(function () {
 			return $('select', this);
 		});
 		$('.selectpicker').selectpicker('refresh');

 		$("#products_table").trigger("update");
 	});

 	$("#products_table").on('click', '#remove', function () {
 		$(this).parent().parent().remove();
 	});

 });
