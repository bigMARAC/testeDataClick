<?php
include_once('config.php');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Content-Type");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
	var_dump($_POST);
	$title = isset($_POST['title']) ? mysqli_real_escape_string($conn, $_POST['title']) : "";
	$description = isset($_POST['description']) ? mysqli_real_escape_string($conn, $_POST['description']) : "";
	$priority = isset($_POST['priority']) ? mysqli_real_escape_string($conn, $_POST['priority']) : "";

	$sql = "INSERT INTO `todo_db`.`tasks` (`title`, `description`, `priority`) VALUES ('$title', '$description', '$priority');";
	$post_data_query = mysqli_query($conn, $sql);

	if ($post_data_query) {
		$json = array("status" => 1, "Success" => "A Tarefa foi adicionada com sucesso!");
	} else {
		$json = array("status" => 0, "Error" => "Erro ao adicionar a Tarefa.");
	}
} else {
	$json = array("status" => 0, "Info" => "Request method not accepted!");
}

@mysqli_close($conn);

header('Content-type: application/json');
echo json_encode($json);
