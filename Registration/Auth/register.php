<?php require('../app.php') ?>
<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Responsive Login and Signup Form </title>

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
                        
    </head>
    <body>
        <section class="container forms">
            <div class="form login">
                <div class="form-content">
                    <header>Login</header>

                    <?php if (isset($_SESSION['email'])) redirect('users/index.php') ?>

                    <form action="../core/validationLogin.php" method="POST">
                        <div class="field input-field">
                        <?= getError('email');
                        unset($_SESSION['error']['email']); ?>
                            <input type="text" placeholder="Email" name="email" class="input">
                        </div>

                        <div class="field input-field">
                        <?= getError('password');
                        unset($_SESSION['error']['password']); ?>
                            <input type="password" placeholder="Password" name="password" class="password">
                            <i class='bx bx-hide eye-icon'></i>
                        </div>

                        <!-- <div class="form-link">
                            <a href="#" class="forgot-pass">Forgot password?</a>
                        </div> -->

    <div class="field button-field">
        <button type="submit">Login</button>
    </div>
    </form>

    <div class="form-link">
        <span>Don't have an account? <a href="auth/register.php" class="link signup-link">Signup</a></span>
    </div>
    </div>



    </div>

    <!-- Signup Form -->

    <div class="form signup">
        <div class="form-content">
            <header>Signup</header>
            <form action="../core/validationLogin.php" method="POST">
                <div class="field input-field">
                    <input type="text" name="name" placeholder="Name" class="input">
                    <?= getError('name'); unset($_SESSION['error']['name']); ?>
                </div>

                <div class="field input-field">
                    <input type="text" name="email" placeholder="Email" class="input"> 
                    <?= getError('email'); unset($_SESSION['error']['email']); ?>
                </div>


                <div class="field input-field">
                    <input type="password" placeholder="Create password" name="password" class=" password">
                    <?= getError('password'); unset($_SESSION['error']['password']); ?>
                </div>

                <div class="field button-field">
                    <button type="submit">Signup</button>
                </div>
            </form>

            <div class="form-link">
                <span>Already have an account? <a href="auth/register.php" class="link login-link">Login</a></span>
            </div>
        </div>

    </div>
    </section>

    <!-- JavaScript -->
    <script src="../assets/js/script.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>

    </body>
</html>