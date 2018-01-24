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

if (isset($_GET['idprilozi']) && is_numeric($_GET['idprilozi']))
{
$idprilozi = $_GET['idprilozi'];

$result = mysqli_query($conn, "DELETE FROM prilozi WHERE idprilozi=$idprilozi")
or die(mysqli_error($conn));

header("Location: prilozi.php");
}
else

{
header("Location: prilozi.php");
}
?>