	<? if ($data['header']): ?>
		<script src="js/header.js?t=<?= TIMESTAMP ?>"></script>
		<? if (CURRENT_MENU != 'home'): ?>
			<script>
				var logoImg = document.querySelector('#logo img');
				logoImg.classList.add('clickable');
				logoImg.addEventListener('click', function() {
					window.location = 'http://felvet.es';
				});
			</script>
		<? endif; ?>
	<? endif; ?>

	<? if (CURRENT_MENU == 'contacto'): ?>
		<script src="https://www.google.com/recaptcha/api.js" id="captcha-script" async></script>
	<? endif; ?>

	<? if (CURRENT_MENU == 'descargar'): ?>
		<script src="https://www.google.com/recaptcha/api.js" id="captcha-script" async></script>
		<script src="js/descargar.js?t=<?= TIMESTAMP ?>"></script>
	<? endif; ?>

	<? if (CURRENT_MENU == 'gracias'): ?>
		<script src="https://assets.calendly.com/assets/external/widget.js"></script>
	<? endif; ?>

	<? if (!COOKIES_ACCEPTED): ?>
			<script src="js/cookie-msg.js?t=<?= TIMESTAMP ?>"></script>
	<? endif; ?>
</body>
</html>