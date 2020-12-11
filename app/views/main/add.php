<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Добавить запись</div>
        <div class="card-body">
			<form action="/add" method="POST" id="form-add">
				<div class = "row">
					<div class = "col-sm-3">
						<label for="login">Введите логин:</label>
					</div>
					<div class = "col-sm-9">
						<input name="login" type="text">
					</div>
				</div>
				<div class = "row">
					<div class = "col-sm-3">
						<label for="email">Введите email:</label>
					</div>
					<div class = "col-sm-9">
						<input name="email" type="text">
					</div>
				</div>
				<div class = "row">
					<div class = "col-sm-3">
						<label for="task">Введите текст записи:</label>
					</div>
					<div class = "col-sm-9">
						<input name="task" type="text">
					</div>
				</div>
				<input type="submit" value="Добавить запись" class="btn btn-primary">
			</form>
        </div>
        <div class = "error-block" class = "row">
			<div class = "col-sm-12">
				<p class="error-text"></p>
			</div>
		</div>
    </div>
</div>