<meta charset="iso-8859-1">
<div class="slider-container rev_slider_wrapper" style="height: 650px;">
					<div id="revolutionSlider" class="slider rev_slider manual">
						<ul>
							<?
								$sql_destaque = "SELECT * FROM destaque WHERE status_destaque = 1 ORDER BY id_destaque DESC LIMIT 0,5";
								$resultado_destaque = mysql_query($sql_destaque) or die ("N&atilde;o foi poss&iacute;vel realizar a consulta ao banco de dados");
								while($linha_destaque=mysql_fetch_array($resultado_destaque)) {
							?>
							<li data-transition="fade" data-title="<?=$linha_destaque["titulo_destaque"];?>">

								<img src="conteudo/img/<?=$linha_destaque["imagem_destaque"];?>"  
									alt=""
									data-bgposition="center center" 
									data-bgfit="cover" 
									data-bgrepeat="no-repeat"
									class="rev-slidebg">


								<div class="tp-caption main-label"
									data-x="right" data-hoffset="100"
									data-y="center" data-voffset="195"
									data-start="1500"
									data-whitespace="nowrap"						 
									data-transform_in="y:[100%];s:500;"
									data-transform_out="opacity:0;s:500;"
									style="z-index: 5"
									data-mask_in="x:0px;y:0px;"><?=$linha_destaque["titulo_destaque"];?></div>

								<div class="tp-caption bottom-label"
									data-x="right" data-hoffset="100"
									data-y="center" data-voffset="145"
									data-start="2000"
									style="z-index: 5"
									data-transform_in="y:[100%];opacity:0;s:500;"><?=$linha_destaque["desc_destaque"];?></div>

								
								
							</li>
							<? } ?>
						</ul>
					</div>
				</div>