<?
require_once("Connections/criativo.php");
require_once("includes/consulta.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="iso-8859-1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	
		<title><?=$row_busca_config["titulo_config"];?></title>
        <meta name="dc.title" content="<?=$row_busca_config["titulo_config"];?>"/>
        <meta name="description" content="<?=$row_busca_config["desc_config"];?>">
        <meta name="DC.description" content="<?=$row_busca_config["desc_config"];?>" />
        <meta name="keywords" content="<?=$row_busca_config["tags_config"];?>">
        <meta name="DC.subject" content="<?=$row_busca_config["tags_config"];?>" />
        <!-- Open Graph -->
        <link rel="image_src" type="image/jpeg" title="<?=$row_busca_config["titulo_config"];?>" href="conteudo/img/<?=$row_busca_interfaceweb["open_graph"];?>"/>
        <meta content="conteudo/img/<?=$row_busca_interfaceweb["open_graph"];?>" property="twitter:image">
        <meta content="<?=$row_busca_config["desc_config"];?>" property="twitter:description">
        <meta content="<?=$row_busca_config["titulo_config"];?>" property="twitter:title">
        <meta property="og:title" content="<?=$row_busca_config["titulo_config"];?>"/>
        <meta property="og:site_name" content="<?=$row_busca_config["titulo_config"];?>"/>
        <meta property="og:description" content="<?=$row_busca_config["desc_config"];?>"/>
        <meta property="og:image" content="conteudo/img/<?=$row_busca_interfaceweb["open_graph"];?>"/>
        <meta property="og:locale" content="pt_br"/>
        <meta property="og:type" content="article" />
		<?php include("includes/css.php"); ?>
		<?php include("includes/seo.php"); ?>
        <?php include("includes/mobile.php"); ?>
	</head>
	<body>

		<div class="body">
			<?php include("includes/topo.php"); ?>
			<div role="main" class="main">
				<?php include("includes/destaque.php"); ?>
				<?php include("includes/perfil.php"); ?>
				<?php include("includes/areaAtuacao.php");?>
				<?php include("includes/equipe.php");?>
				<?php include("includes/publicacao.php");?>
			</div>

		<? include("includes/rodape.php");?>
		</div>
		<?php include("includes/scripts.php"); ?>
	</body>
</html>
<?
require_once("Connections/end_criativo.php");
?>
