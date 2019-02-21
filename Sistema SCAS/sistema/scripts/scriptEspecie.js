$(
	function(){

		$("input[type=radio][name=optradio]").click(function(){
			var id =  this.id;
			
			$.post("meuphp2.php",{id:id},
				function(res){
			//	console.log(res);
				//console.log(res);
				var vetor = res.split("|");
				console.log(vetor);
					$("#nome-cientifico").val(vetor[0]);
					$("#nome-vulgar").val(vetor[1]);
					$("#familia").val(vetor[2]);
				})

		});
	}
);