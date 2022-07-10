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
  $arquivo = isset($_FILES["imagem_equipe"]) ? $_FILES["imagem_equipe"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = strrpos($arquivo["name"] , '.') + 1;
	 $extensao = substr($arquivo["name"], $imagem,3);
     $nome_arquivo = md5(uniqid(time())) . "." . $extensao;
  	 $imagem_dir = "../conteudo/img/".$nome_arquivo;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
  }
  
  $insertSQL = sprintf("INSERT INTO equipe (titulo_equipe, desc_equipe, tags_equipe, texto_equipe, imagem_equipe, status_equipe) VALUES (%s, %s, %s, %s, %s, %s)",
					   GetSQLValueString($_POST['titulo_equipe'],"text"),
					   GetSQLValueString($_POST['desc_equipe'],"text"),
					   GetSQLValueString($_POST['tags_equipe'],"text"),
					   GetSQLValueString($_POST['texto_equipe'],"text"),
					   GetSQLValueString($nome_arquivo, "text"),
					   GetSQLValueString($_POST['status_equipe'],"int"));
  
  mysql_select_db($database_criativo, $conexao);
  $Result1 = mysql_query($insertSQL, $conexao) or die(mysql_error());

	?>
	<SCRIPT language="JavaScript">
		alert("Cadastro Realizado com sucesso");
		location.href="ConsultaEquipe.php";
	</script>
	<?
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "controle")) {
  $arquivo = isset($_FILES["imagem_equipe"]) ? $_FILES["imagem_equipe"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = strrpos($arquivo["name"] , '.') + 1;
	 $extensao = substr($arquivo["name"], $imagem,3);
     $nome_arquivo = md5(uniqid(time())) . "." . $extensao;
  	 $imagem_dir = "../conteudo/img/".$nome_arquivo;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../conteudo/img/".$_POST["imagem_equipe"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $nome_arquivo = $_POST["imagem_equipe_original"];
  }
  
  $updateSQL = sprintf("UPDATE equipe SET titulo_equipe=%s, desc_equipe=%s, tags_equipe=%s, texto_equipe=%s, imagem_equipe=%s, status_equipe=%s WHERE id_equipe=%s",
					   GetSQLValueString($_POST['titulo_equipe'],"text"),
					   GetSQLValueString($_POST['desc_equipe'],"text"),
					   GetSQLValueString($_POST['tags_equipe'],"text"),
					   GetSQLValueString($_POST['texto_equipe'],"text"),
					   GetSQLValueString($nome_arquivo, "text"),
					   GetSQLValueString($_POST['status_equipe'],"int"),
					   GetSQLValueString($_POST['id_equipe'], "int"));
					   
					   
  mysql_select_db($database_criativo, $conexao);
  $Result1 = mysql_query($updateSQL, $conexao) or die(mysql_error());
	?>
	<SCRIPT language="JavaScript">
		alert("Cadastro Atualizado com Sucesso");
		location.href="ConsultaEquipe.php";
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
	$query_busca_dados = sprintf("SELECT * FROM equipe WHERE id_equipe = %s", GetSQLValueString($colname_busca_dados, "int"));
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
<title>RENAN MALDONADO | EQUIPE | CLOUDS | SISTEMA GERENCIADOR DE CONTEÚDO</title>
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
        <h3>EQUIPE <small>FORMULÁRIO DE CONTROLE DE DADOS</small></h3>
      </div>
    </div>
    <!-- /page header -->
    <!-- Breadcrumbs line -->
    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="inicial.php">PAINEL</a></li>
        <li><a href="ConsultaEquipe.php">EQUIPE</a></li>
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
            <label class="col-sm-2 control-label">Título: </label>
            <div class="col-sm-10">
              <input id="titulo_equipe" name="titulo_equipe" type="text" class="form-control" value="<?=$row_busca_dados["titulo_equipe"];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Descrição: </label>
            <div class="col-sm-10">
              <textarea id="desc_equipe" name="desc_equipe" rows="5" cols="5" class="elastic form-control" placeholder="Digite a Descrição"><?=$row_busca_dados["desc_equipe"];?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Tags:</label>
            <div class="col-sm-10">
              <input type="text" id="tags_equipe" name="tags_equipe" class="tags" value="<?=$row_busca_dados["tags_equipe"];?>">
            </div>
          </div>
          <div class="form-group">
          <div class="col-sm-12">
          <?php
					    include("FCKeditor/fckeditor.php");
					    $oFCKeditor = new FCKeditor('texto_equipe');
						$oFCKeditor->BasePath = 'FCKeditor/';
						$oFCKeditor->Value = $row_busca_dados["texto_equipe"];
						$oFCKeditor->Width  = '100%';
						$oFCKeditor->Height = '300';
						$oFCKeditor->Create();
			  	     ?>
          </div>
          </div>
          <div class="form-group">
          <div class="col-sm-12">
          <? if ($row_busca_dados["imagem_equipe"]) { ?>
           <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
<div><img style="padding:5px; border:1px solid #CCC;" src="../conteudo/img/<?=$row_busca_dados["imagem_equipe"];?>" border="0" /></div>
<? } ?>
          </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Imagem de Exibição: </label>
            <div class="col-sm-10">
              <input id="imagem_equipe" name="imagem_equipe" type="file" class="styled">
            </div>
          </div>
          
          <div class="form-group">
          <label class="checkbox-inline">
          <div class="col-sm-12">
                <input id="status_equipe" name="status_equipe" value="1" type="checkbox" class="switch" data-on="success" data-off="danger" data-on-label="Ativar" data-off-label="Desativar" <?php if (!(strcmp(1, $row_busca_dados['status_equipe']))) {echo "checked=\"checked\"";} else{ echo ""; } ?>>
          </div>
          </label>
          </div>
          
          
          <div class="form-actions text-right">
            <?=$botao;?>
          </div>
        </div>
      </div>
      <input type="hidden" name="<?=$operacao;?>" value="controle" />
      <input name="imagem_equipe_original" type="hidden" id="imagem_equipe_original" value="<?=$row_busca_dados["imagem_equipe"];?>" />
      <input name="id_equipe" type="hidden" id="id_equipe" value="<?=$row_busca_dados["id_equipe"];?>" />
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