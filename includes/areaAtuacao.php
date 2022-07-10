<meta charset="iso-8859-1">
<div class="container" id="practice-areas">
					<div class="row">
						<div class="col-md-12 center">
							<h2 class="mt-xl mb-none">ATUA&Ccedil;&Atilde;O</h2>
							<div class="divider divider-primary divider-small divider-small-center mb-xl">
								<hr>
							</div>
						</div>
					</div>

					<div class="row mt-lg">
						<?
								$sql_areaAtuacao = "SELECT * FROM area_atuacao ORDER BY titulo_area_atuacao ASC LIMIT 0,15";
								$resultado_areaAtuacao = mysql_query($sql_areaAtuacao) or die ("N&atilde;o foi poss&iacute;vel realizar a consulta ao banco de dados");
								while($linha_areaAtuacao=mysql_fetch_array($resultado_areaAtuacao)) {
							?>
						<div class="col-md-4">
							<div class="feature-box feature-box-style-2 mb-xl appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="0">
								<div class="feature-box-info ml-md">
									<h4 class="mb-sm"><?=$linha_areaAtuacao["titulo_area_atuacao"];?></h4>
								</div>
							</div>
							<hr>
						</div>
						
						<? } ?>
						
					</div>

					
				</div>