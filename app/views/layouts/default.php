<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/public/css/bootstrap.min.css">
	<link rel="stylesheet" href="/public/css/style.css">
	<script src="/public/js/jquery-3.5.1.js"></script>
    <script src="/public/js/script.js"></script>
	<title><? echo $title; ?></title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
	    <div class="container">
	    	
	        <div class="collapse navbar-collapse" id="navbarResponsive">
	            <ul class="navbar-nav ml-auto">
	                <?if (!isset($adminFlag)):?>
	                	<li class="nav-item">         	
							<a href="/login" class="nav-link">Войти</a>
						</li>
						<li class="nav-item">
		                    <a href="/add" class="nav-link">Добавить задачу</a>	
		                </li>
					<?else:?>	
						<li class="nav-item">
		                    <a href="/add" class="nav-link">Добавить задачу</a>	
		                </li>
						<li class="nav-item">
							<a href="admin/logout" class="nav-link">Выйти</a>
						</li>
					<?endif?>
	                
	            </ul>
	        </div>
	    </div>
	</nav>
	<header class="masthead" style="background-image: url('/public/images/home-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div >       	
                    <h1>Приветствуем <?if (isset($adminFlag)):?>, <?=$adminName?><?endif?></h1>             
                </div>
            </div>
        </div>
    </div>
</header>
	<? echo $content; ?>
</body>
</html>