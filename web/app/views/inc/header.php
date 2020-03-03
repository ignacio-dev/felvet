<? require_once HELPERS . 'header.php' ?>
<header class="transparent">
	<div id="header-content" class="horizontal-delimiter-2">
		<figure id="logo">
			<img src="img/logo.svg">
			<h1>
				COMPORTAMIENTO,<br>
				ASESORAMIENTO<br>
				Y NUTRICIÓN PARA GATOS
			</h1>
		</figure>
		<nav>
			<a <? href_class('home') ?>>HOME</a>
			<a <? href_class('metodo-balance-cat') ?>>MÉTODO (BALANCE CAT)</a>
			<a <? href_class('quien-soy') ?>>QUIÉN SOY</a>
			<a <? href_class('servicios') ?>>SERVICIOS</a>
			<a <? href_class('blog') ?>>BLOG</a>
			<a <? href_class('contacto') ?>>CONTACTO</a>
			<div id="social-media">
				<a href="https://www.instagram.com/felvet.abriga/" target="_blank"><i class="fab fa-instagram"></i></a>
				<a href="https://www.twitter.com/felvet_abriga" target="_blank"><i class="fab fa-twitter"></i></a>
				<a href="https://www.facebook.com/felvet/" target="_blank"><i class="fab fa-facebook-f"></i></a>
			</div>
		</nav>
		<i class="fas fa-bars" id="hamburger"></i>
	</div>
</header>