<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'dbtarefascompliasset');


	$tarefa = "";
	$descricao = "";
    $situacao = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$tarefa = $_POST['tarefa'];
		$descricao = $_POST['descricao'];
        $situacao = $_POST['situacao'];

		mysqli_query($db, "INSERT INTO tarefas (tarefa, descricao, situacao) VALUES ('$tarefa', '$descricao', '$situacao')"); 
		$_SESSION['message'] = "Tarefa salva!"; 
		header('location: index.php');
	}
    if (isset($_POST['update'])) {
        $tarefa = $_POST['tarefa'];
        $descricao = $_POST['descricao'];
        $situacao = $_POST['situacao'];
    
        mysqli_query($db, "UPDATE tarefas SET tarefa='$tarefa', descricao='$descricao', situacao='$situacao' WHERE id=$id");
        $_SESSION['message'] = "Tarefa Atualizada!"; 
        header('location: index.php');
    }
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM tarefas WHERE id=$id");
        $_SESSION['message'] = "Tarefa apagada!"; 
        header('location: index.php');
    }
    ?>