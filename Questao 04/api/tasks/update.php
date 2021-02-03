<?php
include_once('config.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) :  "";

    $sql = "SELECT * FROM `todo_db`.`tasks` WHERE id={$id}";
    $get_data_query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    while ($r = mysqli_fetch_array($get_data_query)) {
        extract($r);
    }

    $newTitle = isset($_POST['title']) ? mysqli_real_escape_string($conn, $_POST['title']) : $title;
    $newDescription = isset($_POST['description']) ? mysqli_real_escape_string($conn, $_POST['description']) : $description;
    $newPriority = isset($_POST['priority']) ? mysqli_real_escape_string($conn, $_POST['priority']) : $priority;


    $sql = "UPDATE `todo_db`.`tasks` SET title='{$newTitle}', description='{$newDescription}', priority='{$newPriority}' WHERE id='{$id}'";
    $update_data_query = mysqli_query($conn, $sql);

    if ($update_data_query) {
        $json = array("Success" => "A Tarefa foi atualizada com sucesso!");
    } else {
        $json = array("Error" => "Erro ao atualizar a Tarefa.");
    }
} else {
    $json = array("status" => 0, "Info" => "Request method not accepted!");
}

@mysqli_close($conn);

header('Content-type: application/json');
echo json_encode($json);
