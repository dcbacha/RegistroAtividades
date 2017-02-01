<!DOCTYPE html>
<html>


<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" href="css/bootstrap.css">

	<link rel="icon" href="psgicon.ico">
	<title>Registro de Atividades</title>

	<script src="js/jquery-3.1.1.js" type="text/javascript"></script>
	<script src="js/add-row.js" type="text/javascript"></script>

<script type="text/javascript">
	
	function reload(){
    	var r = confirm("Você irá perder seus dados. Deseja continuar?");
    	if (r == 1){
        	window.reload;
    	}
    	else{
        	return false;
    	}
	}
	
</script>
</head>


<body style="padding-top: 10px" id="target">
<div class="container" id="content">
<form method="post">
	
	<table class=" table table-bordered" id="name">
			<tr>
				<td>
					<center><img src="psg.jpg"></center>
				</td>
				<td class="text-center">
					<h1>Registro de Atividades</h1>
				</td>
				<td class="text-center">
					DEV-100
				</td>
			</tr>
			
	</table>
	<br/>
<!--******************************************************************************************************************************************-->
	<table class="table table-bordered">
			<tr>
				<th class="text-center" colspan="4" bgcolor="#CCC">
					<strong>Identificação do Cliente</strong>
				</th>
			</tr>
	</table>
	<table class="table table-body table-break">
			<tr>
				<td width="5%" class="titulo">
					<strong>Empresa:</strong>
				</td>
				<td width="45%">
					<input class="form-control input-sm" type="text" name="empresa">
				</td>
				<td width="5%" class="titulo">
					<strong>Contato:</strong>
				</td>
				<td width="45%">
					<input class="form-control input-sm" type="text" name="contato">
				</td>
			</tr>

			<tr>
				<td class="titulo">
					<strong>Telefone:</strong>
				</td>
				<td>
					<input class="form-control input-sm" type="number" name="telefone" >
				</td>
				<td class="titulo">
					<strong>E-mail:</strong>
				</td>
				<td>
					<input class="form-control input-sm" type="email" name="email-cliente">
				</td>
			</tr>
			<tr>
				<td class="titulo">
					<strong>Área:</strong>
				</td>
				<td colspan="3">
					<input class="form-control input-sm" type="text" name="area">
				</td>
			</tr>
	</table>
<!--******************************************************************************************************************************************-->
	<table class="table table-body">
			<tr>
				<td class="text-center" bgcolor="#CCC">
					<strong>Identificação do Serviço</strong>
				</td>
			</tr>
	</table>
	<table class="table table-body table-break">
			<tr>
				<td width="15%" class="titulo">
					<strong>Código de Projeto:</strong>
				</td>
				<td width="85%">
					<input class="form-control input-sm" type="text" name="codigo-projeto">
				</td>
			</tr>
	</table>

	<table class="table table-body table-break">
			<tr>
				<td width="15%" class="titulo">
					<strong>Nome da Atividade:</strong>
				</td>
				<td>
					<input class="form-control input-sm" type="text" name="nome-atividade">
				</td>
				<td width="15%" class="titulo">
					<strong>Número de registro:</strong>
				</td>
				<td>
					<input class="form-control input-sm" type="number" name="numero-registro">
				</td>
			</tr>
	</table>

	<table class="table table-body table-break">
			<tr>
				<td width="5%" class="titulo">
					<strong>Módulos:</strong>
				</td>
				<td>
					<input class="form-control input-sm" type="text" name="modulos">
				</td>
			</tr>
	</table>

	<table class="table table-body table-break">
			<tr>
				<td width="10%" class="titulo">
					<strong>Analista/Dev:</strong>
				</td>
				<td>
					<input class="form-control input-sm" type="text" name="analista">
				</td>
			</tr>
	</table>
	<table class="table table-body table-break">
			<tr>
				<td width="5%" class="titulo">
					<strong>Telefone:</strong>
				</td>
				<td width="45%">
					<input class="form-control input-sm" type="number" name="telefone-servico">
				</td>
				<td width="8%" class="titulo">
					<strong>E-mail:</strong>
				</td>
				<td width="42%">
					<input class="form-control input-sm" type="email" name="email-servico">
				</td>
			</tr>
	</table>
	<table class="table table-body table-break">
			<tr>
				<td width="12%" class="ajuste titulo">
					<strong>Data de Início:</strong>
				</td>
				<td width="15%">
					<input class="form-control input-sm" type="date" name="data-inicio-servico">
				</td>
				<td width="10%" class="ajuste titulo">
					<strong>Data de Fim:</strong>
				</td>
				<td width="15%">
					<input class="form-control input-sm" type="date" name="data-fim-servico">
				</td>
				<td width="30%"  class="ajuste titulo">
					<strong>Total de Horas Trabalhadas no Projeto:</strong>
				</td>
				<td class="inputTotalHoras">
					<input class="form-control" type="number" name="total-horas">
				</td>
			</tr>
	</table>

		
<!--******************************************************************************************************************************************-->
	<table class="table table-body">
		<tr>
			<td class="text-center"  colspan="5" bgcolor="#CCC">
				<strong>Atividades</strong>
			</td>
		</tr>
	</table>

<div id="tab_logic">
<table class="table table-body table-break2 borda-forte" id='addr0'>
				
		<tr>
			<th width="10%">
				Data
			</th>
			<th width="10%">
				Hora Início
			</th>
			<th width="10%">
				Hora fim
			</th>
			<th width="55%" class="inputTextArea">
				Descrição do trabalho realizado
			</th>
			<th width="15%">
				Opinião do Cliente
			</th>
			<th>
				
			</th>
		</tr>
				
		<tr>
			<td>
				<input type="date" name='data-atividade0'  class="form-control input-sm"/>
			</td>
			<td>
				<input type="time" name='hora-inicio-atividade0'  class="form-control input-sm"/>
			</td>
			<td>
				<input type="time" name='hora-fim-atividade0' class="form-control input-sm"/>
			</td>
			<td class='inputTextArea'>
				<textarea class="form-control input-sm" name='descricao-atividade0'></textarea>
			</td>
			<td>
				<select class="form-control input-sm" name='opiniao-cliente0'>
					<option value="">
						(selecione)
					</option>
    				<option value="Atendeu totalmente">
    					Atendeu totalmente
    				</option>
    				<option value="Satisfez">
    					Satisfez
    				</option>
    				<option value="Não atendeu">
    					Não atendeu
    				</option>
  				</select>
			</td>
			<td>
			<a id='delete_row0' class="pull-right btn btn-danger">
				<img style='max-width: 18px;' src='garbage2.png'/>
			</a>
			</td>
		</tr>
	
</table>

<table class='table table-body table-break2 borda-forte' id='addr1'></table>


</div>
	<a style="margin-bottom: 3px;" id="add_row" class="btn btn-success pull-left" name="adiciona">Adicionar atividade</a>
	 

<!--******************************************************************************************************************************************-->
	<table class="table table-bordered">
		<tr>
			<td class="text-center" bgcolor="#CCC">
				<strong>Pendências PSG</strong>
			</td>
		</tr>
	</table>

	<table class="table table-body table-break3">
		<tr>
			<td width="10%">
			</td>
			<td width="75%">
				<strong>Título</strong>
			</td>
			<td>
				<strong>Prazo</strong>
			</td>
		</tr>
		<tr>
			<td>
				<input class="form-control input-sm" type="text" name="numero-pendencia-psg">
			</td>
			<td>
				<input class="form-control input-sm" type="text" name="titulo-pendencia-psg">
			</td>
			<td>
				<input class="form-control input-sm" type="date" name="prazo-psg">
			</td>
		</tr>
	</table>
<!--******************************************************************************************************************************************-->
	<table class="table table-body">
		<tr>
			<td class="text-center" bgcolor="#CCC">
				<strong>Pendências Cliente</strong>
			</td>
		</tr>
	</table>

	<table class="table table-body table-break3">
		<tr>
			<td width="10%">
			</td>
			<td width="75%">
				<strong>Título</strong>
			</td>
			<td>
				<strong>Prazo</strong>
			</td>
		</tr>
		<tr>
			<td>
				<input class="form-control input-sm" type="text" name="numero-pendencia-cliente">
			</td>
			<td>
				<input class="form-control input-sm" type="text" name="titulo-pendencia-cliente">
			</td>
			<td>
				<input class="form-control input-sm" type="date" name="prazo-cliente">
			</td>
		</tr>
	</table>
<!--******************************************************************************************************************************************-->
	<table class="table table-body">
		<tr>
			<td class="text-center"  colspan="3" bgcolor="#CCC">
				<strong>Pendências Infra</strong>
			</td>
		</tr>
	</table>

	<table class="table table-body table-break3">
		<tr>
			<td width="10%">
				<strong>Número</strong>
			</td>
			<td width="75%">
				<strong>Título</strong>
			</td>
			<td>
				<strong>Data de Abertura</strong>
			</td>
		</tr>
		<tr>
			<td>
				<input class="form-control input-sm" type="number" name="numero-pendencia-infra">
			</td>
			<td>
				<input class="form-control input-sm" type="text" name="titulo-pendencia-infra">
			</td>
			<td>
				<input  class="form-control input-sm" type="date" name="data-abertura-infra">
			</td>
		</tr>
	</table>
<!--******************************************************************************************************************************************-->
	<table class="table table-body">
		<tr>
			<td class="text-center" colspan="3" bgcolor="#CCC">
				<strong>Observações Pendentes</strong>
			</td>
		</tr>
	</table>

	<table class="table table-body table-break3">
		<tr>
			<td width="10%">
				<strong>Número</strong>
			</td>
			<td width="75%">
				<strong>Título</strong>
			</td>
			<td>
				<strong>Data de Abertura</strong>
			</td>
		</tr>
		<tr>
			<td>
				<input class="form-control input-sm" type="number" name="numero-obs-pendente">
			</td>
			<td>
				<input class="form-control input-sm" type="text" name="titulo-obs-pendente">
			</td>
			<td>
				<input class="form-control input-sm" type="date" name="data-abertura-obs-pendente">
			</td>
		</tr>
	</table>
<!--******************************************************************************************************************************************-->
	<table class="table table-body">
		<tr>
			<td colspan="2" bgcolor="#CCC">
				<br/>
			</td>
		</tr>
		<tr>
			<td width="50%">
				<strong>Aceite: (Analista)<br/><br/><br/>Data:</strong>
			</td>
			<td width="50%">
				<strong>Aceite: (Cliente)<br/><br/><br/>Data:</strong>
			</td>
		</tr>
	</table>
<!--******************************************************************************************************************************************-->
	<button style="margin-top: 3px; margin-bottom: 3px;" type="submit" name="pdf" formaction="SalvarParaPDF.php" class="btn btn-primary">
		Gerar PDF
	</button>
	<button style="margin-top: 3px; margin-bottom: 3px;" type="submit" name="excel" formaction="SalvarParaExcel.php" class="btn btn-primary">
		Gerar Excel
	</button>
	<button style="margin-top: 3px; margin-bottom: 3px;"  onclick="return reload();" formnovalidate class="btn btn-primary pull-right" >
		Novo
	</button>

</form>
</div>
</body>

</html>
