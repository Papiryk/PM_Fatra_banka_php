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
    <title>Admin účet</title>
    
</head>
<body>
    
    </div>
    <?php
    echo file_get_contents("adminnav.php");
    ?>

<h1>Správa účtov</h1>
        <h1>Vytvoriť účet</h1>
        <form method="POST" action="" class="col-3" id="register_form">
            <div class="column">
                <div class="col-md-8">
                    <label for="id_klienta">ID klienta</label>
                    <input type="text" id="id_klienta" name="id_klienta" class="form-control" required><br>
                </div>
                <div class="col-md-8">
                    <label for="typ_uctu">Typ účtu</label>
                    <select name="typ_uctu" id="typ_uctu"  class="form-control">
                        <option value=""></option>
                        <option value="bezny">bežný</option>
                        <option value="sporiaci">sporiaci</option>
                    </select>
                    <br>
                </div>
                <button type="submit" class="btn btn-primary">Vytvoriť</button>
                
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
    $id_klienta = $_POST['id_klienta'];
    $typ_uctu = $_POST['typ_uctu'];
    $iban = rand(101, 999) . "\n";


$sql = "INSERT INTO `ucty` (`id_klienta`, `iban`, `typ_uctu`, `stav_debetnej_karty`, `stav_kreditnej_karty`) VALUES ('$id_klienta', '$iban', '$typ_uctu', 300, 0)";     

if (mysqli_query($conn, $sql)){
    echo "<h2>Účet bol úspešne vytvorený</h2>";
} else {
    echo "ERROR KLIENT" . mysqli_error($conn);
}
}


?>