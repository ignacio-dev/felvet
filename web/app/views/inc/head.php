<!DOCTYPE html>
<html>
<head>
	<!-- General -->
	<title><?= SITENAME . ' - ' . CURRENT_TITLE ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Open Graph -->
	<meta property="og:title" content="FELVET"/>
	<meta property="og:url" content="http://www.felvet.es/"/>
	<meta property="og:type" content="website"/>
	<meta property="og:description" content="Comportamiento, asesoramiento y nutrición para gatos."/>
	<meta property="og:image" content="http://felvet.es/public/og.jpg"/>
	<!-- Twitter Card -->
	<meta name="twitter:card" content="summary"/>
	<meta name="twitter:site" content="@felvet_abriga"/>
	<meta name="twitter:title" content="FELVET"/>
	<meta name="twitter:description" content="Comportamiento, asesoramiento y nutrición para gatos."/>
	<meta name="twitter:image" content="http://felvet.es/public/twitter.jpg"/>
	<!-- SEO -->
	<link rel="canonical" href="http://www.felvet.es/"/>
	<meta name="description" content="FELVET. Comportamiento, asesoramiento y nutrición para gatos.">
	<!-- FavIco -->
	<link rel="apple-touch-icon" sizes="180x180" href="http://felvet.es/public/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="http://felvet.es/public/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="http://felvet.es/public/favicon-16x16.png">
	<link rel="manifest" href="http://felvet.es/public/site.webmanifest">
	<link rel="mask-icon" href="http://felvet.es/public/safari-pinned-tab.svg" color="#96457d">
	<link rel="shortcut icon" href="http://felvet.es/public/favicon.ico">
	<meta name="msapplication-TileColor" content="#9f00a7">
	<meta name="msapplication-config" content="http://felvet.es/public/browserconfig.xml">
	<meta name="theme-color" content="#96457d">
	<!-- StylSheets -->
	<base href="<?= PUBLICROOT ?>">
	<link rel="stylesheet" href="css/style.css?t=<?= TIMESTAMP ?>">
	<link rel="stylesheet" href="css/header.css?t=<?= TIMESTAMP ?>">
	<link rel="stylesheet" href="css/<?= $data['current_menu']?>.css?t=<?= TIMESTAMP ?>">
	<link rel="stylesheet" href="css/media-queries.css?t=<?= TIMESTAMP ?>">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<? if (!COOKIES_ACCEPTED): ?>
		<link rel="stylesheet" href="css/cookies-msg.css?t=<?= TIMESTAMP ?>">
	<? endif; ?>
	<? if (CURRENT_MENU == 'descargar' OR 'gracias'): ?>
		<!-- Facebook Pixel Code -->
		<script>
		!function(f,b,e,v,n,t,s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t,s)}(window,document,'script',
		'https://connect.facebook.net/en_US/fbevents.js');
		 fbq('init', '430388801249473'); 
		fbq('track', 'CompleteRegistration');
		</script>
		<noscript>
		 <img height="1" width="1" 
		src="https://www.facebook.com/tr?id=430388801249473&ev=PageView
		&noscript=1"/>
		</noscript>
		<!-- Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-158060821-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-158060821-1');
		</script>
	<? endif; ?>
</head>
<body>