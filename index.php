<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Perhitungan Diskon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Sticky Footer / Footer Tetep di Bawah */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* 100% tinggi layar */
            margin: 0;
            background-color: #e9ecef;
            }
        main {
            flex: 1; /* Main konten ngisi ruang */
            }
        footer {
            background-color: #dee2e6; 
            padding: 14px 10px;
            }
    </style>
</head>
<body>
    <main>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h2 class="text-center">Aplikasi Perhitungan Diskon</h2>
                    <form method="post" class="border rounded bg-light p-4">
                        <!-- input harga -->
                        <label class="form-label">Harga Barang (Rp)</label>
                        <input type="number" name="harga" class="form-control" step="0.01" 
                        placeholder="Masukkan Harga Barang" min="0" required autocomplete="off"
                        onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 13"> 
                        <!-- input diskon -->
                        <label class="form-label">Diskon (%)</label>
                        <input type="text" maxlength="3" name="diskon" class="form-control" 
                        step="0.01" placeholder="Masukkan Diskon" min="0" required autocomplete="off"
                        onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 13">
                        <!-- Tombol Hitung -->
                        <button type="submit" class="btn btn-primary w-100 mt-2" name="hitung">Hitung</button>
                    </form>
                    <!-- charCode berdasarkan kode ASCII -->
        <?php
            if(isset($_POST['hitung'])) {
                $harga = $_POST['harga'];
                $diskon = $_POST['diskon'];

                if($harga <= 0) {
                    echo "<script>alert('Harga tidak boleh 0 atau negatif !')</script>";
                }elseif($diskon < 0 || $diskon > 100) {
                    echo "<script>alert('Diskon harus diantara angka 0-100 !')</script>";
                }else{
                    $nilai_diskon = $harga * ($diskon / 100);
                    $total_harga = $harga - $nilai_diskon; 
                    ?> <!-- tutup php atas --> 
                    <div id="hasilCard" class="border rounded p-4 bg-light mt-2">
                        <p>Harga Barang : Rp. <b> <?php echo number_format($harga,0,'','.') ?> </b></p>
                        <p>Diskon <?php echo $diskon ?>% : Rp. <b> <?php echo number_format($nilai_diskon,0,'','.') ?> </b></p>
                        <p>Total Harga Setelah Diskon : Rp. <b> <?php echo number_format($total_harga,0,'','.') ?> </b></p>
                        <!-- parameter number_format 1angkaVar, 2angkaBelKoma, 3pemisahDes, 4pemisahRibu -->

                        <!-- Tombol Hapus -->
                        <button type="button" class="btn btn-danger w-100 mt-1" onclick="hapusHasil()">Hapus</button>
                    </div>
            <?php  }
            }
        ?> <!-- tutup php bawah -->
                </div>
            </div>
        </div>  
    </main>
    
    <footer>
        <p class="text-center mb-0">&copy; LSP APL 02 Junior Coder | Jafar Hamid Maulana | XII RPL 1</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function hapusHasil() {
        if (confirm("Apakah Anda yakin ingin menghapus hasil ini?")) {
            var hasil = document.getElementById('hasilCard');
            if (hasil) {
                hasil.style.transition = "opacity 0.5s ease"; // Animasi fade
                hasil.style.opacity = 0;
                setTimeout(function() {
                    hasil.remove();
                }, 500); // Hapus setelah animasi selesai
            }
        }
    }
    </script>
</body>
</html>
