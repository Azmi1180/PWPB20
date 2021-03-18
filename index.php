<?php
    include 'lib/library.php';

    cekLogin();

    $sql = 'SELECT * FROM siswa';

    // Searching
    $search = @$_GET['search'];
    if (!empty($search)) $sql .= " WHERE nis LIKE '%$search%' OR nama_lengkap LIKE '%$search%' OR jenis_kelamin LIKE '%$search%' OR kelas LIKE '%$search%' OR jurusan LIKE '%$search%' ";

    // Ordering
    $order_field = @$_GET['sort'];  // Mengambil Field yang akan di order.
    $order_mode = @$_GET['order'];  // Mengambil modenya, Ascending atau Descending.

    if (!empty($order_field) && !empty($order_mode)) $sql .= " ORDER BY $order_field $order_mode";

    $listSiswa = $mysqli ->query($sql);

    include 'views/v_index.php';
?>