<?php
// Include the database connection
require_once 'connection.php';

// Get form data
$idkriteria = $_POST['idkriteria'];
$nmkriteria = $_POST['nmkriteria'];

// Insert data into kriteria table
$sql = "INSERT INTO kriteria (idkriteria, nmkriteria) VALUES ('$idkriteria', '$nmkriteria')";

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