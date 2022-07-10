<?
//DOCUMENTAÇÃO DO SOFTWARE "CloudS - INTERATIVO | SISTEMAS NA NUVEM"
/*
TODA E QUALQUER DISTRIBUIÇÃO OU ALTERAÇÃO DESSE MÓDULO SEM AUTORIZAÇÃO POR ESCRITO E DOCUMENTADA PODERÁ SER INTERPRETADA COMO QUEBRA DE DIREITO DE PROPRIEDADE INTELECTUAL POR DIREITO DO ANALISTA DE DESENVOLVIMENTO E PROGRAMADOR RENATO NASCIMENTO DE LIMA CEO DA INTERATIVO NEGÓCIOS.

CONTATOS PARA INFORMAÇÕES DE DISTRIBUIÇÃO +55 (69) 9239-5959 / contato@interativo.net
*/
include("../Connections/criativo.php");
include("../Connections/seguranca_cms.php");
//COMANDO CONTROLE//
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "controle")) {
	
  $insertSQL = sprintf("INSERT INTO rede_social (titulo_rede, icone_rede, cor_rede, url_rede, status_rede) VALUES (%s, %s, %s, %s, %s)",
					   GetSQLValueString($_POST['titulo_rede'],"text"),
					   GetSQLValueString($_POST['icone_rede'],"text"),
					   GetSQLValueString($_POST['cor_rede'],"text"),
					   GetSQLValueString($_POST['url_rede'],"text"),
					   GetSQLValueString($_POST['status_rede'], "int"));
  
  mysql_select_db($database_criativo, $conexao);
  $Result1 = mysql_query($insertSQL, $conexao) or die(mysql_error());

	?>
	<SCRIPT language="JavaScript">
		alert("Cadastro Realizado com sucesso");
		location.href="ConsultaRedeSocial.php";
	</script>
	<?
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "controle")) {
  
  $updateSQL = sprintf("UPDATE rede_social SET titulo_rede=%s, icone_rede=%s, cor_rede=%s, url_rede=%s, status_rede=%s WHERE id_rede=%s",
					   GetSQLValueString($_POST['titulo_rede'],"text"),
					   GetSQLValueString($_POST['icone_rede'],"text"),
					   GetSQLValueString($_POST['cor_rede'],"text"),
					   GetSQLValueString($_POST['url_rede'],"text"),
					   GetSQLValueString($_POST['status_rede'], "int"),
					   GetSQLValueString($_POST['id_rede'], "int"));
					   
  mysql_select_db($database_criativo, $conexao);
  $Result1 = mysql_query($updateSQL, $conexao) or die(mysql_error());
	?>
	<SCRIPT language="JavaScript">
		alert("Cadastro Atualizado com Sucesso");
		location.href="ConsultaRedeSocial.php";
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
	$query_busca_dados = sprintf("SELECT * FROM rede_social WHERE id_rede = %s", GetSQLValueString($colname_busca_dados, "int"));
	$busca_dados = mysql_query($query_busca_dados) or die(mysql_error());
	$row_busca_dados = mysql_fetch_assoc($busca_dados);
	$totalRows_busca_dados = mysql_num_rows($busca_dados);
	$operacao = "MM_update";
	$botao = "<button type=\"submit\" class=\"btn btn-primary\">Atualizar</button>";
}
//FIM DO COMANDO CONTROLE//
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="iso-8859-1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>RENAN MALDONADO ADVOGADOS | REDES SOCIAIS | CLOUDS | SISTEMA GERENCIADOR DE CONTEÚDO</title>
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
        <h3>REDES SOCIAIS <small>FORMULÁRIO DE CONTROLE DE DADOS</small></h3>
      </div>
    </div>
    <!-- /page header -->
    <!-- Breadcrumbs line -->
    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="inicial.php">PAINEL</a></li>
        <li><a href="ConsultaRedesSociais.php">REDES SOCIAIS</a></li>
        <li class="active">CONTROLE</li>
      </ul>
    </div>
    <!-- /breadcrumbs line -->
    <!-- Callout -->
    <div class="callout callout-danger fade in">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <h5>Atenção</h5>
      <p>É importante que sejam preenchidos todos os campos de forma correta.</p>
    </div>
    <!-- /callout -->
    <div class="row">
    <div class="col-lg-12">
    <!-- Icon classes -->
          <div class="widget icon-classes-showcase"><span><i class="icon-youtube2"></i>icon-youtube2</span><span><i class="icon-youtube"></i>icon-youtube</span><span><i class="icon-wordpress2"></i>icon-wordpress2</span><span><i class="icon-wordpress"></i>icon-wordpress</span><span><i class="icon-vimeo3"></i>icon-vimeo3</span><span><i class="icon-vimeo2"></i>icon-vimeo2</span><span><i class="icon-vimeo"></i>icon-vimeo</span><span><i class="icon-twitter3"></i>icon-twitter3</span><span><i class="icon-twitter2"></i>icon-twitter2</span><span><i class="icon-twitter"></i>icon-twitter</span><span><i class="icon-tumblr2"></i>icon-tumblr2</span><span><i class="icon-tumblr"></i>icon-tumblr</span><span><i class="icon-thumbs-up4"></i>icon-thumbs-up4</span><span><i class="icon-thumbs-up3"></i>icon-thumbs-up3</span><span><i class="icon-thumbs-up2"></i>icon-thumbs-up2</span><span><i class="icon-thumbs-up"></i>icon-thumbs-up</span><span><i class="icon-thumbs-down2"></i>icon-thumbs-down2</span><span><i class="icon-thumbs-down"></i>icon-thumbs-down</span><span><i class="icon-stumbleupon2"></i>icon-stumbleupon2</span><span><i class="icon-stumbleupon"></i>icon-stumbleupon</span><span><i class="icon-soundcloud2"></i>icon-soundcloud2</span><span><i class="icon-soundcloud"></i>icon-soundcloud</span><span><i class="icon-skype"></i>icon-skype</span><span><i class="icon-reddit"></i>icon-reddit</span><span><i class="icon-pinterest2"></i>icon-pinterest2</span><span><i class="icon-pinterest"></i>icon-pinterest</span><span><i class="icon-picassa2"></i>icon-picassa2</span><span><i class="icon-picassa"></i>icon-picassa</span><span><i class="icon-linkedin"></i>icon-linkedin</span><span><i class="icon-lastfm2"></i>icon-lastfm2</span><span><i class="icon-lastfm"></i>icon-lastfm</span><span><i class="icon-instagram"></i>icon-instagram</span><span><i class="icon-google"></i>icon-google</span><span><i class="icon-google-plus4"></i>icon-google-plus4</span><span><i class="icon-google-plus3"></i>icon-google-plus3</span><span><i class="icon-google-plus2"></i>icon-google-plus2</span><span><i class="icon-google-plus"></i>icon-google-plus</span><span><i class="icon-github5"></i>icon-github5</span><span><i class="icon-github4"></i>icon-github4</span><span><i class="icon-github3"></i>icon-github3</span><span><i class="icon-github2"></i>icon-github2</span><span><i class="icon-github"></i>icon-github</span><span><i class="icon-foursquare2"></i>icon-foursquare2</span><span><i class="icon-foursquare"></i>icon-foursquare</span><span><i class="icon-flickr4"></i>icon-flickr4</span><span><i class="icon-flickr3"></i>icon-flickr3</span><span><i class="icon-flickr2"></i>icon-flickr2</span><span><i class="icon-flickr"></i>icon-flickr</span><span><i class="icon-feed4"></i>icon-feed4</span><span><i class="icon-feed3"></i>icon-feed3</span><span><i class="icon-feed2"></i>icon-feed2</span><span><i class="icon-facebook3"></i>icon-facebook3</span><span><i class="icon-facebook2"></i>icon-facebook2</span><span><i class="icon-facebook"></i>icon-facebook</span><span><i class="icon-dribbble3"></i>icon-dribbble3</span><span><i class="icon-dribbble2"></i>icon-dribbble2</span><span><i class="icon-dribbble"></i>icon-dribbble</span><span><i class="icon-blogger2"></i>icon-blogger2</span><span><i class="icon-blogger"></i>icon-blogger</span>
          <!-- /icon classes -->
          </div>
          </div>
    </div>
    <br>
    <br>
    <!-- Form components -->
    <form method="post" name="controle" class="form-horizontal" role="form" action="<?php echo $editFormAction; ?>" onSubmit="return checkForm(this)" ENCTYPE="multipart/form-data">
      <!-- Basic inputs -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <h6 class="panel-title"><i class="icon-bubble4"></i> Formulário de Controle</h6>
        </div>
        <div class="panel-body">
          
          <div class="form-group">
            <label class="col-sm-2 control-label">Título: </label>
            <div class="col-sm-10">
              <input id="titulo_rede" name="titulo_rede" type="text" class="form-control" value="<?=$row_busca_dados["titulo_rede"];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Cor: </label>
            <div class="col-sm-10">
              <input id="cor_rede" name="cor_rede" type="text" class="form-control" value="<?=$row_busca_dados["cor_rede"];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Ícone: </label>
            <div class="col-sm-10">
              <input id="icone_rede" name="icone_rede" type="text" class="form-control" value="<?=$row_busca_dados["icone_rede"];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Link: </label>
            <div class="col-sm-10">
              <input id="url_rede" name="url_rede" type="text" class="form-control" value="<?=$row_busca_dados["url_rede"];?>">
            </div>
          </div>
          <div class="form-group">
          <label class="checkbox-inline">
          <div class="col-sm-12">
                <input id="status_rede" name="status_rede" value="1" type="checkbox" class="switch" data-on="success" data-off="danger" data-on-label="Ativar" data-off-label="Desativar" <?php if (!(strcmp(1, $row_busca_dados['status_rede']))) {echo "checked=\"checked\"";} else{ echo ""; } ?>>
          </div>
          </label>
          </div>
          
          
          <div class="form-actions text-right">
            <?=$botao;?>
          </div>
        </div>
      </div>
      <input type="hidden" name="<?=$operacao;?>" value="controle" />
      <input name="id_rede" type="hidden" id="id_rede" value="<?=$row_busca_dados["id_rede"];?>" />
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