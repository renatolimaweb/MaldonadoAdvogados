<meta charset="iso-8859-1">
<div class="container-fluid">

					<div class="container">
						<div class="row">
							<div class="col-md-12 center">
								<h2 class="mt-xl mb-none">ADVOGADOS ASSOCIADOS</h2>
								<div class="divider divider-primary divider-small divider-small-center mb-xl">
									<hr>
								</div>
							</div>
						</div>
						<div class="row mt-lg">
							
							<div class="owl-carousel owl-theme owl-team-custom show-nav-title" data-plugin-options="{'items': 5, 'margin': 10, 'loop': false, 'nav': true, 'dots': false}">
								<?
								$sql_equipe = "SELECT * FROM equipe ORDER BY id_equipe DESC LIMIT 0,30";
								$resultado_equipe = mysql_query($sql_equipe) or die ("N&atilde;o foi poss&iacute;vel realizar a consulta ao banco de dados");
								while($linha_equipe=mysql_fetch_array($resultado_equipe)) {
								$datatrans = explode ("-", $linha_equipe["data_publicacao"]); 
								$data = "$datatrans[2]/$datatrans[1]/$datatrans[0]";
								?>
								<div class="center mb-lg">
									<a href="#">
										<img src="conteudo/img/<?=$linha_equipe["imagem_equipe"];?>" class="img-responsive">
									</a>
									<h4 class="mt-md mb-none"><?=$linha_equipe["titulo_equipe"];?></h4>
									<p class="mb-none"><?=$linha_equipe["desc_equipe"];?></p>
								</div>
								<? } ?>
								
							</div>
						</div>
					</div>

				</div>