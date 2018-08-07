//NAO FINALIZADA
$(
	function(){

		$(".btn-modal-lote").click(function(){

			var id   = this.id;
			var especie = $(this).attr('nome-user');
			var data = $(this).attr('data');	

			$.post("cadastro-amostra.php",{id:id, especie:especie},
				function(response){
					$("#modal-php").html(response);
				});

		// $("button").css("background-color", "yellow");
		})


	}
);