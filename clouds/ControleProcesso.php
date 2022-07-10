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

  $insertSQL = sprintf("INSERT INTO processo (id_cliente, titulo_processo, desc_processo, status_processo) VALUES (%s, %s, %s, %s)",
                        GetSQLValueString($_POST['id_cliente'],"int"),
                        GetSQLValueString($_POST['titulo_processo'],"text"),
                        GetSQLValueString($_POST['desc_processo'],"text"),
                        GetSQLValueString($_POST['status_processo'],"int"));
  
  mysql_select_db($database_criativo, $conexao);
  $Result1 = mysql_query($insertSQL, $conexao) or die(mysql_error());

	?>
	<SCRIPT language="JavaScript">
		alert("Processo inserido com sucesso");
		location.href="ConsultaProcesso.php";
	</script>
	<?
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "controle")) {

  $updateSQL = sprintf("UPDATE processo SET id_cliente=%s, titulo_processo=%s, desc_processo=%s, status_processo=%s WHERE id_processo=%s",
                       GetSQLValueString($_POST['id_cliente'],"int"),
                       GetSQLValueString($_POST['titulo_processo'],"text"),
                       GetSQLValueString($_POST['desc_processo'],"text"),
                       GetSQLValueString($_POST['status_processo'], "int"),
                       GetSQLValueString($_POST['id_processo'], "int"));
					   
					   
  mysql_select_db($database_criativo, $conexao);
  $Result1 = mysql_query($updateSQL, $conexao) or die(mysql_error());
	?>
	<SCRIPT language="JavaScript">
		alert("Processo Atualizado");
		location.href="ConsultaProcesso.php";
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
	$query_busca_dados = sprintf("SELECT * FROM processo WHERE id_processo = %s", GetSQLValueString($colname_busca_dados, "int"));
	$busca_dados = mysql_query($query_busca_dados) or die(mysql_error());
	$row_busca_dados = mysql_fetch_assoc($busca_dados);
	$totalRows_busca_dados = mysql_num_rows($busca_dados);
	$operacao = "MM_update";
	$botao = "<button type=\"submit\" class=\"btn btn-primary\">Atualizar</button>";
}
//FIM DO COMANDO CONTROLE//
mysql_select_db($database_criativo, $conexao);
$query_busca_cliente = "SELECT * FROM cliente ORDER BY nome_cliente ASC";
$busca_cliente = mysql_query($query_busca_cliente, $conexao) or die(mysql_error());
$row_busca_cliente = mysql_fetch_assoc($busca_cliente);
$totalRows_busca_cliente = mysql_num_rows($busca_cliente);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="iso-8859-1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>RENAN MALDONADO ADVOGADOS | PROCESSOS | CLOUDS | SISTEMA GERENCIADOR DE CONTE�DO</title>
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
        <h3>PROCESSOS <small>CONTROLE DE DADOS</small></h3>
      </div>
    </div>
    <!-- /page header -->
    <!-- Breadcrumbs line -->
    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="inicial.php">PAINEL</a></li>
        <li><a href="ConsultaProcesso.php">PROCESSOS</a></li>
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
           <label class="col-sm-2 control-label">Cliente: </label>
            <div class="col-sm-5">
             <select id="id_cliente" name="id_cliente" data-placeholder="Selecione o Cliente" class="select-search" tabindex="2" required>
             <option value=""></option>
             <?php
                    do {  
                    ?><option value="<?php echo $row_busca_cliente['id_cliente']?>"<?php if (!(strcmp($row_busca_cliente['id_cliente'], $row_busca_dados['id_cliente']))) {echo "selected=\"selected\"";} ?>><?php echo $row_busca_cliente['nome_cliente']?></option>
                                           <?php
                    } while ($row_busca_cliente = mysql_fetch_assoc($busca_cliente));
                      $rows = mysql_num_rows($busca_cliente);
                      if($rows > 0) {
                          mysql_data_seek($busca_cliente, 0);
                          $row_busca_cliente = mysql_fetch_assoc($busca_cliente);
                      }
                    ?> 
             </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">T�tulo: </label>
            <div class="col-sm-10">
              <input id="titulo_processo" name="titulo_processo" type="text" class="form-control" value="<?=$row_busca_dados["titulo_processo"];?>" required>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-12">
            <?
                include("FCKeditor/fckeditor.php");
                $oFCKeditor = new FCKeditor("desc_processo");
              $oFCKeditor->BasePath = "FCKeditor/";
              $oFCKeditor->Value = $row_busca_dados["desc_processo"];
              $oFCKeditor->Width  = '100%';
              $oFCKeditor->Height = '300';
              $oFCKeditor->Create();
                ?>
            </div>
          </div>
          
          <div class="form-group">
            <label class="checkbox-inline">
              <div class="col-sm-12">
                    <input id="status_processo" name="status_processo" value="1" type="checkbox" class="switch" data-on="success" data-off="danger" data-on-label="Ativar" data-off-label="Desativar" <?php if (!(strcmp(1, $row_busca_dados['status_processo']))) {echo "checked=\"checked\"";} else{ echo ""; } ?>>
              </div>
            </label>
          </div>
          
          <div class="form-actions text-right">
            <?=$botao;?>
          </div>
        </div>
      </div>
      <input type="hidden" name="<?=$operacao;?>" value="controle" />
      <input name="id_processo" type="hidden" id="id_processo" value="<?=$row_busca_dados["id_processo"];?>" />
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