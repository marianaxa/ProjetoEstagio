$(
	function(){

		$(".btn-modal-esp").click(function(){

			var id   = this.id;
			var nome = $(this).attr('nome-vulgar');
		

			$.post("carrega-modal-esp.php",{id:id, nome:nome},
				function(response){
					$("#modalesp-php").html(response);
				});

		// $("button").css("background-color", "yellow");
		})


	}
);