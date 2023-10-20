<!DOCTYPE html>
<html>

<head>
    <title>Form Registrasi</title>
    <!-- Tambahkan referensi ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <br>
        <a href="http://localhost/toko_alat_kesehatan1/">
            <h2 align="left">Back</h2>
        </a>
        <center>
            <h2 class="mt-4">Form Registrasi</h2>
        </center>
        <form method="post" action="proses_registrasi.php">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" class="form-control" name="full_name" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
                <label for="retype_password">Retype Password:</label>
                <input type="password" class="form-control" name="retype_password" required>
            </div>
            <div class="form-group">
                <label for="email">E-Mail:</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label for="date_of_birth">Date of Birth:</label>
                <input type="date" class="form-control" name="date_of_birth" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="gender" value="Male" required>
                    <label class="form-check-label">Male</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="gender" value="Female" required>
                    <label class="form-check-label">Female</label>
                </div>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" name="address" required></textarea>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" class="form-control" name="city" required>
            </div>
            <div class="form-group">
                <label for="contact_no">Contact No:</label>
                <input type="text" class="form-control" name="contact_no" required>
            </div>
            <div class="form-group">
                <label for="paypal_id">Pay-pal ID:</label>
                <input type="text" class="form-control" name="paypal_id" required>
            </div><br>
            <center>
                <button type="submit" class="btn btn-primary" name="submit" style="width: 100%;">Register</button>
            </center>
        </form>
        <br><br><br><br><br>
    </div>

    <!-- Tambahkan referensi ke Bootstrap JS (optional) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>