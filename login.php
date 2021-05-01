<?php include 'header.php' ?>

<?php

	checkIfUserIsLoggedInAndRedirect('index.php');


	if (ifItIsMethod('post')) {

		if (isset($_POST['username']) && isset($_POST['password'])) {

			login_user($_POST['username'], $_POST['password']);
		} else {
			redirect('login.php');
			echo "<p class='bg-success'>Вы успешно зашли в учетную запись!</p>";
		}
	}

?>

<div class="container">
	<div class="form-gap"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="text-center">
							<h3><i class="fa fa-user fa-4x"></i></h3>
							<h2 class="text-center">Войти</h2>
							<div class="panel-body">
								<form id="login-form" role="form" autocomplete="off" class="form" method="post">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>

											<input name="username" type="text" class="form-control" placeholder="Введите имя пользователя" required>
										</div>
									</div>

									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
											<input name="password" type="password" class="form-control" placeholder="Введите пароль" required>
										</div>
									</div>

									<div class="form-group">
										<input name="login" class="btn btn-lg btn-primary btn-block" value="Войти" type="submit">
									</div>
								</form>
								<a href="register.php">Нету аккаунта? Так создайте!</a>
							</div><!-- Body-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<hr>
</div>

<?php include 'footer.php' ?>