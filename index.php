<?php

$ex = file_get_contents("https://api.vk.com/api.php?oauth=1&method=groups.get&user_id=267220002&extended=1&fields=name,50photo&access_token=603576045948066233d3425f547b93d7a2a518ce0abc4ca7c79de78233c819375f20e51e83f7d0e98fbe3");

$ex = json_decode($ex, true);
$ex = $ex['response'];
print_r("<html><body style='padding: 20px;'>");
print_r("<div style='display:inline-block; width: 40%; height: 92%; overflow: auto; border: 1px solid #00A66D; border-radius: 20px; position: relative;'>");

print_r("<form id='fform' class='form' action='index.php' method='get'>");
foreach ($ex as $count) {
  if ($count == 143) {
    print_r("<br>");
  } else {
    print_r("<label><input type='checkbox' name='");
    print_r($count['screen_name']);
    print_r("' value='");
    print_r($count['gid']);
    print_r("'> <img src='");
    print_r($count['photo']);
    print_r("'> ");
    print_r($count['name']);
    print_r("</label><br>");
  }
}
print_r("</form></div>");
// print_r("<button form='fform' type='submit' value='submit' style='margin-top: 8px; position: absolute; bottom: 10px; left: 35%'>Выбрать</button>");
// $needGids = $_GET;
// $Gids = [];
// foreach ($needGids as $key => $value) {
// 	array_push($Gids, $value);
// }
// $posts = file_get_contents("https://api.vk.com/api.php?oauth=1&method=wall.get&owner_id=-98006902&access_token=603576045948066233d3425f547b93d7a2a518ce0abc4ca7c79de78233c819375f20e51e83f7d0e98fbe3");
// print_r("<div style='display: inline-block; width: 40%; height: 92%; vertical-align: center; margin-left: 20px; overflow: auto; border: 1px solid #00A66D; border-radius: 20px;'>");
// $posts = json_decode($posts, true);
// $posts = $posts['response'];
// $newPost = $posts[5];
// print_r("<br>");
// print_r($newPost['text']);
// $comments = $newPost['comments'];
// print_r("<br>");
// $comment = file_get_contents("https://api.vk.com/api.php?oauth=1&method=wall.getComments&owner_id=-98006902&post_id=109919&access_token=603576045948066233d3425f547b93d7a2a518ce0abc4ca7c79de78233c819375f20e51e83f7d0e98fbe3");
// print_r($comment);
// print_r("</div>");
print_r("</body></html>");
 ?>
