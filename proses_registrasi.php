<?php
include("dbcon2.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $mysqli->real_escape_string($_POST["username"]);
    $full_name = $mysqli->real_escape_string($_POST["full_name"]);
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT); // Hash password
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $date_of_birth = $mysqli->real_escape_string($_POST["date_of_birth"]);
    $gender = $mysqli->real_escape_string($_POST["gender"]);
    $address = $mysqli->real_escape_string($_POST["address"]);
    $city = $mysqli->real_escape_string($_POST["city"]);
    $contact_no = $mysqli->real_escape_string($_POST["contact_no"]);
    $paypal_id = $mysqli->real_escape_string($_POST["paypal_id"]);

    if (password_verify($_POST["retype_password"], $password)) { // Verifikasi password dengan hash
        $stmt = $mysqli->prepare("INSERT INTO registrations (username, full_name, password, email, date_of_birth, gender, address, city, contact_no, paypal_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        if ($stmt) {
            $stmt->bind_param("ssssssssss", $username, $full_name, $password, $email, $date_of_birth, $gender, $address, $city, $contact_no, $paypal_id);

            if ($stmt->execute()) {
                echo "Registrasi berhasil! Data telah disimpan dalam database.";
            } else {
                echo "Error: " . $stmt->error;
            }
        } else {
            echo "Error: " . $mysqli->error;
        }

        $stmt->close();
    } else {
        echo "Password dan Retype Password tidak cocok. Silakan coba lagi.";
    }

    $mysqli->close();
}
?>