<?php
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://localhost/web_api/api/anime",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
$response = json_decode($response, true);
if(isset($_GET['hapus']) && $_GET['hapus'] != ''){
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "http://localhost/web_api/api/anime/hapus/$_GET[hapus]",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache"
		),
	));
	$response_hapus = curl_exec($curl);
	$err = curl_error($curl);
	$response_hapus = json_decode($response_hapus, true);
	if(isset($response_hapus['code']) == 200){
		echo "<script type=\"text/javascript\">alert('Data Anime sukses Onechan');window.location.href=\"./\";</script>";
	}else{
		echo $response_hapus['data'];
	}
} 
?>
<h3>Anime Tampilan</h3>
<p><a href="http://localhost/web_api_client/anime_tambah.php">Tambah Anime</a></p>
<table border="1" cellspacing="0" cellpadding="5" style='border-collapse:collapse;'>
	<tr>
		<td>Nama Anime</td>
		<td>Tahun</td>
		<td>Negara</td>
		<td>Penulis</td>
		<td>genre</td>
		<td>Score</td>
		<td></td><?php 
	if(isset($response['data'])){ 
		foreach($response['data'] as $value){ ?>
			<tr>
					<td><strong><?php echo $value['nama_anime']; ?></strong></td>
					<td><?php echo $value['tahun']; ?></td>
					<td><?php echo $value['negara']; ?></td>
					<td><?php echo $value['penulis']; ?></td>
					<td><?php echo $value['genre']; ?></td>
					<td><?php echo $value['score']; ?></td>
					<td>
						<a href="http://localhost/web_api_client/anime_edit.php?id=<?php echo $value['id']; ?>">edit | 
						<a href="http://localhost/web_api_client?hapus=<?php echo $value['id']; ?>">hapus</a>
					</td>
			</tr><?php 
		} 
	} ?>
</table>