<?php 
require 'koneksi.php';

$input = file_get_contents('php://input');
$data = json_decode($input,true);

$pesan = [];
$tanggal = trim($data['tanggal']);
$judul = trim($data['judul']);
$isi = trim($data['isi']);

if ($tanggal != '' and $isi != '') {
	$query = mysqli_query($con,"insert into diary(no,tanggal,judul,isi) values('','$tanggal','$judul','$isi')");

}else{
	$query = mysqli_query($con,"delete from diary where no='$no'");
}


// if ($query) {
// 	http_response_code(201);
// 	$pesan['status'] = 'sukses';
// }else{
// 	http_response_code(422);
// 	$pesan['status'] = 'gagal';
// }

echo json_encode($pesan);
echo mysqli_error($con);

?>