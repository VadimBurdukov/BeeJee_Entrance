<p>	Главная страница </p>	
<?
var_dump($tasks);
foreach ($tasks as $task):?>
	<h3><?=$task['name']?></h3>
	<p><?=$task['email']?></p>
	<p><?=$task['text']?></p>
	<p><?=$task['edited']?></p>
	<p><?=$task['done']?></p>
	<hr>
<?endforeach;?>