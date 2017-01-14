/**
 * Created by markc on 14/01/2017.
 */

$(document).ready(function(){

    $(".add-row").click(function(){
        $("#products_table").append(
            '<tr>' +
                '<td>' +
                    '<select class="selectpicker" data-live-search="true">' +
                        '<?php foreach ($customers as $customer) : ?>' +
                            '<option> <?php echo $customer->name ?></option>' +
                        '<?php endforeach; ?>' +
                    '</select>' +
                '</td>' +
                '<td>' +
                    '&nbsp; ' +
                '</td>' +
                '<td>' +
                    '&nbsp; ' +
                '</td>' +
                '<td>' +
                    '&nbsp; ' +
                '</td>' +
                '<td>' +
                    '<a class="btn btn-danger" href="javascript:void(0);" id="remove">Remove</a> ' +
                '</td>' +
            '</tr>'

        );
        $('select').selectpicker();
    });
    $("#products_table").on('click','#remove',function(){
        $(this).parent().parent().remove();
    });

});
