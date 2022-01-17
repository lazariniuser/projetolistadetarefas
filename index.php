<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM tarefas WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$tarefa = $n['tarefa'];
			$descricao = $n['descricao'];
            $situacao = $n['situacao'];
		}
	}
?>
<?php  include('php_code.php'); ?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
	<title>Compliasset Tarefas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<body>
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
<?php $results = mysqli_query($db, "SELECT * FROM tarefas"); ?>

<table class='tabeladados'>
	<thead>
		<tr>
			<th>Tarefa</th>
			<th>Descrição</th>
            <th>Situação</th>
			<th colspan="2">Ação</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['tarefa']; ?></td>
			<td><?php echo $row['descricao']; ?></td>
            <td><?php echo $row['situacao']; ?></td>
			<td>
				<a href="php_code.php?del=<?php echo $row['id']; ?>" class="del_btn">Deletar</a>
			</td>
		</tr>
	<?php } ?>
</table>

	<form method="post" action="php_code.php" >
    <input type="hidden" name="id" value="<?php echo $id; ?>">





		<div class="camposdados">
            <table class='dadosinseridos'>
                <tr>
                    <td>
			<input type="text" name="tarefa" value="" placeholder="Tarefa" required>
                    </td>
                </tr>
                <tr>
                    <td>


			<input type="text" name="descricao" value="" placeholder="Descrição" required>
                    </td>
                </tr>       
                <tr>
                    <td>


			<input type="text" name="situacao" value="" placeholder="Situação" required>
                    </td>
            </tr>

                <tr>
                    <td>
   
		

        <?php if ($update == true): ?>
	<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
<?php else: ?>
	<button class="btn" type="submit" name="save" >Salvar</button>
<?php endif ?>
</td></tr>
 </table>
		</div>
        
	</form>
</body>
</html>