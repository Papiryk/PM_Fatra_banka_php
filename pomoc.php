<?php
session_start();
include "dbconnect.php";

if(isset($_SESSION['id_klienta']) && isset($_SESSION['login'])){
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <style>
        <?php
    include 'style.css';
    
    ?>
    </style>
    <title>Pomoc</title>
</head>
<body>
<?php
    echo file_get_contents("lognav.php");
    ?>
    <h1>Pomoc</h1>
    <div class="container">
        <form action="POST">
            <div class="col-md-6">
                <h4>Popíšte Váš problém</h4>
            </div>
            <div class="col-md-6">
                <textarea name="pomoc" id="pomoc" cols="50" rows="10"></textarea>
            </div>
            <div class="col-md-6">
                <a href="pomoc2.php" class="btn btn-success">Odoslať</a>
            </div>
        </form>
    </div>
</body>
</html>
<?php
}else {
    header("Location: index.php");
    exit();
}
?>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
