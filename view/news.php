<?php 
	// Подключение контроллера
	require_once "/var/www/workspace/test/www/controllers/NewsController.php";

	// Создание экземпляра контроллера
	$controller = new NewsController();

	// Получение номера статьи
	$id = $_GET['id'] ?? 0;


	// ---Верстка и вывод основной информации---
	$controller->actionDetail($id);
?>