$(
	function(){

		$(".btn-modal-arv-ex").click(function(){

			var id   = this.id;

			$.post("carrega-modal-arvore-exclusao.php",{id:id},
				function(response){
					$("#modala-php").html(response);
				});

		})


	}
);