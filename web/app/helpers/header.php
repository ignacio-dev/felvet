<?php

	function href_class($name) {
		echo 'href="' . $name . '"';
		if ($name == CURRENT_MENU) {
			echo 'class="active"';
		}
	}