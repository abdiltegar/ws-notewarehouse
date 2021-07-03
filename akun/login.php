<?php 
include '../config.php';

$email = $_POST['email'];
$password = $_POST['password'];

$query_user = mysqli_query($koneksi, "SELECT * FROM user WHERE email='".$email."' AND password='".$password."'");
if(mysqli_num_rows($query_user) > 0){
    $data = [];
    while ($data_user = mysqli_fetch_assoc($query_user)){
        $data['id_user'] = $data_user['id_user'];
        $data['email'] = $data_user['email'];
        $data['nama'] = $data_user['nama'];
    }
    $respon['status'] = 1;
    $respon['data'] = $data;
    $respon['message'] = "";
}else{
    $respon['status'] = 0;
    $respon['data'] = [];
    $respon['message'] = "Login Gagal. Pastikan username dan password anda sudah benar !";
}
echo json_encode($respon);
?>