<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi input (disesuaikan dengan kebutuhan Anda)
    $user_id = $_POST['user_id'];
    $order_id = $_POST['order_id'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];
    
    if (empty($user_id) || empty($order_id) || empty($rating) || empty($comment)) {
        echo "Harap isi semua kolom yang diperlukan.";
    } else {
        // Tangkap data dari berkas gambar
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
        $uploadOk = 1;

        // Periksa apakah berkas gambar atau bukan
        if (getimagesize($_FILES["product_image"]["tmp_name"]) === false) {
            echo "Berkas yang diunggah bukan gambar.";
            $uploadOk = 0;
        }

        // Simpan ulasan ke dalam database jika gambar sesuai dan validasi telah dilewati
        if ($uploadOk === 1) {
            include("dbcon2.php");

            // Lakukan insert ke database
            $insert_query = "INSERT INTO reviews (user_id, order_id, rating, comment, product_image) VALUES (?, ?, ?, ?, ?)";
            $stmt = $mysqli->prepare($insert_query);
            $stmt->bind_param("ssiss", $user_id, $order_id, $rating, $comment, $target_file);

            if ($stmt->execute()) {
                echo "Ulasan berhasil disimpan!";
            } else {
                echo "Terjadi kesalahan dalam penyimpanan ulasan.";
            }

            $stmt->close();
            $mysqli->close();
        }
    }
} else {
    echo "Akses tidak valid.";
}
?>
