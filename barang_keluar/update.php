<?php 
include '../config.php';

$id_arus = $_POST['id_arus'];
$kode_barang = $_POST['kode_barang'];
$kode_ruangan = $_POST['kode_ruangan'];
$tanggal = date("Y-m-d H:i:s",strtotime($_POST['tanggal']." 00:00:00"));
$jumlah = $_POST['jumlah'];

$query_insert = mysqli_query($koneksi, "UPDATE arus_barang SET ".
                            "kode_barang = '".$kode_barang."',".
                            "kode_ruangan = '".$kode_ruangan."',".
                            "jumlah = ".$jumlah.",".
                            "tanggal = '".$tanggal."' ".
                            "WHERE id_arus=".$id_arus);

$response = [];
if($query_insert){
    $response['status'] = 1;
    $response['message'] = "Data berhasil disimpan";
}else{
    $response['status'] = 0;
    $response['message'] = "Gagal menyimpan data";
}
echo json_encode($response);

?>