<?
//DOCUMENTAÇÃO DO SOFTWARE "CloudS - INTERATIVO | SISTEMAS NA NUVEM"
/*
TODA E QUALQUER DISTRIBUIÇÃO OU ALTERAÇÃO DESSE MÓDULO SEM AUTORIZAÇÃO POR ESCRITO E DOCUMENTADA PODERÁ SER INTERPRETADA COMO QUEBRA DE DIREITO DE PROPRIEDADE INTELECTUAL POR DIREITO DO ANALISTA DE DESENVOLVIMENTO E PROGRAMADOR RENATO NASCIMENTO DE LIMA CEO DA INTERATIVO NEGÓCIOS.

CONTATOS PARA INFORMAÇÕES DE DISTRIBUIÇÃO +55 (69) 9239-5959 / contato@interativo.net
*/
include("../Connections/criativo.php");
include ("../Connections/seguranca_cms.php");
//COMANDO CONTROLE//
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "controle")) {
	
  $updateSQL = sprintf("UPDATE config SET titulo_config=%s, tags_config=%s, desc_config=%s, endereco_config=%s, cep_config=%s, bairro_config=%s, telefone_config=%s, email_config=%s, cidade_config=%s, estado_config=%s WHERE id_config=%s",
					   GetSQLValueString($_POST['titulo_config'],"text"),
					   GetSQLValueString($_POST['tags_config'],"text"),
					   GetSQLValueString($_POST['desc_config'],"text"),
					   GetSQLValueString($_POST['endereco_config'],"text"),
					   GetSQLValueString($_POST['cep_config'],"text"),
					   GetSQLValueString($_POST['bairro_config'],"text"),
					   GetSQLValueString($_POST['telefone_config'],"text"),
					   GetSQLValueString($_POST['email_config'],"text"),
					   GetSQLValueString($_POST['cidade_config'],"text"),
					   GetSQLValueString($_POST['estado_config'],"text"),
					   GetSQLValueString($_POST['id_config'],"int"));
					   
  mysql_select_db($database_criativo, $conexao);
  $Result1 = mysql_query($updateSQL, $conexao) or die(mysql_error());
	?>
	<SCRIPT language="JavaScript">
		alert("Cadastro Atualizado com Sucesso");
		location.href="inicial.php";
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
	$query_busca_dados = sprintf("SELECT * FROM config WHERE id_config = %s", GetSQLValueString($colname_busca_dados, "int"));
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
<title>RENAN MALDONADO ADVOGADOS | CONFIGURAÇÕES | CLOUDS | SISTEMA GERENCIADOR DE CONTEÚDO</title>
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
        <h3>CONFIGURAÇÕES <small>FORMULÁRIO DE CONTROLE DE DADOS</small></h3>
      </div>
    </div>
    <!-- /page header -->
    <!-- Breadcrumbs line -->
    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="inicial.php">PAINEL</a></li>
        <li class="active">CONFIGURAÇÕES</li>
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
    <!-- Form components -->
    <form method="post" name="controle" class="form-horizontal" role="form" action="<?php echo $editFormAction; ?>" onSubmit="return checkForm(this)" ENCTYPE="multipart/form-data">
      <!-- Basic inputs -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <h6 class="panel-title"><i class="icon-bubble4"></i> Formulário de Controle</h6>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <label class="col-sm-2 control-label">Empresa: </label>
            <div class="col-sm-10">
              <input id="titulo_config" name="titulo_config" type="text" class="form-control" value="<?=$row_busca_dados["titulo_config"];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Descrição: </label>
            <div class="col-sm-10">
              <textarea id="desc_config" name="desc_config" rows="5" cols="5" class="elastic form-control" placeholder="Digite a Descrição"><?=$row_busca_dados["desc_config"];?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Tags:</label>
            <div class="col-sm-10">
              <input type="text" id="tags_config" name="tags_config" class="tags" value="<?=$row_busca_dados["tags_config"];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Endereço: </label>
            <div class="col-sm-10">
              <input id="endereco_config" name="endereco_config" type="text" class="form-control" value="<?=$row_busca_dados["endereco_config"];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Cep: </label>
            <div class="col-sm-10">
              <input id="cep_config" name="cep_config" type="text" class="form-control" value="<?=$row_busca_dados["cep_config"];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Bairro: </label>
            <div class="col-sm-10">
              <input id="bairro_config" name="bairro_config" type="text" class="form-control" value="<?=$row_busca_dados["bairro_config"];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Telefone: </label>
            <div class="col-sm-10">
              <input id="telefone_config" name="telefone_config" type="text" class="form-control" value="<?=$row_busca_dados["telefone_config"];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">E-mail: </label>
            <div class="col-sm-10">
              <input id="email_config" name="email_config" type="text" class="form-control" value="<?=$row_busca_dados["email_config"];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Cidade: </label>
            <div class="col-sm-10">
              <input id="cidade_config" name="cidade_config" type="text" class="form-control" value="<?=$row_busca_dados["cidade_config"];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Estado: </label>
            <div class="col-sm-10">
              <input id="estado_config" name="estado_config" type="text" class="form-control" value="<?=$row_busca_dados["estado_config"];?>">
            </div>
          </div>
          
          <div class="form-actions text-right">
            <?=$botao;?>
          </div>
        </div>
      </div>
      <input type="hidden" name="<?=$operacao;?>" value="controle" />
      <input name="id_config" type="hidden" id="id_config" value="<?=$row_busca_dados["id_config"];?>" />
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