<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "http://localhost/web_api/api/anime/ubah",
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
		echo "<script type=\"text/javascript\">alert('Data Anime sukses Onechan');window.location.href=\"http://localhost/web_api_client/\";</script>";
	}else{
		echo $response_tambah['data'];
	}
} 
if(isset($_GET['id'])){
	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://localhost/web_api/api/anime?id=$_GET[id]",
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
	if(isset($response['data'])){ 
		foreach ($response['data'] as $value); ?>
		<h3>Edit Data anime</h3>
		<form class="form-horizontal" method="POST" action="http://localhost/web_api_client/anime_edit.php">
			<input type="hidden" name="id" value="<?php echo $value['id']; ?>"/>
			Nama Anime* <br/>
			<input type="text" placeholder="nama anime" name="nama_anime" value="<?php echo $value['nama_anime']; ?>" required/><br/>
			Tahun* <br/>
			<input type="text" placeholder="tahun anime" name="tahun" value="<?php echo $value['tahun']; ?>" required/><br/>
			Negara* <br/>
			<input type="text" placeholder="negara anime" name="negara" value="<?php echo $value['negara']; ?>" required/><br/>
			Penulis* <br/>
			<input type="text" placeholder="penulis anime" name="penulis" value="<?php echo $value['penulis']; ?>" required/><br/>
			Genre* <br/>
			<input type="text" placeholder="genre anime" name="genre" value="<?php echo $value['genre']; ?>" required/><br/>
			Score* <br/>
			<input type="text" placeholder="score anime" name="score" value="<?php echo $value['score']; ?>" required/><br/>
			<button type="submit" type="button">
				Submit
			</button>
		</form> <?php
	}
}else{
	echo "tak di kenal";
} ?>