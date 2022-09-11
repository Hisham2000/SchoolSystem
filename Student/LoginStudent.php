<?php


if (isset($_POST['submit'])) {
    $_GET == null;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/LoginStudent.css">
    <title>Login</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 d-none d-lg-block" style="background-color: black;">
                <img class="img-fluid" src="../assets/Images/Admin.jpg">
            </div>

            <form method="POST" style="background-color: blue;" action="../Authentication/index.php" class="col-lg-8 text-center">
                <p class="alert alert-danger" <?php if (!empty($_GET)) {echo "style= 'display:block;' ";}
                    else echo "style = 'display : none;'";
                ?>
                >
                You Entered Wrong data
                </p>
                <div class="input-group input-group-sm mb-3 ">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Email</span>
                    </div>
                    <input type="email" name="email" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                </div>
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Password</span>
                    </div>
                    <input type="password" name="password" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                </div>
                <input type="submit" name="submit" value="Sign In" required class="btn btn-primary">
            </form>
        </div>
    </div>