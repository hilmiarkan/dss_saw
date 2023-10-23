<?php
// Include the database connection
require_once 'connection.php';

// Get form data
$idbobot = $_POST['idbobot'];
$idkriteria = $_POST['idkriteria'];
$value = $_POST['value'];

// Insert data into bobot table
$sql = "INSERT INTO bobot (idbobot, idkriteria, value) VALUES ('$idbobot', '$idkriteria', '$value')";

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