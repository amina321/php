<?php
function valid($idpredjelo, $naziv, $gramaza,$cijena, $error)
{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Restoran Otoka</title>
    <meta charset="utf-8" />
<style type="text/css">
body {
    background-image: url("pozadina1.jpg");
	background-repeat:no-repeat;
    background-position:center;
    background-attachment: fixed;
}
table{
	margin-top:10%;
}
</style>
</head>

<body>

<?php
if ($error != '')
{
echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
}
?>

<form action="" method="post">
<input type="hidden" name="idpredjelo" value="<?php echo $idpredjelo; ?>"/>

<center>
<table border="1" cellpadding="2" cellspacing="5">
<tr>
<br/>
<br/>
<td width="179"><b><font size="5" color='#663300'>Naziv<em></em></font></b></td>
<td><label>
<input type="text" name="naziv" value="<?php echo $naziv; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font size="5" color='#663300'>Gramaža<em></em></font></b></td>
<td><label>
<input type="text" name="gramaza" value="<?php echo $gramaza; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font size="5" color='#663300'>Cijena<em></em></font></b></td>
<td><label>
<input type="text" name="cijena" value="<?php echo $cijena; ?>" />
</label></td>
</tr>

<tr align="Right">
<td colspan="2"><label>
<center><input type="submit" name="submit" value="Edit"><center>
</label></td>
</tr>
</table>
</form>
</body>
</html>
<?php
}

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

if (isset($_POST['submit']))
{

if (is_numeric($_POST['idpredjelo']))
{

$idpredjelo = $_POST['idpredjelo'];
$naziv = mysqli_real_escape_string($conn, $_POST['naziv']);
$gramaza = mysqli_real_escape_string($conn, $_POST['gramaza']);
$cijena = mysqli_real_escape_string($conn, $_POST['cijena']);


if ($naziv == '' || $gramaza == '' || $cijena == '')
{

$error = 'ERROR: Please fill in all required fields!';


valid($idpredjelo, $naziv, $gramaza,$cijena, $error);
}
else
{

mysqli_query($conn, "UPDATE predjelo SET naziv='$naziv', gramaza='$gramaza' ,cijena='$cijena' WHERE idpredjelo='$idpredjelo'")
or die(mysqli_error($conn));

header("Location: predjelo.php");
}
}
else
{

echo 'Error!';
}
}
else

{

if (isset($_GET['idpredjelo']) && is_numeric($_GET['idpredjelo']) && $_GET['idpredjelo'] > 0)
{

$idpredjelo = $_GET['idpredjelo'];
$result = mysqli_query($conn, "SELECT * FROM predjelo WHERE idpredjelo=$idpredjelo")
or die(mysqli_error($conn));
$row = mysqli_fetch_array($result);

if($row)
{

$naziv = $row['naziv'];
$gramaza = $row['gramaza'];
$cijena = $row['cijena'];

valid($idpredjelo, $naziv, $gramaza,$cijena,'');
}
else
{
echo "No results!";
}
}
else

{
echo 'Error!';
}
}
?>