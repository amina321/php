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
$result = mysqli_query($conn, "SELECT * FROM kupac")
or die(mysqli_error());

$niz = array("Prelijep restoran, odlična hrana", "Prijatna atmosfera i odlična usluga uz odličnu hranu učine da posjeta ovom restoranu ostane u najljepšem sjećanju.", "");
$arrlength = count($niz);


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
            margin-top: 90px;
        }
    </style>
</head>

<body>
    
    <!--<div class="mlogo">
    <img src="meni.png">
    </div>-->
    
    <a href="pocetna.html"><img src="home.png" width="30" height="30"></a> 

    <center>
    <table border="1" bgcolor="white">
        <tr>
            <td>
              <font size="4"> Komentari gostiju: </font> 
            </td>
        </tr>
    </table>

    
    <table border="1" width="50%" bgcolor="white">
    <tr>
        <?php
        while($row=mysqli_fetch_array($result)){
            echo "<tr>";
            echo '<td width="30%"><center><b><font size="4">' . $row['ime'] . ' '.$row['prezime'].'</font></b></td>';
            echo '<td width="40%"><center><b><font size="4">' . $row['adresa'] . ', '.$row['grad']. '</font></b></td>';
             echo '<td width="50%"><center><b><font size="3">' .$niz[0] .'</font></b></td>';
            echo "</tr>";

        }
        ?>  
    </tr>



</body>
</html>