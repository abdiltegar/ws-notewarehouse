<?php 
include '../config.php';

$id_user = $_POST['id_user'];
$kode_barang = $_POST['kode_barang'];
$kode_ruangan = $_POST['kode_ruangan'];
$tanggal = date("Y-m-d H:i:s",strtotime($_POST['tanggal']." 00:00:00"));
$jumlah = $_POST['jumlah'];

$query_insert = mysqli_query($koneksi,"INSERT INTO arus_barang(id_user, kode_barang, kode_ruangan, jumlah, tanggal, apakah_masuk) VALUES(".
                            "'".$id_user."',".
                            "'".$kode_barang."',".
                            "'".$kode_ruangan."',".
                            "".$jumlah.",".
                            "'".$tanggal."',".
                            "0".
                            ")");

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