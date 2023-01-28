<?php
session_start();
include "dbconnect.php";

// $datum_splatnosti = date('d.m.Y', strtotime('+2 day', time()));

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
        <form method="POST" class="col-3" id="login_form">
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
                    <label for="variabilny_symbol">Variabilný symbol</label>
                    <input type="number" id="variabilny_symbol" name="variabilny_symbol"><br><br>
                </div>
                <div class="col-md-6">
                    <label for="konstantny_symbol">Konštantný symbol</label>
                    <input type="number" id="konstantny_symbol" name="konstantny_symbol"><br><br>
                </div>
                <div class="col-md-6">
                    <label for="specificky_symbol">Špecifický symbol</label>
                    <input type="number" id="specificky_symbol" name="specificky_symbol"><br><br>
                </div>
                <div class="col-md-6">
                    <label for="suma">Suma</label>
                    <input type="number" id="suma" name="suma" required><br><br>
                </div>
                <div class="col-md-6">
                    <label for="poznamka">Poznámka</label>
                    <input type="text" id="poznamka" name="poznamka"><br><br>
                </div>
                <!-- <div class="col-md-6">
                    <label for="datum_splatnosti">Dátum splatnosti</label>
                    <?php echo  $datum_splatnosti ?><br><br>
                </div> -->
                <button type="submit" class="btn btn-success">Poslať</button>
            </div>
        </form>
    </div>
    <h1>História platieb</h1>
    <table class="table table-bordered table-dark">
            <tr>
                <th>ID transakcie</th>
                <th>IBAN odosielateľa</th>
                <th>IBAN prijímateľa</th>
                <th>Variabilný symbol</th>
                <th>Špecifický symbol</th>
                <th>Konštantný symbol</th>
                <th>Suma</th>
                <th>Poznámka</th>
                <th>Dátum odoslania</th>
            </tr>
    <?php 
    $id_klienta = $_SESSION['id_klienta'];
    $sql = "SELECT * FROM `transakcie` WHERE id_klienta=$id_klienta";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<tr><td>" .$row['id_transakcie']. "</td><td>". $row['iban_odosielatela']. "</td><td>". $row['iban_prijimatela']. "</td> <td>"
            . $row['variabilny_symbol']. "</td><td>". $row['specificky_symbol']. "</td> <td>". $row['konstantny_symbol']. "</td><td>"
            . $row['suma']. "</td><td>". $row['poznamka']. "</td><td>". $row['datum_odoslania']. "</td><tr>";}
            echo"</table>";
    }
    else{
        echo "Žiadne záznamy";
    }
    // $conn->close();
?>
</body>
</html>
<?php
}else {
    header("Location: index.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    $iban_odosielatela = $_POST['iban_odosielatela'];
    $iban_prijimatela = $_POST['iban_prijimatela'];
    $variabilny_symbol = $_POST['variabilny_symbol'];
    $konstantny_symbol = $_REQUEST['konstantny_symbol'];
    $specificky_symbol = $_POST['specificky_symbol'];
    $suma = $_POST['suma'];
    $poznamka = $_POST['poznamka'];

$sql = "INSERT INTO `transakcie` (`id_klienta`, `iban_odosielatela`, `iban_prijimatela`, `variabilny_symbol`, `specificky_symbol`, `konstantny_symbol`, `suma`, `poznamka`)
VALUES ('$id_klienta', '$iban_odosielatela', '$iban_prijimatela', '$variabilny_symbol', '$konstantny_symbol',
    '$specificky_symbol', '$suma', '$poznamka')";

if (mysqli_query($conn, $sql)){
    $stav_prijimatela_update = mysqli_query($conn, "UPDATE `ucty` SET `stav_debetnej_karty` = `stav_debetnej_karty` + $suma WHERE `iban` = $iban_prijimatela");
    $stav_odosielatela_update = mysqli_query($conn, "UPDATE `ucty` SET `stav_debetnej_karty` = `stav_debetnej_karty` - $suma WHERE `iban` = $iban_odosielatela");
    echo "";
} else {
    echo "Platba neúspešná" . mysqli_error($conn);
}
mysqli_close($conn);
}

?>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>