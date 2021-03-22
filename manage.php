<?
include "./header.php";

require_once ('./base/mysqldb.php');

$sql = 'SELECT count(ID) as number FROM restaurant';
$result = executeResult($sql);
// print_r($result);
$number = 0;
if($result != null && count($result)>0){
	$number = $result[0]['number'];
}
$pages = ceil($number/5);
$current =1;
if (isset($_REQUEST['page'])) {
	$current = $_REQUEST['page'];
}

$index = ($current-1)*5;

if (isset($_GET['search'])&&$_GET['search']!='') {

	$sql = "SELECT * FROM `restaurant` WHERE Name LIKE '%".$_GET['search']."%' limit ".$index.",".$number."";
	// echo $sql;

}else{

	$sql = "SELECT * FROM `restaurant` limit ".$index.",5";
}

// $sql = "SELECT * FROM `restaurant` limit ".$index.",5";
// echo $sql;
$display_restaurant = executeResult($sql);

// echo "<pre>";
// print_r($sql);
// echo "<pre/>";

include "./template/manage.html";

include "./footer.php";
?>