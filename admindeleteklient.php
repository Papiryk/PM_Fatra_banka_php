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
        <form action="admindeleteklient.php" method="POST" class="col-3" id="deleteklient_form">
                <h1>Odstrániť klienta</h1>
                <div class="col-md-6">
                    <label for="id_klienta">ID klienta</label>
                    <input type="number" id="id_klienta" name="id_klienta" class="form-control" required><br>
                <button type="submit" class="btn btn-primary">Odstrániť</button>
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

$sql = "DELETE FROM `klienti` WHERE `id_klienta` = $id_klienta";

if (mysqli_query($conn, $sql)){
    echo "<h2>Klient bol úspešne vymazaný</h2>";
} else {
    echo "ERROR KLIENT" . mysqli_error($conn);
}
mysqli_close($conn);
}
?>