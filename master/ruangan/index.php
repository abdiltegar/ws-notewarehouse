<?php 
include '../../config.php';

$query_barang = mysqli_query($koneksi, "SELECT * FROM ruangan ORDER BY nama_ruangan ASC");
if(mysqli_num_rows($query_barang) > 0){
    $data = [];
    $i = 0;
    while ($data_barang = mysqli_fetch_assoc($query_barang)){
        $data['a'.$i]['kode_ruangan'] = $data_barang['kode_ruangan'];
        $data['a'.$i]['nama_ruangan'] = $data_barang['nama_ruangan'];
        $i++;
    }
    $respon['status'] = 1;
    $respon['data'] = $data;
    $respon['message'] = "";
}else{
    $respon['status'] = 0;
    $respon['data'] = [];
    $respon['message'] = "Tidak ada data ruangan";
}
echo json_encode($respon);
?>