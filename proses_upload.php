<?php
// Konfigurasi database
include("dbcon2.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST["order_id"];
    $payment_price = $_POST["payment_price"];
    $payment_date = $_POST["payment_date"];
    $transfer_from = $mysqli->real_escape_string($_POST["transfer_from"]);
    $transfer_to = $mysqli->real_escape_string($_POST["transfer_to"]);
    $transfer_to_account_no = $_POST["transfer_to_account_no"];

    // Mengunggah gambar bukti pembayaran
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["picture"]["name"]);
    if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
        $picture = $target_file;

        // Menyimpan data pembayaran ke database
        $stmt = $mysqli->prepare("INSERT INTO payments (order_id, payment_price, payment_date, picture, transfer_from, transfer_to, transfer_to_account_no) VALUES (?, ?, ?, ?, ?, ?, ?)");

        if ($stmt) {
            $stmt->bind_param("idsssss", $order_id, $payment_price, $payment_date, $picture, $transfer_from, $transfer_to, $transfer_to_account_no);

            if ($stmt->execute()) {
                echo "Bukti pembayaran berhasil diunggah!";
            } else {
                echo "Error: " . $stmt->error;
            }
        } else {
            echo "Error: " . $mysqli->error;
        }

        $stmt->close();
    } else {
        echo "Gagal mengunggah gambar bukti pembayaran.";
    }

    $mysqli->close();
}
?>
