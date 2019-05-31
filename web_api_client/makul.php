<?php
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://localhost/web_api/api/makul",
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
$response = json_decode($response, true); ?>
<h3>Data Dari Endpoin API Makul</h3>
<table border="1" cellspacing="0" cellpadding="0" style='border-collapse:collapse;'>
	<tr>
		<td>Kode Makul</td>
		<td>Nama Makul</td>
		<td>SKS</td><?php 
		if(isset($response['data'])){ 
			foreach($response['data'] as $value){ ?>
				<tr>
						<td><?php echo $value['makul_kode']; ?></td>
						<td><?php echo $value['makul_nama']; ?></td>
						<td><?php echo $value['makul_sks']; ?></td>
				</tr><?php 
			} 
		} ?>
</table>