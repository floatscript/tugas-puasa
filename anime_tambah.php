<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "http://localhost/web_api/api/anime/tambah",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $_POST,
		CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache"
		),
	));
	$response_tambah = curl_exec($curl);
	$err = curl_error($curl);
	$response_tambah = json_decode($response_tambah, true);
	if(isset($response_tambah['code']) == 200){
		echo "<script type=\"text/javascript\">alert('Anime Berhasil Di Tambah');window.location.href=\"http://localhost/web_api_client/\";</script>";
	}else{
		echo $response_tambah['data'];
	}
} 
?>
<h3>Tambah Data Anime</h3>
<form class="form-horizontal" method="POST" action="http://localhost/web_api_client/anime_tambah.php">
	Nama Anime* <br/>
	<input type="text" placeholder="nama anime" name="nama_anime" required/><br/>
	Tahun* <br/>
	<input type="text" placeholder="tahun anime" name="tahun" required/><br/>
	Negara* <br/>
	<input type="text" placeholder="negara anime" name="negara" required/><br/>
	Penulis* <br/>
	<input type="text" placeholder="penulis anime" name="penulis" required/><br/>
	Genre* <br/>
	<input type="text" placeholder="genre anime" name="genre" required/><br/>
	Score* <br/>
	<input type="text" placeholder="score anime" name="score" required/><br/>
	<button type="submit" type="button">
		Submit
	</button>
</form>