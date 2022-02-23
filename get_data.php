<?php
    include 'koneksi.php';
    $i = 1;
    $query = "SELECT * FROM tbl_mahasiswa_search ORDER BY id DESC";
    $dewan1 = $db1->prepare($query);
    $dewan1->execute();
    $res1 = $dewan1->get_result();
    while ($row = $res1->fetch_assoc()) {
        $data[$i]['id'] = $row['id'];
        $data[$i]['nama_mahasiswa'] = $row['nama_mahasiswa'];
        $data[$i]['alamat'] = $row['alamat'];
        $data[$i]['jurusan'] = $row['jurusan'];
        $data[$i]['jenis_kelamin'] = $row['jenis_kelamin'];
        $data[$i]['tgl_masuk'] = $row['tgl_masuk'];

        $i++;
	} 

    $out = array_values($data);
    echo json_encode($out);
?>
