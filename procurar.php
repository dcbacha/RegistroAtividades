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
	<link rel="stylesheet" href="css/responsivel.css">

	<link rel="icon" href="psgicon.ico">
	<title>Registro de Atividades</title>
</head>

<body style="padding-top: 10px" id="target">
<div class="container" id="content">

alo



<section class="demandas">

    <h3>Atividades</h3>

	<div class="botoes">
		<button class="btn btn-default" id="procurar">Procura</button>
	</div>

<!--    <table class="table table-striped">
        <thead>
            <tr>
            	<th>Código do Projeto</th>
                <th>Nome da Atividade</th>
                <th>Analista/Dev</th>
            </tr>
        </thead>
        <tbody>
          
            <tr>
            	<td>codigo</td>
            	<td>outra info</td>
            	<td>eu</td>
            	<td>botao?</td>
            </tr>
        
        </tbody>
    </table>-->

    <div id="responsecontainer" align="center">

    </div>


</section>

</div>
</body>



	<script src="js/jquery-3.1.1.js" type="text/javascript"></script>


<script type="text/javascript">

 $(document).ready(function() {

    $("#procurar").click(function() {                

        console.log("entrou no jquery");

      $.ajax({    //create an ajax request to load_page.php
        type: "GET",
        url: "consultaBD.php",             
        dataType: "html",   //expect html to be returned                
        success: function(data){
            console.log(data);                    
            $("#responsecontainer").html(data); 
            //alert(response);
        },
        error: function(data){
            console.log(data);
        }

        });
    });
});

</script>

</html>