<!DOCTYPE html>
<html>
<head>
    <title>PWPB</title>
    <link rel="stylesheet" href="./assets/style.css">
    <link rel="shortcut icon" href="favicon.ico" href="assets/images/img5e96080a0802227705e96080a080cd_l.jpg" type="image/x-icon">  
    <script type="text/javascript" src="assets/media/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/media/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/media/plugins/toastr/toastr.min.js"></script>

    <link rel="stylesheet" href="assets/media/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="assets/media/css/bootstrap.min.css">
</head>
<body>
    <h1 class="centertext">Database Siswa</h1>
    <h2>Aksi yang bisa dilakukan</h2>
    <a class="btn add" href="tambah.php">Tambah Data</a>
    <a class="btn fright danger" href="logout.php">Log out</a>
    <form method="GET" action="index.php">
        Cari Berdasarkan NIS dan NAMA
        <input type="text" name="search" value="<?= @$search ?>">
        <button type="submit">Cari</button>    	
    </form>
    <form action="index.php">
        <div class="reset-container">
            <button class="reset-btn" type="submit">
                <a href="index.php">Reset List</a>
            </button>
        </div>
    </form>
    <h2>Data yang ada</h2>
    <table class="styleTable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">
                    NIS
                    <a href="index.php?sort=nis&order=asc">▲</a>
                    <a href="index.php?sort=nis&order=desc">▼</a>
                </th>
                <th scope="col">
                    Nama Lengkap
                    <a href="index.php?sort=nama_lengkap&order=asc">▲</a>
                    <a href="index.php?sort=nama_lengkap&order=desc">▼</a>
                </th>
                <th scope="col">
                    Gender
                    <a href="index.php?sort=jenis_kelamin&order=asc">▲</a>
                    <a href="index.php?sort=jenis_kelamin&order=desc">▼</a>
                </th>
                <th scope="col">
                    Kelas
                    <a href="index.php?sort=kelas&order=asc">▲</a>
                    <a href="index.php?sort=kelas&order=desc">▼</a>
                </th>
                <th scope="col">
                    Jurusan
                    <a href="index.php?sort=jurusan&order=asc">▲</a>
                    <a href="index.php?sort=jurusan&order=desc">▼</a>
                </th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1;
                while ($siswa = $listSiswa->fetch_array()) {
            ?>
            <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><?= $siswa['nis']; ?></td>    
                <td><?= $siswa['nama_lengkap']; ?></td>
                <td><?= $siswa['jenis_kelamin']; ?></td>
                <td><?= $siswa['nama_kelas']; ?></td>
                <td><?= $siswa['jurusan']; ?></td>                
                <td>
                    <a href="edit.php?nis=<?= $siswa["nis"]; ?>" class="btn btn-warning">Edit</a>
                    <a class="btn btn-danger btnDelete" href="delete.php?nis=<?= $siswa["nis"]; ?>">Delete</a></td>
                <td>
                    <?php if (!empty($siswa['file'])) { ?>
                        <img src="<?= base_url(); ?>/assets/images/<?= $siswa['file']; ?>" width="90px";>
                    <?php } else { ?>
                    <img width="90" height="90" src="assets/img/ava1.png">
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <br>

    <div class="modal fade" tabindex=:"-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" arial-label="Close" ><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-primary btnYa" name="button">Ya</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" name="button">Tidak</button>
          </div>
        </div>

      </div>

      <script type="text/javascript">
        console.log("ngetes");
            $(function() {
            $(".btnDelete").on("click", function(e) {
                e.preventDefault();
                var nama = $(this).parent().parent().children() [2];
                nama = $(nama).html();
                var tr = $(this).parent().parent();

                $(".modal").modal("show");
                $(".modal.title").html("Konfirmasi");
                $(".modal-body").html("Anda yakin ingin menghapus data <b>" + nama + "</b>?");

                var href = $(this).attr('href');

                $('.btnYa').off();
                $('.btnYa').on('click', function() {
                $.ajax({
                    'url' : href,
                    'type' : 'POST',
                    'success' : function(result) {
                    if(result == 1) {
                        $(".modal").modal("hide");
                        tr.fadeOut();
                        toastr.success("Data berhasil dihapus", "Informasi");
                    }
                    else {
                        $(".modal").modal("hide");
                        toastr.error("Data tidak bisa dihapus");
                    }
                    }
                })
                })
            })
            })
    </script>
</body>

</html>