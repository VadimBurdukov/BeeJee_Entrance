<?
return [

//Main routes

		'' => [
			'CONTROLLER' => 'main',
			'ACTION' => 'index'
		],

	'{page:\d+}' => [
		'CONTROLLER' => 'main',
		'ACTION' => 'index',
	],
	
	'add' => [
		'CONTROLLER' => 'main',
		'ACTION' => 'add'
	],

	'login' => [
		'CONTROLLER' => 'main',
		'ACTION' => 'login'
	],
//Admin routes

	'admin/logout' => [
		'CONTROLLER' => 'admin',
		'ACTION' => 'logout'
	],

	'admin/edit/{id:\d+}' => [
		'CONTROLLER' => 'admin',
		'ACTION' => 'edit'
	],

	'admin/delete/{id:\d+}' => [
		'CONTROLLER' => 'admin',
		'ACTION' => 'delete',
	],

];
?>