<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama_tim   = htmlspecialchars($_POST["nama_tim"]);
    $anggota    = htmlspecialchars($_POST["anggota_tim"]);
    $bidang     = isset($_POST["bidang"]) ? implode(", ", $_POST["bidang"]) : "-";
    $instansi   = htmlspecialchars($_POST["instansi"]);
    $telepon    = htmlspecialchars($_POST["telepon"]);
    $email      = htmlspecialchars($_POST["email"]);

    // Email tujuan (GANTI dengan emailmu sendiri)
    $to = "emailkamu@domain.com";
    $subject = "Pendaftaran Lomba Drone - $nama_tim";
    $message = "
    Nama Tim     : $nama_tim\n
    Nama Anggota : $anggota\n
    Bidang Lomba : $bidang\n
    Instansi     : $instansi\n
    Telepon      : $telepon\n
    Email        : $email\n
    ";
    $headers = "From: noreply@domain.com\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Kirim email
    if (mail($to, $subject, $message, $headers)) {
        echo "<h2>✅ Terima kasih, pendaftaran berhasil dikirim!</h2>";
    } else {
        echo "<h2>❌ Maaf, pendaftaran gagal. Silakan coba lagi.</h2>";
    }
}
?>
