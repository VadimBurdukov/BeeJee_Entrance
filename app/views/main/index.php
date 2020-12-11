<?// ПАГИНАЦИЮ В ИФ?>
<hr>
<div class = "container">
	<form action="" method="POST">
		<label for="sort-by">Сортировать по полю:</label>
		<select name="sort-by" id="sort-by">
			<option value="name" <?if (isset($_SESSION['SORT_BY']) && $_SESSION['SORT_BY'] == 'name'):?> selected <?endif?> >Имя</option>
			<option value="email" <?if (isset($_SESSION['SORT_BY']) && $_SESSION['SORT_BY'] == 'email'):?> selected <?endif?>>E-mail</option>
			<option value="done" <?if (isset($_SESSION['SORT_BY']) && $_SESSION['SORT_BY'] == 'done'):?> selected <?endif?>>Статус</option>
		</select><br>

		<label for="sort-direction">Направление сортировки:</label>
		<select name="sort-direction" id="sort-direction">
			<option value="ASC" <?if (isset($_SESSION['SORT_DIRECTION']) && $_SESSION['SORT_DIRECTION'] == 'ASC'):?> selected <?endif?>>Прямой порядок</option>
			<option value="DESC" <?if (isset($_SESSION['SORT_DIRECTION']) && $_SESSION['SORT_DIRECTION'] == 'DESC'):?> selected <?endif?>>Обратный порядок</option>
		</select><br>
		<input type="submit" value="Отсортировать" class="btn btn-primary">
	</form><hr>
	<div class = "row">
		<div class = "col-sm-12">
			<?if($tasks):?>
				<?foreach ($tasks as $task): ?>
					<div class = "row">
						<div class = "col-sm-3">
							<label for="login">Логин:</label>
						</div>
						<div class = "col-sm-9">
							<input name="login" type="text" disabled value=<?=$task['name']?>>
						</div>
					</div>

				<div class = "row">
					<div class = "col-sm-3">
						<label for="email">email:</label>
					</div>
					<div class = "col-sm-9">
						<input name="email" type="text" disabled value=<?=$task['email']?>>
					</div>
				</div>

				<div class = "row">
					<div class = "col-sm-3">
						<label for="task">Текст задания:</label>
					</div>
					<div class = "col-sm-9">
						<input name="task" type="text" disabled value=<?=$task['task']?>>
					</div>
				</div>

				<div class = "row">
					<div class = "col-sm-3">
						<label for="donedone">Выполнено:</label>
					</div>
					<div class = "col-sm-9">
						<input name="done" type="checkbox" disabled <?if($task['done']):?>checked <?endif;?>>
					</div>
				</div>

				<div class = "row">
					<div class = "col-sm-3">
						<label for="edited">Изменено администратором:</label>
					</div>
					<div class = "col-sm-9">
						<input name="edited" type="checkbox" disabled <?if($task['edited']):?>checked <?endif;?>>
					</div>
				</div>
				<?if (isset($adminFlag)):?>
					<div class = "row">
						<div class = "col-sm-4">
							<a href="/admin/edit/<?php echo $task['id']; ?>" class="btn btn-primary">Редактировать</a>
						</div>
						<div class = "col-sm-4">
							<a href="/admin/delete/<?php echo $task['id']; ?>" class="btn btn-danger">Удалить</a>
						</div>
					</div>
				<?endif?>
				<hr>
				<?endforeach;?>
			<?else:?>
				<p>Список задач пуст!</p>
			<?endif;?>

		</div>
	</div>
	<div class="clearfix">
        <?php echo $pagination; ?>
    </div>
</div>

