<form method="post" action="">
    <label for="nama_karyawan">Nama Karyawan:</label>
    <select name="nama_karyawan" id="nama_karyawan">
        <!-- Anda bisa mengambil data nama karyawan dari database dan menampilkannya di sini -->
        <option value="John Doe">John Doe</option>
        <option value="Jane Smith">Jane Smith</option>
    </select>

    <button type="submit">Cari Laporan</button>
</form>


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];

    // Query untuk mendapatkan laporan berdasarkan bulan dan tahun yang dipilih
    $sql = "SELECT nama_karyawan, tanggal_lembur, SUM(total_jam) AS total_jam
            FROM laporan_lembur
            WHERE MONTH(tanggal_lembur) = '$bulan' AND YEAR(tanggal_lembur) = '$tahun'
            GROUP BY nama_karyawan, tanggal_lembur";
    $result = $conn->query($sql);
}