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
    <title>Účet</title>
</head>
<body>
<?php
    echo file_get_contents("lognav.php");
    ?>
    <h1>Účet</h1>
    <table class="table table-bordered table-dark">
            <tr>
                <th>IBAN</th>
                <th>Stav debetnej karty</th>
                <th>Stav kreditnej karty</th>
            </tr>
    <?php 
    $id_klienta = $_SESSION['id_klienta'];
    $sql = "SELECT * FROM `ucty` WHERE id_klienta=$id_klienta";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<tr><td>" .$row['iban']. "</td><td>". $row['stav_debetnej_karty']. "</td><td>". $row['stav_kreditnej_karty']. "</td><tr>";    }
            echo"</table>";
    }
    else{
        echo "Žiadne záznamy";
    }
    $conn->close();
    ?>
    </table>
    <h1>Pôžičky</h1>
    <table class="table table-bordered table-dark">
            <tr>
                <th>WORK</th>
                <th>IN</th>
                <th>PROGRESS</th>
            </tr>
    </table>

    <h1>Pozvať priateľa</h1>
    <h6>Pozvaním priateľa získate bonus až 100€. Neváhajte a využite túto skvelú ponuku. Kontaktujte nás mailom na <a href="mailto:pozvipriatela@fatrabanka.sk">pozvipriatela@fatrabanka.sk</a> a my Vám zašleme link pre Vášho priateľa</h6>
    <small class="text-muted">Ponuka platí iba 3 mesiace od registrácie</small>

    
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
    