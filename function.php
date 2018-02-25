<?php 

$token = "f418c1bc10086f0f5c3a833c6f62014d83a47c7d51bede242c0948bb95071bfa1aff9027406e5c913f92c";
$my_id = "267220002";
$get_url = "https://api.vk.com/api.php?oauth=1&method=";

function getGroups($get_url, $my_id, $token) {
	$method = "groups.get&";
	$setopt = "extended=1&fields=name,50photo&filter=groups,publics&";
	$user_id = "user_id=" . $my_id . "&";
	$access_token = "access_token=" . $token;
	$url = $get_url . $method . $user_id . $setopt . $access_token;
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$data = curl_exec($ch);
	curl_close($ch);
	$data = json_decode($data, true);
	$data = $data['response'];
	array_shift($data);
	$data = ["response" => $data];
	$data = json_encode($data);
	return $data;
}
if (isset($_GET['getGroups'])) {
	echo getGroups($get_url, $my_id, $token);
}

if (isset($_GET['getPosts'])) {
	print_r(var_dump($_GET));
}

$posts = [76184323, 98006902];
$post = $posts[0];
function getPosts($get_url, $my_id, $token, $post) {
	$method = "groups.get&";
	$setopt = "extended=1&fields=name,50photo&filter=groups,publics&";
	$user_id = "user_id=" . $my_id . "&";
	$access_token = "access_token=" . $token;
	$url = $get_url . $method . $user_id . $setopt . $access_token;
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$data = curl_exec($ch);
	curl_close($ch);
}
 ?>
