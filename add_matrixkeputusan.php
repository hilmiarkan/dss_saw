<?php
// Include the database connection
require_once 'connection.php';

// Get form data
$idmatrix = $_POST['idmatrix'];
$idalternatif = $_POST['idalternatif'];
$idbobot = $_POST['idbobot'];
$idskala = $_POST['idskala'];

// Insert data into matrixkeputusan table
$sql = "INSERT INTO matrixkeputusan (idmatrix, idalternatif, idbobot, idskala) VALUES ('$idmatrix', '$idalternatif', '$idbobot', '$idskala')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header('Location: index.php');
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>