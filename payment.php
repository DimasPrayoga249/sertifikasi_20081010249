<!DOCTYPE html>
<html>

<head>
    <title>Form Upload Bukti Pembayaran</title>
    <!-- Tambahkan referensi ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <br>
        <a href="http://localhost/toko_alat_kesehatan1/">
            <h2 align="left">Back</h2>
        </a>
        <h2 class="mt-4">Form Upload Bukti Pembayaran</h2>
        <form method="post" action="proses_upload.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="order_id">ID Order:</label>
                <select class="form-control" name="order_id" required>
                    <option value="">Pilih ID Order</option> <!-- Opsi default -->
                    <?php
                    include("dbcon2.php");
                    // Query untuk mengambil data ID Order dari tabel whatastore_messages
                    $query = "SELECT id FROM whatastore_messages";
                    $result = $mysqli->query($query);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['id'] . '">' . $row['id'] . ' </option>';
                        }
                    }
                    // Tutup koneksi database
                    $mysqli->close();
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="payment_price">Payment Price:</label>
                <input type="text" class="form-control" name="payment_price" required>
            </div>
            <div class="form-group">
                <label for="payment_date">Payment Date:</label>
                <input type="date" class="form-control" name="payment_date" required>
            </div>
            <div class="form-group">
                <label for="picture">Picture (Upload Gambar):</label>
                <input type="file" class="form-control" name="picture" required>
            </div>
            <div class="form-group">
                <label for="transfer_from">Transfer From:</label>
                <input type="text" class="form-control" name="transfer_from" required>
            </div>
            <div class="form-group">
                <label for="transfer_to">Transfer To:</label>
                <input type="text" class="form-control" name="transfer_to" required>
            </div>
            <div class="form-group">
                <label for="transfer_to_account_no">Transfer To Account No:</label>
                <input type="text" class="form-control" name="transfer_to_account_no" required>
            </div><br>
            <center>
                <button type="submit" class="btn btn-primary" name="submit" style="width: 100%;">Upload</button>
            </center>
        </form>
        <br><br><br><br><br>
    </div>

    <!-- Tambahkan referensi ke Bootstrap JS (optional) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>