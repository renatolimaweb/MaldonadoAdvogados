<?php
//DOCUMENTAÇÃO DO SOFTWARE "CloudS - INTERATIVO | SISTEMAS NA NUVEM"
/*
ESTE MÓDULO FOI DESENVOLVIDO COM FINALIDADE DE INTEGRAÇÃO DOS RECURSOS E CONTEÚDOS PARA INTERAÇÃO COM EDUCADORES, DIRETORES, ACADÊMICOS, EGRESSOS, VESTIBULANDOS E PESSOAS DO PÚBLICO EXTERNO. CREDENCIADOS PARA DISTRIBUIR CONTEÚDOS POR MEIO DESSE SISTEMA DE GERENCIAMENTO.

TODA E QUALQUER DISTRIBUIÇÃO OU ALTERAÇÃO DESSE MÓDULO SEM AUTORIZAÇÃO POR ESCRITO E DOCUMENTADA PODERÁ SER INTERPRETADA COMO QUEBRA DE DIREITO DE PROPRIEDADE INTELECTUAL POR DIREITO DO ANALISTA DE DESENVOLVIMENTO E PROGRAMADOR RENATO NASCIMENTO DE LIMA CEO DA INTERATIVO NEGÓCIOS.

CONTATOS PARA INFORMAÇÕES DE DISTRIBUIÇÃO +55 (69) 9239-5959 / contato@interativo.net
*/
include("../Connections/criativo.php");
include ("../Connections/seguranca_cms.php");
$pagina = $_REQUEST['pagina'];
$pag_views = 16; //TOTAL DE REGISTROS POR PÁGINA//
if (!$pagina) {
   $pagina = 1;
} else {
   $pagina = $pagina;
}
$mat = $pagina - 1; 
$inicio = $mat * $pag_views;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="iso-8859-1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>RENAN MALDONADO ADVOGADOS | PÁGINAS | CLOUDS | SISTEMA GERENCIADOR DE CONTEÚDO</title>
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
<script type="text/javascript" src="js/plugins/interface/daterangepicker.js"></script>
<script type="text/javascript" src="js/plugins/interface/fancybox.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/moment.js"></script>
<script type="text/javascript" src="js/plugins/interface/jgrowl.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/datatables.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/colorpicker.js"></script>
<script type="text/javascript" src="js/plugins/interface/fullcalendar.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/timepicker.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/collapsible.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/application.js"></script>
<style>
.linkpainel a{
	color:#FFF;
}
.linkpainel a:hover{
	color:#FFF;
}
.linkpainel a:visited{
	color:#FFF;
}
</style>
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
        <h3>PÁGINAS <small>LISTA</small></h3>
      </div>
    </div>
    <!-- /page header -->
    <!-- Breadcrumbs line -->
    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="inicial.php">PAINEL</a></li>
        <li class="active">PÁGINAS</li>
      </ul>
      
      
    </div>
    <!-- /breadcrumbs line -->
    
    <!-- Busca -->
    <form action="<?php echo $editFormAction; ?>" method="get" name="form1" class="search-line block" role="form">
      <span class="subtitle"><i class="icon-search3"></i> Pesquisar:</span>
      <div class="input-group">
        <div class="search-control">
          <input name="pesquisa" type="text" class="form-control autocomplete" value="<?PHP echo $descpesquisa;?>" placeholder="Buscar pelo título">
          <input name="tp" type="hidden" id="tp" value="<?=$tipo_conteudo?>" />
          <input type="hidden" name="Consulta" value="form1">
        </div>
        <span class="input-group-btn">
        <button class="btn btn-primary" type="button">Buscar</button>
        </span></div>
    </form>
    <!-- /Busca -->
    
    <div class="well text-center">
                <div class="btn-toolbar text-center" role="toolbar">
                  <div class="btn-group">
                  <div class="btn-primary linkpainel" style="padding-left:10px; padding-right:10px; padding-top:7px; padding-bottom:7px;"><a href="ControlePagina.php?tp=<?=$tipo_conteudo;?>">Cadastrar</a></div>
                  </div>
                </div>
              </div>
    
    <div class="panel panel-default">
            <div class="panel-heading">
              <h6 class="panel-title"><i class="icon-table2"></i> Lista</h6>
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>#ID</th>
                    <th>T&iacute;tulo</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?
				if ($_REQUEST["Consulta"] != "") {
					$descpesquisa = $_REQUEST['pesquisa'];
						$sql = "SELECT * FROM pagina WHERE (titulo_pagina like '%$descpesquisa%') ORDER BY titulo_pagina ASC";
				} else { 
					if ($_REQUEST['Del'] == "del") {
						$codigo = $_REQUEST['codigo'];
						$sql = "DELETE FROM pagina WHERE id_pagina = '$codigo'";
						$resultado = mysql_query($sql) or die ("N&atilde;o foi poss&iacute;vel realizar a consulta ao banco de dados");
					}
						$sql = "SELECT * FROM pagina ORDER BY id_pagina DESC";
				}
		
				$resultado = mysql_query($sql) or die ("N&atilde;o foi poss&iacute;vel realizar a consulta ao banco de dados");
				$linhas = mysql_num_rows($resultado); //NUMERO DE LINHAS DA CONSULTA.//
				$limita = "$sql LIMIT $inicio,$pag_views";
				$executa = mysql_query($limita);  //LIMITANDO//
				$paginas = $linhas / $pag_views; //CALCULANDO O TOTAL DE PÁGINAS.//
				$volta = $pagina - 1; //VALORES DO BOTÃO VOLTAR.//
				$proxima = $pagina + 1;  //VALORES DO BOTÃO PRÓXIMO.//
				while ($linha=mysql_fetch_array($executa)) {
				$codigo 			= $linha["id_pagina"];
				$titulo	        	= $linha["titulo_pagina"]; 
				?>
                  <tr>
                    <td>#<?=$codigo;?></td>
                    <td><?=$titulo;?></td>
                    <td align="right"><div class="table-controls" style="float:right;"><a href="ControlePagina.php?cod=<?=$codigo;?>" class="btn btn-icon btn-xs tip btn-warning" style="background:#F90" title="Editar"><i class="icon-pencil"></i></a> <a href="ConsultaPagina.php?Del=del&amp;codigo=<?=$codigo?>" onclick="return confirm('Deseja excluir ?')" class="btn btn-danger btn-icon btn-xs tip" title="Excluir"><i class="icon-remove2"></i></a> </div></td>
                  </tr>
                  <? } ?>
                </tbody>
              </table>
            </div>
          </div>
    
    
             <div class="well text-center">
                <div class="btn-toolbar text-center" role="toolbar">
                  <div class="btn-group">
                  <?
		//PÁGINAÇÃO//
		For ($i = 0; $i <= $paginas; $i++){
		$pag =  $i +1;							
		if ($pag <> $pagina) {
		echo "<a style=\"margin-right:5px; padding-left:10px; padding-right:10px; padding-top:7px; padding-bottom:7px;\" href=$PHP_SELF?pagina=$pag class=\"btn-primary\">$pag</a>";
		} else {
		echo "<a style=\"margin-right:5px; padding-left:10px; padding-right:10px; padding-top:7px; padding-bottom:7px;\" class=\"btn-primary\">$pag</a>";
		}
		}
		//FIM DA PÁGINAÇÃO.//
		?>
                  </div>
                </div>
              </div>
    
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