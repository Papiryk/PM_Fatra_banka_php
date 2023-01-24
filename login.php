<?php
session_start();
include 'dbconnect.php';
error_reporting(E_ERROR | E_PARSE);

function validate($data){

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['login']) && isset($_POST['password'])) {
    validate($data);
}

$login = validate($_POST['login']);
$password = validate($_POST['password']);

$sql = "SELECT * FROM klienti WHERE login = '$login' AND password = '$password'";
    
$result = mysqli_query($conn, $sql);
    
if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if ($row['login'] === $login && $row['password'] === $password) {
        echo "Logged in!";
        $_SESSION['login'] = $row['login'];
        $_SESSION['meno'] = $row['meno'];
        $_SESSION['id_klienta'] = $row['id_klienta'];
        header("Location: home.php");
        exit();
    }else{
        header("Location: login.php?error=Zly login alebo heslo");
        exit();
        }
    }
// else{
//     header("Location: index.php");
//     exit();
// }

// if ($_SERVER["REQUEST_METHOD"] == 'POST'){
//     $login = mysqli_real_escape_string($conn, $_POST['login']);
//     $password = mysqli_real_escape_string($con, $_POST['password']);

//     $sql = "SELECT login, password FROM klienti WHERE login = '$login' AND password = '$password'";
//     $result = mysqli_query($con, $sql);
//     $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
//     $active = $row['active'];
    
//     $count = mysqli_num_rows($result);

// if($count == 1){
//     session_register("login");
//     $_SESSION['login_user'] = $login;
//     echo "<h1>Login successful</h1>";
//     echo '<script>window.location = "index.php" </script>';
// } else{
//     echo "<h1>Login failed. Invalid login or password</h1>";
// }
// }

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
    <title>Login</title>
<style>
<?php 
    include 'style.css';

    ?>
    </style>
</head>
<body>
    <div id="sidenav">

    </div>

    <?php
    echo file_get_contents("nav.php");
    ?>
    <div class="container">
        <form action="" method="POST" class="col-3" id="login_form">
            <div class="column">
                <div class="col-md-6">
                    <label for="login">Login</label>
                    <input type="text" id="login" name="login" required><br><br>
                </div>
                <div class="col-md-6">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required><br><br>
            </div>

            <button type="submit" class="btn btn-success">Prihlásiť</button>
        </form>
    </div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

