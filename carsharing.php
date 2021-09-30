<?php
$targa = $_POST["targa"];
$marca = $_POST["marca"];
$modello = $_POST["modello"];
$costo = $_POST["costo"];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $stmt = $conn->prepare("INSERT INTO auto (Targa, Marca, Modello, Costo_Giornaliero)
    VALUES (:targa, :marca, :modello, :costo)");
    $stmt->bindParam(':targa', $targa);
    $stmt->bindParam(':marca', $marca);
    $stmt->bindParam(':modello', $modello);
    $stmt->bindParam(':costo', $costo);

    $stmt->execute();
    echo "inserimento avvenuto <br>";
  }
  catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }

foreach ($conn->query("SELECT targa, marca, modello, costo_giornaliero FROM auto") as $row)
{
  echo $row['targa'] ." ". $row['marca'] ." ". $row['modello'] ." ". $row['costo_giornaliero'] ."<br />";
}

?>
