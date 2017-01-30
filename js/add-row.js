$(document).ready(function(){
  
 	var i=1; 
    $("#add_row").click(function(){
    
      	$('#addr'+i).html("<tr><th width='10%'  style='padding: 8px'>Data</th><th width='10%' style='padding: 8px'>Hora Início</th><th width='10%' style='padding: 8px'>Hora fim</th><th class='inputTextArea' width='55%' style='padding: 8px'>Descrição do trabalho realizado</th><th width='15%' style='padding: 8px'>Opinião do Cliente</th><td></td></tr><tr><td style='padding: 8px'><input type='date' name='data-atividade"+i+"'  class='form-control input-sm'/></td><td style='padding: 8px'><input type='time' name='hora-inicio-atividade"+i+"'  class='form-control input-sm'/></td><td style='padding: 8px'><input type='time' name='hora-fim-atividade"+i+"' class='form-control input-sm'/></td><td class='inputTextArea' style='padding: 8px'><textarea class='form-control input-sm' name='descricao-atividade"+i+"'></textarea></td><td style='padding: 8px'><select class='form-control input-sm' name='opiniao-cliente"+i+"'><option value=''>(selecione)</option><option value='Atendeu totalmente'>Atendeu totalmente</option><option value='Satisfez'>Satisfez</option><option value='Não atendeu'>Não atendeu</option></select></td><td style='padding:8px;'><a id='delete_row"+i+"' class='pull-right btn btn-danger'><img style='max-width: 18px;' src='garbage2.png'/></a></a></td></tr>");
        $('#tab_logic').append('<table class="table table-body table-break2 borda-forte" id="addr'+(i+1)+'"></table>');
    	
    	i++;

        for(let j=1 ; j<=i ; j++ ){
 			$(document).on('click', '#delete_row'+j, function(){ $('#addr'+j).remove(); }); 
		}
    });
});

//cria evento do promeiro botão de deletar antes do evento do botao add_row
$(document).on('click', '#delete_row0', function(){ $('#addr0').remove(); }); 