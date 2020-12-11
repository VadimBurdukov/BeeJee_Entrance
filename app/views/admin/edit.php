<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Изменить запись <?echo $taskInfo['task'];?> пользователя <?echo $taskInfo['name'];?></div>
        <div class="card-body">
			<form action="" method="POST" id="form-edit">
				<div class = "row">
					<div class = "col-sm-3">
						<label for="login">Логин:</label>
					</div>
					<div class = "col-sm-9">
						<input name="login" type="text" value="<?echo $taskInfo['name'];?>">
					</div>
				</div>
				<div class = "row">
					<div class = "col-sm-3">
						<label for="email">Email:</label>
					</div>
					<div class = "col-sm-9">
						<input name="email" type="text" value="<?echo $taskInfo['email'];?>">
					</div>
				</div>
				<div class = "row">
					<div class = "col-sm-3">
						<label for="task">Текст записи:</label>
					</div>
					<div class = "col-sm-9">
						<input name="task" type="text" value="<?echo $taskInfo['task'];?>">
					</div>
				</div>
				<div class = "row">
					<div class = "col-sm-3">
						<label for="done">Выполнено:</label>
					</div>
					<div class = "col-sm-9">
						<input name="done" type="checkbox" <?if($taskInfo['done']):?> checked <?endif;?>>
					</div>
				</div>
				<input type="submit" value="Сохранить изменения" class="btn btn-primary">
			</form>
        </div>
        <div class = "error-block" class = "row">
			<div class = "col-sm-12">
				<p class="error-text"></p>
			</div>
		</div>
    </div>
</div>
