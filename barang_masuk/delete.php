<?php 
include '../config.php';

$id_arus = $_POST['id_arus'];

$query_insert = mysqli_query($koneksi, "DELETE FROM arus_barang WHERE id_arus=".$id_arus."");

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