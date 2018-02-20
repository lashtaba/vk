<?php 

$token = "f418c1bc10086f0f5c3a833c6f62014d83a47c7d51bede242c0948bb95071bfa1aff9027406e5c913f92c";
$my_id = "267220002";
$get_url = "https://api.vk.com/api.php?oauth=1&method=";

function getGroups($get_url, $my_id, $token) {
	$method = "groups.get&";
	$setopt = "extended=1&fields=name,50photo&";
	$user_id = "user_id=" . $my_id . "&";
	$access_token = "access_token=" . $token;
	$url = $get_url . $method . $user_id . $setopt . $access_token;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}
// if (isset($_GET['getGroups'])) {
	getGroups($get_url, $my_id, $token);
// }
 ?>
