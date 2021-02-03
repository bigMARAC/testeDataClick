<?php
include_once('config.php');
header('Access-Control-Allow-Origin: *', 'Access-Control-Allow-Methods: GET,PUT,POST,DELETE');
$sql = "SELECT * FROM `todo_db`.`tasks` ORDER BY priority";
$get_data_query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if (mysqli_num_rows($get_data_query) != 0) {
	$result = array();

	while ($r = mysqli_fetch_array($get_data_query)) {
		extract($r);
		$result[] = array("title" => $title, "description" => $description, 'priority' => $priority, 'id' => $id);
	}
	$json = ($result);
} else {
	$json = array("erro" => "ID Inválido");
}

@mysqli_close($conn);

header('Content-type: application/json');
echo json_encode($json);
