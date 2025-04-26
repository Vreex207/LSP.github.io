<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diskon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">


                <h2 class="text-center">Aplikasi Perhitungan Diskon</h2>
                <form method="POST" class="border rounded bg-light p-4">
                    <div class="mb-3">
                        <label class="form-label">Harga Barang (Rp)</label>
                        <input type="number" name="harga" class="form-control" step="0.01"
                            placeholder="Masukan harga barang" min="0" required
                            onkeypress="return event.charCode >= 48 && event.charCode <=57">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Diskon (%)</label>
                        <input type="text" maxlength="3" name="diskon" class="form-control" step="0.01"
                            placeholder="Masukan Diskon (0-100)" min="0" required
                            onkeypress="return event.charCode >= 48 && event.charCode <=57">
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-2" name="hitung">Hitung</button>
                </form>

                <?php
                if (isset($_POST['hitung'])) {
                    $harga = $_POST['harga'];
                    $diskon = $_POST['diskon'];

                    if ($harga < 0) {
                        echo "<script>alert('Harga tidak boleh negatif!')</script>";
                    } elseif ($diskon < 0 || $diskon > 100) {
                        echo "<script>alert('Diskon harus diantara anga 0-100!')</script>";
                    } else {
                        $nilai_diskon = $harga * ($diskon / 100);
                        $total_harga = $harga - $nilai_diskon; ?>
                        <div class="border rounded p-2 bg-light mt-2">
                            <p>Harga Barang : Rp. <b> <?php echo number_format($harga, 2, ',', '.') ?></p>
                            <p>Diskon <?php echo $diskon ?>% : Rp. <b> <?php echo number_format($nilai_diskon, 2, ',', '.') ?></p>
                            <p>Total Harga setelah diskon : Rp. <b> <?php echo number_format($total_harga, 2, ',', '.') ?></p>
                        </div>

                <?php }
                }
                ?>

            </div>
        </div>
    </div>

    <p class="text-center">&copy; LSP 2025 | Al Hadid | XII RPL 1</p>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>