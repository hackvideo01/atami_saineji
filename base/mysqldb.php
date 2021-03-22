<?

require_once ('config.php');

/**
 * insert, update, delete -> use function
 */
function execute($sql) {
	//creat connection to database
	$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

	//query
	mysqli_query($conn,$sql);

	//Close connection
	mysqli_close($conn);
}

/**
 * use select => result
 */
function executeResult($sql){
	//creat connection to database
	$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

	//query
	$resultset 	= mysqli_query($conn,$sql);
	$list 		= [];
	while($row = mysqli_fetch_array($resultset,1)){
		$list[] = $row;
	}

	//Close connection
	mysqli_close($conn);
	return $list;
}

function execute_getID($sql){

	$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

	$take_last_id = mysqli_query($conn,$sql);

	if ($take_last_id) {
		$last_id = mysqli_insert_id($conn);
		// echo "OK ! Yeah !";mysqli_close($conn);
		// echo "Mysql :" .$last_id;
	}else{
		echo "Error!";
	}
	mysqli_close($conn);
	return $last_id;
}
?>
