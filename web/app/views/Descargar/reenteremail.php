<main>
	<figure id="D-O-G">
		<img src="/public/img/logo.svg" class="clickable" onclick="window.open('http://felvet.es')">
	</figure>
	<section class="full-height bg-cream">
		<form action="descargar/pdf" method="POST" style="background: #fff; display: inline-block; padding: 50px; border-radius: 20px; margin-top: 50px; text-align: left; width: 400px">
			<label for="reemail">POR FAVOR, RE-INTRODUCE TU EMAIL:</label>
			<? if ($data['error'] != ''): ?>
				<p class="error">
					<?= $data['error'] ?>		
				</p>
			<? endif ?>
			<br>
			<input type="email" name="reemail" required placeholder="Email" style="width: 100%; display: block; margin-top: 10px; padding: 10px;">
			<br>
			<button name="resubmit">DESCARGAR</button>
		</form>
	</section>
</main>