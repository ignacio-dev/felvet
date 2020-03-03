function recaptcha_callback() {
	const FORM = document.querySelector('#dialog form');
	const SEND_BTN = document.querySelector('#dialog form button');
	const RECAPTCHA = document.querySelector('.g-recaptcha');

	SEND_BTN.classList.remove('disabled');
	RECAPTCHA.classList.remove('error');
	FORM.action = 'descargar/submit';
	FORM.method = 'POST';
}

(function () {
	const OPENERS    = document.querySelectorAll('.opener');
	const MODAL      = document.getElementById('modal');
	const CLOSE_BTN  = document.getElementById('close-btn');
	const SUBMIT_BTN = document.querySelector('#dialog form button');
	const RECAPTCHA  = document.querySelector('.g-recaptcha');
	
	for (let opener of OPENERS) {
		opener.addEventListener('click', openDialog);
	}
	
	CLOSE_BTN.addEventListener('click', closeDialog);
	
	function openDialog(e) {
		e.preventDefault();	
		MODAL.classList.add('open');
	}
	
	function closeDialog() {
		MODAL.classList.remove('open');
		grecaptcha.reset();
		SUBMIT_BTN.classList.add('disabled');
		RECAPTCHA.classList.remove('error');
	}
	
	document.onkeydown = e => {
		const ESC_KEY_CODE = 27;
		if (e.keyCode === ESC_KEY_CODE) {
			closeDialog();
		}
	};
	
	SUBMIT_BTN.addEventListener('click', e => {
		if (SUBMIT_BTN.classList.contains('disabled')) {
			e.preventDefault();
			RECAPTCHA.classList.add('error');
		}
	});
})();