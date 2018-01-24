<?php
function valid($idglavno_jelo,$naziv, $gramaza,$cijena, $error)
{
?>
<HTML>
<HEAD>
<TITLE> Restoran Otoka</TITLE>
<style type="text/css">
body {
    background-image: url("pozadina5.jpg");
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
<TD colspan="2"><center><b>Unesi glavno jelo<b><center></TD>
</TR>

<TR> <TD>Id</TD> <TD><input name="idglavno_jelo" type="text" value="<?php echo $idglavno_jelo; ?>"></TD> </TR>

<TR> <TD>Naziv</TD> <TD><input name="naziv" type="text" value="<?php echo $naziv; ?>"></TD> </TR>

<TR> <TD >Gramaza</TD> <TD><input name="gramaza" type="text" value="<?php echo $gramaza; ?>"></TD> </TR>

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

$idglavno_jelo = mysqli_real_escape_string($conn, $_POST['idglavno_jelo']);
$naziv = mysqli_real_escape_string($conn, $_POST['naziv']);
$gramaza = mysqli_real_escape_string($conn, $_POST['gramaza']);
$cijena = mysqli_real_escape_string($conn, $_POST['cijena']);

if ($idglavno_jelo == '' || $naziv == '' || $gramaza == '' || $cijena == '')
{

$error = 'Please enter the details!';

valid($idglavno_jelo, $naziv, $gramaza, $cijena,$error);
}
else
{
mysqli_query($conn, "INSERT glavno_jelo SET idglavno_jelo = $idglavno_jelo, naziv='$naziv', gramaza='$gramaza', cijena='$cijena'")
or die(mysqli_error($conn));

header("Location: glavnoJelo.php");
}
}
else
{
valid('','','','','');
}
?>