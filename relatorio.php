<?php
	include('conexao.php');
/*
* Criando e exportando planilhas do Excel
* /
*/
// Definimos o nome do arquivo que será exportado
$arquivo = 'relatorio_Molduraria.xls';
// Criamos uma tabela HTML com o formato da planilha

$select="SELECT l.nome, p.cliente, p.valor, p.os, p.data_loja, p.data_cliente, s.status_nome, p.email, p.telefone FROM pedido as p join lojas as l on p.id_loja=l.id_loja join status_os as s on s.id_status=p.id_status";
$query=mysqli_query($conecta, $select);




$html.='<html><head><meta charset=utf-8></head><title></title><body>';
$html .= '<table border="1">';
$html .= '<tr>';
$html .= '<td colspan="9"><b><center>Molduraria</center></b></tr>';
$html .= '</tr>';
$html.='<tr></tr>';
$html .= '<tr>';
$html .= '<td><b>Loja</b></td>';
$html .= '<td><b>OS Fotografia</b></td>';
$html .= '<td><b>Valor</b></td>';
$html.='<td><b>Status OS</b></td>';
$html.='<td><b>Cliente</b></td>';
$html.='<td><b>Email</b></td>';
$html.='<td><b>Telefone</b></td>';
$html .= '<td><b>Data da Loja</b></td>';
$html .= '<td><b>Data Prometida</b></td>';


$html .= '</tr>';


while($lista_rel=mysqli_fetch_array($query)){

	$loja=$lista_rel['nome'];
	$os=$lista_rel['os'];
	$status_os=$lista_rel['status_nome'];
	$data_loja=$lista_rel['data_loja'];
	$data_cliente=$lista_rel['data_cliente'];
	$valor=$lista_rel['valor'];
	$cliente=$lista_rel['cliente'];
	$email=$lista_rel['email'];
	$telefone=$lista_rel['telefone'];
	

	if(strlen($valor)>=6){
		$new_valor=substr_replace($valor,',',3,1);
	}else if(strlen($valor)<6){
		$new_valor=substr_replace($valor,',',2,1);

	}
	

$html .= '<tr>';
$html .= '<td>'.$loja.'</td>';
$html .= '<td>'.$os.'</td>';
$html .= '<td>'.$new_valor.'</td>';
$html .= '<td>'.$status_os.'</td>';
$html .= '<td>'.mb_strtoupper($cliente).'</td>';
$html .= '<td>'.$email.'</td>';
$html .= '<td>'.$telefone.'</td>';
$html .= '<td>'.$data_loja.'</td>';
$html .= '<td>'.$data_cliente.'</td>';




}
$html .= '</tr>';
$html .= '</table>';
$html.='</body></html>';
// Configurações header para forçar o download
header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
header ("Content-Description: PHP Generated Data" );
// Envia o conteúdo do arquivo
echo $html;
exit;