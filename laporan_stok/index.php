<?php 
include '../config.php';

$query_barang = mysqli_query($koneksi, "SELECT jb.* FROM jenis_barang AS jb WHERE jb.kode_barang IN (SELECT DISTINCT(kode_barang) as kode_barang FROM arus_barang) ORDER BY jb.nama_barang DESC");
if(mysqli_num_rows($query_barang) > 0){
    $data = [];
    $i = 0;
    while ($data_barang = mysqli_fetch_assoc($query_barang)){
        $data['a'.$i]['kode_barang'] = $data_barang['kode_barang'];
        $data['a'.$i]['nama_barang'] = $data_barang['nama_barang'];
        $data['a'.$i]['satuan'] = $data_barang['satuan'];
        $sum_masuk = 0;
        $sum_keluar = 0;

        $query_barang_masuk = mysqli_query($koneksi, "SELECT SUM(jumlah) as total FROM arus_barang WHERE kode_barang='".$data_barang['kode_barang']."' AND apakah_masuk = 1");
        while($row_barang_masuk = mysqli_fetch_assoc($query_barang_masuk)){
            $sum_masuk = $row_barang_masuk['total'];
        }
        $query_barang_keluar = mysqli_query($koneksi, "SELECT SUM(jumlah) as total FROM arus_barang WHERE kode_barang='".$data_barang['kode_barang']."' AND apakah_masuk = 0");
        while($row_barang_keluar = mysqli_fetch_assoc($query_barang_keluar)){
            $sum_keluar = $row_barang_keluar['total'];
        }

        $data['a'.$i]['jumlah'] = $sum_masuk - $sum_keluar;
        $i++;
    }
    $respon['status'] = 1;
    $respon['data'] = $data;
    $respon['message'] = "";
}else{
    $respon['status'] = 0;
    $respon['data'] = [];
    $respon['message'] = "Tidak ada data barang masuk";
}
echo json_encode($respon);
?>