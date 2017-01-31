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

	if($originalDate_inic_serv = $_POST['data-inicio-servico']){
		$data_inicio_servico = date("d/m/Y", strtotime($originalDate_inic_serv));
	} else{$data_inicio_servico = null; }


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

//************************************************************************************************************



// Incluimos a classe PHPExcel
include('Classes/PHPExcel.php');

// Instanciamos a classe
$objPHPExcel = new PHPExcel();
$setSheet = $objPHPExcel->setActiveSheetIndex(0);
$getSheet = $objPHPExcel->getActiveSheet();

// Set Orientation, size and scaling
$getSheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
$getSheet->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
$getSheet->getPageSetup()->setFitToPage(true);
$getSheet->getPageSetup()->setFitToWidth(1);
$getSheet->getPageSetup()->setFitToHeight(0);



//Estilos e definições
$style = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        )
    );

$canto = array(
        'alignment' => array(
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_TOP,
        )
    );

$esquerda = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
        )
    );


$border = array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
                'color' => array('rgb' => '000000')
            )
        )
    );

$color = array(
         'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'DDDDDD')
        )
    );

$desprotegido = PHPExcel_Style_Protection::PROTECTION_UNPROTECTED;


//*********************************CABECALHO**************************


//Imagem
$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('Logo');
$objDrawing->setDescription('Logo');
$logo = 'psg.jpg'; // Provide path to your logo file
$objDrawing->setPath($logo);  //setOffsetY has no effect
$objDrawing->setCoordinates('A2');
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet()); 
$objDrawing->setOffsetX(35);

//tamanho da linha
$objPHPExcel->getActiveSheet()->getRowDimension(2)->setRowHeight(60); 

$setSheet->mergeCells('A2:B2');
$setSheet->mergeCells('C2:L2');
$setSheet->mergeCells('M2:N2');

$getSheet->setCellValue("C2", "REGISTRO DE ATIVIDADES");
$getSheet->setCellValue("M2", "DEV-100");

//Estilos
$getSheet->getStyle('A2:N2')->applyFromArray($style);
$getSheet->getStyle('A2:N2')->getFont()->setSize(16);
$getSheet->getStyle('A2:N2')->getFont()->setBold(true);


//***********************Identifição do Cliente******************************

$setSheet->mergeCells('A4:N4');//titulo
$setSheet->mergeCells('A5:B5');//empresa
$setSheet->mergeCells('C5:G5');//area empresa
$setSheet->mergeCells('H5:I5');//contato
$setSheet->mergeCells('J5:N5');//area contato
$setSheet->mergeCells('A6:B6');//telefone
$setSheet->mergeCells('C6:G6');//area telefone
$setSheet->mergeCells('H6:I6');//email
$setSheet->mergeCells('J6:N6');//area email
$setSheet->mergeCells('A7:B7');//area
$setSheet->mergeCells('C7:N7');//area area

$getSheet->setCellValue("A4", "Identificação do Cliente");
$getSheet->setCellValue("A5", "Empresa:");
$getSheet->setCellValue("H5", "Contato:");
$getSheet->setCellValue("A6", "Telefone:");
$getSheet->setCellValue("H6", "E-Mail:");
$getSheet->setCellValue("A7", "Área:");

//Estilos
$getSheet->getStyle('A4')->applyFromArray($color);
$getSheet->getStyle('A4')->applyFromArray($style);
$getSheet->getStyle('A4')->getFont()->setBold(true);
$getSheet->getStyle('A5')->getFont()->setBold(true);
$getSheet->getStyle('H5')->getFont()->setBold(true);
$getSheet->getStyle('A6')->getFont()->setBold(true);
$getSheet->getStyle('H6')->getFont()->setBold(true);
$getSheet->getStyle('A7')->getFont()->setBold(true);
$getSheet->getStyle('C6')->applyFromArray($esquerda);

//Variáveis
$getSheet->setCellValue("C5", "$empresa");
$getSheet->setCellValue("J5", "$contato");
$getSheet->setCellValue("C6", "$telefone");
$getSheet->setCellValue("J6", "$email_cliente");
$getSheet->setCellValue("C7", "$area");

//Deixar desprotegido
$getSheet->getStyle('C5')->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('J5')->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('C6')->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('J6')->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('C7')->getProtection()->setLocked($desprotegido);



//***********************Identifição do Serviço******************************

$setSheet->mergeCells('A8:N8');//titulo
$setSheet->mergeCells('A9:B9');//codigo
$setSheet->mergeCells('C9:N9');//area codigo
$setSheet->mergeCells('A10:B10');//nome atividade
$setSheet->mergeCells('C10:J10');//area nome atividade
$setSheet->mergeCells('K10:M10');//numero registro
$setSheet->mergeCells('A11:B11');//modulos
$setSheet->mergeCells('C11:N11');//area modulos
$setSheet->mergeCells('A12:B12');//analista
$setSheet->mergeCells('C12:N12');//area analista
$setSheet->mergeCells('A13:B13');//Telefone
$setSheet->mergeCells('C13:G13');//area telefone
//$setSheet->mergeCells('I13:J13');//email
$setSheet->mergeCells('I13:N13');//area email
$setSheet->mergeCells('A14:B14');//data inicio
$setSheet->mergeCells('C14:D14');//area dt inicio
$setSheet->mergeCells('E14:F14');//data fim
$setSheet->mergeCells('G14:H14');//area data fim
$setSheet->mergeCells('I14:L14');//total de horas
$setSheet->mergeCells('M14:N14');//area total de horas

$getSheet->setCellValue("A8", "Identificação do Serviço");
$getSheet->setCellValue("A9", "Código do Projeto:");
$getSheet->setCellValue("A10", "Nome da Atividade:");
$getSheet->setCellValue("K10", "Número do Resgistro:");
$getSheet->setCellValue("A11", "Módulos:");
$getSheet->setCellValue("A12", "Analista/Dev:");
$getSheet->setCellValue("A13", "Telefone:");
$getSheet->setCellValue("H13", "E-mail:");
$getSheet->setCellValue("A14", "Data de Início:");
$getSheet->setCellValue("E14", "Data de Fim:");
$getSheet->setCellValue("I14", "Total de Horas Trabalhadas no Projeto:");

//Estilos
$getSheet->getStyle('A8')->applyFromArray($color);
$getSheet->getStyle('A8')->applyFromArray($style);
$getSheet->getStyle('A8')->getFont()->setBold(true);
$getSheet->getStyle('A9')->getFont()->setBold(true);
$getSheet->getStyle('A10')->getFont()->setBold(true);
$getSheet->getStyle('K10')->getFont()->setBold(true);
$getSheet->getStyle('A11')->getFont()->setBold(true);
$getSheet->getStyle('A12')->getFont()->setBold(true);
$getSheet->getStyle('A13')->getFont()->setBold(true);
$getSheet->getStyle('H13')->getFont()->setBold(true);
$getSheet->getStyle('A14')->getFont()->setBold(true);
$getSheet->getStyle('E14')->getFont()->setBold(true);
$getSheet->getStyle('I14')->getFont()->setBold(true);
$getSheet->getStyle('N10')->applyFromArray($esquerda);
$getSheet->getStyle('C13')->applyFromArray($esquerda);
$getSheet->getStyle('M14')->applyFromArray($esquerda);

//Variáveis
$getSheet->setCellValue("C9", "$codigo_projeto");
$getSheet->setCellValue("C10", "$nome_atividade");
$getSheet->setCellValue("N10", "$numero_registro");
$getSheet->setCellValue("C11", "$modulos");
$getSheet->setCellValue("C12", "$analista");
$getSheet->setCellValue("C13", "$telefone_servico");
$getSheet->setCellValue("I13", "$email_servico");
$getSheet->setCellValue("C14", "$data_inicio_servico");
$getSheet->setCellValue("G14", "$data_fim_servico");
$getSheet->setCellValue("M14", "$total_horas");

//Deixar desprotegido
$getSheet->getStyle('C9')->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('C10')->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('N10')->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('C11')->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('C12')->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('C13')->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('J13')->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('C14')->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('G14')->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('M14')->getProtection()->setLocked($desprotegido);

//***********************Atividades******************************

$setSheet->mergeCells('A15:N15');//titulo
$setSheet->mergeCells('A16:B16');//data
$setSheet->mergeCells('C16:D16');//hora Inicio
$setSheet->mergeCells('E16:F16');//hora fim
$setSheet->mergeCells('G16:L16');//Descrição das Atividades
$setSheet->mergeCells('M16:N16');//Opinião do Cliente

$getSheet->setCellValue("A15", "Atividades");
$getSheet->setCellValue("A16", "Data");
$getSheet->setCellValue("C16", "Hora Início");
$getSheet->setCellValue("E16", "Hora Fim");
$getSheet->setCellValue("G16", "Descrição do trabalho realizado");
$getSheet->setCellValue("M16", "Opinião do cliente");

//Estilos
$getSheet->getStyle('A15')->applyFromArray($color);
$getSheet->getStyle('A15')->applyFromArray($style);
$getSheet->getStyle('A16:N16')->applyFromArray($style);
$getSheet->getStyle('A15')->getFont()->setBold(true);
$getSheet->getStyle('A16')->getFont()->setBold(true);
$getSheet->getStyle('C16')->getFont()->setBold(true);
$getSheet->getStyle('E16')->getFont()->setBold(true);
$getSheet->getStyle('G16')->getFont()->setBold(true);
$getSheet->getStyle('M16')->getFont()->setBold(true);

//Variáveis
$i=0;
$total=0;
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

			//tem q ta aqui o rolee
			$total = $total + 17;
			
			$cellx = 'A'.$total.':'.'B'.$total;
			$setSheet->mergeCells($cellx);//data

			$cellx = 'C'.$total.':'.'D'.$total;
			$setSheet->mergeCells($cellx);//hora Inicio

			$cellx = 'E'.$total.':'.'F'.$total;
			$setSheet->mergeCells($cellx);//hora fim

			$cellx = 'G'.$total.':'.'L'.$total;
			$setSheet->mergeCells($cellx);//Descrição das Atividades

			$cellx = 'M'.$total.':'.'N'.$total;
			$setSheet->mergeCells($cellx);//Opinião do Cliente

			$celly = 'A'.$total;
			$getSheet->setCellValue($celly, "$data_atividade[$i]");
			$getSheet->getStyle($celly)->getProtection()->setLocked($desprotegido);
			$getSheet->getStyle($celly)->applyFromArray($style);

			$celly = 'C'.$total;
			$getSheet->setCellValue($celly, "$hora_inicio_atividade[$i]");
			$getSheet->getStyle($celly)->getProtection()->setLocked($desprotegido);
			$getSheet->getStyle($celly)->applyFromArray($style);

			$celly = 'E'.$total;
			$getSheet->setCellValue($celly, "$hora_fim_atividade[$i]");
			$getSheet->getStyle($celly)->getProtection()->setLocked($desprotegido);
			$getSheet->getStyle($celly)->applyFromArray($style);

			$celly = 'G'.$total;
			$getSheet->setCellValue($celly, "$descricao_atividade[$i]");
			$getSheet->getStyle($celly)->getProtection()->setLocked($desprotegido);
			$getSheet->getRowDimension($total)->setRowHeight(-1); 
			$getSheet->getStyle($celly)->getAlignment()->setWrapText(true);

		
			$celly = 'M'.$total;
			$getSheet->setCellValue($celly, "$opiniao_cliente[$i]");
			$getSheet->getStyle($celly)->getProtection()->setLocked($desprotegido);
			$getSheet->getStyle($celly)->applyFromArray($style);

			$total = $total-17;
			$total ++;
		}	
	}
}

//************************Pendências PSG*********************************

$linha = $total + 17;
$cellz = 'A'.$linha.':'.'N'.$linha;
$setSheet->mergeCells($cellz);//titulo


$cellz = 'A'.($linha+1).':'.'B'.($linha+1);
$setSheet->mergeCells($cellz);//numero


$cellz = 'A'.($linha+2).':'.'B'.($linha+2);
$setSheet->mergeCells($cellz);//area numero


$cellz = 'C'.($linha+1).':'.'L'.($linha+1);
$setSheet->mergeCells($cellz);//pendencia


$cellz = 'C'.($linha+2).':'.'L'.($linha+2);
$setSheet->mergeCells($cellz);//area pendencia

$cellz = 'M'.($linha+1).':'.'N'.($linha+1);
$setSheet->mergeCells($cellz);//Prazo


$cellz = 'M'.($linha+2).':'.'N'.($linha+2);
$setSheet->mergeCells($cellz);//area prazo


$getSheet->setCellValue('A'.($linha), "Pendências PSG");
$getSheet->setCellValue('C'.($linha+1), "Título");
$getSheet->setCellValue('M'.($linha+1), "Prazo");

//Variáveis
$getSheet->setCellValue('A'.($linha+2), "$numero_pendencia_psg");
$getSheet->setCellValue('C'.($linha+2), "$titulo_pendencia_psg");
$getSheet->setCellValue('M'.($linha+2), "$prazo_pendencia_psg");

//Estilos
$getSheet->getStyle('A'.$linha)->applyFromArray($color);
$getSheet->getStyle('A'.($linha))->applyFromArray($style);
$getSheet->getStyle('A'.($linha))->getFont()->setBold(true);
$getSheet->getStyle('C'.($linha+1))->getFont()->setBold(true);
$getSheet->getStyle('M'.($linha+1))->getFont()->setBold(true);
$getSheet->getStyle('A'.($linha+2))->applyFromArray($esquerda);

//Deixar desprotegido
$getSheet->getStyle('A'.($linha+2))->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('C'.($linha+2))->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('M'.($linha+2))->getProtection()->setLocked($desprotegido);


//*************************Pendências CLiente***********************************

$cellz = 'A'.($linha+3).':'.'N'.($linha+3);
$setSheet->mergeCells($cellz);//titulo


$cellz = 'A'.($linha+4).':'.'B'.($linha+4);
$setSheet->mergeCells($cellz);//numero


$cellz = 'A'.($linha+5).':'.'B'.($linha+5);
$setSheet->mergeCells($cellz);//area numero


$cellz = 'C'.($linha+4).':'.'L'.($linha+4);
$setSheet->mergeCells($cellz);//pendencia


$cellz = 'C'.($linha+5).':'.'L'.($linha+5);
$setSheet->mergeCells($cellz);//area pendencia

$cellz = 'M'.($linha+4).':'.'N'.($linha+4);
$setSheet->mergeCells($cellz);//Prazo


$cellz = 'M'.($linha+5).':'.'N'.($linha+5);
$setSheet->mergeCells($cellz);//area prazo


$getSheet->setCellValue('A'.($linha+3), "Pendências Cliente");
$getSheet->setCellValue('C'.($linha+4), "Título");
$getSheet->setCellValue('M'.($linha+4), "Prazo");

//Variáveis
$getSheet->setCellValue('A'.($linha+5), "$numero_pendencia_cliente");
$getSheet->setCellValue('C'.($linha+5), "$titulo_pendencia_cliente");
$getSheet->setCellValue('M'.($linha+5), "$prazo_pendencia_cliente");

//Estilos
$getSheet->getStyle('A'.($linha+3))->applyFromArray($color);
$getSheet->getStyle('A'.($linha+3))->applyFromArray($style);
$getSheet->getStyle('A'.($linha+3))->getFont()->setBold(true);
$getSheet->getStyle('C'.($linha+4))->getFont()->setBold(true);
$getSheet->getStyle('M'.($linha+4))->getFont()->setBold(true);
$getSheet->getStyle('A'.($linha+5))->applyFromArray($esquerda);

//Deixar desprotegido
$getSheet->getStyle('A'.($linha+5))->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('C'.($linha+5))->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('M'.($linha+5))->getProtection()->setLocked($desprotegido);

//*************************Pendências Infra****************************************

$cellz = 'A'.($linha+6).':'.'N'.($linha+6);
$setSheet->mergeCells($cellz);//titulo


$cellz = 'A'.($linha+7).':'.'B'.($linha+7);
$setSheet->mergeCells($cellz);//numero


$cellz = 'A'.($linha+8).':'.'B'.($linha+8);
$setSheet->mergeCells($cellz);//area numero


$cellz = 'C'.($linha+7).':'.'L'.($linha+7);
$setSheet->mergeCells($cellz);//pendencia


$cellz = 'C'.($linha+8).':'.'L'.($linha+8);
$setSheet->mergeCells($cellz);//area pendencia

$cellz = 'M'.($linha+7).':'.'N'.($linha+7);
$setSheet->mergeCells($cellz);//Prazo


$cellz = 'M'.($linha+8).':'.'N'.($linha+8);
$setSheet->mergeCells($cellz);//area prazo


$getSheet->setCellValue('A'.($linha+6), "Pendências Infra");
$getSheet->setCellValue('A'.($linha+7), "Número");
$getSheet->setCellValue('C'.($linha+7), "Título");
$getSheet->setCellValue('M'.($linha+7), "Data da Abertura");

//Variáveis
$getSheet->setCellValue('A'.($linha+8), "$numero_pendencia_infra");
$getSheet->setCellValue('C'.($linha+8), "$titulo_pendencia_infra");
$getSheet->setCellValue('M'.($linha+8), "$data_abertura_infra");

//Estilos
$getSheet->getStyle('A'.($linha+6))->applyFromArray($color);
$getSheet->getStyle('A'.($linha+6))->applyFromArray($style);
$getSheet->getStyle('A'.($linha+6))->getFont()->setBold(true);
$getSheet->getStyle('A'.($linha+7))->getFont()->setBold(true);
$getSheet->getStyle('C'.($linha+7))->getFont()->setBold(true);
$getSheet->getStyle('M'.($linha+7))->getFont()->setBold(true);
$getSheet->getStyle('A'.($linha+8))->applyFromArray($esquerda);

//Deixar desprotegido
$getSheet->getStyle('A'.($linha+8))->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('C'.($linha+8))->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('M'.($linha+8))->getProtection()->setLocked($desprotegido);

//*************************Observações Pendentes***************************************

$cellz = 'A'.($linha+9).':'.'N'.($linha+9);
$setSheet->mergeCells($cellz);//titulo


$cellz = 'A'.($linha+10).':'.'B'.($linha+10);
$setSheet->mergeCells($cellz);//numero


$cellz = 'A'.($linha+11).':'.'B'.($linha+11);
$setSheet->mergeCells($cellz);//area numero


$cellz = 'C'.($linha+10).':'.'L'.($linha+10);
$setSheet->mergeCells($cellz);//pendencia


$cellz = 'C'.($linha+11).':'.'L'.($linha+11);
$setSheet->mergeCells($cellz);//area pendencia

$cellz = 'M'.($linha+10).':'.'N'.($linha+10);
$setSheet->mergeCells($cellz);//Prazo


$cellz = 'M'.($linha+11).':'.'N'.($linha+11);
$setSheet->mergeCells($cellz);//area prazo


$getSheet->setCellValue('A'.($linha+9), "Observações Pendentes");
$getSheet->setCellValue('A'.($linha+10), "Número");
$getSheet->setCellValue('C'.($linha+10), "Título");
$getSheet->setCellValue('M'.($linha+10), "Data da Abertura");

//Variáveis
$getSheet->setCellValue('A'.($linha+11), "$numero_obs_pendente");
$getSheet->setCellValue('C'.($linha+11), "$titulo_obs_pendente");
$getSheet->setCellValue('M'.($linha+11), "$data_abertura_obs_pendente");

//Estilos
$getSheet->getStyle('A'.($linha+9))->applyFromArray($color);
$getSheet->getStyle('A'.($linha+9))->applyFromArray($style);
$getSheet->getStyle('A'.($linha+9))->getFont()->setBold(true);
$getSheet->getStyle('A'.($linha+10))->getFont()->setBold(true);
$getSheet->getStyle('C'.($linha+10))->getFont()->setBold(true);
$getSheet->getStyle('M'.($linha+10))->getFont()->setBold(true);
$getSheet->getStyle('A'.($linha+11))->applyFromArray($esquerda);

//Deixar desprotegido
$getSheet->getStyle('A'.($linha+11))->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('C'.($linha+11))->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('M'.($linha+11))->getProtection()->setLocked($desprotegido);

//*************************Assinaturas**********************************

$cellz = 'A'.($linha+12).':'.'N'.($linha+12);
$setSheet->mergeCells($cellz);//titulo

$getSheet->getStyle('A'.($linha+12))->applyFromArray($color);

$cellz = 'A'.($linha+13).':'.'G'.($linha+15);
$setSheet->mergeCells($cellz);//analista

$cellz = 'A'.($linha+16).':'.'G'.($linha+16);
$setSheet->mergeCells($cellz);//

$cellz = 'H'.($linha+13).':'.'N'.($linha+15);
$setSheet->mergeCells($cellz);//titulo

$cellz = 'H'.($linha+16).':'.'N'.($linha+16);
$setSheet->mergeCells($cellz);//titulo

$getSheet->setCellValue('A'.($linha+13), "Aceite: (Analista)");
$getSheet->setCellValue('H'.($linha+13), "Aceite: (Cliente)");
$getSheet->setCellValue('A'.($linha+16), "Data:");
$getSheet->setCellValue('H'.($linha+16), "Data:");

//Estilos
$getSheet->getStyle('A'.($linha+13))->applyFromArray($canto);
$getSheet->getStyle('H'.($linha+13))->applyFromArray($canto);
$getSheet->getStyle('A'.($linha+13))->getFont()->setBold(true);
$getSheet->getStyle('H'.($linha+13))->getFont()->setBold(true);
$getSheet->getStyle('A'.($linha+16))->getFont()->setBold(true);
$getSheet->getStyle('H'.($linha+16))->getFont()->setBold(true);



////////////////////////////////BORDAS/////////////////////////////
$getSheet->getStyle('A2:N2')->applyFromArray($border);

$tableBorder = 'A4:N'.($linha+16);
$getSheet->getStyle($tableBorder)->applyFromArray($border);

/////////////////////////////PROTEÇÃO DE CELULA////////////////////
$objPHPExcel->getActiveSheet()->getProtection()->setSheet(true);
$objPHPExcel->getActiveSheet()->getProtection()->setObjects(true);


//****************outras definições************************
$getSheet->setTitle('Registro de Atividades');

// Cabeçalho do arquivo para ele baixar
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="RegistroDeAtividades.xls"');
header('Cache-Control: max-age=0');
// Se for o IE9, isso talvez seja necessário
header('Cache-Control: max-age=1');

// Acessamos o 'Writer' para poder salvar o arquivo
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

// Salva diretamente no output, poderíamos mudar arqui para um nome de arquivo em um diretório ,caso não quisessemos jogar na tela
$objWriter->save('php://output'); 

exit;

?>