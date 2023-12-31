<?php
include 'bootstrap.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!-- Include jQuery library and your script.js -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script> -->
<script src="script.js"></script>
</head>
<body style="background-color: #5f9ea0;">
    <section class="vh-100">
    <div class="mask d-flex align-items-center h-100" style="text-align: center;">
    <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
    <div class="card" style="border-radius: 15px;">
    <div class="card-body p-5">
        <h2 class="text-uppercase text-center mb-5" style="margin-top: -25px;">Login</h2>
    <form id="loginForm" action="#" method="post">
        <div class="form-outline mb-4">
            <input type="text" id="username" placeholder="Username" name="username" class="form-control form-control-lg" style="margin-top: -25px;" />
            <label class="form-label" for="username"></label>
        </div>
        <div class="form-outline mb-4">
        <input type="password" id="password" placeholder="Password" name="password" class="form-control form-control-lg" style="margin-top: -25px;" />
        <label class="form-label" for="password"></label>
        </div>
        <div class="d-flex justify-content-center">
        <button type="submit" id="loginButton" class="btn btn-dark" style="margin-top: -25px;">Login</button>
        </div>
        <br>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </form>
<!-- Message container for displaying errors -->
<div id="message"></div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</body>
</html>