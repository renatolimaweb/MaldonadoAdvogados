<?
//DOCUMENTAÇÃO DO SOFTWARE "CloudS - INTERATIVO | SISTEMAS NA NUVEM"
/*
ESTE MÓDULO FOI DESENVOLVIDO COM FINALIDADE DE INTEGRAÇÃO DOS RECURSOS E CONTEÚDOS PARA INTERAÇÃO COM EDUCADORES, DIRETORES, ACADÊMICOS, EGRESSOS, VESTIBULANDOS E PESSOAS DO PÚBLICO EXTERNO. CREDENCIADOS PARA DISTRIBUIR CONTEÚDOS POR MEIO DESSE SISTEMA DE GERENCIAMENTO.

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

  $data = substr($_POST['data_dialogo_processo'],6,4).'-'.substr($_POST['data_dialogo_processo'],3,2).'-'.substr($_POST['data_dialogo_processo'],0,2);
  $insertSQL = sprintf("INSERT INTO dialogo_processo (id_processo, data_dialogo_processo, desc_dialogo_processo, status_dialogo_processo) VALUES (%s, %s, %s, %s)",
                        GetSQLValueString($_POST['id_processo'],"int"),
                        GetSQLValueString($data, "date"),
                        GetSQLValueString($_POST['desc_dialogo_processo'],"text"),
                        GetSQLValueString($_POST['status_dialogo_processo'],"int"));
  
  mysql_select_db($database_criativo, $conexao);
  $Result1 = mysql_query($insertSQL, $conexao) or die(mysql_error());

	?>
	<SCRIPT language="JavaScript">
		alert("Processo inserido com sucesso");
		location.href="ConsultaDialogoProcesso.php";
	</script>
	<?
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "controle")) {

  $data = substr($_POST['data_dialogo_processo'],6,4).'-'.substr($_POST['data_dialogo_processo'],3,2).'-'.substr($_POST['data_dialogo_processo'],0,2);
  $updateSQL = sprintf("UPDATE dialogo_processo SET id_processo=%s, desc_dialogo_processo=%s, status_dialogo_processo=%s WHERE id_dialogo_processo=%s",
                       GetSQLValueString($_POST['id_processo'],"int"),
                       GetSQLValueString($data, "date"),
                       GetSQLValueString($_POST['desc_dialogo_processo'],"text"),
                       GetSQLValueString($_POST['status_dialogo_processo'], "int"),
                       GetSQLValueString($_POST['id_dialogo_processo'], "int"));
					   
					   
  mysql_select_db($database_criativo, $conexao);
  $Result1 = mysql_query($updateSQL, $conexao) or die(mysql_error());
	?>
	<SCRIPT language="JavaScript">
		alert("Processo Atualizado");
		location.href="ConsultaDialogoProcesso.php";
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
	$query_busca_dados = sprintf("SELECT * FROM dialogo_processo WHERE id_dialogo_processo = %s", GetSQLValueString($colname_busca_dados, "int"));
	$busca_dados = mysql_query($query_busca_dados) or die(mysql_error());
	$row_busca_dados = mysql_fetch_assoc($busca_dados);
	$totalRows_busca_dados = mysql_num_rows($busca_dados);
	$operacao = "MM_update";
	$botao = "<button type=\"submit\" class=\"btn btn-primary\">Atualizar</button>";
}
//FIM DO COMANDO CONTROLE//
mysql_select_db($database_criativo, $conexao);
$query_busca_processo = "SELECT * FROM processo ORDER BY titulo_processo ASC";
$busca_processo = mysql_query($query_busca_processo, $conexao) or die(mysql_error());
$row_busca_processo = mysql_fetch_assoc($busca_processo);
$totalRows_busca_processo = mysql_num_rows($busca_processo);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="iso-8859-1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>RENAN MALDONADO ADVOGADOS | ATUALIZAÇÕES DOS PROCESSOS | CLOUDS | SISTEMA GERENCIADOR DE CONTEÚDO</title>
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
        <h3>ATUALIZAÇÕES DOS PROCESSOS <small>CONTROLE DE DADOS</small></h3>
      </div>
    </div>
    <!-- /page header -->
    <!-- Breadcrumbs line -->
    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="inicial.php">PAINEL</a></li>
        <li><a href="ConsultaDialogoProcesso.php">ATUALIZAÇÕES DOS PROCESSOS</a></li>
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
    <!-- Form components -->
    <form method="post" name="controle" class="form-horizontal" role="form" action="<?php echo $editFormAction; ?>" onSubmit="return checkForm(this)" ENCTYPE="multipart/form-data">
      <!-- Basic inputs -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <h6 class="panel-title"><i class="icon-bubble4"></i> Formulário de Controle</h6>
        </div>
        <div class="panel-body">

        <div class="form-group">
            <label class="col-sm-2 control-label" >Data: </label>
            <div class="col-sm-2">
              <input id="data_dialogo_processo" name="data_dialogo_processo" type="text" class="form-control" onKeyUp="mascara_data(this.value,this.id)" value="<? if ($row_busca_dados["data_dialogo_processo"]) {
					$datatrans = explode ("-", $row_busca_dados["data_dialogo_processo"]); 
					$data = "$datatrans[2]/$datatrans[1]/$datatrans[0]"; 
				  	echo $data;
				  } else {
				  	echo date("d/m/Y");
				  }?>">
            </div>
          </div>

          <div class="form-group">
           <label class="col-sm-2 control-label">Processo: </label>
            <div class="col-sm-5">
             <select id="id_processo" name="id_processo" data-placeholder="Selecione o Processo" class="select-search" tabindex="2" required>
             <option value=""></option>
             <?php
                    do {  
                    ?><option value="<?php echo $row_busca_processo['id_processo']?>"<?php if (!(strcmp($row_busca_processo['id_processo'], $row_busca_dados['id_processo']))) {echo "selected=\"selected\"";} ?>><?php echo $row_busca_processo['titulo_processo']?></option>
                                           <?php
                    } while ($row_busca_processo = mysql_fetch_assoc($busca_processo));
                      $rows = mysql_num_rows($busca_processo);
                      if($rows > 0) {
                          mysql_data_seek($busca_processo, 0);
                          $row_busca_processo = mysql_fetch_assoc($busca_processo);
                      }
                    ?> 
             </select>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-12">
            <?
                include("FCKeditor/fckeditor.php");
                $oFCKeditor = new FCKeditor("desc_dialogo_processo");
              $oFCKeditor->BasePath = "FCKeditor/";
              $oFCKeditor->Value = $row_busca_dados["desc_dialogo_processo"];
              $oFCKeditor->Width  = '100%';
              $oFCKeditor->Height = '300';
              $oFCKeditor->Create();
                ?>
            </div>
          </div>
          
          <div class="form-group">
            <label class="checkbox-inline">
              <div class="col-sm-12">
                    <input id="status_dialogo_processo" name="status_dialogo_processo" value="1" type="checkbox" class="switch" data-on="success" data-off="danger" data-on-label="Ativar" data-off-label="Desativar" <?php if (!(strcmp(1, $row_busca_dados['status_dialogo_processo']))) {echo "checked=\"checked\"";} else{ echo ""; } ?>>
              </div>
            </label>
          </div>
          
          <div class="form-actions text-right">
            <?=$botao;?>
          </div>
        </div>
      </div>
      <input type="hidden" name="<?=$operacao;?>" value="controle" />
      <input name="id_dialogo_processo" type="hidden" id="id_dialogo_processo" value="<?=$row_busca_dados["id_dialogo_processo"];?>" />
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