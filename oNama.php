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
$result = mysqli_query($conn, "SELECT * FROM dodatni_podaci")
or die(mysqli_error());

while($row=mysqli_fetch_array($result))
    {
        $info['ime_vlasnika'] = $row['ime_vlasnika'];
        $info['prezime_vlasnika'] = $row['prezime_vlasnika'];
        $info['adresa']=$row['adresa'];
        $info['telefon']=$row['telefon'];
        $info['email']=$row['email'];
    }

?>

<html>
<head>
    <title>Restoran Otoka</title>
    <meta charset="utf-8" />
    <link href="restoran.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        p{
            text-align: justify;
            padding: 5px;
        }
        table{
            margin-top: 100px;
        }
    </style>
</head>

<body>
    
    <!--<div class="mlogo">
    <img src="meni.png">
    </div>-->
    

    <center>
    <table border="1" bgcolor="white">
    <tr>
        <td width="500">
            <p><font size="5">Restoran "Otoka" je smješten u ulici Majdanska br.11 u Sarajevu. Svojim intimnim ambijentom, vrhunski uređenim enterijerom, biranim jelima i pićima, oduševljava goste koji se uvijek rado vraćaju. Restoran je otvoren 1980. godine. <br/><br/>U ponudi se mogu naći različiti specijaliteti koji su pravi primjer tradicionalnog i savremenog. Tradicija savršenih kulinarskih specijaliteta traje više od 30 godina.<br/><br/> <center><i>Očekujemo vas!</i><center> <br>
            <center><img src="vrijeme.ico" width="18" height="18"> pon-sub: 09:00 - 23:00</center>
            </font></p>
        </td>
    </tr>
    </table>
	<br/>
    <?php
        echo "<font size='5'>Vlasnik: </font>";
        echo '<font size="5">'.$info['ime_vlasnika']. ' '.$info['prezime_vlasnika']. '</font><br>';
    ?> 
    <br>
    <a href="pocetna.html"><img src="home.png" width="20" height="20"></a>
    <?php
        echo $info['adresa']. ', ';
    ?> 
    <img src="telefon.png" width="20" height="20">
    <?php
        echo $info['telefon']. ',';
    ?>
    <img src="mail.png" width="20" height="18">
    <?php
        echo $info['email'];
    ?>

</body>
</html>