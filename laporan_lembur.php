<?php
$servername = "localhost";
$username = "root";  // ganti dengan username MySQL Anda
$password = "";  // ganti dengan password MySQL Anda
$dbname = "lembur_karyawan";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, nama_karyawan, tanggal_lembur, jam_mulai, jam_selesai, total_jam, keterangan FROM laporan_lembur";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Nama Karyawan</th><th>Tanggal Lembur</th><th>Jam Mulai</th><th>Jam Selesai</th><th>Total Jam</th><th>Keterangan</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nama_karyawan"]. "</td><td>" . $row["tanggal_lembur"]. "</td><td>" . $row["jam_mulai"]. "</td><td>" . $row["jam_selesai"]. "</td><td>" . $row["total_jam"]. "</td><td>" . $row["keterangan"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>