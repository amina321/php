<?php
$servername = "localhost";
$username = "root";
$password ="";
$dbname = "restoran";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Veza nije uspjela" . mysqli_connect_error());
}

if (isset($_GET['idpredjelo']) && is_numeric($_GET['idpredjelo']))
{
$idpredjelo = $_GET['idpredjelo'];

$result = mysqli_query($conn, "DELETE FROM predjelo WHERE idpredjelo=$idpredjelo")
or die(mysqli_error($conn));

header("Location: predjelo.php");
}
else

{
header("Location: predjelo.php");
}
?>