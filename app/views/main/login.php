<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Вход</div>
        <div class="card-body">
			<form action="/login" method="POST" id="form-login">
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
						<label for="email">Введите пароль:</label>
					</div>
					<div class = "col-sm-9">
						<input name="pwd" type="text">
					</div>
				</div>
				<input type="submit" value="Войти" class="btn btn-primary">
			</form>
        </div>
        <div class = "error-block" class = "row">
			<div class = "col-sm-12">
				<p class="error-text"></p>
			</div>
		</div>
    </div>
</div>