<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../web_praktikum/css/login.css">
</head>

<body>
    <div class="container">
        <div class="center-side">
            <div class="login-box">
                <h2>Selamat Datang</h2>
                <h2>Login</h2>
                <form id="loginForm" method="POST" action="proses_login.php">
                    <label for="name">Nama</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>

                    <div class="buttons">
                        <button type="submit" class="btn signin">Sign In</button>
                        <button class="btn signUp"><a href="../web_praktikum/register.php">Sign Up</a></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>