(function () {
	//  Disable Active Nav Link
	const ACTIVE_LINK = document.querySelector('nav a.active');
	if (typeof(ACTIVE_LINK) != 'undefined' && ACTIVE_LINK != null) {
		ACTIVE_LINK.addEventListener('click', e => e.preventDefault());
	}

	// Remove Transparency From Header On Window Scroll
	window.addEventListener('scroll', removeHeaderTransparency);

	function removeHeaderTransparency() {
		const HEADER   = document.querySelector('header');
		const SECTIONS = document.getElementsByTagName('section');

		if (SECTIONS.length > 1) {
			breakpoint = SECTIONS[1].offsetTop - HEADER.clientHeight;
		}
		else {
			breakpoint = 1;
		}

		if (window.innerWidth < 1030) {
			breakpoint = 1;
		}

		if (window.pageYOffset >= breakpoint) {
			HEADER.classList.remove('transparent');
		}
		else {
			HEADER.classList.add('transparent');
		}
	}
	
	// Mobile Nav
	const HAMB = document.getElementById('hamburger');
	HAMB.addEventListener('click', toggleNavbar);

	function toggleNavbar() {
		const NAVBAR = document.querySelector('nav');

		if (HAMB.classList.contains('fa-bars')) {
			HAMB.classList.remove('fa-bars');
			HAMB.classList.add('fa-times');
			NAVBAR.classList.add('open');
		}
		else {
			HAMB.classList.remove('fa-times');
			HAMB.classList.add('fa-bars');
			NAVBAR.classList.remove('open');
		}
	}
})();