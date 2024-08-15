<?php
	// Подключение контроллера
	require_once "../controllers/NewsController.php";

	// Создание экземпляра контроллера
	$controller = new NewsController();

	// Получаем номер текущего блока новостей из GET-запроса или устанавливаем 1, если номер блока не указан
	$pageNum = isset($_GET['page']) ? (int)$_GET['page'] : 1;


	// ---Верстка и вывод основной информации---
	$controller->actionList($pageNum);
?>