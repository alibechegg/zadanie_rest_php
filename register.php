<?php include 'header.php' ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    register_user($username, $email, $password);
    login_user($username, $password);
}
?>

<h1>Регистрация</h1>
<form class="row g-3" method="post">
    <div class="col-md-4">
        <label for="validationDefault01" class="form-label">Имя пользлвателя:</label>
        <input type="text" class="form-control" name="username" id="validationDefault01" required>
    </div>
    <div class="col-md-4">
        <label for="validationDefault02" class="form-label">Пароль:</label>
        <input type="password" class="form-control" name="password" id="validationDefault02" required>
    </div>

    <div class="col-12">
        <button class="btn btn-primary" name="submit" type="submit">Зарегистрироваться</button>
    </div>
</form>

<?php include 'footer.php' ?>