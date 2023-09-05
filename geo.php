<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://instagram47.p.rapidapi.com/search?search=gemjeeh",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: instagram47.p.rapidapi.com",
		"X-RapidAPI-Key: 46fae1d379msh4ab3095bfdd85acp1e4504jsnb0df66e6ff0c"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}
?>