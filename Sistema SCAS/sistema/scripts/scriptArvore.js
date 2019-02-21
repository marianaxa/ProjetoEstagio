$(
	function(){

		$(".btn-modal-arv").click(function(){

			var id   = this.id;

			$.post("carrega-modal-arvore.php",{id:id},
				function(response){
					$("#modal-php").html(response);
				});

		})


	}
);