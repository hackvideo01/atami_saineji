<?php

require_once ('./base/mysqldb.php');

if (isset($_REQUEST['id'])) {
	$id = $_REQUEST['id'];

	$sql = "DELETE FROM `restaurant` WHERE id=".$id;
	execute($sql);

	echo '削除しました　!';
}