<?php
// Include the database connection
require_once 'connection.php';

// Get form data
$idskala = $_POST['idskala'];
$value = $_POST['value'];
$keterangan = $_POST['keterangan'];

// Insert data into skala table
$sql = "INSERT INTO skala (idskala, value, keterangan) VALUES ('$idskala', '$value', '$keterangan')";

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