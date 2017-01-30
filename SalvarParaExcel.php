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
$objDrawing->setCoordinates('B2');
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet()); 
$objDrawing->setOffsetX(35);

//tamanho da linha
$objPHPExcel->getActiveSheet()->getRowDimension(2)->setRowHeight(60); 

$setSheet->mergeCells('B2:C2');
$setSheet->mergeCells('D2:M2');
$setSheet->mergeCells('N2:O2');

$getSheet->setCellValue("D2", "REGISTRO DE ATIVIDADES");
$getSheet->setCellValue("N2", "DEV-100");

//Estilos
$getSheet->getStyle('B2:O2')->applyFromArray($style);
$getSheet->getStyle('B2:O2')->getFont()->setSize(16);
$getSheet->getStyle('B2:O2')->getFont()->setBold(true);


//***********************Identifição do Cliente******************************

$setSheet->mergeCells('B4:O4');//titulo
$setSheet->mergeCells('B5:C5');//empresa
$setSheet->mergeCells('D5:H5');//area empresa
$setSheet->mergeCells('I5:J5');//contato
$setSheet->mergeCells('K5:O5');//area contato
$setSheet->mergeCells('B6:C6');//telefone
$setSheet->mergeCells('D6:H6');//area telefone
$setSheet->mergeCells('I6:J6');//email
$setSheet->mergeCells('K6:O6');//area email
$setSheet->mergeCells('B7:C7');//area
$setSheet->mergeCells('D7:O7');//area area

$getSheet->setCellValue("B4", "Identificação do Cliente");
$getSheet->setCellValue("B5", "Empresa:");
$getSheet->setCellValue("I5", "Contato:");
$getSheet->setCellValue("B6", "Telefone:");
$getSheet->setCellValue("I6", "E-Mail:");
$getSheet->setCellValue("B7", "Área:");

//Estilos
$getSheet->getStyle('B4')->applyFromArray($color);
$getSheet->getStyle('B4')->applyFromArray($style);
$getSheet->getStyle('B4')->getFont()->setBold(true);
$getSheet->getStyle('B5')->getFont()->setBold(true);
$getSheet->getStyle('I5')->getFont()->setBold(true);
$getSheet->getStyle('B6')->getFont()->setBold(true);
$getSheet->getStyle('I6')->getFont()->setBold(true);
$getSheet->getStyle('B7')->getFont()->setBold(true);
$getSheet->getStyle('D6')->applyFromArray($esquerda);

//Variáveis
$getSheet->setCellValue("D5", "$empresa");
$getSheet->setCellValue("K5", "$contato");
$getSheet->setCellValue("D6", "$telefone");
$getSheet->setCellValue("K6", "$email_cliente");
$getSheet->setCellValue("D7", "$area");

//Deixar desprotegido
$getSheet->getStyle('D5')->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('K5')->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('D6')->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('K6')->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('D7')->getProtection()->setLocked($desprotegido);



//***********************Identifição do Serviço******************************

$setSheet->mergeCells('B8:O8');//titulo
$setSheet->mergeCells('B9:C9');//codigo
$setSheet->mergeCells('D9:O9');//area codigo
$setSheet->mergeCells('B10:C10');//nome atividade
$setSheet->mergeCells('D10:K10');//area nome atividade
$setSheet->mergeCells('L10:N10');//numero registro
$setSheet->mergeCells('B11:C11');//modulos
$setSheet->mergeCells('D11:O11');//area modulos
$setSheet->mergeCells('B12:C12');//analista
$setSheet->mergeCells('D12:O12');//area analista
$setSheet->mergeCells('B13:C13');//Telefone
$setSheet->mergeCells('D13:H13');//area telefone
//$setSheet->mergeCells('I13:J13');//email
$setSheet->mergeCells('J13:O13');//area email
$setSheet->mergeCells('B14:C14');//data inicio
$setSheet->mergeCells('D14:E14');//area dt inicio
$setSheet->mergeCells('F14:G14');//data fim
$setSheet->mergeCells('H14:I14');//area data fim
$setSheet->mergeCells('J14:M14');//total de horas
$setSheet->mergeCells('N14:O14');//area total de horas

$getSheet->setCellValue("B8", "Identificação do Serviço");
$getSheet->setCellValue("B9", "Código do Projeto:");
$getSheet->setCellValue("B10", "Nome da Atividade:");
$getSheet->setCellValue("L10", "Número do Resgistro:");
$getSheet->setCellValue("B11", "Módulos:");
$getSheet->setCellValue("B12", "Analista/Dev:");
$getSheet->setCellValue("B13", "Telefone:");
$getSheet->setCellValue("I13", "E-mail:");
$getSheet->setCellValue("B14", "Data de Início:");
$getSheet->setCellValue("F14", "Data de Fim:");
$getSheet->setCellValue("J14", "Total de Horas Trabalhadas no Projeto:");

//Estilos
$getSheet->getStyle('B8')->applyFromArray($color);
$getSheet->getStyle('B8')->applyFromArray($style);
$getSheet->getStyle('B8')->getFont()->setBold(true);
$getSheet->getStyle('B9')->getFont()->setBold(true);
$getSheet->getStyle('B10')->getFont()->setBold(true);
$getSheet->getStyle('L10')->getFont()->setBold(true);
$getSheet->getStyle('B11')->getFont()->setBold(true);
$getSheet->getStyle('B12')->getFont()->setBold(true);
$getSheet->getStyle('B13')->getFont()->setBold(true);
$getSheet->getStyle('I13')->getFont()->setBold(true);
$getSheet->getStyle('B14')->getFont()->setBold(true);
$getSheet->getStyle('F14')->getFont()->setBold(true);
$getSheet->getStyle('J14')->getFont()->setBold(true);
$getSheet->getStyle('O10')->applyFromArray($esquerda);
$getSheet->getStyle('D13')->applyFromArray($esquerda);
$getSheet->getStyle('N14')->applyFromArray($esquerda);

//Variáveis
$getSheet->setCellValue("D9", "$codigo_projeto");
$getSheet->setCellValue("D10", "$nome_atividade");
$getSheet->setCellValue("O10", "$numero_registro");
$getSheet->setCellValue("D11", "$modulos");
$getSheet->setCellValue("D12", "$analista");
$getSheet->setCellValue("D13", "$telefone_servico");
$getSheet->setCellValue("J13", "$email_servico");
$getSheet->setCellValue("D14", "$data_inicio_servico");
$getSheet->setCellValue("H14", "$data_fim_servico");
$getSheet->setCellValue("N14", "$total_horas");

//Deixar desprotegido
$getSheet->getStyle('D9')->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('D10')->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('O10')->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('D11')->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('D12')->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('D13')->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('K13')->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('D14')->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('H14')->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('N14')->getProtection()->setLocked($desprotegido);

//***********************Atividades******************************

$setSheet->mergeCells('B15:O15');//titulo
$setSheet->mergeCells('B16:C16');//data
$setSheet->mergeCells('D16:E16');//hora Inicio
$setSheet->mergeCells('F16:G16');//hora fim
$setSheet->mergeCells('H16:M16');//Descrição das Atividades
$setSheet->mergeCells('N16:O16');//Opinião do Cliente

$getSheet->setCellValue("B15", "Atividades");
$getSheet->setCellValue("B16", "Data");
$getSheet->setCellValue("D16", "Hora Início");
$getSheet->setCellValue("F16", "Hora Fim");
$getSheet->setCellValue("H16", "Descrição do trabalho realizado");
$getSheet->setCellValue("N16", "Opinião do cliente");

//Estilos
$getSheet->getStyle('B15')->applyFromArray($color);
$getSheet->getStyle('B15')->applyFromArray($style);
$getSheet->getStyle('B16:O16')->applyFromArray($style);
$getSheet->getStyle('B15')->getFont()->setBold(true);
$getSheet->getStyle('B16')->getFont()->setBold(true);
$getSheet->getStyle('D16')->getFont()->setBold(true);
$getSheet->getStyle('F16')->getFont()->setBold(true);
$getSheet->getStyle('H16')->getFont()->setBold(true);
$getSheet->getStyle('N16')->getFont()->setBold(true);

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
			
			$cellx = 'B'.$total.':'.'C'.$total;
			$setSheet->mergeCells($cellx);//data

			$cellx = 'D'.$total.':'.'E'.$total;
			$setSheet->mergeCells($cellx);//hora Inicio

			$cellx = 'F'.$total.':'.'G'.$total;
			$setSheet->mergeCells($cellx);//hora fim

			$cellx = 'H'.$total.':'.'M'.$total;
			$setSheet->mergeCells($cellx);//Descrição das Atividades

			$cellx = 'N'.$total.':'.'O'.$total;
			$setSheet->mergeCells($cellx);//Opinião do Cliente

			$celly = 'B'.$total;
			$getSheet->setCellValue($celly, "$data_atividade[$i]");
			$getSheet->getStyle($celly)->getProtection()->setLocked($desprotegido);
			$getSheet->getStyle($celly)->applyFromArray($style);

			$celly = 'D'.$total;
			$getSheet->setCellValue($celly, "$hora_inicio_atividade[$i]");
			$getSheet->getStyle($celly)->getProtection()->setLocked($desprotegido);
			$getSheet->getStyle($celly)->applyFromArray($style);

			$celly = 'F'.$total;
			$getSheet->setCellValue($celly, "$hora_fim_atividade[$i]");
			$getSheet->getStyle($celly)->getProtection()->setLocked($desprotegido);
			$getSheet->getStyle($celly)->applyFromArray($style);

			$celly = 'H'.$total;
			$getSheet->setCellValue($celly, "$descricao_atividade[$i]");
			$getSheet->getStyle($celly)->getProtection()->setLocked($desprotegido);
			$getSheet->getRowDimension($total)->setRowHeight(-1); 
			$getSheet->getStyle($celly)->getAlignment()->setWrapText(true);

		
			$celly = 'N'.$total;
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
$cellz = 'B'.$linha.':'.'O'.$linha;
$setSheet->mergeCells($cellz);//titulo


$cellz = 'B'.($linha+1).':'.'C'.($linha+1);
$setSheet->mergeCells($cellz);//numero


$cellz = 'B'.($linha+2).':'.'C'.($linha+2);
$setSheet->mergeCells($cellz);//area numero


$cellz = 'D'.($linha+1).':'.'M'.($linha+1);
$setSheet->mergeCells($cellz);//pendencia


$cellz = 'D'.($linha+2).':'.'M'.($linha+2);
$setSheet->mergeCells($cellz);//area pendencia

$cellz = 'N'.($linha+1).':'.'O'.($linha+1);
$setSheet->mergeCells($cellz);//Prazo


$cellz = 'N'.($linha+2).':'.'O'.($linha+2);
$setSheet->mergeCells($cellz);//area prazo


$getSheet->setCellValue('B'.($linha), "Pendências PSG");
$getSheet->setCellValue('D'.($linha+1), "Título");
$getSheet->setCellValue('N'.($linha+1), "Prazo");

//Variáveis
$getSheet->setCellValue('B'.($linha+2), "$numero_pendencia_psg");
$getSheet->setCellValue('D'.($linha+2), "$titulo_pendencia_psg");
$getSheet->setCellValue('N'.($linha+2), "$prazo_pendencia_psg");

//Estilos
$getSheet->getStyle('B'.$linha)->applyFromArray($color);
$getSheet->getStyle('B'.($linha))->applyFromArray($style);
$getSheet->getStyle('B'.($linha))->getFont()->setBold(true);
$getSheet->getStyle('D'.($linha+1))->getFont()->setBold(true);
$getSheet->getStyle('N'.($linha+1))->getFont()->setBold(true);
$getSheet->getStyle('B'.($linha+2))->applyFromArray($esquerda);

//Deixar desprotegido
$getSheet->getStyle('B'.($linha+2))->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('D'.($linha+2))->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('N'.($linha+2))->getProtection()->setLocked($desprotegido);


//*************************Pendências CLiente***********************************

$cellz = 'B'.($linha+3).':'.'O'.($linha+3);
$setSheet->mergeCells($cellz);//titulo


$cellz = 'B'.($linha+4).':'.'C'.($linha+4);
$setSheet->mergeCells($cellz);//numero


$cellz = 'B'.($linha+5).':'.'C'.($linha+5);
$setSheet->mergeCells($cellz);//area numero


$cellz = 'D'.($linha+4).':'.'M'.($linha+4);
$setSheet->mergeCells($cellz);//pendencia


$cellz = 'D'.($linha+5).':'.'M'.($linha+5);
$setSheet->mergeCells($cellz);//area pendencia

$cellz = 'N'.($linha+4).':'.'O'.($linha+4);
$setSheet->mergeCells($cellz);//Prazo


$cellz = 'N'.($linha+5).':'.'O'.($linha+5);
$setSheet->mergeCells($cellz);//area prazo


$getSheet->setCellValue('B'.($linha+3), "Pendências Cliente");
$getSheet->setCellValue('D'.($linha+4), "Título");
$getSheet->setCellValue('N'.($linha+4), "Prazo");

//Variáveis
$getSheet->setCellValue('B'.($linha+5), "$numero_pendencia_cliente");
$getSheet->setCellValue('D'.($linha+5), "$titulo_pendencia_cliente");
$getSheet->setCellValue('N'.($linha+5), "$prazo_pendencia_cliente");

//Estilos
$getSheet->getStyle('B'.($linha+3))->applyFromArray($color);
$getSheet->getStyle('B'.($linha+3))->applyFromArray($style);
$getSheet->getStyle('B'.($linha+3))->getFont()->setBold(true);
$getSheet->getStyle('D'.($linha+4))->getFont()->setBold(true);
$getSheet->getStyle('N'.($linha+4))->getFont()->setBold(true);
$getSheet->getStyle('B'.($linha+5))->applyFromArray($esquerda);

//Deixar desprotegido
$getSheet->getStyle('B'.($linha+5))->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('D'.($linha+5))->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('N'.($linha+5))->getProtection()->setLocked($desprotegido);

//*************************Pendências Infra****************************************

$cellz = 'B'.($linha+6).':'.'O'.($linha+6);
$setSheet->mergeCells($cellz);//titulo


$cellz = 'B'.($linha+7).':'.'C'.($linha+7);
$setSheet->mergeCells($cellz);//numero


$cellz = 'B'.($linha+8).':'.'C'.($linha+8);
$setSheet->mergeCells($cellz);//area numero


$cellz = 'D'.($linha+7).':'.'M'.($linha+7);
$setSheet->mergeCells($cellz);//pendencia


$cellz = 'D'.($linha+8).':'.'M'.($linha+8);
$setSheet->mergeCells($cellz);//area pendencia

$cellz = 'N'.($linha+7).':'.'O'.($linha+7);
$setSheet->mergeCells($cellz);//Prazo


$cellz = 'N'.($linha+8).':'.'O'.($linha+8);
$setSheet->mergeCells($cellz);//area prazo


$getSheet->setCellValue('B'.($linha+6), "Pendências Infra");
$getSheet->setCellValue('B'.($linha+7), "Número");
$getSheet->setCellValue('D'.($linha+7), "Título");
$getSheet->setCellValue('N'.($linha+7), "Data da Abertura");

//Variáveis
$getSheet->setCellValue('B'.($linha+8), "$numero_pendencia_infra");
$getSheet->setCellValue('D'.($linha+8), "$titulo_pendencia_infra");
$getSheet->setCellValue('N'.($linha+8), "$data_abertura_infra");

//Estilos
$getSheet->getStyle('B'.($linha+6))->applyFromArray($color);
$getSheet->getStyle('B'.($linha+6))->applyFromArray($style);
$getSheet->getStyle('B'.($linha+6))->getFont()->setBold(true);
$getSheet->getStyle('B'.($linha+7))->getFont()->setBold(true);
$getSheet->getStyle('D'.($linha+7))->getFont()->setBold(true);
$getSheet->getStyle('N'.($linha+7))->getFont()->setBold(true);
$getSheet->getStyle('B'.($linha+8))->applyFromArray($esquerda);

//Deixar desprotegido
$getSheet->getStyle('B'.($linha+8))->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('D'.($linha+8))->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('N'.($linha+8))->getProtection()->setLocked($desprotegido);

//*************************Pendências Infra***************************************

$cellz = 'B'.($linha+9).':'.'O'.($linha+9);
$setSheet->mergeCells($cellz);//titulo


$cellz = 'B'.($linha+10).':'.'C'.($linha+10);
$setSheet->mergeCells($cellz);//numero


$cellz = 'B'.($linha+11).':'.'C'.($linha+11);
$setSheet->mergeCells($cellz);//area numero


$cellz = 'D'.($linha+10).':'.'M'.($linha+10);
$setSheet->mergeCells($cellz);//pendencia


$cellz = 'D'.($linha+11).':'.'M'.($linha+11);
$setSheet->mergeCells($cellz);//area pendencia

$cellz = 'N'.($linha+10).':'.'O'.($linha+10);
$setSheet->mergeCells($cellz);//Prazo


$cellz = 'N'.($linha+11).':'.'O'.($linha+11);
$setSheet->mergeCells($cellz);//area prazo


$getSheet->setCellValue('B'.($linha+9), "Observações Pendentes");
$getSheet->setCellValue('B'.($linha+10), "Número");
$getSheet->setCellValue('D'.($linha+10), "Título");
$getSheet->setCellValue('N'.($linha+10), "Data da Abertura");

//Variáveis
$getSheet->setCellValue('B'.($linha+11), "$numero_obs_pendente");
$getSheet->setCellValue('D'.($linha+11), "$titulo_obs_pendente");
$getSheet->setCellValue('N'.($linha+11), "$data_abertura_obs_pendente");

//Estilos
$getSheet->getStyle('B'.($linha+9))->applyFromArray($color);
$getSheet->getStyle('B'.($linha+9))->applyFromArray($style);
$getSheet->getStyle('B'.($linha+9))->getFont()->setBold(true);
$getSheet->getStyle('B'.($linha+10))->getFont()->setBold(true);
$getSheet->getStyle('D'.($linha+10))->getFont()->setBold(true);
$getSheet->getStyle('N'.($linha+10))->getFont()->setBold(true);
$getSheet->getStyle('B'.($linha+11))->applyFromArray($esquerda);

//Deixar desprotegido
$getSheet->getStyle('B'.($linha+11))->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('D'.($linha+11))->getProtection()->setLocked($desprotegido);
$getSheet->getStyle('N'.($linha+11))->getProtection()->setLocked($desprotegido);

//*************************Assinaturas**********************************

$cellz = 'B'.($linha+12).':'.'O'.($linha+12);
$setSheet->mergeCells($cellz);//titulo

$getSheet->getStyle('B'.($linha+12))->applyFromArray($color);

$cellz = 'B'.($linha+13).':'.'H'.($linha+15);
$setSheet->mergeCells($cellz);//analista

$cellz = 'B'.($linha+16).':'.'H'.($linha+16);
$setSheet->mergeCells($cellz);//

$cellz = 'I'.($linha+13).':'.'O'.($linha+15);
$setSheet->mergeCells($cellz);//titulo

$cellz = 'I'.($linha+16).':'.'O'.($linha+16);
$setSheet->mergeCells($cellz);//titulo

$getSheet->setCellValue('B'.($linha+13), "Aceite: (Analista)");
$getSheet->setCellValue('I'.($linha+13), "Aceite: (Cliente)");
$getSheet->setCellValue('B'.($linha+16), "Data:");
$getSheet->setCellValue('I'.($linha+16), "Data:");

//Estilos
$getSheet->getStyle('B'.($linha+13))->applyFromArray($canto);
$getSheet->getStyle('I'.($linha+13))->applyFromArray($canto);
$getSheet->getStyle('B'.($linha+13))->getFont()->setBold(true);
$getSheet->getStyle('I'.($linha+13))->getFont()->setBold(true);
$getSheet->getStyle('B'.($linha+16))->getFont()->setBold(true);
$getSheet->getStyle('I'.($linha+16))->getFont()->setBold(true);



////////////////////////////////BORDAS/////////////////////////////
$getSheet->getStyle('B2:O2')->applyFromArray($border);

$tableBorder = 'B4:O'.($linha+16);
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