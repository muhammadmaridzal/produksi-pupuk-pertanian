<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username_admin']);
    $email = trim($_POST['email_admin']);
    $password = password_hash(trim($_POST['password_admin']), PASSWORD_BCRYPT);

    try {

        $checkEmail = $conn->prepare("SELECT id_admin FROM tb_admin WHERE email_admin = :email");
        $checkEmail->bindValue(':email', $email);
        $checkEmail->execute();

        if ($checkEmail->rowCount() > 0) {
            echo "Email already registered!";
            exit;
        }

        $stmt = $conn->prepare("INSERT INTO tb_admin (username_admin, email_admin, password_admin) VALUES (:username, :email, :password)");
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $password);

        if ($stmt->execute()) {
            echo "
            <script>
            alert('Register successfully!');
                window.location = '.php';
                </script>
            ";
        } else {
            echo "
            <script>
            alert('Register failed!');
            window.location = '../../Register/register.php';
            </script>
        ";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
