<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="css/register.css">
</head>

<body>
    <div class="container">
        <div class="left-side">
            <h1>JOIN US!!!</h1>
            <p>Hallo, Selamat Datang!</p>
        </div>
        <div class="right-side">
            <div class="register-box">
                <h2>Daftarkan Akun</h2>
                <form method="POST" action="proses_register.php">
                    <div class="name-fields">
                        <div class="input-group">
                            <label for="username_admin">Username</label>
                            <input type="text" id="username_admin" name="username_admin" required>
                        </div>
                    </div>

                    <label for="email_admin">Email</label>
                    <input type="email" id="email_admin" name="email_admin" required>

                    <div class="password-fields">
                        <div class="input-group">
                            <label for="password_admin">Password</label>
                            <input type="password" id="password_admin" name="password_admin" required>
                        </div>
                    </div>

                    <div class="button">
                        <button type="submit" class="btn signup">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>