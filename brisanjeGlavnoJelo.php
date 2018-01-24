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

if (isset($_GET['idglavno_jelo']) && is_numeric($_GET['idglavno_jelo']))
{
$idglavno_jelo = $_GET['idglavno_jelo'];

$result = mysqli_query($conn, "DELETE FROM glavno_jelo WHERE idglavno_jelo=$idglavno_jelo")
or die(mysqli_error($conn));

header("Location: glavnoJelo.php");
}
else

{
header("Location: glavnoJelo.php");
}
?>