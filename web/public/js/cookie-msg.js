(function () {
	const ACEPTAR_BTN = document.getElementById('aceptar_btn');
	ACEPTAR_BTN.addEventListener('click', acceptCookies);

	function closeCookieMsg() {
		const MSG_BOX = document.getElementById('cookie-msg');
		MSG_BOX.classList.add('closed');
	}

	function acceptCookies(e) {
		e.preventDefault();
		const COOKIE_LIFESPAN = 30; // Days
		let expDate = new Date();	
		expDate.setDate(expDate.getDate() + COOKIE_LIFESPAN);	
		document.cookie = `cookiesAccepted=YES;expires=${expDate}`;
		closeCookieMsg();
	}
})();