$(function(){

	$(".btn-modal").click(function(){

		var id   = this.id;
		var nome = $(this).attr('nome-user');

		$.post("carrega-modal.php",{id:id, nome:nome},
			function(response){
				$("#modal-php").html(response);
			});

		// $("button").css("background-color", "yellow");
	})
});