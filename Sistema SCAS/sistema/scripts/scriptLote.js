//NAO FINALIZADA
$(
	function(){

		//$(".btn-modal-lote").click(function(){

		// 	var id   = this.id;
		// 	var especie = $(this).attr('nome-especie');
		// 	var data = $(this).attr('data');	

		// 	$.get("meuphp.php",{id:id, especie:especie},
		// 		function(response){
		// 			$("#modal-php").html(response);
		// 		});

		// // $("button").css("background-color", "yellow");
		// })

		$("input[type=radio][name=radiolote]").click(function(){
			var id =  this.id;
			
			$.post("meuphp.php",{id:id},
				function(res){
			//	console.log(res);
				//console.log(res);
				var vetor = res.split("|");
				console.log(vetor);
					$("#idlote").val(vetor[0]);
					$("#nome-cientifico").val(vetor[1]);
					$("#nome-vulgar").val(vetor[2]);
					$("#familia").val(vetor[3]);
					$("#dataEntradaLoteOrigem").val(vetor[4]);

				})

		});

		// $('table tr').each(function(){

		// 	var linha = $(this).find('.name').html();
		// 	alert(name);
		// })


	}
);