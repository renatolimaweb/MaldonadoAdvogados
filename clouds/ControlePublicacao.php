<?
//DOCUMENTA��O DO SOFTWARE "CloudS - INTERATIVO | SISTEMAS NA NUVEM"
/*
ESTE M�DULO FOI DESENVOLVIDO COM FINALIDADE DE INTEGRA��O DOS RECURSOS E CONTE�DOS PARA INTERA��O COM EDUCADORES, DIRETORES, ACAD�MICOS, EGRESSOS, VESTIBULANDOS E PESSOAS DO P�BLICO EXTERNO. CREDENCIADOS PARA DISTRIBUIR CONTE�DOS POR MEIO DESSE SISTEMA DE GERENCIAMENTO.

TODA E QUALQUER DISTRIBUI��O OU ALTERA��O DESSE M�DULO SEM AUTORIZA��O POR ESCRITO E DOCUMENTADA PODER� SER INTERPRETADA COMO QUEBRA DE DIREITO DE PROPRIEDADE INTELECTUAL POR DIREITO DO ANALISTA DE DESENVOLVIMENTO E PROGRAMADOR RENATO NASCIMENTO DE LIMA CEO DA INTERATIVO NEG�CIOS.

CONTATOS PARA INFORMA��ES DE DISTRIBUI��O +55 (69) 9239-5959 / contato@interativo.net
*/
include("../Connections/criativo.php");
include("../Connections/seguranca_cms.php");
//COMANDO CONTROLE//
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "controle")) {

    $imagem = $_FILES['imagem_publicacao']['name']; // Nome originai da imagem
    $dir = "../conteudo/img"; // Diret�rio das imagens
    $salva = $dir."/".$imagem; // Caminho onde vai ficar a imagem no servidor
    move_uploaded_file($_FILES['imagem_publicacao']['tmp_name'],$salva ); // Este comando move o arquivo do diret�rio tempor�rio para o caminho especificado acima
    $info_imagem = pathinfo($salva); // Resgatando extens�o do arquivo rec�m-baixado
    $nova_imagem = time().rand(1000,5000).".".$info_imagem['extension']; // Nome da imagem redimensionada
    // *** Include the class
    // ESte arquivo est� no arquivo ZIPADO do artigo
    require_once "resize-class.php";
    // *** 1) Initialise / load image
    $resizeObj = new resize($salva);
    // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
    $resizeObj -> resizeImage(600, 400, 'crop');
    /* Especificando que a nova imagem ter� 200 px de largura e altura. E utilizando a op��o CROP, que � considerada a melhor
    pois, recorta a imagem na medida sem distor��o
    Se quizer ver outras op��es, visite o site do desenvolvedor de resize2.php (http://www.jarrodoberto.com/articles/2011/09/image-resizing-made-easy-with-php)
    */
    // *** 3) Save image
    $resizeObj -> saveImage($dir."/".$nova_imagem, 80);
    // O arquivo-base � removido
    unlink($salva);
  
  $data = substr($_POST['data_publicacao'],6,4).'-'.substr($_POST['data_publicacao'],3,2).'-'.substr($_POST['data_publicacao'],0,2);
  $insertSQL = sprintf("INSERT INTO publicacao (id_categoria_publicacao, data_publicacao, titulo_publicacao, desc_publicacao, tags_publicacao, texto_publicacao, imagem_publicacao, status_publicacao) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id_categoria_publicacao'],"int"),
                       GetSQLValueString($data, "date"),
                        GetSQLValueString($_POST['titulo_publicacao'],"text"),
                        GetSQLValueString($_POST['desc_publicacao'],"text"),
                        GetSQLValueString($_POST['tags_publicacao'],"text"),
                        GetSQLValueString($_POST['texto_publicacao'],"text"),
                        GetSQLValueString($nova_imagem, "text"),
                        GetSQLValueString($_POST['status_publicacao'],"int"));
  
  mysql_select_db($database_criativo, $conexao);
  $Result1 = mysql_query($insertSQL, $conexao) or die(mysql_error());

	?>
	<SCRIPT language="JavaScript">
		alert("Publicacao inserida com sucesso");
		location.href="ConsultaPublicacao.php";
	</script>
	<?
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "controle")) {

  $arquivo = isset($_FILES["imagem_publicacao"]) ? $_FILES["imagem_publicacao"] : FALSE;
  if ($arquivo["name"] != "") {

    $imagem = $_FILES['imagem_publicacao']['name']; // Nome originai da imagem
    $dir = "../conteudo/img"; // Diret�rio das imagens
    $salva = $dir."/".$imagem; // Caminho onde vai ficar a imagem no servidor
    move_uploaded_file($_FILES['imagem_publicacao']['tmp_name'],$salva ); // Este comando move o arquivo do diret�rio tempor�rio para o caminho especificado acima
    $info_imagem = pathinfo($salva); // Resgatando extens�o do arquivo rec�m-baixado
    $nova_imagem = time().rand(1000,5000).".".$info_imagem['extension']; // Nome da imagem redimensionada
    // *** Include the class
    // ESte arquivo est� no arquivo ZIPADO do artigo
    require_once "resize-class.php";
    // *** 1) Initialise / load image
    $resizeObj = new resize($salva);
    // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
    $resizeObj -> resizeImage(600, 400, 'crop');
    /* Especificando que a nova imagem ter� 200 px de largura e altura. E utilizando a op��o CROP, que � considerada a melhor
    pois, recorta a imagem na medida sem distor��o
    Se quizer ver outras op��es, visite o site do desenvolvedor de resize2.php (http://www.jarrodoberto.com/articles/2011/09/image-resizing-made-easy-with-php)
    */
    // *** 3) Save image
    $resizeObj -> saveImage($dir."/".$nova_imagem, 80);
    // O arquivo-base � removido
    unlink($salva);
	 
  } else {
	 $nova_imagem = $_POST["imagem_publicacao_original"];
  }
  
  $data = substr($_POST['data_publicacao'],6,4).'-'.substr($_POST['data_publicacao'],3,2).'-'.substr($_POST['data_publicacao'],0,2);
  $updateSQL = sprintf("UPDATE publicacao SET id_categoria_publicacao=%s, data_publicacao=%s, titulo_publicacao=%s, desc_publicacao=%s, tags_publicacao=%s, texto_publicacao=%s, imagem_publicacao=%s, status_publicacao=%s WHERE id_publicacao=%s",
                        GetSQLValueString($_POST['id_categoria_publicacao'],"int"),
                        GetSQLValueString($data, "date"),
                        GetSQLValueString($_POST['titulo_publicacao'],"text"),
                        GetSQLValueString($_POST['desc_publicacao'],"text"),
                        GetSQLValueString($_POST['tags_publicacao'],"text"),
                        GetSQLValueString($_POST['texto_publicacao'],"text"),
                        GetSQLValueString($nova_imagem, "text"),
                        GetSQLValueString($_POST['status_publicacao'], "int"),
                        GetSQLValueString($_POST['id_publicacao'], "int"));
					   
					   
  mysql_select_db($database_criativo, $conexao);
  $Result1 = mysql_query($updateSQL, $conexao) or die(mysql_error());
	?>
	<SCRIPT language="JavaScript">
		alert("Publicacao Atualizada");
		location.href="ConsultaPublicacao.php";
	</script>
	<?
}

$operacao = "MM_insert";
$botao = "<button type=\"submit\" class=\"btn btn-primary\">Cadastrar</button>";

if (isset($_GET['cod'])) {
  $colname_busca_dados = $_GET['cod'];
}
mysql_select_db($database_criativo, $conexao);
if ($colname_busca_dados) {
	$query_busca_dados = sprintf("SELECT * FROM publicacao WHERE id_publicacao = %s", GetSQLValueString($colname_busca_dados, "int"));
	$busca_dados = mysql_query($query_busca_dados) or die(mysql_error());
	$row_busca_dados = mysql_fetch_assoc($busca_dados);
	$totalRows_busca_dados = mysql_num_rows($busca_dados);
	$operacao = "MM_update";
	$botao = "<button type=\"submit\" class=\"btn btn-primary\">Atualizar</button>";
}
//FIM DO COMANDO CONTROLE//
mysql_select_db($database_criativo, $conexao);
$query_busca_categoria_noticia = "SELECT * FROM categoria_publicacao ORDER BY titulo_categoria_publicacao ASC";
$busca_categoria_noticia = mysql_query($query_busca_categoria_noticia, $conexao) or die(mysql_error());
$row_busca_categoria_noticia = mysql_fetch_assoc($busca_categoria_noticia);
$totalRows_busca_categoria_noticia = mysql_num_rows($busca_categoria_noticia);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="iso-8859-1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>RENAN MALDONADO ADVOGADOS | PUBLICA��ES | CLOUDS | SISTEMA GERENCIADOR DE CONTE�DO</title>
<link rel="shortcut icon" href="img/favicon.ico">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/londinium-theme.min.css" rel="stylesheet" type="text/css">
<link href="css/styles.min.css" rel="stylesheet" type="text/css">
<link href="css/icons.min.css" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
<script type="text/javascript" src="ajax/jquery.min.js"></script>
<script type="text/javascript" src="ajax/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/plugins/charts/sparkline.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/uniform.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/select2.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/inputmask.js"></script>
<script type="text/javascript" src="js/plugins/forms/autosize.js"></script>
<script type="text/javascript" src="js/plugins/forms/inputlimit.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/listbox.js"></script>
<script type="text/javascript" src="js/plugins/forms/multiselect.js"></script>
<script type="text/javascript" src="js/plugins/forms/validate.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/tags.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/switch.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/uploader/plupload.full.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/uploader/plupload.queue.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/wysihtml5/wysihtml5.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/wysihtml5/toolbar.js"></script>
<script type="text/javascript" src="js/globalize/globalize.js"></script>
<script type="text/javascript" src="js/globalize/globalize.culture.de-DE.js"></script>
<script type="text/javascript" src="js/globalize/globalize.culture.ja-JP.js"></script>
<script type="text/javascript" src="js/plugins/interface/daterangepicker.js"></script>
<script type="text/javascript" src="js/plugins/interface/fancybox.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/moment.js"></script>
<script type="text/javascript" src="js/plugins/interface/mousewheel.js"></script>
<script type="text/javascript" src="js/plugins/interface/jgrowl.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/datatables.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/colorpicker.js"></script>
<script type="text/javascript" src="js/plugins/interface/fullcalendar.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/timepicker.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/collapsible.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/application.js"></script>
</head>
<body class="sidebar-wide">
<!-- Navbar -->
<?php include("includes/topo.php"); ?>
<!-- /navbar -->
<!-- Page container -->
<div class="page-container">
  <!-- Sidebar -->
  <?php include("includes/menu.php"); ?>
  <!-- /sidebar -->
  <!-- Page content -->
  <div class="page-content">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3>PUBLICA��ES <small>CONTROLE DE DADOS DAS PUBLICA��ES</small></h3>
      </div>
    </div>
    <!-- /page header -->
    <!-- Breadcrumbs line -->
    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="inicial.php">PAINEL</a></li>
        <li><a href="ConsultaPublicacao.php">PUBLICA��ES</a></li>
        <li class="active">CONTROLE</li>
      </ul>
    </div>
    <!-- /breadcrumbs line -->
    <!-- Callout -->
    <div class="callout callout-danger fade in">
      <button type="button" class="close" data-dismiss="alert">�</button>
      <h5>Aten��o</h5>
      <p>� importante que sejam preenchidos todos os campos de forma correta.</p>
    </div>
    <!-- /callout -->
    <!-- Form components -->
    <form method="post" name="controle" class="form-horizontal" role="form" action="<?php echo $editFormAction; ?>" onSubmit="return checkForm(this)" ENCTYPE="multipart/form-data">
      <!-- Basic inputs -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <h6 class="panel-title"><i class="icon-bubble4"></i> Formul�rio de Controle</h6>
        </div>
        <div class="panel-body">
          
          <div class="form-group">
            <label class="col-sm-2 control-label" >Data: </label>
            <div class="col-sm-2">
              <input id="data_publicacao" name="data_publicacao" type="text" class="form-control" onKeyUp="mascara_data(this.value,this.id)" value="<? if ($row_busca_dados["data_publicacao"]) {
					$datatrans = explode ("-", $row_busca_dados["data_publicacao"]); 
					$data = "$datatrans[2]/$datatrans[1]/$datatrans[0]"; 
				  	echo $data;
				  } else {
				  	echo date("d/m/Y");
				  }?>">
            </div>
          </div>
          <div class="form-group">
           <label class="col-sm-2 control-label">Categoria: </label>
            <div class="col-sm-5">
             <select id="id_categoria_publicacao" name="id_categoria_publicacao" data-placeholder="Selecione a Categoria da Not�cia" class="select-search" tabindex="2" required>
             <option value=""></option>
             <?php
                    do {  
                    ?><option value="<?php echo $row_busca_categoria_noticia['id_categoria_publicacao']?>"<?php if (!(strcmp($row_busca_categoria_noticia['id_categoria_noticia'], $row_busca_dados['id_categoria_publicacao']))) {echo "selected=\"selected\"";} ?>><?php echo $row_busca_categoria_noticia['titulo_categoria_publicacao']?></option>
                                           <?php
                    } while ($row_busca_categoria_noticia = mysql_fetch_assoc($busca_categoria_noticia));
                      $rows = mysql_num_rows($busca_categoria_noticia);
                      if($rows > 0) {
                          mysql_data_seek($busca_categoria_noticia, 0);
                          $row_busca_categoria_noticia = mysql_fetch_assoc($busca_categoria_noticia);
                      }
                    ?> 
             </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">T�tulo: </label>
            <div class="col-sm-10">
              <input id="titulo_publicacao" name="titulo_publicacao" type="text" class="form-control" value="<?=$row_busca_dados["titulo_publicacao"];?>" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Descri��o: </label>
            <div class="col-sm-10">
              <textarea id="desc_publicacao" name="desc_publicacao" rows="5" cols="5" class="elastic form-control" placeholder="Digite a Descri��o" required><?=$row_busca_dados["desc_publicacao"];?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Tags:</label>
            <div class="col-sm-10">
              <input type="text" id="tags_publicacao" name="tags_publicacao" class="tags" value="<?=$row_busca_dados["tags_publicacao"];?>">
            </div>
          </div>
          <div class="form-group">
          <div class="col-sm-12">
          <?
					    include("FCKeditor/fckeditor.php");
					    $oFCKeditor = new FCKeditor("texto_publicacao");
						$oFCKeditor->BasePath = "FCKeditor/";
						$oFCKeditor->Value = $row_busca_dados["texto_publicacao"];
						$oFCKeditor->Width  = '100%';
						$oFCKeditor->Height = '300';
						$oFCKeditor->Create();
			  	     ?>
          </div>
          </div>
          <div class="form-group">
          <div class="col-sm-12">
          <? if ($row_busca_dados["imagem_publicacao"]) { ?>
           <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pr�-Visualiza��o:</div>
<div><img style="padding:5px; border:1px solid #CCC;" src="../conteudo/img/<?=$row_busca_dados["imagem_publicacao"];?>" border="0" /></div>
<? } ?>
          </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Imagem de Exibi��o: </label>
            <div class="col-sm-10">
              <input id="imagem_publicacao" name="imagem_publicacao" type="file" class="styled">
            </div>
          </div>
          
          <div class="form-group">
          <label class="checkbox-inline">
          <div class="col-sm-12">
                <input id="status_publicacao" name="status_publicacao" value="1" type="checkbox" class="switch" data-on="success" data-off="danger" data-on-label="Ativar" data-off-label="Desativar" <?php if (!(strcmp(1, $row_busca_dados['status_publicacao']))) {echo "checked=\"checked\"";} else{ echo ""; } ?>>
          </div>
          </label>
          </div>
          
          <div class="form-actions text-right">
            <?=$botao;?>
          </div>
        </div>
      </div>
      <input type="hidden" name="<?=$operacao;?>" value="controle" />
      <input name="imagem_publicacao_original" type="hidden" id="imagem_publicacao_original" value="<?=$row_busca_dados["imagem_publicacao"];?>" />
      <input name="id_publicacao" type="hidden" id="id_publicacao" value="<?=$row_busca_dados["id_publicacao"];?>" />
      <!-- /basic inputs -->
      </form>
      
    
    <!-- Footer -->
    <?php include("includes/rodape.php"); ?>
    <!-- /footer -->
  </div>
  <!-- /page content -->
</div>
<!-- /page container -->
</body>
</html>
<?php include("../Connections/end_criativo.php"); ?>