<?
require_once ('./base/mysqldb.php');

if (isset($_GET['id'])) {
	$id = $_GET['id'];
}

$sql = "SELECT * FROM `restaurant` WHERE id=".$id;

$restaurant_detail = executeResult($sql);

include "./template/restaurant.html";

?>