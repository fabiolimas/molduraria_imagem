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
	<title>Moldruaria</title>
	<script type="text/javascript">
		

		function voltar(){

			setTimeout("history.back()",1000);
		}
	</script>
</head>
<body>
		<meta charset="utf-8">
	<img src="imagens/logo.png" id="logo">
	<div id="interface1">


<img src="imagens/sair.png" id="sair2" title="Sair" onclick="voltar()">

	<h1>Molduraria</h1>
			
<div id="printable">			
<?php

$id=$_GET['id'];



	$listar_pedidos="SELECT 
				 p.id_pedido,
				 l.nome,
				 p.os, 
				 p.cliente,
				 p.email,
				 p.valor,
				 s.status_nome,
				 p.telefone,
				 p.data_loja,
				 p.data_cliente,
				 m.nome_moldura,
				 p.tam_moldura,
				 v.nome_vidro,
				 f.nome_fundo, 
				 i.nome_impressao
				 FROM pedido as p join lojas as l on p.id_loja=l.id_loja join molduras as m on m.id_moldura= p.id_moldura join vidros as v on v.id_vidro = p.id_vidro join fundos as f on f.id_fundo= p.id_fundo join impressao as i on i.id_impressao = p.id_impressao join status_os as s on s.id_status=p.id_status where p.id_pedido='$id'";
	$query_listar=mysqli_query($conecta, $listar_pedidos);
	$row=mysqli_num_rows($query_listar);
	


if($row == 1){

	

	while($mostra_pedido=mysqli_fetch_array($query_listar)){

		

		$cliente=mb_strtoupper($mostra_pedido['cliente']);
		$email=$mostra_pedido['email'];
		$telefone=$mostra_pedido['telefone'];
		$data_loja=$mostra_pedido['data_loja'];
		$moldura=$mostra_pedido['nome_moldura'];
		$tamanho=$mostra_pedido['tam_moldura'];
		$id_pedido=$mostra_pedido['id_pedido'];
		$vidro=$mostra_pedido['nome_vidro'];
		$fundo=$mostra_pedido['nome_fundo'];
		$os=$mostra_pedido['os'];
		$loja=$mostra_pedido['nome'];
		$status=$mostra_pedido['status_nome'];
		$preco=$mostra_pedido['valor'];
		$data_cliente=isset($mostra_pedido['data_cliente'])?$mostra_pedido['data_cliente']:'';
		$impressao=$mostra_pedido['nome_impressao'];
		


	if(strlen($preco)==6){
		$new_valor=substr_replace($preco,',',3,1);
	}else if(strlen($preco)==2){
		$new_valor=substr_replace($preco,',',2,1);

	}else if(strlen($preco)==3){
		$new_valor=substr_replace($preco, ',',4,1);
	}else if(strlen($preco)==5){
		$new_valor=substr_replace($preco, ',',2, 1);

	}else if(strlen($preco)==7){
		$new_valor=substr_replace($preco, ',', 4,1);
	}
		else if(strlen($preco)==4){
		$new_valor=substr_replace($preco, ',', 5,1);
	}


}


		
echo"<p><b>Loja: </b><span class='red'>".$loja."</span><br><br></p>";
echo "<p><b>OS Fotografia: </b> <span class='red'>".$os."</span><br><br></p>";

echo "<fieldset><legend>Dados do Cliente</legend><b>Nome do Cliente:</b><span class='red'> ".$cliente."</span><br><br>";
echo "<b>Email:</b> <span class='red'>".$email."</span><br><br>";
echo "<b>Telefone:</b> <span class='red'>".$telefone."</span><br><br></fieldset>";

echo "<fieldset><legend>Venda</legend><b> ";
echo"<b>Valor Total: </b> <span class='red'>R$ ".$new_valor."</span><br><br>";
echo"<b>Status da OS: </b> <span class='red'>".$status."</span><br><br>";
echo" <b>Data de Envio Loja:</b> <span class='red'>".date('d-m-Y',strtotime($data_loja))."</span><br><br>";
echo"<b>Data Prometida ao Cliente:</b> <span class='red' id='lab'>".date('d-m-Y', strtotime($data_cliente))."</span><br><br></fieldset>";



echo"<fieldset><legend>Dados do Moldura</legend><b><br>Modelo:</b> <span class='red'>".$moldura."</span><br><br>";
echo"<b>Tamanho:</b> <span class='red'>".$tamanho."</span><br><br>";
echo "<b>Tipo de Vidro:</b> <span class='red'>".$vidro."</span><br><br>";
echo "<b>Fundo:</b> <span class='red'>".$fundo."</span><br><br>";
echo "<b>Tipo de Impressão: </b><span class='red'>".$impressao."</span><br><br>";
echo"<br></fieldset>";





}else{
	echo mysqli_error($conecta);
	echo "pedido não encontrado";
}

	
?>
</div>
<button onclick="imprimir()" id="btn">Imprimir</button>

	<script type="text/javascript">

		var encadernadoraData=document.querySelector('#encd');
		var laboratorioData=document.querySelector('#lab');

		function dataEncad(){

			if(encadernadoraData.innerHTML == "31-12-1969"){

				encadernadoraData.style.display="none";
			}


		}
		dataEncad();

		function dataLab(){

			if(laboratorioData.innerHTML== "31-12-1969"){
				laboratorioData.style.display="none";
			}			


		}
		dataLab();
	</script>
	<script type="text/javascript">
		
		function imprimir(){
			var interface1=document.querySelector("#interface1");

			var areaPrint=document.querySelector("#printable");
			areaPrint.style.fontSize="10px";

			areaPrint.style.background="red";


			var i=0;

			for(i=1;i<=2;i++){

				document.write(areaPrint.innerHTML);

			}
			window.print();
			
			
			
			
		}
			
		

	</script>

</div>
</body>
</html>