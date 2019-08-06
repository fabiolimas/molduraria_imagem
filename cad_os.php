<?php

		include('conexao.php');

		$loja=isset($_POST['lojas'])?$_POST['lojas']:"";
		$busca_lojas="SELECT * FROM  lojas WHERE id_loja='$loja'";
		$query_lojas=mysqli_query($conecta, $busca_lojas);

		while ($lista_loja=mysqli_fetch_array($query_lojas)){

			$id_loja=isset($lista_loja['id_loja'])?$lista_loja['id_loja']:"";
			$nome_loja=isset($lista_loja['nome'])?$lista_loja['nome']:"";
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

			setTimeout("history.back()",3000);
		}
	</script>
</head>
<body>
		<meta charset="utf-8">
	<img src="imagens/logo.png" id="logo">
	<div id="interface1">


<a href="index_loja.php"><img src="imagens/sair.png" id="sair2" title="Sair"></a>

	<h1>Molduraria</h1>
			
			

	<form name="form" action="processa_pedido.php" method="post" id="encadernadora">
		
		<?php

		if(isset ($id_loja) == null){


			echo "<center><img src='imagens/alert.png' width=50px><p>Selecione uma loja para continuar</center>";
			echo"<script>voltar()</script>";
			exit();


		}else{

			$os="SELECT * FROM molduras";
			$query_os=mysqli_query($conecta, $os);
			$tamanho="SELECT * FROM tamanho_de_album";
			$query_tamanho=mysqli_query($conecta, $tamanho);
			$vidro='SELECT * FROM vidros';
			$query_vidro=mysqli_query($conecta, $vidro);
			$mod_fundo="SELECT * FROM fundos";
			$query_fundo=mysqli_query($conecta, $mod_fundo);
			$impressao="SELECT * FROM impressao";
			$query_impressao=mysqli_query($conecta, $impressao);
			$status=1;
			$status_pag="SELECT * FROM status_os";
			$query_status=mysqli_query($conecta, $status_pag);

			


			echo "<input type='hidden' name='idloja' value='$id_loja'>
				<input type='hidden' name='status' value='$status'>
			Loja: <input type='text' name='n_loja' value='$nome_loja' readonly><br>
			OS Fotografia: <input type='text' name='os' required><br>
		
		
		<br>
		<fieldset><legend>Dados do Cliente</legend>
		Nome do Cliente: <input type='text' name='nome' required size='70' required><br> 
		Email: <input type='email' name='mail' size='50'><br>
		Telefone:<input type='text' name='fone'><br>
		</fieldset>
		
		<fieldset><legend>Venda</legend>
		
		Valor Total: <input type='text' name='valor' required><br>
		Status da OS:<select name='status_os' required><option value=''>Status OS</option>";
		if($query_status){
			while($statusp=mysqli_fetch_array($query_status)){

			$id_status=$statusp['id_status'];
			$statusn=$statusp['status_nome'];
			echo "<option value='$id_status'>$statusn</option>";

		}

		}else{
			echo mysqli_error($conecta);
		}
		
		echo"</select><br><br>



		Data Loja: <input type='date' name='dataloja' required>
		

		<br>
		Data Prometida ao Cliente: <input type='date' name='datacliente' required>
		</fieldset>

		<br>
		<fieldset><legend>Composição da Moldura</legend>


		Modelo: <select name='modelo' id='modelo' onchange='mudaImagem()' value=''><option value='1'>Escolher Modelo</option>";

		while($lista_molduras=mysqli_fetch_array($query_os)){

				$id_moldura=$lista_molduras['id_moldura'];
				$nome_moldura=$lista_molduras['nome_moldura'];


				echo "<option value='$id_moldura'>$nome_moldura</option>";

			}
			echo "</select><br><br><br> ";
		echo"Tamanho: <input type='text' placeholder='Tamanho da Moldura' name='tamanho' required><br><br>";
		
		echo "Tipo de Vidro: <select name ='tipo_vidro' value='' required><option value='6'>Tipos de Vidro</option>";
			while($lista_vidros=mysqli_fetch_array($query_vidro)){

				$id_vidro=$lista_vidros['id_vidro'];
				$nome_vidro=$lista_vidros['nome_vidro'];

				echo"<option value='$id_vidro'>$nome_vidro</option>";
			}
			echo"</select><br><br><br>";
			echo"Fundo: <select name='fundo' value='' required><option value='4'>Escolher Modelo</option>";
			while($lista_modelofundo=mysqli_fetch_array($query_fundo)){

				$id_fundo=$lista_modelofundo['id_fundo'];
				$nome_fundo=$lista_modelofundo['nome_fundo'];

				echo "<option value='$id_fundo'>$nome_fundo</option>";


			}
			echo"</select> <br><br>";

			echo "Tipo de Impressão: <select name ='impressao' value='' required><option value='3'>Opções de Impressão</option>";
			while($lista_impressoes=mysqli_fetch_array($query_impressao)){

				$id_impressao=$lista_impressoes['id_impressao'];
				$nome_impressao=$lista_impressoes['nome_impressao'];

				echo"<option value='$id_impressao'>$nome_impressao</option>";
			}
			echo"</select><br><br><br>";

			
			echo"</fieldset>";


		

}

		?>
				
		
				<input type="submit" value="Enviar" id="btn2">
	</form>

<div id="imagem"><img src="" id="image"></div>

<script type="text/javascript">
	
	var imagem=document.querySelector("#image");
	var album=document.querySelector("#modelo");
	function mudaImagem(){


		if(modelo.value == 5){
			imagem.src="imagens/album_gold.png";
			imagem.style="filter:opacity(0.6)";			

		}else if(modelo.value == 6){
			imagem.src="imagens/album_plus.png";
			imagem.style="filter:opacity(0.6)";
		}else if(modelo.value == 8){
			imagem.src="imagens/encarte.png";
			imagem.style="filter:opacity(0.6)";
		}else{
			imagem.src="";
		}

		

	}
	

	

		

		
	
</script>

</div>
</body>
</html>