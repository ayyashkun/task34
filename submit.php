<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Buat string untuk disimpan ke file
    $data = "Name: $name\nEmail: $email\nMessage: $message\n\n";

    // Tentukan file tempat menyimpan data
    $file = 'contacts.txt';

    // Simpan data ke file
    if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX)) {
        // Redirect ke halaman sukses jika berhasil
        header("Location: success.html");
        exit();
    } else {
        echo "Failed to save data.";
    }
} else {
    // Redirect ke form jika diakses bukan melalui submit
    header("Location: index.html");
    exit();
}
?>
