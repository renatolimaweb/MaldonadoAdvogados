<?
require_once("Connections/criativo.php");
require_once("includes/consulta.php");

$publicacao = anti_invasao('publicacao');
mysql_select_db($database_criativo, $conexao);
$query_busca_publicacao = "SELECT * FROM publicacao WHERE id_publicacao = '$publicacao' LIMIT 0,1";
$busca_publicacao = mysql_query($query_busca_publicacao, $conexao) or die(mysql_error());
$row_busca_publicacao = mysql_fetch_assoc($busca_publicacao);
$totalRows_busca_publicacao = mysql_num_rows($busca_publicacao);
$datatrans = explode ("-", $row_busca_publicacao["data_publicacao"]); 
$data = "$datatrans[2]/$datatrans[1]/$datatrans[0]";
?>
<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="iso-8859-1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	
		<title><?=$row_busca_publicacao["titulo_publicacao"];?> | <?=$row_busca_config["titulo_config"];?></title>
        <meta name="dc.title" content="<?=$row_busca_publicacao["titulo_publicacao"];?> | <?=$row_busca_config["titulo_config"];?>"/>
        <meta name="description" content="<?=$row_busca_publicacao["desc_publicacao"];?>">
        <meta name="DC.description" content="<?=$row_busca_publicacao["desc_publicacao"];?>" />
        <meta name="keywords" content="<?=$row_busca_publicacao["tags_publicacao"];?>">
        <meta name="DC.subject" content="<?=$row_busca_publicacao["tags_publicacao"];?>" />
        <!-- METAS Icones Mídias Sociais --> 
        <link rel="image_src" type="image/jpeg" title="<?=$row_busca_publicacao["titulo_publicacao"];?> | <?=$row_busca_config["titulo_config"];?>" href="conteudo/img/<?=$row_busca_publicacao["imagem_publicacao"];?>"/>
        <meta content="conteudo/img/<?=$row_busca_publicacao["imagem_publicacao"];?>" property="twitter:image">
        <meta content="<?=$row_busca_publicacao["desc_post"];?>" property="twitter:description">
        <meta content="<?=$row_busca_publicacao["titulo_publicacao"];?> | <?=$row_busca_config["titulo_config"];?>" property="twitter:title">
        <meta property="og:title" content="<?=$row_busca_publicacao["titulo_publicacao"];?> | <?=$row_busca_config["titulo_config"];?>"/>
        <meta property="og:site_name" content="<?=$row_busca_publicacao["titulo_publicacao"];?> | <?=$row_busca_config["titulo_config"];?>"/>
        <meta property="og:description" content="<?=$row_busca_publicacao["desc_publicacao"];?>"/>
        <meta property="og:image" content="conteudo/img/<?=$row_busca_publicacao["imagem_publicacao"];?>"/>
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
				
				<div class="container">
					<div class="row pt-xl">

						<div class="col-md-12">

							<div class="blog-posts single-post mt-xl">

								<article class="post post-large blog-single-post">

									<div class="post-content">

										<h1><?=$row_busca_publicacao["titulo_publicacao"];?></h1>

										<div class="divider divider-primary divider-small mb-xl">
											<hr>
										</div>

										<div class="post-meta">
											<span><i class="fa fa-calendar"></i> <?=$data;?> </span>
										</div>

										<?=$row_busca_publicacao["texto_publicacao"];?>

										<div class="pt-sm pb-xs">
											<!-- AddThis Button BEGIN -->
											<div class="addthis_toolbox addthis_default_style">
												<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
												<a class="addthis_button_tweet"></a>
												<a class="addthis_button_pinterest_pinit"></a>
												<a class="addthis_counter addthis_pill_style"></a>
											</div>
											<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-50faf75173aadc53"></script>
											<!-- AddThis Button END -->
										</div>
										
									</div>
									
								</article>

							</div>

						</div>

					</div>

				</div>
				
			</div>

		<? include("includes/rodape.php");?>
		</div>
		<?php include("includes/scripts.php"); ?>
	</body>
</html>
<?
require_once("Connections/end_criativo.php");
?>
