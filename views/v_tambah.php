<!DOCTYPE html>
<html>
<head>
    <title>PWPB</title>
    <link rel="stylesheet" type="text/css" href="assets/aldo.css">
</head>
<body>
    <?php
        $action = 'tambah.php';
        if (!empty($siswa)) $action = 'edit.php'
    ?>
    <form method="POST" enctype="multipart/form-data" action="<?= $action ?>">
        <div>
            <div >
                <span>Nis</span>
            </div>
            <input type="text" placeholder="Masukkan Nomor induk siswa" name="nis" value="<?= @$siswa['nis'] ?>" required>
        </div>
        <div>
            <div>
                <span>Nama Lengkap</span>
            </div>
            <input type="text" name="nama_lengkap" value="<?= @$siswa['nama_lengkap'] ?>" required>
        </div>
        <div>
            <label>
            <h5>jenis_kelamin :</h5>
            <input type="radio" name="jenis_kelamin" value="L" <?= @$siswa['jenis_kelamin'] == 'L' ? 'checked' : '' ?> required> Laki-laki
            </label>
            <label>
                <input type="radio" name="jenis_kelamin" value="P" <?= @$siswa['jenis_kelamin'] == 'P' ? 'checked' : '' ?>> Perempuan
            </label>
        </div>
        <div>
        <div>
            <label>Kelas</label>
        </div>
            <select class="custom-select" id="inputGroupSelect01" name="id_kelas" required>
                <option value="id_kelas">
                    <?php while($murid = @$dataKelas->fetch_array()) {?>
                        <option value="<?php echo $murid['id_kelas'] ?>" <?php echo @$siswa['kelas'] == $murid['id_kelas'] ? 'selected' : '' ?>> 
                            <?php echo $murid['nama_kelas'] ?>
                        </option>
                    <?php } ?>
                </option>
            </select>
        </div>
        <div>
            <div>
                <span>Jurusan</span>
            </div>
                <input type="text" placeholder="Masukkan Jurusan anda" name="jurusan" value="<?= @$siswa['jurusan']; ?>" required>
        </div>
        <div class="">
            <img src="<?= base_url();  ?>/assets/images/<?= @$siswa['foto'];?>" alt="">
            <input type="hidden" name="foto" value="<?= @$siswa['foto']; ?>">
            <input type="file" name="foto">
        </div>

        <button type="submit" value="Simpan">Simpan</button>
    </form>
    <a href="index.php">Kembali ke data</a>
    <script>
        const del = document.querySelector(".del");
        const overwrite = document.createElement("input");
        const inp = document.querySelector(".inp");
        if (del.value != '') {
            del.setAttribute("type", "hidden");
            overwrite.setAttribute("type", "text");
            overwrite.setAttribute("class", "form-control");
            overwrite.setAttribute("value", "<?= $siswa["nis"]; ?>");
            overwrite.setAttribute("disabled", "");
            inp.appendChild(overwrite);
        }
    </script>
</body>
</html>
