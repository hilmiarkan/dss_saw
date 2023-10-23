<?php
// Include the database connection
require_once 'connection.php';

// Get form data
$idalternatif = $_POST['idalternatif'];
$nmalternatif = $_POST['nmalternatif'];

// Insert data into alternatif table
$sql = "INSERT INTO alternatif (idalternatif, nmalternatif) VALUES ('$idalternatif', '$nmalternatif')";

if ($conn->query($sql) === TRUE) {
    header('Location: index.php');
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>