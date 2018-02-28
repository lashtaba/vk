<?php

$token = "1c3bd0d3897924416b95224027df27a15e5ae43590e4577511f61a1d41ee9f7bbc81d2a1d894d5920d825";
$my_id = "267220002";
$get_url = "https://api.vk.com/api.php?oauth=1&method=";
$posts = ['76184323', '98006902'];
$post = '76184323,-98006902';

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
	print_r(getPosts($get_url, $post, $token));
}

function getPosts($get_url, $post, $token) {
	$time = time()-30000;
	$method = "newsfeed.get&";
	$setopt = "source_ids=-" . $post . "&filters=post&start_time=" . $time . "&";
	$access_token = "access_token=" . $token;
	$url = $get_url . $method . $setopt . $access_token;
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

print_r(getPosts($get_url, $post, $token));
// function getPosts($get_url, $post, $token) {
// 	$method = "wall.get&";
// 	$setopt = "owner_id=-" . $post . "&count=1&extended=1&";
// 	$access_token = "access_token=" . $token;
// 	$url = $get_url . $method . $setopt . $access_token;
// 	$ch = curl_init($url);
// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 	$data = curl_exec($ch);
// 	curl_close($ch);
// 	return $data;
// }
 ?>
