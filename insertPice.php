<?php
function valid($idpice,$naziv, $cijena, $error)
{
?>
<HTML>
<HEAD>
<TITLE> Restoran Otoka</TITLE>
<style type="text/css">
body {
    background-image: url("pozadina2.jpg");
	background-repeat:no-repeat;
    background-position:center;
    background-attachment: fixed;
}
</style>
</HEAD>
<BODY >
<?php

if ($error != '')
{
echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
}
?>

<br/>
<br/>
<center>
<FORM METHOD=POST ACTION="">
<TABLE border="0" cellpadding="2" cellspacing="5">
<TR height="50" > 
<TD colspan="2"><center><b>Unesi piće<b><center></TD>
</TR>

<TR> <TD>Id</TD> <TD><input name="idpice" type="text" value="<?php echo $idpice; ?>"></TD> </TR>

<TR> <TD>Naziv</TD> <TD><input name="naziv" type="text" value="<?php echo $naziv; ?>"></TD> </TR>

<TR> <TD >Cijena</TD> <TD><INPUT NAME="cijena" TYPE="text" VALUE="<?php echo $cijena; ?>"></TD> </TR>

</TABLE>
<br/>
<input name="submit" type="submit" value="Potvrdite unos">
</FORM></BODY></HTML>
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

$idpice = mysqli_real_escape_string($conn, $_POST['idpice']);
$naziv = mysqli_real_escape_string($conn, $_POST['naziv']);
$cijena = mysqli_real_escape_string($conn, $_POST['cijena']);

if ($idpice == '' || $naziv == '' || $cijena == '')
{

$error = 'Please enter the details!';

valid($idpice, $naziv, $cijena,$error);
}
else
{
mysqli_query($conn, "INSERT pice SET idpice = $idpice, naziv='$naziv', cijena='$cijena'")
or die(mysqli_error($conn));

header("Location: pice.php");
}
}
else
{
valid('','','','','');
}
?>