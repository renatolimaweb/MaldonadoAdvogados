<?
mysql_select_db($database_criativo, $conexao);
$query_busca_config = "SELECT * FROM config WHERE id_config = '1' LIMIT 0,1";
$busca_config = mysql_query($query_busca_config, $conexao) or die(mysql_error());
$row_busca_config = mysql_fetch_assoc($busca_config);
$totalRows_busca_config = mysql_num_rows($busca_config);

mysql_select_db($database_criativo, $conexao);
$query_busca_interfaceweb = "SELECT * FROM interface_web WHERE id_interface = '1' LIMIT 0,1";
$busca_interfaceweb = mysql_query($query_busca_interfaceweb, $conexao) or die(mysql_error());
$row_busca_interfaceweb = mysql_fetch_assoc($busca_interfaceweb);
$totalRows_busca_interfaceweb = mysql_num_rows($busca_interfaceweb);

mysql_select_db($database_criativo, $conexao);
$query_busca_interfacemovel = "SELECT * FROM interface_movel WHERE id_interface_movel = '1' LIMIT 0,1";
$busca_interfacemovel = mysql_query($query_busca_interfacemovel, $conexao) or die(mysql_error());
$row_busca_interfacemovel = mysql_fetch_assoc($busca_interfacemovel);
$totalRows_busca_interfacemovel = mysql_num_rows($busca_interfacemovel);

function limitarTexto($texto, $limite, $quebrar = true){
  //corta as tags do texto para evitar corte errado
  $contador = strlen(strip_tags($texto));
  if($contador <= $limite):
    //se o n�mero do texto form menor ou igual o limite ent�o retorna ele mesmo
    $newtext = $texto;
  else:
    if($quebrar == true): //se for maior e $quebrar for true
      //corta o texto no limite indicado e retira o ultimo espa�o branco
      $newtext = trim(mb_substr($texto, 0, $limite))."...";
    else:
      //localiza ultimo espa�o antes de $limite
      $ultimo_espa�o = strrpos(mb_substr($texto, 0, $limite)," ");
      //corta o $texto at� a posi��o lozalizada
      $newtext = trim(mb_substr($texto, 0, $ultimo_espa�o))."...";
    endif;
  endif;
  return $newtext;
}
?>