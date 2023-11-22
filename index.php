<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Toko</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5"></div>
        <h2>List Pelanggan</h2>
        <a class="btn btn-primary" href="\uts\create.php" role="button">Pelanggan Baru</a> 
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th>Nomor hp</th>
                    <th>Alamat</th>
                    <th>Dibuat Dari</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "uts";

                $connection = new mysqli($servername, $username, $password, $database);
                if ($connection->connect_error) {
                    die("Koneksi gagal: ". $connection->connect_error);
                }

                $sql = "SELECT * FROM pelanggan";
                $result = $connection->query($sql);
                if (!$result) {
                    die("Query tidak valid: ". $connection->error);
                }
                
                while($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[nama]</td>
                        <td>$row[jenis_kelamin]</td>
                        <td>$row[email]</td>
                        <td>$row[no_hp]</td>
                        <td>$row[alamat]</td>
                        <td>$row[dibuat_dari]</td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
</body>
</html>