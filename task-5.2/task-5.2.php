<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="task-5.2.css">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="task-5.2.js"></script>
</head>
<body>
    <div class="messages">
        <div class="alert-box success"></div>
        <div class="alert-box failure"></div>
        <div class="alert-box warning"></div>
    </div>
    <div class="form-container">
        <div class="form-heading">
            <span>Регистрация</span>
        </div>
      <form class="register-form" method="post">
            <input id="username" type="text" placeholder="Потребителско име">
            <input id="password" type="password" placeholder="Парола">
            <input id="password-confirm" type="password" placeholder="Повтори паролата">
            <input id="register-btn" type="submit" value="Регистрация">
            <span id="success"></span>
        </form>
    </div>
</body>
</html>