<?php

	$errorMsg = function($name) use ($data) {
		if (isset($data['errors'][$name])) {
			echo '<span class="error">' . $data['errors'][$name] . '</span>';
		}
	};

	$errorClass = function($name) use ($data) {
		if (isset($data['errors'][$name])) {
			if ($name == 'captcha') {
				echo 'error';
			}
			else {
				echo 'class="error"';
			}
		}
	};

	$value = function($name) use ($data) {
		if (isset($data['input'][$name])) {
			if ($name == 'mensaje') {
				echo $data['input'][$name];
			}
			else {
				echo 'value="' . $data['input'][$name] . '"';
			}
		}
	};

	$checked = function($name) use ($data) {
		if (isset($data['input'][$name])) {
			if ($data['input'][$name] == 'on') {
				echo 'checked';
			}
		}
	};