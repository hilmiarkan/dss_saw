<?php
// include the connection file
include 'connection.php';

// query to select data from alternatif table
$query_alternatif = "SELECT * FROM alternatif";
$result_alternatif = mysqli_query($conn, $query_alternatif);

// query to select data from bobot table
$query_bobot = "SELECT * FROM bobot";
$result_bobot = mysqli_query($conn, $query_bobot);

// query to select data from kriteria table
$query_kriteria = "SELECT * FROM kriteria";
$result_kriteria = mysqli_query($conn, $query_kriteria);

// query to select data from skala table
$query_skala = "SELECT * FROM skala";
$result_skala = mysqli_query($conn, $query_skala);

// query to select data from matrixkeputusan table
$query_matrixkeputusan = "SELECT * FROM matrixkeputusan";
$result_matrixkeputusan = mysqli_query($conn, $query_matrixkeputusan);



?>

<!DOCTYPE html>
<html>

<head>
    <title>DSS SAW</title>
    <style>
        table {
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>

    <h1>DSS SAW</h1>


    <!-- alternatif table -->
    <div style="display: flex;">
        <div style="flex: 1;">
            <table>
                <thead>
                    <tr>
                        <th>ID Alternatif</th>
                        <th>Nama Alternatif</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result_alternatif)) { ?>
                        <tr>
                            <td><?php echo $row['idalternatif']; ?></td>
                            <td><?php echo $row['nmalternatif']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div style="border: 1px solid black; padding: 10px;">
            <h3>Add New Data to Alternatif Table</h3>
            <form method="POST" action="add_alternatif.php">
                <label for="idalternatif">ID Alternatif:</label>
                <?php
                // Fetch the next available ID number from the alternatif table
                $sql = "SELECT MAX(idalternatif) AS max_id FROM alternatif";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $next_id = $row['max_id'] + 1;
                ?>
                <input type="text" name="idalternatif" id="idalternatif" value="<?php echo $next_id; ?>" readonly>
                <br><br>
                <label for="nmalternatif">Nama Alternatif:</label>
                <input type="text" name="nmalternatif" id="nmalternatif" required>
                <br><br>
                <input type="submit" name="submit_alternatif" value="Submit">
            </form>
        </div>
    </div>

    <!-- bobot table -->
    <div style="display: flex;">
        <div style="flex: 1;">
            <table>
                <thead>
                    <tr>
                        <th>ID Bobot</th>
                        <th>ID Kriteria</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result_bobot)) { ?>
                        <tr>
                            <td><?php echo $row['idbobot']; ?></td>
                            <td><?php echo $row['idkriteria']; ?></td>
                            <td><?php echo $row['value']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div style="border: 1px solid black; padding: 10px;">
            <h3>Add New Data to Bobot Table</h3>
            <form method="POST" action="add_bobot.php">
                <label for="idbobot">ID Bobot:</label>
                <?php
                // Fetch the next available ID number from the bobot table
                $sql = "SELECT MAX(idbobot) AS max_id FROM bobot";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $next_id = $row['max_id'] + 1;
                ?>
                <input type="text" name="idbobot" id="idbobot" value="<?php echo $next_id; ?>" readonly>
                <br><br>
                <label for="idkriteria">ID Kriteria:</label>
                <select name="idkriteria" id="idkriteria" required>
                    <?php
                    // Fetch idkriteria values from kriteria table
                    $sql = "SELECT idkriteria FROM kriteria";
                    $result = $conn->query($sql);

                    // Output dropdown options
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['idkriteria'] . "'>" . $row['idkriteria'] . "</option>";
                        }
                    }
                    ?>
                </select>
                <br><br>
                <label for="value">Value:</label>
                <input type="text" name="value" id="value" required>
                <br><br>
                <input type="submit" name="submit_bobot" value="Submit">
            </form>
        </div>
    </div>


    <!-- kriteria table -->
    <div style="display: flex;">
        <div style="flex: 1;">
            <table>
                <thead>
                    <tr>
                        <th>ID Kriteria</th>
                        <th>Nama Kriteria</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result_kriteria)) { ?>
                        <tr>
                            <td><?php echo $row['idkriteria']; ?></td>
                            <td><?php echo $row['nmkriteria']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div style="border: 1px solid black; padding: 10px;">
            <h3>Add New Data to Kriteria Table</h3>
            <form method="POST" action="add_kriteria.php">
                <label for="idkriteria">ID Kriteria:</label>
                <?php
                // Fetch the next available ID number from the kriteria table
                $sql = "SELECT MAX(idkriteria) AS max_id FROM kriteria";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $next_id = $row['max_id'] + 1;
                ?>
                <input type="text" name="idkriteria" id="idkriteria" value="<?php echo $next_id; ?>" readonly>
                <br><br>
                <label for="nmkriteria">Nama Kriteria:</label>
                <input type="text" name="nmkriteria" id="nmkriteria" required>
                <br><br>
                <input type="submit" name="submit_kriteria" value="Submit">
            </form>
        </div>
    </div>

    <!-- skala table -->
    <div style="display: flex;">
        <div style="flex: 1;">
            <table>
                <thead>
                    <tr>
                        <th>ID Skala</th>
                        <th>Value</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result_skala)) { ?>
                        <tr>
                            <td><?php echo $row['idskala']; ?></td>
                            <td><?php echo $row['value']; ?></td>
                            <td><?php echo $row['keterangan']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div style="border: 1px solid black; padding: 10px;">
            <h3>Add New Data to Skala Table</h3>
            <form method="POST" action="add_skala.php">
                <label for="idskala">ID Skala:</label>
                <?php
                // Fetch the next available ID number from the skala table
                $sql = "SELECT MAX(idskala) AS max_id FROM skala";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $next_id = $row['max_id'] + 1;
                ?>
                <input type="text" name="idskala" id="idskala" value="<?php echo $next_id; ?>" readonly>
                <br><br>
                <label for="value">Value:</label>
                <?php
                // Fetch the next available value from the skala table
                $sql = "SELECT MAX(value) AS max_value FROM skala";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $next_value = $row['max_value'] + 1;
                ?>
                <input type="text" name="value" id="value" value="<?php echo $next_value; ?>" readonly>
                <br><br>
                <label for="keterangan">Keterangan:</label>
                <input type="text" name="keterangan" id="keterangan" required>
                <br><br>
                <input type="submit" name="submit_skala" value="Submit">
            </form>
        </div>
    </div>

    <!-- matrixkeputusan table -->
    <div style="display: flex;">
        <div style="flex: 1;">
            <table>
                <thead>
                    <tr>
                        <th>ID Matrix</th>
                        <th>ID Alternatif</th>
                        <th>ID Bobot</th>
                        <th>ID Skala</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result_matrixkeputusan)) { ?>
                        <tr>
                            <td><?php echo $row['idmatrix']; ?></td>
                            <td><?php echo $row['idalternatif']; ?></td>
                            <td><?php echo $row['idbobot']; ?></td>
                            <td><?php echo $row['idskala']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div style="border: 1px solid black; padding: 10px;">
            <h3>Add New Data to Matrixkeputusan Table</h3>
            <form method="POST" action="add_matrixkeputusan.php">
            <label for="idmatrix">ID Matrix:</label>
                <input type="text" name="idmatrix" id="idmatrix" required>
                <br><br>
                <label for="idalternatif">ID Alternatif:</label>
                <input type="text" name="idalternatif" id="idalternatif" required>
                <br><br>
                <label for="idbobot">ID Bobot:</label>
                <input type="text" name="idbobot" id="idbobot" required>
                <br><br>
                <label for="idskala">ID Skala:</label>
                <input type="text" name="idskala" id="idskala" required>
                <br><br>
                <input type="submit" name="submit_matrixkeputusan" value="Submit">
            </form>
        </div>
    </div>








    <!-- nilaimax view!! -->
    <table>
        <thead>
            <tr>
                <th>ID Kriteria</th>
                <th>Nama Kriteria</th>
                <th>Maksimum</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query_nilaimax = "SELECT * FROM nilaimax";
            $result_nilaimax = mysqli_query($conn, $query_nilaimax);
            while ($row = mysqli_fetch_assoc($result_nilaimax)) { ?>
                <tr>
                    <td><?php echo $row['idkriteria']; ?></td>
                    <td><?php echo $row['nmkriteria']; ?></td>
                    <td><?php echo $row['maksimum']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- vmatrixkeputusan view!! -->
    <table>
        <thead>
            <tr>
                <th>ID Matrix</th>
                <th>ID Alternatif</th>
                <th>Nama Alternatif</th>
                <th>ID Kriteria</th>
                <th>Nama Kriteria</th>
                <th>ID Bobot</th>
                <th>Value</th>
                <th>Nilai</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query_vmatrixkeputusan = "SELECT * FROM vmatrixkeputusan";
            $result_vmatrixkeputusan = mysqli_query($conn, $query_vmatrixkeputusan);
            while ($row = mysqli_fetch_assoc($result_vmatrixkeputusan)) { ?>
                <tr>
                    <td><?php echo $row['idmatrix']; ?></td>
                    <td><?php echo $row['idalternatif']; ?></td>
                    <td><?php echo $row['nmalternatif']; ?></td>
                    <td><?php echo $row['idkriteria']; ?></td>
                    <td><?php echo $row['nmkriteria']; ?></td>
                    <td><?php echo $row['idbobot']; ?></td>
                    <td><?php echo $row['value']; ?></td>
                    <td><?php echo $row['nilai']; ?></td>
                    <td><?php echo $row['keterangan']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- vnormalisasi view!! -->
    <table>
        <thead>
            <tr>
                <th>ID Matrix</th>
                <th>ID Alternatif</th>
                <th>Nama Alternatif</th>
                <th>ID Kriteria</th>
                <th>Nama Kriteria</th>
                <th>ID Bobot</th>
                <th>Value</th>
                <th>Nilai</th>
                <th>Keterangan</th>
                <th>Normalisasi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query_vnormalisasi = "SELECT * FROM vnormalisasi";
            $result_vnormalisasi = mysqli_query($conn, $query_vnormalisasi);
            while ($row = mysqli_fetch_assoc($result_vnormalisasi)) { ?>
                <tr>
                    <td><?php echo $row['idmatrix']; ?></td>
                    <td><?php echo $row['idalternatif']; ?></td>
                    <td><?php echo $row['nmalternatif']; ?></td>
                    <td><?php echo $row['idkriteria']; ?></td>
                    <td><?php echo $row['nmkriteria']; ?></td>
                    <td><?php echo $row['idbobot']; ?></td>
                    <td><?php echo $row['value']; ?></td>
                    <td><?php echo $row['nilai']; ?></td>
                    <td><?php echo $row['keterangan']; ?></td>
                    <td><?php echo $row['normalisasi']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- vparangking view -->
    <table>
        <thead>
            <tr>
                <th>ID Matrix</th>
                <th>ID Alternatif</th>
                <th>Nama Alternatif</th>
                <th>ID Kriteria</th>
                <th>Nama Kriteria</th>
                <th>ID Bobot</th>
                <th>Value</th>
                <th>Nilai</th>
                <th>Keterangan</th>
                <th>Normalisasi</th>
                <th>Prarangking</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query_vparangking = "SELECT * FROM vprarangking";
            $result_vparangking = mysqli_query($conn, $query_vparangking);
            while ($row = mysqli_fetch_assoc($result_vparangking)) { ?>
                <tr>
                    <td><?php echo $row['idmatrix']; ?></td>
                    <td><?php echo $row['idalternatif']; ?></td>
                    <td><?php echo $row['nmalternatif']; ?></td>
                    <td><?php echo $row['idkriteria']; ?></td>
                    <td><?php echo $row['nmkriteria']; ?></td>
                    <td><?php echo $row['idbobot']; ?></td>
                    <td><?php echo $row['value']; ?></td>
                    <td><?php echo $row['nilai']; ?></td>
                    <td><?php echo $row['keterangan']; ?></td>
                    <td><?php echo $row['normalisasi']; ?></td>
                    <td><?php echo $row['prarangking']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- vrangking view -->
    <table>
        <thead>
            <tr>
                <th>ID Alternatif</th>
                <th>Nama Alternatif</th>
                <th>Rangking</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query_vrangking = "SELECT * FROM vrangking";
            $result_vrangking = mysqli_query($conn, $query_vrangking);
            while ($row = mysqli_fetch_assoc($result_vrangking)) { ?>
                <tr>
                    <td><?php echo $row['idalternatif']; ?></td>
                    <td><?php echo $row['nmalternatif']; ?></td>
                    <td><?php echo $row['rangking']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>