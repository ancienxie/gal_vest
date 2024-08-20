<?php
// Подключение файла автозагрузки
require_once "./autoload.php";

// Подключение контроллера
use Test\Controllers\NewsController;
use Test\Controllers\ErrorsController;

$url = $_SERVER['REQUEST_URI'];

if ($url == "/") {
	$controller = new NewsController();
	$method = 'actionList';
	$arguments = [1];

	// Вызов определенного метода контроллера
	call_user_func_array([$controller, $method], $arguments);
	
} elseif ($url == "/news/") {
	$controller = new NewsController();
	$method = 'actionList';
	$arguments = [1];

	// Вызов определенного метода контроллера
	call_user_func_array([$controller, $method], $arguments);

} elseif (preg_match("{^/news/page-(\d+)/$}", $url, $m)) {
	$controller = new NewsController();
	$method = 'actionList';
	$arguments = [$m[1]];

	// Вызов определенного метода контроллера
	call_user_func_array([$controller, $method], $arguments);

} elseif (preg_match("{^/news/(\d+)/$}", $url, $m)) {
	$controller = new NewsController();
	$method = 'actionDetail';
	$arguments = [$m[1]];

	// Вызов определенного метода контроллера
	call_user_func_array([$controller, $method], $arguments);

} else {
	http_response_code(404);
	$controller = new ErrorsController();
	$method = 'actionNotFound';

	// Вызов определенного метода контроллера
	call_user_func_array([$controller, $method],[]);
}