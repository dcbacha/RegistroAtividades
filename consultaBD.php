<?php
include("config.php");

$atividades = array();   //define a variavel produtos como array
$query = "select * from servicos" ;
$resultado = mysqli_query($conexao, $query);


echo "<table class='table table-striped'>
        <thead>
            <tr>
            	<td>Código do Projeto</td>
                <td>Nome da Atividade</td>
                <td>Analista/Dev</td>
            </tr>
        </thead>
      	<tbody>";
	
	
	while ($atividade = mysqli_fetch_assoc($resultado)){
		array_push($atividades, $atividade); 	//aqui ele salva os dados de produtO na array produtoS, meio q uma redundância para reutilização de codigo?
	}

	foreach ($atividades as $atividade) {
	 	echo "<tr>";
    	echo "<td>{$atividade['id']}</td>";
    	echo "<td>{$atividade['nomeAtividade']}</td>";
    	echo "<td>{$atividade['analista']}</td>";
    	echo "</tr>";
	}

echo "</tbody>";
echo "</table>";
?>