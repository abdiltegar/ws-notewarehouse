<?php 
include '../config.php';

$query_barang = mysqli_query($koneksi, "SELECT ab.*, jb.nama_barang, jb.satuan, r.nama_ruangan FROM arus_barang AS ab LEFT JOIN jenis_barang AS jb ON ab.kode_barang = jb.kode_barang LEFT JOIN ruangan AS r ON ab.kode_ruangan = r.kode_ruangan WHERE ab.apakah_masuk = FALSE ORDER BY ab.tanggal DESC");
if(mysqli_num_rows($query_barang) > 0){
    $data = [];
    $i = 0;
    while ($data_barang = mysqli_fetch_assoc($query_barang)){
        $data['a'.$i]['id_arus'] = $data_barang['id_arus'];
        $data['a'.$i]['id_user'] = $data_barang['id_user'];
        $data['a'.$i]['kode_barang'] = $data_barang['kode_barang'];
        $data['a'.$i]['nama_barang'] = $data_barang['nama_barang'];
        $data['a'.$i]['satuan'] = $data_barang['satuan'];
        $data['a'.$i]['kode_ruangan'] = $data_barang['kode_ruangan'];
        $data['a'.$i]['nama_ruangan'] = $data_barang['nama_ruangan'];
        $data['a'.$i]['jumlah'] = $data_barang['jumlah'];
        $data['a'.$i]['tanggal'] = date('Y-m-d',strtotime($data_barang['tanggal']));
        $data['a'.$i]['apakah_masuk'] = $data_barang['apakah_masuk'];
        $i++;
    }
    $respon['status'] = 1;
    $respon['data'] = $data;
    $respon['message'] = "";
}else{
    $respon['status'] = 0;
    $respon['data'] = [];
    $respon['message'] = "Tidak ada data barang keluar";
}
echo json_encode($respon);
?>