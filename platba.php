<?php
session_start();
include "dbconnect.php";

$datum_splatnosti = new DateTime();

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
    <title>Platba</title>
</head>
<body>
<?php
    echo file_get_contents("lognav.php");
    ?>
    <h1>Platba</h1>
    <div class="container">
        <form action="" method="POST" class="col-3" id="login_form">
            <div class="column">
                <div class="col-md-6">
                    <label for="iban_odosielatela">IBAN odosielateľa</label>
                    <input type="text" id="iban_odosielatela" name="iban_odosielatela" required><br><br>
                </div>
                <div class="col-md-6">
                    <label for="iban_prijimatela">IBAN prijímateľa</label>
                    <input type="text" id="iban_prijimatela" name="iban_prijimatela" required><br><br>
                </div>
                <div class="col-md-6">
                    <label for="suma">Suma</label>
                    <input type="number" id="password" name="password" required><br><br>
                </div>
                <div class="col-md-6">
                    <label for="poznamka">Poznámka</label>
                    <input type="text" id="oznamka" name="poznamka" required><br><br>
                </div>
                <div class="col-md-6">
                    <label for="datum_splatnosti">Dátum splatnosti</label>
                    <input type="date" id="datum_splatnosti" name="datum_splatnosti" required><br><br>
                    <?php echo '<input type="date" value="' . $datum_splatnosti->format('d.m.Y') . ' "/>'; ?>
                </div>
                <button type="submit" class="btn btn-success">Poslať</button>
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
    