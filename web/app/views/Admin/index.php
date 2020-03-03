<main id="usuarios">
	<figure id="D-O-G" style="position: fixed; top: 30px; right: 30px; z-index: 1000;">
		<img src="img/logo.svg" style="height: 50px;">
	</figure>
	<section class="bg-cream" style="text-align: left; padding: 30px; min-height: 100vh; text-align: center;">
		<form action="admin/login" method="POST" style="background: #FFF; display: inline-block; padding: 50px; border-radius: 20px">
			<input type="text" name="username" placeholder="Nombre de usuario" style="padding: 10px; width: 100%;">
			<br><br>
			<input type="password" name="password" placeholder="Contraseña" style="padding: 10px; width: 100%;">
			<br><br>
			<button style="width: 100%;" name="login">Login</button>
		</form>
	</section>
</main>