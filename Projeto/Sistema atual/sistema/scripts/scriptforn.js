$(
	function(){

		$(".btn-modal-forn").click(function(){

			var id   = this.id;
			var nome = $(this).attr('nome-fornecedor');
			var especie = $(this).attr('nome-especie');
		

			$.post("carrega-modal-forn.php",{id:id, nome:nome, especie:especie},
				function(response){
					$("#modalLoteForn-php").html(response);
				});

		// $("button").css("background-color", "yellow");
		})


	}
);