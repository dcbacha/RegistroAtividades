<!DOCTYPE html>
<html>
<?php include("config.php");?>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" href="css/bootstrap.css">

	<link rel="icon" href="psgicon.ico">
	<title>Registro de Atividades</title>

</head>

<body style="padding-top: 10px" id="target">
<div class="container" id="content">

<?php




if(isset($_POST['salvaBD']) && $_FILES['files']['size'] > 0 && $_SESSION['safe'] == 1){
	$total = count($_FILES['files']['name']);

	$id = $_SESSION['id'] ;

	

	for($i=0; $i<$total; $i++) {

		$allowed =  array('pdf', 'PDF', 'txt' , 'png' ,'jpg', 'doc', 'docx', 'csv', 'xls' , 'xlsx');
		$filename = $_FILES['files']['name'][$i];
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		if(!in_array($ext,$allowed) ) {
    		//echo 'extensão inválida de arquivo';
    		//$_SESSION['erro'] = 'Extensão inválida de arquivo';
		}

		else{

			$fileName = $_FILES['files']['name'][$i];
			$tmpName  = $_FILES['files']['tmp_name'][$i];
			$fileSize = $_FILES['files']['size'][$i];
			$fileType = $_FILES['files']['type'][$i];

			$fp      = fopen($tmpName, 'r');
			$content = fread($fp, filesize($tmpName));
			$content = addslashes($content);
		
			fclose($fp);

			if(!get_magic_quotes_gpc()){
		   		$fileName = addslashes($fileName);
			}

			

			$query = "INSERT INTO documentosAtividades (servico_id, name, size, type, content) VALUES ('$id', '$fileName', '$fileSize', '$fileType', '$content')";

			mysqli_query($conexao, $query) or ($_SESSION['erro'] = 'Upload de arquivos falhou');
		}
		
	}

	$_SESSION['safe'] = 0;

	
} 

?>




<?php

if(isset($_SESSION['erro'])){
	//echo $_SESSION['erro'];
?>	
	<div class="jumbotron">
 	 <h1>Algo deu errado :(</h1>
 	 <p>Erro: <?= $_SESSION['erro'];?></p>
 	 <p><center><a class="btn btn-primary btn-lg" href="index.php" role="button">Voltar</a></center></p>
	</div>

<?php
	$_SESSION['erro'] = null;
	//echo $_SESSION['erro'];
}
else{
?>

<div class="jumbotron">
 	 <h1>Concluido</h1>
 	 <p>Seu Registro de Atividades foi adicionado com sucesso!</p>
 	 <p><center><a class="btn btn-primary btn-lg" href="index.php" role="button">Voltar</a></center></p>
</div>
<?php
}


?>

</div>
</body>

