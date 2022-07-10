<meta charset="iso-8859-1">
<div class="container">
					<div class="row">
						<div class="col-md-12 center">
							<h2 class="mt-xl mb-none">PUBLICA&Ccedil;&Otilde;ES</h2>
							<div class="divider divider-primary divider-small divider-small-center mb-xl">
								<hr>
							</div>
						</div>
					</div>
					<div class="row mt-xl">
						
						<?
						$sql_publicacao = "SELECT * FROM publicacao WHERE status_publicacao = 1 ORDER BY id_publicacao DESC, data_publicacao DESC LIMIT 0,2";
						$resultado_publicacao = mysql_query($sql_publicacao) or die ("N&atilde;o foi poss&iacute;vel realizar a consulta ao banco de dados");
						while($linha_publicacao=mysql_fetch_array($resultado_publicacao)) {
						$datatrans = explode ("-", $linha_publicacao["data_publicacao"]); 
						$data = "$datatrans[2]/$datatrans[1]/$datatrans[0]";
						?>
						
						<div class="col-md-6">

							<span class="thumb-info thumb-info-side-image thumb-info-no-zoom mb-xl">
								<span class="thumb-info-side-image-wrapper p-none hidden-xs">
									<a title="<?=$linha_publicacao["titulo_publicacao"];?>" href="publicacao.php?publicacao=<?=$linha_publicacao["id_publicacao"];?>">
										<img src="conteudo/img/<?=$linha_publicacao["imagem_publicacao"];?>" class="img-responsive" alt="" style="width: 195px;">
									</a>
								</span>
								<span class="thumb-info-caption">
									<span class="thumb-info-caption-text">
										<h2 class="mb-md mt-xs"><a title="<?=$linha_publicacao["titulo_publicacao"];?>" class="text-dark" href="publicacao.php?publicacao=<?=$linha_publicacao["id_publicacao"];?>"><?=$linha_publicacao["titulo_publicacao"];?></a></h2>
										<span class="post-meta">
											<span><?=$data;?></span>
										</span>
										<p class="font-size-md"><?=$linha_publicacao["desc_publicacao"];?></p>
										<a class="mt-md" href="publicacao.php?publicacao=<?=$linha_publicacao["id_publicacao"];?>">LEIA MAIS <i class="fa fa-long-arrow-right"></i></a>
									</span>
								</span>
							</span>

						</div>
						
						<? } ?>
						
					</div>
				</div>