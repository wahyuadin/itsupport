<?php
require '../function.php';

if (isset($_POST['register'])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('Registration successful! Contact Admin for Activate'); window.location='login.php';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | IT Helpdesk</title>
    <!-- icon cmnp -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/plugins/bootstrap4/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="row content">
            <div class="col-md-6 mb-3">
             <img src="./../assets/img/rererere-removebg-preview.png" width="400" height="500">
            </div>
            <div class="col-md-6" style="margin-top: -30px;">
                <a class="btn logo" href="../index.php">IT Helpdesk</a>
                <img src="./../assets/img/ptbmj.png"  width="100" height="100">
                
                <h4 class="signin-text mb-3">Sign Up</h4>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="form-group">
                        <label for="nip">Nomor Induk Karyawan (NIK)</label>
                        <input type="text" class="form-control" name="nip" id="nip" required>
                    </div>
                    <div class="form-group">
                        <label for="Peran">Peran</label>
                        <input type="text" class="form-control" name="Role" id="Role" required>
                    </div>
                    <button class="btn btn-signin" value="register" name="register">Register</button>
                    <hr>
                    <p>Already have an account? Login here!</p>
                    <a href="login.php" class="btn btn-signup">Sign in</a>
                </form>
            </div>
        </div>
    </div>
    <!-- JavaScript -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <script src="../assets/plugins/bootstrap4/js/bootstrap.min.js"></script>
</body>

</html>