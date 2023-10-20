<!DOCTYPE html>
<html>

<head>
    <title>Form Ulasan</title>
    <!-- Tambahkan Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <br>
        <a href="http://localhost/toko_alat_kesehatan1/">
            <h2 align="left">Back</h2>
        </a>
        <center>
            <h1>Masukkan Ulasan Anda</h1>
        </center>
        <form action="submit_review.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="user_id">ID Pengguna:</label>
                <select class="form-control" name="user_id" required>
                    <option value="">Pilih ID Pengguna</option>
                    <?php
                    include("dbcon2.php");
                    $query = "SELECT id FROM registrations";
                    $result = $mysqli->query($query);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['id'] . '">' . $row['id'] . '</option>';
                        }
                    }
                    $mysqli->close();
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="order_id">ID Pesanan:</label>
                <select class="form-control" name="order_id" required>
                    <option value="">Pilih ID Order</option>
                    <?php
                    include("dbcon2.php");
                    $query = "SELECT id FROM whatastore_messages";
                    $result = $mysqli->query($query);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['id'] . '">' . $row['id'] . '</option>';
                        }
                    }
                    $mysqli->close();
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="rating">Rating (1-5):</label>
                <input type="number" class="form-control" name="rating" id="rating" min="1" max="5" required>
            </div>

            <div class="form-group">
                <label for="comment">Ulasan:</label>
                <textarea class="form-control" name="comment" id="comment" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="product_image">Gambar Produk:</label>
                <input type="file" class="form-control" name="product_image" id="product_image" accept="image/*" required>
            </div><br>

            <center>
                <button type="submit" class="btn btn-primary" style="width: 100%;">Kirim Ulasan</button>
            </center>
        </form>
    </div>

    <!-- Tambahkan Bootstrap JS dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>