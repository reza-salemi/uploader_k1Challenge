<?php
require_once ('../private/initialize.php');

$id = $_GET['id'];
$image = show_img_by_id($id);

delete_img($id);
unlink($image['url']);


?>