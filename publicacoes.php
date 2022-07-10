<?
require_once("Connections/criativo.php");
require_once("includes/consulta.php");
$pagina    = anti_invasao('pagina');
    $pag_views = 7; //TOTAL DE REGISTROS POR PÁGINA//
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
				<div class="container">
					<div class="row pt-xl mb-lg">

						<div class="col-md-12">

							<h1 class="mt-xl mb-none">Publicações</h1>
							<div class="divider divider-primary divider-small mb-xl">
								<hr>
							</div>
							<?
                            $sql = "SELECT * FROM publicacao ORDER BY data_publicacao DESC, id_publicacao DESC";
                            $resultado = mysql_query($sql) or die ("N&atilde;o foi poss&iacute;vel realizar a consulta ao banco de dados");
                            $linhas = mysql_num_rows($resultado); // N&uacute;mero de linha da consulta
                            $limita = "$sql LIMIT $inicio,$pag_views";
                            $executa = mysql_query($limita);  //Limitando a sele&ccedil;&atilde;o
                            $paginas = $linhas / $pag_views; //Calculando o total de p&aacute;ginas
                            $volta = $pagina - 1; // Valores do Bot&atilde;o Voltar
                            $proxima = $pagina + 1;  // Valores do Bot&atilde;o Pr&oacute;ximo
                            while ($linha=mysql_fetch_array($executa)) {
                            $datatrans = explode ("-", $linha["data_publicacao"]); 
                            $data = "$datatrans[2]/$datatrans[1]/$datatrans[0]";
                            ?>
							<div class="row mt-xl">
								<div class="col-md-12">
									<span class="thumb-info thumb-info-side-image thumb-info-no-zoom mt-xl">
										<span class="thumb-info-caption">
											<span class="thumb-info-caption-text">
												<h2 class="mb-md mt-xs"><a title="" class="text-dark" href="publicacao.php?publicacao=<?=$linha["id_publicacao"];?>"><?=$linha["titulo_publicacao"];?></a></h2>
												<span class="post-meta">
													<span><?=$data;?></span>
												</span>
												<p class="font-size-md"><?=$linha["desc_publicacao"];?></p>
												<a class="mt-md" href="publicacao.php?publicacao=<?=$linha["id_publicacao"];?>">leia mais <i class="fa fa-long-arrow-right"></i></a>
											</span>
										</span>
									</span>
								</div>
							</div>
							<? } ?>
							

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
