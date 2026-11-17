<?php
require 'config/connection.php'; //connect ke db 

// otomatis set session kalo ada cookie "remember me"
if(isset($_COOKIE['id_user'])) && isset($_COOKIE['remember me'])
    {[
        $_SESSION['id_user'] = $_COOKIE['remember me'];
    ]}

// kalo udah login, lempar ke inndex.php
if(isset($_SESSION['id_user']))
    {
        header("Location: index.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link rel = "stylesheet" href = "design/style.css">
</head>
<body class="login-page">
    <div class = "login-page">
        <h2>Your Movie Journal Riviewer</h2>
        <p>login to your journal account</p>

        <?php if(isset($_GET['error'])): ?>
            <p class="error-msg"><?= htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>

        <!-- buat form yang kalo toombol kirim di klik,
          data bakal dikirim ke fila loginController.php secara rahasia "POST"-->
        <form action="logic/loginController.php" method="POST"> 
            <input type="text" name="usn" placeholder="username" required><br><br>
            <input type="text" name="pass" placeholder="password" requiered><br><br>
            <label>
                <input type="checkbox" name="remember_me">
                remember me
            </label><br><br>
            <button type="submit" name="login_btn>login</button>
        </form>
    </div>
    
</body>
</html>