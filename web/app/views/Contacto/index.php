<?php
	require_once HELPERS . 'contacto.php';
?>
<main id="contacto">
	<section>
		<form action="contacto" method="POST">
			<!-- Nombre -->
			<label for="nombre">Nombre<span>*</span></label>
			<? $errorMsg('nombre'); ?>
			<input type="text" name="nombre" <? $errorClass('nombre'); ?> <? $value('nombre'); ?>>

			<!-- Apellido -->
			<label for="apellido">Apellido<span>*</span></label>
			<? $errorMsg('apellido'); ?>
			<input type="text" name="apellido" <? $errorClass('apellido'); ?> <? $value('apellido'); ?>>
			
			<!-- Email -->
			<label for="email">Email<span>*</span></label>
			<? $errorMsg('email'); ?>
			<input type="email" name="email" <? $errorClass('email'); ?> <? $value('email'); ?>>
			
			<!-- Telefono -->
			<label for="telefono">Teléfono (opcional)</label>
			<? $errorMsg('telefono'); ?>
			<input type="tel" name="telefono" <? $value('telefono'); ?>>

			<!-- Mensaje -->
			<label for="mensaje">Mensaje<span>*</span></label>
			<? $errorMsg('mensaje'); ?>
			<textarea name="mensaje" <? $errorClass('mensaje'); ?>><? $value('mensaje'); ?></textarea>
			
			<!-- Terminos & Condiciones -->
			<label for="">Términos y condiciones</label>
			<div id="conditions">
				<!-- Texto Privacidad -->
				<div>
					<p>
						En cumplimiento de lo dispuesto en La Ley Orgánica 15/1999 de 13 de diciembre de Protección de Datos de Carácter Personal y al REGLAMENTO (UE) 2016/679 DEL PARLAMENTO EUROPEO Y DEL CONSEJO de 27 de abril de 2016, le informamos de que los datos de contacto utilizados para la presente comunicación serán incluidos en un fichero titularidad de FELVET de Julia Amaya Espíndola, con la finalidad de posibilitar las comunicaciones a través del correo electrónico de la misma con los distintos contactos que ésta mantiene dentro del ejercicio de su actividad. Sin perjuicio de ello se le informa de que usted podrá ejercitar los derechos de acceso, rectificación, cancelación y oposición así como los demás derechos que recoge el citado reglamento, para lo cual debe dirigirse por correo electrónico a <a href="mailto:felvetdom@gmail.com">felvetdom@gmail.com</a>, adjuntando fotocopia del documento acreditativo de identidad. En virtud de la ley 34/2002 de 11 de Julio de Servicios de la Sociedad de la Información y Correo Electrónico (LSSI-CE), este mensaje y sus archivos adjuntos pueden contener información confidencial, por lo que se informa de que su uso no autorizado está prohibido por la ley. Si ha recibido este mensaje por equivocación, por favor notifíquelo inmediatamente a través de esta misma vía y borre el mensaje original junto con sus ficheros adjuntos sin leerlo o grabarlo total o parcialmente.
					</p>
					<!-- Privacidad Checkbox -->
					<? $errorMsg('privacidad'); ?>
					<label for="privacidad" <? $errorClass('privacidad'); ?>>He leído y acepto las condiciones de la política de privacidad</label>
					<input type="checkbox" name="privacidad" <? $errorClass('privacidad'); ?> <? $checked('privacidad'); ?>>
				</div>
				
				<!-- Subscibir Checkbox -->
				<div>
					<label for="mailList">Quiero recibir invitaciones a seminarios gratuitos y notificaciones</label>
					<input type="checkbox" name="mailList" <? $checked('mailList'); ?>>
				</div>
			</div>
			<!-- Captcha -->
			<div id="validation">
				<? $errorMsg('captcha'); ?>
				<div class="g-recaptcha <? $errorClass('captcha'); ?>" data-sitekey="6Le4xMYUAAAAAEZQ97GC7Uguk4zPJUKkFTIqkvhE" data-callback="recaptcha_callback"></div>
			</div>
			<!-- Enviar -->
			<button id="send-btn" name="enviar">ENVIAR</button>
		</form>
		<img src="img/wave.svg" class="attachment">
	</section>
</main>