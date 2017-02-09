var i=1; 

$(document).ready(function(){
  
 	
    $("#add_row").click(function(){
    
      	$('#addr'+i).html("<tr><th width='10%'  style='padding: 8px'>Data</th><th width='10%' style='padding: 8px'>Hora Início</th><th width='10%' style='padding: 8px'>Hora fim</th><th class='inputTextArea' width='55%' style='padding: 8px'>Descrição do trabalho realizado</th><th width='15%' style='padding: 8px'>Opinião do Cliente</th><td></td></tr><tr><td style='padding: 8px'><input type='date' name='data-atividade"+i+"' id='data-atividade"+i+"' class='form-control input-sm'/></td><td style='padding: 8px'><input type='time' name='hora-inicio-atividade"+i+"' id='hora-inicio-atividade"+i+"' class='form-control input-sm'/></td><td style='padding: 8px'><input type='time' name='hora-fim-atividade"+i+"' id='hora-fim-atividade"+i+"' class='form-control input-sm'/></td><td class='inputTextArea' style='padding: 8px'><textarea class='form-control input-sm' name='descricao-atividade"+i+"' id='descricao-atividade"+i+"'></textarea></td><td style='padding: 8px'><select class='form-control input-sm' name='opiniao-cliente"+i+"' id='opiniao-cliente"+i+"'><option value=''>(selecione)</option><option value='Atendeu totalmente'>Atendeu totalmente</option><option value='Satisfez'>Satisfez</option><option value='Não atendeu'>Não atendeu</option></select></td><td style='padding:8px;'><a id='delete_row"+i+"' class='pull-right btn btn-danger'><img style='max-width: 18px;' src='garbage2.png'/></a></a></td></tr>");
        $('.addr'+i).slideDown(500);

        $('#tab_logic').append('<section class="addr'+(i+1)+'" hidden><table class="table table-body table-break2 borda-forte" id="addr'+(i+1)+'"></table></section>');
    	
    	i++;

        for(let j=1 ; j<=i ; j++ ){
 			$(document).on('click', '#delete_row'+j, function(){
 				$('.addr'+j).slideUp(500); 
 				setTimeout(function(){$('#addr'+j).remove();},1000)
 			}); 
		}
    });
});

//cria evento do promeiro botão de deletar antes do evento do botao add_row
//$(document).on('click', '#delete_row0', function(){ $('#addr0').remove();}); 
$(document).on('click', '#delete_row0', function(){
 				$('.addr0').slideUp(); 
 				setTimeout(function(){$('#addr0').remove();},500)
 			}); 


//*****************************************************************


$("#salvaBD").click(function(){
	
	$("#spinner").toggle();

	var r = confirm("Enviar registro de atividades?");
    if (r == 1){

		var dadosAtividades = [];

		for(let j=0; j<=i ; j++){
		

			var dataAtividade = $("#data-atividade"+j).val();
			var horaInicio = $("#hora-inicio-atividade"+j).val();
			var horaFim = $("#hora-fim-atividade"+j).val();
			var descricao = $('#descricao-atividade'+j).val();
			var opiniaoCliente = $("#opiniao-cliente"+j).val();

			if(descricao){
			var atividades = {
				dataAtividade: dataAtividade,
				horaInicio: horaInicio,
				horaFim: horaFim,
				descricao: descricao,
				opiniaoCliente: opiniaoCliente
				}

			dadosAtividades.push(atividades);
			}
		
		}

		//console.log(dadosAtividades);

		var tableAtividades = JSON.stringify(dadosAtividades);
		//console.log(tableAtividades);


		var dados = [];
		

		var empresa = $("#empresa").val();
		var contato = $("#contato").val();
		var telefone = $("#telefone").val();
		var email = $("#email-cliente").val();
		var area = $("#area").val();

		var codigoProjeto =$("#codigo-projeto").val();
		var nomeAtividade = $("#nome-atividade").val();
		var numeroRegistro = $("#numero-registro").val();
		var modulos = $("#modulos").val();
		var analista = $("#analista").val();
		var telefoneServico = $("#telefone-servico").val();
		var emailServico = $("#email-servico").val();
		var dataInicio = $("#data-inicio-servico").val();
		var dataFim = $("#data-fim-servico").val();
		var totalHoras = $("#total-horas").val();

		var numPendenciaPsg = $("#numero-pendencia-psg").val();
		var tituloPendenciaPsg = $("#titulo-pendencia-psg").val();
		var prazoPendenciaPsg = $("#prazo-psg").val();

		var numPendenciaCliente =$("#numero-pendencia-cliente").val();
		var tituloPendenciaCliente = $("#titulo-pendencia-cliente").val();
		var prazoPendenciaCliente = $("#prazo-cliente").val();

		var numPendenciaInfra = $("#numero-pendencia-infra").val();
		var tituloPendenciaInfra = $("#titulo-pendencia-infra").val();
		var dataAberturaPendenciaInfra = $("#data-abertura-infra").val();

		var numObsPendente = $("#numero-obs-pendente").val();
		var tituloObsPendente = $("#titulo-obs-pendente").val();
		var dataAberturaObsPendente = $("#data-abertura-obs-pendente").val();

		var servicos = [{
			"empresa": empresa,
			"contato": contato,
			"telefone": telefone,
			"email": email,
			"area": area,
			"codigoProjeto": codigoProjeto,
			"nomeAtividade": nomeAtividade,
			"numeroRegistro": numeroRegistro,
			"modulos": modulos,
			"analista": analista,
			"telefoneServico": telefoneServico,
			"emailServico": emailServico,
			"dataInicio": dataInicio,
			"dataFim": dataFim,
			"totalHoras": totalHoras,
			"numPendenciaPsg": numPendenciaPsg,
			"tituloPendenciaPsg": tituloPendenciaPsg,
			"prazoPendenciaPsg": prazoPendenciaPsg,
			"numPendenciaCliente": numPendenciaCliente,
			"tituloPendenciaCliente": tituloPendenciaCliente,
			"prazoPendenciaCliente": prazoPendenciaCliente,
			"numPendenciaInfra": numPendenciaInfra,
			"tituloPendenciaInfra": tituloPendenciaInfra,
			"dataAberturaPendenciaInfra": dataAberturaPendenciaInfra,
			"numObsPendente": numObsPendente,
			"tituloObsPendente": tituloObsPendente,
			"dataAberturaObsPendente": dataAberturaObsPendente
		}];


		var tableServicos = JSON.stringify(servicos);
		//console.log(tableServicos);


		var tablejsonGeral = {"dadosServico" : tableServicos, "dadosAtividades" : tableAtividades }; 
		console.log(tablejsonGeral);

		$.ajax({
	        type: 'POST',
	        dataType: 'html',
	        url: 'aplicaBD.php',
	        data:  tablejsonGeral,
			error: function() {
				console.log("erro, nao transmitiu")
				},
	        success: function(data) {
	        	console.log("transmitidos com sucesso!");
				console.log(data);
	        	}
			})
			.done(function(data){
				console.log("finalizado!");
				$("#spinner").toggle();
				}); 



	

	} 
    else{
        return false;
    } 



}); 

