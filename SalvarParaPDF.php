<?php

//POSTS
//*** infos Identificação Cliente
	$empresa = $_POST['empresa'];
	$contato = $_POST['contato'];
	$telefone = $_POST['telefone'];
	$email_cliente = $_POST['email-cliente'];
	$area = $_POST['area'];

//*** Infos Identificação de Serviço
	$codigo_projeto = $_POST['codigo-projeto'];
	$nome_atividade = $_POST['nome-atividade'];
	$numero_registro = $_POST['numero-registro'];
	$modulos = $_POST['modulos'];
	$analista = $_POST['analista'];
	$telefone_servico = $_POST['telefone-servico'];
	$email_servico = $_POST['email-servico'];
//	$data_inicio_servico = $_POST['data-inicio-servico'];

	if($originalDate_inic_serv = $_POST['data-inicio-servico']){
		$data_inicio_servico = date("d/m/Y", strtotime($originalDate_inic_serv));
	} else{$data_inicio_servico = null; }


	//$data_fim_servico = $_POST['data-fim-servico'];

	if($originalDate_fim_serv = $_POST['data-fim-servico']){
		$data_fim_servico = date("d/m/Y", strtotime($originalDate_fim_serv));
	} else{$data_fim_servico = null; }


	$total_horas = $_POST['total-horas'];

//*** Infos Atividades
//está lá em baixo, dentro do laço


//*** Infos Pendencias PSG
	$numero_pendencia_psg = $_POST['numero-pendencia-psg'];

	if($_POST['titulo-pendencia-psg']){
		$titulo_pendencia_psg = $_POST['titulo-pendencia-psg'];
	}
	else{
		$titulo_pendencia_psg = "--";
	}
	//$prazo_pendencia_psg = $_POST['prazo-psg'];
	if($originalDate_prazoPsg = $_POST['prazo-psg']){
		$prazo_pendencia_psg= date("d/m/Y", strtotime($originalDate_prazoPsg));
	} 
	else{
		$prazo_pendencia_psg = null; 
	}




//*** Infos Pendencias Clientes
	$numero_pendencia_cliente = $_POST['numero-pendencia-cliente'];
	if($_POST['titulo-pendencia-cliente']){
		$titulo_pendencia_cliente = $_POST['titulo-pendencia-cliente'];
	}
	else{
		$titulo_pendencia_cliente = "--";
	}
	//$prazo_pendencia_cliente = $_POST['prazo-cliente'];
	if($originalDate_prazoCliente = $_POST['prazo-cliente']){
		$prazo_pendencia_cliente= date("d/m/Y", strtotime($originalDate_prazoCliente));
	} 
	else{
		$prazo_pendencia_cliente = null; 
	}



//*** Infos Pendencias Infraestrutura
	$numero_pendencia_infra = $_POST['numero-pendencia-infra'];
	if($_POST['titulo-pendencia-infra']){
		$titulo_pendencia_infra = $_POST['titulo-pendencia-infra'];
	}
	else{
		$titulo_pendencia_infra = "--";
	}

	//$data_abertura_infra = $_POST['data-abertura-infra'];
	if($originalDate_dataInfra = $_POST['data-abertura-infra']){
		$data_abertura_infra= date("d/m/Y", strtotime($originalDate_dataInfra));
	} 
	else{
		$data_abertura_infra = null; 
	}




//*** Infos Observacoes Pendentes
	$numero_obs_pendente = $_POST['numero-obs-pendente'];

	if($_POST['titulo-obs-pendente']){
		$titulo_obs_pendente = $_POST['titulo-obs-pendente'];
	}
	else{
		$titulo_obs_pendente = "--";
	}
	//$data_abertura_obs_pendente = $_POST['data-abertura-obs-pendente'];
	if($originalDate_dataObs = $_POST['data-abertura-obs-pendente']){
		$data_abertura_obs_pendente= date("d/m/Y", strtotime($originalDate_dataObs));
	} else{$data_abertura_obs_pendente = null; }

ob_start();
?>




<body>
<div align="center">
	
	<table border="1" cellspacing="0" width="100%" style="border-collapse:collapse;">
			<tr>
				<td align="center">
					<img src="psg.jpg">
				</td>
				<td align="center">
					<h1>Registro de Atividades</h1>
				</td>
				<td align="center">
					DEV-100
				</td>
			</tr>
	</table>
	<br/>
<!--******************************************************************************************************************************************-->
<table border="1" cellspacing="0" width="100%" style="border-collapse:collapse;">
			<tr>
				<td align="center" colspan="4" bgcolor="#CCC" >
					<strong>Identificação do Cliente</strong>
				</td>
			</tr>

			<tr>
				<td width="10%">
					<strong>Empresa:</strong>
				</td>
				<td width="40%">
					<?= $empresa ?>
				</td>
				<td width="10%">
					<strong>Contato:</strong>
				</td>
				<td width="40%">
					<?= $contato ?>
				</td>
			</tr>

			<tr>
				<td>
					<strong>Telefone:</strong>
				</td>
				<td>
					<?= $telefone ?>
				</td>
				<td>
					<strong>E-mail:</strong>
				</td>
				<td>
					<?= $email_cliente ?>
				</td>
			</tr>
			<tr>
				<td>
					<strong>Área:</strong>
				</td>
				<td colspan="3">
					<?= $area ?>
				</td>
			</tr>
	</table>
<!--******************************************************************************************************************************************-->
	<table border="1"  cellspacing="0" width="100%" style="border-collapse:collapse;  margin-top: -1px;">
			<tr>
				<td bgcolor="#CCC" align="center">
					<strong>Identificação do Serviço</strong>
				</td>
			</tr>
	</table>
	<table border="1" cellspacing="0" width="100%" style="border-collapse:collapse; margin-top: -1px;">
		<tr>
			<td width="20%">
				<strong>Código de Projeto:</strong>
			</td>
			<td>
				<?= $codigo_projeto ?>
			</td>
		</tr>
	</table>
	<table border="1" cellspacing="0" style="border-collapse:collapse; margin-top: -1px;">
			<tr>
				<td width="20%">
					<strong>Nome da Atividade:</strong>
				</td>
				<td width="35%">
					<?= $nome_atividade ?>
				</td>
				<td width="150px">
					<strong>Número de registro:</strong>
				</td>
				<td width="20%">
					<?= $numero_registro ?>
				</td>
			</tr>
	</table>
	<table border="1" cellspacing="0" width="100%" style="border-collapse:collapse; margin-top: -1px;">
			<tr>
				<td width="10%">
					<strong>Módulos:</strong>
				</td>
				<td>
					<?= $modulos ?>
				</td>
			</tr>
	</table>
	<table border="1" cellspacing="0" width="100%" style="border-collapse:collapse; margin-top: -1px;">
			<tr>
				<td width="15%">
					<strong>Analista/Dev:</strong>
				</td>
				<td>
					<?= $analista ?>
				</td>
			</tr>
	</table>
	<table border="1" cellspacing="0" width="100%" style="border-collapse:collapse; margin-top: -1px;">
			<tr>
				<td width="10%">
					<strong>Telefone:</strong>
				</td>
				<td min-width="40%">
					<?= $telefone_servico ?>
				</td>
				<td width="10%">
					<strong>E-mail:</strong>
				</td>
				<td min-width="40%">
					<?= $email_servico ?>
				</td>
			</tr>
	</table>
	<table border="1" cellspacing="0" width="100%" style="border-collapse:collapse; margin-top: -1px;">
			<tr>
				<td width="15%">
					<strong>Data de Início:</strong>
				</td>
				<td width="12%">
					<?= $data_inicio_servico ?>
				</td>
				<td width="15%">
					<strong>Data de Fim:</strong>
				</td>
				<td width="12%">
					<?= $data_fim_servico ?>
				</td>
				<td width="40%">
					<strong>Total de Horas Trabalhadas no Projeto:</strong>
				</td>
				<td>
					<?= $total_horas ?>
				</td>
			</tr>
	</table>
<!--******************************************************************************************************************************************-->
	<table border="1" cellspacing="0" width="100%" style="border-collapse:collapse; margin-top: -1px;">
		<tr>
			<td align="center"  colspan="5" bgcolor="#CCC">
				<strong>Atividades</strong>
			</td>
		</tr>
	</table>

<table border="1" cellspacing="0" width="100%" style="border-collapse:collapse; margin-top: -1px;">
				
		<tr>
			<td width="80px">
				<strong>Data</strong>
			</td>
			<td width="85px">
				<strong>Hora Início</strong>
			</td>
			<td width="85px">
				<strong>Hora fim</strong>
			</td>
			<td>
				<strong>Descrição do trabalho realizado</strong>
			</td>
			<td width="130px">
				<strong>Opinião do Cliente</strong>
			</td>
		</tr>

<?php
	$i=0;
	for($i; $i <= 20 ; $i++) {

		if(isset($_POST['descricao-atividade'.$i])){

			if($_POST['descricao-atividade'.$i]){
			//$data_atividade[$i] = $_POST['data-atividade'.$i];


				if($originalDate_ativ = $_POST['data-atividade'.$i]){
					$data_atividade[$i]= date("d/m/Y", strtotime($originalDate_ativ));
				} else{$data_atividade[$i] = null; }

				$hora_inicio_atividade[$i] = $_POST['hora-inicio-atividade'.$i];
				$hora_fim_atividade[$i] = $_POST['hora-fim-atividade'.$i];
				$descricao_atividade[$i] = $_POST['descricao-atividade'.$i];
				$opiniao_cliente[$i] = $_POST['opiniao-cliente'.$i];

			?>
				<tr>
					<td>
						<?= $data_atividade[$i] ?>
					</td>
					<td>
						<?= $hora_inicio_atividade[$i] ?>
					</td>
					<td>
						<?= $hora_fim_atividade[$i] ?>
					</td>
					<td>
						<?= $descricao_atividade[$i] ?>
					</td>
					<td>
						<?= $opiniao_cliente[$i] ?>
					</td>
				</tr>
	
			<?php
			}
		} 
	}
?>
</table>
<!--******************************************************************************************************************************************-->
<table  border="1" cellspacing="0" width="100%" style="border-collapse:collapse; margin-top: -1px;">
		<tr>
			<td align="center" bgcolor="#CCC">
				<strong>Pendências PSG</strong>
			</td>
		</tr>
	</table>

	<table border="1" cellspacing="0" width="100%" style="border-collapse:collapse; margin-top: -1px;">
		<tr>
			<td width="70px">
			</td>
			<td>
				<strong>Título</strong>
			</td>
			<td width="130px">
				<strong>Prazo</strong>
			</td>
		</tr>
		<tr>
			<td>
				<?= $numero_pendencia_psg ?>
			<td>
				<?= $titulo_pendencia_psg ?>
			</td>
			<td>
				<?= $prazo_pendencia_psg ?>
			</td>
		</tr>
	</table>
<!--******************************************************************************************************************************************-->
	<table border="1" cellspacing="0" width="100%" style="border-collapse:collapse; margin-top: -1px;">
		<tr>
			<td align="center" bgcolor="#CCC">
				<strong>Pendências Cliente</strong>
			</td>
		</tr>
	</table>

	<table border="1" cellspacing="0" width="100%" style="border-collapse:collapse; margin-top: -1px;">
		<tr>
			<td width="70px">
			</td>
			<td>
				<strong>Título</strong>
			</td>
			<td width="130px">
				<strong>Prazo</strong>
			</td>
		</tr>
		<tr>
			<td>
				<?= $numero_pendencia_cliente ?>
			</td>
			<td>
				<?= $titulo_pendencia_cliente ?>
			</td>
			<td>
				<?= $prazo_pendencia_cliente ?>
			</td>
		</tr>
	</table>
<!--******************************************************************************************************************************************-->
	<table border="1" cellspacing="0" width="100%" style="border-collapse:collapse; margin-top: -1px;">
		<tr>
			<td align="center" bgcolor="#CCC">
				<strong>Pendências Infra</strong>
			</td>
		</tr>
	</table>

	<table border="1" cellspacing="0" width="100%" style="border-collapse:collapse; margin-top: -1px;">
		<tr>
			<td width="70px">
				<strong>Número</strong>
			</td>
			<td>
				<strong>Título</strong>
			</td>
			<td width="130px">
				<strong>Data de Abertura</strong>
			</td>
		</tr>
		<tr>
			<td>
				<?= $numero_pendencia_infra ?>
			</td>
			<td>
				<?= $titulo_pendencia_infra ?>
			</td>
			<td>
				<?= $data_abertura_infra ?>
			</td>
		</tr>
	</table>
<!--******************************************************************************************************************************************-->
	<table border="1" cellspacing="0" width="100%" style="border-collapse:collapse; margin-top: -1px;">
		<tr>
			<td align="center" bgcolor="#CCC">
				<strong>Observações Pendentes</strong>
			</td>
		</tr>
	</table>

	<table border="1" cellspacing="0" width="100%" style="border-collapse:collapse; margin-top: -1px;">
		<tr>
			<td width="70px">
				<strong>Número</strong>
			</td>
			<td>
				<strong>Título</strong>
			</td>
			<td width="130px">
				<strong>Data de Abertura</strong>
			</td>
		</tr>
		<tr>
			<td>
				<?= $numero_obs_pendente ?>
			</td>
			<td>
				<?= $titulo_obs_pendente ?>
			</td>
			<td>
				<?= $data_abertura_obs_pendente ?>
			</td>
		</tr>
	</table>
<!--******************************************************************************************************************************************-->
	<table border="1" cellspacing="0" width="100%" style="border-collapse:collapse; margin-top: -1px;">
		<tr>
			<td bgcolor="#CCC" colspan="2">
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
</form>
</div>
</body>



<?php
$body = ob_get_clean();

        $body = iconv("UTF-8","UTF-8//IGNORE",$body);

  		//include("mpdf/mpdf.php");
        require 'mpdf/vendor/autoload.php';
        $mpdf=new \mPDF('c','A4','10','1' , 20, 20, 10, 10, 0, 0); 

        //write html to PDF
        $mpdf->WriteHTML($body);
 
        //output pdf
      	$mpdf->Output('ResgistroDeAtividades.pdf','D');
        //$mpdf->Output();

        
?>