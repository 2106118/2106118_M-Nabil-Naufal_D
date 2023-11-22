<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "uts";

$connection = new mysqli($servername, $username, $password, $database);

$nama = "";
$jenis_kelamin = "";
$email = "";
$no_hp = "";
$alamat = "";

$errorMessage = "";
$successMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST["nama"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $email = $_POST["email"];
    $no_hp = $_POST["no_hp"];
    $alamat = $_POST["alamat"];

    do {
        if ( empty($nama) || empty($jenis_kelamin) || empty($email) || empty($no_hp) || empty($alamat) ) {
            $errorMessage = "harus di isi semua jangan ada yang kosong!";
            break;
        } 
    
        $sql =  "INSERT INTO pelanggan (nama, jenis_kelamin, email, no_hp, alamat)" . 
                "VALUES ('$nama', '$jenis_kelamin', '$email', '$no_hp', '$alamat')"; 
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "invalid query: ". $connection->error;
            break;
        }
    
        $nama = "";
        $jenis_kelamin = "";
        $email = "";
        $no_hp = "";
        $alamat = "";

        $successMessage = "berhasil!";

        header("location: /uts/index.php");
        exit;

    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Toko</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Pelanggan Baru</h2>

        <?php
        if (!empty($errorMessage) ) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>

        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-6">
                    <label for="pria" class="radio-inline"><input type="radio" name="jenis_kelamin" value="pria"/>Pria</label>
                    <label for="wanita" class="radio-inline" ><input type="radio" name="jenis_kelamin" value="wanita"/>Wanita</label>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nomor hp</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="no_hp" value="<?php echo $no_hp; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="alamat" value="<?php echo $alamat; ?>">
                </div>
            </div>

            <?php
            if (!empty($successMessage) ) {
                echo "
                <div class= 'row mb-3'>
                    <div class='offset-sm-3 col-sm6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>    
                ";
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/uts/index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>