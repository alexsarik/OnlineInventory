    </div>
    <!-- /container -->

    <script>
// JavaScript for deleting product
$(document).on('click', '.delete-object', function(){

	var id = $(this).attr('delete-id');

	if(confirm("Seguro que quieres borrarlo?")){
		$.post('delete_product.php', {
			object_id: id
		}, function(data){
			location.reload();
		}).fail(function() {
			alert('Unable to delete.');
		});
	}else{
		alert("No se pudo borrar");
	}
});
</script>

<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</body>
</html>