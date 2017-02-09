<?php
require_once("config.php");

header("Content-Type: application/json; charset=utf-8");

$dados = json_decode($_POST["dadosServico"],true);

// inserir na tabela de servicos
$sql = "INSERT INTO `servicos` (`empresa`, `contato`, `telefone`, `email`, `area`, `codigoProjeto`, `nomeAtividade`, `numeroRegistro`, `modulos`, `analista`, `telefoneServico`, `emailServico`, `dataInicio`, `dataFim`, `totalHoras`, `numPendenciaPsg`, `tituloPendenciaPsg`, `prazoPendenciaPsg`, `numPendenciaCliente`, `tituloPendenciaCliente`, `prazoPendenciaCliente`, `numPendenciaInfra`, `tituloPendenciaInfra`, `dataAberturaPendenciaInfra`, `numObsPendente`, `tituloObsPendente`, `dataAberturaObsPendente`) VALUES";

foreach ($dados as $result) {
	
	$empresa = $result['empresa'];
	$contato = $result['contato'];
	$telefone = $result['telefone'];
	$email = $result['email'];
	$area = $result['area'];

	$codigoProjeto = $result['codigoProjeto'];
	$nomeAtividade = $result['nomeAtividade'];
	$numeroRegistro = $result['numeroRegistro'];
	$modulos = $result['modulos'];
	$analista = $result['analista'];
	$telefoneServico = $result['telefoneServico'];
	$emailServico = $result['emailServico'];
	$dataInicio = $result['dataInicio'];
	$dataFim = $result['dataFim'];
	$totalHoras = $result['totalHoras'];

	$numPendenciaPsg = $result['numPendenciaPsg'];
	$tituloPendenciaPsg = $result['tituloPendenciaPsg'];
	$prazoPendenciaPsg = $result['prazoPendenciaPsg'];

	$numPendenciaCliente = $result['numPendenciaCliente'];
	$tituloPendenciaCliente = $result['tituloPendenciaCliente'];
	$prazoPendenciaCliente = $result['prazoPendenciaCliente'];

	$numPendenciaInfra = $result['numPendenciaInfra'];
	$tituloPendenciaInfra = $result['tituloPendenciaInfra'];
	$dataAberturaPendenciaInfra = $result['dataAberturaPendenciaInfra'];

	$numObsPendente = $result['numObsPendente'];
	$tituloObsPendente = $result['tituloObsPendente'];
	$dataAberturaObsPendente = $result['dataAberturaObsPendente'];
		

		 
	$sql .= " ('{$empresa}', '{$contato}', '{$telefone}', '{$email}', '{$area}', '{$codigoProjeto}', '{$nomeAtividade}', '{$numeroRegistro}', '{$modulos}', '{$analista}', '{$telefoneServico}', '{$emailServico}', '{$dataInicio}', '{$dataFim}', '{$totalHoras}', '{$numPendenciaPsg}', '{$tituloPendenciaPsg}', '{$prazoPendenciaPsg}', '{$numPendenciaCliente}', '{$tituloPendenciaCliente}', '{$prazoPendenciaCliente}', '{$numPendenciaInfra}', '{$tituloPendenciaInfra}', '{$dataAberturaPendenciaInfra}', '{$numObsPendente}', '{$tituloObsPendente}', '{$dataAberturaObsPendente}'),";
	
}


// Tira o último caractere (vírgula extra)
$sql = substr($sql, 0, -1);
echo $sql;

//$stmt = $DBcon->prepare($sql);
//$stmt->execute();

mysqli_query($conexao, $sql) or die($_SESSION['erro'] = 'Falha na conexão com banco de dados');

//echo $erro;
//echo 'Usuários cadastrados: ' . $cadastrados;

$id = mysqli_insert_id($conexao);


if($_POST["dadosAtividades"] != "[]"){
$atividades = json_decode($_POST["dadosAtividades"],true);


//inserir na tabela de atividades com a chave estangeira do servico acima
$sql2 = "INSERT INTO `atividades` (`servico_id`, `dataAtividade`, `horaInicio`, `horaFim`, `descricao`, `opiniaoCliente`) VALUES";

foreach ($atividades as $result) {
	
	$dataAtividade = $result["dataAtividade"];
	$horaInicio = $result["horaInicio"];
	$horaFim = $result["horaFim"];
	$descricao = $result["descricao"];
	$opiniaoCliente = $result["opiniaoCliente"];

	$sql2 .= " ('{$id}', '{$dataAtividade}', '{$horaInicio}', '{$horaFim}', '{$descricao}', '{$opiniaoCliente}'),";
}


$sql2 = substr($sql2, 0, -1);
echo $sql2;

mysqli_query($conexao, $sql2) or die($_SESSION['erro'] = 'Falha na conexão com banco de dados de atividades');
}


$_SESSION['id'] = $id;

$_SESSION['safe'] = 1;

?>


