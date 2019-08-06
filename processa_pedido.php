<?php

		include('conexao.php');

		$loja=isset($_POST['lojas'])?$_POST['lojas']:"";
		$busca_lojas="SELECT * FROM  lojas WHERE id_loja='$loja'";
		$query_lojas=mysqli_query($conecta, $busca_lojas);

		while ($lista_loja=mysqli_fetch_array($query_lojas)){

			$id_loja=isset($lista_loja['id_loja'])?$lista_loja['id_loja']:"";
			$nome_loja=isset($lista_loja['nome_loja'])?$lista_loja['nome_loja']:"";
		}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<title>Saida Albuns</title>
	<script type="text/javascript">
		

		function voltar(){

			setTimeout("window.location='index_loja.php'",3000);
		}
	</script>
</head>
<body>
		<meta charset="utf-8">
	<img src="imagens/logo.png" id="logo">
	<div id="interface">


<a href="index_loja.php"><img src="imagens/sair.png" id="sair2" title="Sair"></a>

	<h1>Encadernadora</h1>
			
			
<?php

	
	$cliente=$_POST['nome'];
	$idloja=$_POST['idloja'];
	$os=$_POST['os'];
	$email=$_POST['mail'];
	$telefone=$_POST['fone'];
	$dataloja=$_POST['dataloja'];
	$modelo=$_POST['modelo'];
	$tamanho=$_POST['tamanho'];
	$vidro=$_POST['tipo_vidro'];
	$fundo=$_POST['fundo'];
	$impressao=$_POST['impressao'];
	$pagamento=$_POST['valor'];
	$status=$_POST['status_os'];
	$datacliente=$_POST['datacliente'];
	

	

if(strlen($pagamento)==6){
		$new_valor=substr_replace($pagamento,'.',3,1);
	}else if(strlen($pagamento)==2){
		$new_valor=substr_replace($pagamento,'.',2,1);

	}else if(strlen($pagamento)==3){
		$new_valor=substr_replace($pagamento, '.',4,1);
	}else if(strlen($pagamento)==5){
		$new_valor=substr_replace($pagamento, '.',2, 1);

	}else if(strlen($pagamento)==7){
		$new_valor=substr_replace($pagamento, '.', 4,1);
	}
		else if(strlen($pagamento)==4){
		$new_valor=substr_replace($pagamento, '.', 5,1);
	}



	$controle="SELECT * FROM pedido where id_loja='$idloja' and os ='$os'";
	$query_controle=mysqli_query($conecta, $controle);
	$row=mysqli_num_rows($query_controle);

	if ($row >= 1){

		echo "A OS: <span class='red'>".$os."</span> já foi lançada em nossa base de dados anteriormente.";
		echo"<script>voltar()</script>";
		exit();
	}else{

		$processar="INSERT INTO pedido (id_pedido, id_loja, os, cliente,   telefone, email, valor, id_status, data_loja, data_cliente, id_moldura, tam_moldura, id_vidro, id_fundo, id_impressao) VALUES(NULL, '$idloja','$os', '$cliente', '$telefone', '$email','$new_valor','$status', '$dataloja','$datacliente', '$modelo', '$tamanho', '$vidro', '$fundo', '$impressao')";
	$query_proc=mysqli_query($conecta, $processar);

	if($query_proc){

		echo "OS <span class='red'>".$os." </span> Cadastrada";
		echo"<script>voltar()</script>";
	}
	else{

		echo mysqli_error($conecta);
	}


	

	}


	
	




?>
	

</div>
</body>
</html>