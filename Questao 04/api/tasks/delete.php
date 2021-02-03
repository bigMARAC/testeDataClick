<?php
include_once('config.php');

if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
	$id = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) :  "";

	$sql = "DELETE FROM `todo_db`.`tasks` WHERE id='{$id}'";
	$delete_data_query = mysqli_query($conn, $sql);

	if ($delete_data_query) {
		$json = array("Success" => "A Tarefa foi deleteda com sucesso!");
	} else {
		$json = array("Error" => "Erro ao deletar a Tarefa.");
	}
} else {
	$json = array("status" => 0, "Info" => "Request method not accepted!");
}

@mysqli_close($conn);

header('Content-type: application/json');
echo json_encode($json);
