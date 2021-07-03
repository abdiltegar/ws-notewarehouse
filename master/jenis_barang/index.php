<?php 
include '../../config.php';

$query_barang = mysqli_query($koneksi, "SELECT * FROM jenis_barang ORDER BY nama_barang ASC");
if(mysqli_num_rows($query_barang) > 0){
    $data = [];
    $i = 0;
    while ($data_barang = mysqli_fetch_assoc($query_barang)){
        $data['a'.$i]['kode_barang'] = $data_barang['kode_barang'];
        $data['a'.$i]['nama_barang'] = $data_barang['nama_barang'];
        $data['a'.$i]['satuan'] = $data_barang['satuan'];
        $i++;
    }
    $respon['status'] = 1;
    $respon['data'] = $data;
    $respon['message'] = "";
}else{
    $respon['status'] = 0;
    $respon['data'] = [];
    $respon['message'] = "Tidak ada data jenis barang";
}
echo json_encode($respon);
?>