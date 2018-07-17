<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php \fw\core\base\View::getMeta() ?>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>

<div class="container">


    <ul class="nav">
        <li class="nav-item">
            <a href="/" class="nav-link">Home</a></li>
        </li>
        <li class="nav-item">
            <a href="/admin" class="nav-link">Admin</a>
        </li>
        <li class="nav-item">
            <a href="/page/view" class="nav-link">View</a>
        </li>
        <li class="nav-item">
            <a href="/user/signup" class="nav-link">signup</a>
        </li>
        <li class="nav-item">
            <a href="/user/login" class="nav-link">login</a>
        </li>
        <li class="nav-item">
            <a href="/user/logout" class="nav-link">logout</a>
        </li>
    </ul>

    <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <?=$_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <?=$_SESSION['success']; unset($_SESSION['success']); ?>
        </div>
    <?php endif; ?>


    <?=$content;?>



</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<?php

    foreach ($scripts as $script){
        echo $script;
    }

?>
</body>
</html>