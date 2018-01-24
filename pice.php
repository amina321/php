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
$result = mysqli_query($conn, "SELECT * FROM pice")
or die(mysqli_error());

?>

<html>
<head>
    <title>Restoran Otoka</title>
    <meta charset="utf-8" />
    <style type="text/css">
body {
    background-image: url("pozadina6.jpg");
	background-repeat:no-repeat;
    background-position:center;
    background-attachment: fixed;
}

img{
    margin-top: 3%;
    margin-left: 3%;
}
</style>
</head>

<body>

    <div class="pocetna">
       <a href="pocetna.html"><img src="home.png" width="30" height="30"></a> 
    </div>
    
 	<center>   
    <table border="1" width="50%" bgcolor="white">
    <tr>
    <br/>
        <?php
		echo "<center>";
        echo "<tr>
            <th><font size='6' color='#533930'>Naziv</font></th>
            <th><font size='6' color='#533930'>Cijena</font></th>
            </tr>";
        while($row=mysqli_fetch_array($result)){
        	echo "<tr>";
			echo '<td width="30%"><b><font size="4">' . $row['naziv'] . '</b></td>';
			echo '<td width="30%"><center><b><font size="4">' . $row['cijena'] . '</b></td>';
            echo '<td width="10%"><center><b><font color="#663300"><a href="editPice.php?idpice=' . $row['idpice'] . '">Izmijeni</a></font></b></td>';
            echo '<td width="10%"><center><b><font color="#663300"><a href="brisanjePice.php?idpice=' . $row['idpice'] . '">Obriši</a></font></b></td>';
			echo "</tr>";
        }
        echo '<p><a href="insertPice.php"><font size="5">Dodaj</font></a></p>';
        ?> 

    <!--<div class="footer">
            <!--<ul>
            <li><a href="index.html">Početna</a>|</li>
            <li><a href="onama.html">O nama</a>|</li>
            <li><a href="lokacija.html">Lokacija</a>|</li>
            <li><a href="kontakt.html">Kontakt</a></li>
        </ul>-->
       <!-- <div class="copyright">
            <p style="color:black">
                Copyright © Restoran
                <br />
                Sva prava zadržana. Zabranjeno preuzimanje sadržaja bez dozvole izdavača.
            </p>
        </div>
    </div>
    <canvas id="canvas"></canvas>-->

</body>
</html>