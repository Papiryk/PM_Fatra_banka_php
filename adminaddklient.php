<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="stylesheets/style.css" />
    <style>
        <?php
    include 'style.css';
    ?>
    </style>
    <title>Admin klient</title>
    
</head>
<body>
    
    </div>
    <?php
    echo file_get_contents("adminnav.php");
    ?>

<h1>Správa klientov</h1>
        <h1>Pridať klienta</h1>
        <form method="POST" action="adminaddklient.php" class="col-3" id="register_form">
            <div class="column">
                <div class="col-md-8">
                    <label for="meno">Meno</label>
                    <input type="text" id="meno" name="meno" class="form-control" required><br><br>
                </div>
                <div class="col-md-8">
                    <label for="priezvisko">Priezvisko</label>
                    <input type="text" id="priezvisko" name="priezvisko" class="form-control" required><br><br>
                </div>
                <div class="col-md-8">
                    <label for="mesto">Mesto</label>
                    <input type="text" id="mesto" name="mesto" class="form-control" required><br><br>
                </div>
                <div class="col-md-8">
                    <label for="ulica">Ulica</label>
                    <input type="text" id="ulica" name="ulica" class="form-control" required><br><br>
                </div>
                <div class="col-md-8">
                    <label for="popisne_cislo">Popisné číslo</label>
                    <input type="text" id="popisne_cislo" name="popisne_cislo" class="form-control" required><br><br>
                </div>
                <div class="col-md-8">
                    <label for="psc">PSČ</label>
                    <input type="text" id="psc" name="psc" class="form-control" required><br><br>
                </div>
                <div class="col-md-8">
                    <label for="cislo_op">Číslo OP</label>
                    <input type="text" id="cislo_op" name="cislo_op" class="form-control" required><br><br>
                </div>
                <div class="col-md-8">
                    <label for="login">Login</label>
                    <input type="text" id="login" name="login" class="form-control" required><br><br>
                </div>
                <div class="col-md-8">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required><br><br>
                </div>
                <button type="submit" class="btn btn-primary">Pridať klienta</button>
        </form>

    
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

<?php
}

require_once 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    $meno = $_POST['meno'];
    $priezvisko = $_POST['priezvisko'];
    $mesto = $_POST['mesto'];
    $ulica = $_REQUEST['ulica'];
    $popisne_cislo = $_POST['popisne_cislo'];
    $psc = $_POST['psc'];
    $cislo_op = $_POST['cislo_op'];
    $login = $_POST['login'];
    $password = $_POST['password'];

    $iban = rand(101, 999) . "\n";

    
    $sql = "INSERT INTO `klienti` (`meno`, `priezvisko`, `mesto`, `ulica`, `popisne_cislo`, `psc`, `cislo_op`, `login`, `password`)
VALUES ('$meno', '$priezvisko', '$mesto', '$ulica',
    '$popisne_cislo', '$psc', '$cislo_op', '$login', '$password')";

    

if (mysqli_query($conn, $sql)){
    echo "<h2>Klient bol úspešne vytvorený</h2>";
} else {
    echo "ERROR KLIENT" . mysqli_error($conn);
}
$klient_id = mysqli_insert_id($conn);
$sql2 = "INSERT INTO `ucty` (`id_klienta`, `iban`, `typ_uctu`, `stav_debetnej_karty`, `stav_kreditnej_karty`) VALUES ('$klient_id', 'SK' + $iban, 'bezny', 300, 0)"; 

if (mysqli_query($conn, $sql2)){
    echo "<h2>Účet bol úspešne vytvorený</h2>";
} else {
    echo "ERROR UCET" . mysqli_error($conn);
}

mysqli_close($conn);
}
?>