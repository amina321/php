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

if (isset($_GET['iddesert']) && is_numeric($_GET['iddesert']))
{
$iddesert = $_GET['iddesert'];

$result = mysqli_query($conn, "DELETE FROM desert WHERE iddesert=$iddesert")
or die(mysqli_error($conn));

header("Location: desert.php");
}
else

{
header("Location: desert.php");
}
?>