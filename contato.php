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
				<div class="container">
					<div class="row pt-xl">
						<div class="col-md-7">
							<h1 class="mt-xl mb-none">Fale Conosco</h1>
							<div class="divider divider-primary divider-small mb-xl">
								<hr>
							</div>

							<form id="contactForm" action="php/contact-form.php" method="POST">
								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<input type="text" placeholder="Nome" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control input-lg" name="name" id="name" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<input type="email" placeholder="E-mail" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control input-lg" name="email" id="email" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<input type="text" placeholder="Assunto" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control input-lg" name="subject" id="subject" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<textarea maxlength="5000" placeholder="Mensagem" data-msg-required="Please enter your message." rows="5" class="form-control input-lg" name="message" id="message" required></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<input type="submit" value="Send Message" class="btn btn-primary btn-lg mb-xlg" data-loading-text="Loading...">
									</div>
								</div>
							</form>

						</div>
						<div class="col-md-4 col-md-offset-1">

							<h4 class="mt-xl mb-none">Localização</h4>
							<div class="divider divider-primary divider-small mb-xl">
								<hr>
							</div>

							<ul class="list list-icons list-icons-style-3 mt-xlg mb-xlg">
								<li><i class="fa fa-map-marker"></i> <strong>Endereço:</strong> 1234 Street Name, City Name</li>
								<li><i class="fa fa-phone"></i> <strong>Telefone:</strong> (123) 456-789</li>
								<li><i class="fa fa-envelope"></i> <strong>E-mail:</strong> <a href="mailto:mail@example.com">mail@example.com</a></li>
							</ul>

							<h4 class="pt-xl mb-none">Horários de Funcionamento</h4>
							<div class="divider divider-primary divider-small mb-xl">
								<hr>
							</div>

							<ul class="list list-icons list-dark mt-xlg">
								<li><i class="fa fa-clock-o"></i> Segunda - Sexta - 8am ás 18pm</li>
								<li><i class="fa fa-clock-o"></i> Sábado - 8am ás 12pm</li>
							</ul>

						</div>
					</div>
				</div>
			</div>

			<? include("includes/rodape.php");?>
		</div>

		<!-- Vendor -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/jquery.appear/jquery.appear.min.js"></script>
		<script src="vendor/jquery.easing/jquery.easing.min.js"></script>
		<script src="vendor/jquery-cookie/jquery-cookie.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/common/common.min.js"></script>
		<script src="vendor/jquery.validation/jquery.validation.min.js"></script>
		<script src="vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js"></script>
		<script src="vendor/jquery.gmap/jquery.gmap.min.js"></script>
		<script src="vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
		<script src="vendor/isotope/jquery.isotope.min.js"></script>
		<script src="vendor/owl.carousel/owl.carousel.min.js"></script>
		<script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="vendor/vide/vide.min.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="js/theme.js"></script>
		
		<!-- Current Page Vendor and Views -->
		<script src="vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script src="vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

		<!-- Current Page Vendor and Views -->
		<script src="js/views/view.contact.js"></script>

		<!-- Demo -->
		<script src="js/demos/demo-law-firm.js"></script>	
		
		<!-- Theme Custom -->
		<script src="js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="js/theme.init.js"></script>


		


	</body>
</html>
