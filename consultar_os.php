<?php

		include('conexao.php');

		/*$loja=isset($_POST['lojas'])?$_POST['lojas']:"";
		$busca_lojas="SELECT * FROM  lojas WHERE id_loja='$loja'";
		$query_lojas=mysqli_query($conecta, $busca_lojas);

		while ($lista_loja=mysqli_fetch_array($query_lojas)){

			$id_loja=isset($lista_loja['id_loja'])?$lista_loja['id_loja']:"";
			$nome_loja=isset($lista_loja['nome_loja'])?$lista_loja['nome_loja']:"";
		}*/
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<title>Molduraria</title>
	<script type="text/javascript">
		

		function voltar(){

			setTimeout("history.back()",3000);
		}
	</script>
</head>
<body>
		<meta charset="utf-8">
	
	<div id="interface1">
		<a href="index.php"><img src="imagens/logo.png" id="logo"></a>
		<a href="menu_loja.php"><img src="imagens/sair.png" id="sair2" title="Sair"/></a>






	<h1>Molduraria</h1>

	<form name="form_busca" action="busca_os_loja.php" method="post">
<fieldset style="padding: 10px;"><legend>Filtrar</legend>
	
	Loja/Cliente/OS: <input type="text" name="clientes">
	
	<button id="btn">Buscar</button>
</fieldset>
</form>
			
		<a href="relatorio.php"><img src="imagens/exportar.png" id="btexport" title="Exportar"></a>
<?php

	$listar_pedidos="SELECT p.id_loja, p.id_pedido, l.nome, p.os, p.cliente, p.data_loja, p.data_cliente, s.status_nome   FROM pedido as p join lojas as l on p.id_loja=l.id_loja join status_os as s on s.id_status=p.id_status order by p.data_loja desc";
	$query_listar=mysqli_query($conecta, $listar_pedidos);

	if($query_listar){

echo"<table border='1'>";
	echo "<tr><td><b>Loja</b></td>";
	echo "<td><b>OS Fotografia</b></td>";
	
	echo"<td><b>Cliente</b></td>";
	echo "<td><b>Data Loja</b></td>";
	echo "<td><b>Data Prometida</b></td>";
	
	echo"<td><b>Status</b></td>";
	echo "<td><b>Visualizar Pedido</b></td></tr>";

	while($lista_de_pedidos=mysqli_fetch_array($query_listar)){

		$loja=$lista_de_pedidos['nome'];
		$os=$lista_de_pedidos['os'];
		$data_loja=$lista_de_pedidos['data_loja'];
		$data_cliente=isset($lista_de_pedidos['data_cliente'])?$lista_de_pedidos['data_cliente']:'';
		$cliente=$lista_de_pedidos['cliente'];
		$id_pedido=$lista_de_pedidos['id_pedido'];
		$status=$lista_de_pedidos['status_nome'];



		
			#$new_cliente=strstr($cliente,' ',true);
			$new_cliente=explode(' ', $cliente)[0];

			

		
		

		echo "<tr><td>$loja</td>";
		echo"<td>$os</td>";
		echo"<td>".mb_strtoupper($new_cliente)."</td>";
		echo"<td>".date('d-m-Y', strtotime($data_loja))."</td>";
		echo"<td><span class='lab'>".date('d-m-Y', strtotime($data_cliente))."</span></td>";
		
		echo"<td><span class='red'>$status</span></td>";
		echo"<td><a href='os_visualizacao.php?id=".$id_pedido."'><img src='imagens/edit.png' width='25px'></a></td>";
		echo"</tr>";


		
	}


	}
	else{
		echo mysqli_error($conecta);
	}



		

	



?>
	
	
</div>
<!--<script type="text/javascript">

		var encadernadoraData=document.querySelector('.encd');
		var laboratorioData=document.querySelector('.lab');
		var contador=document.querySelector('#contador');

		function dataEncad(){

			if(encadernadoraData.innerText == "01-01-1970"){

				encadernadoraData.style.display="none";
			}


		}
		dataEncad();

		function dataLab(){

		while(laboratorioData.innerHTML=="01-01-1970"){

			laboratorioData.style.display="none";
		}


		}

			
			
		dataLab();
			
	</script>-->

	
</body>
</html>