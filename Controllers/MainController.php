<?php
namespace Test\Controllers;

class MainController
{
    public function render($view, $data=[])
	{
		extract($data);

		// Буферизация вывода
		ob_start();
		include $view;
		$content = ob_get_contents();
		ob_end_clean();

		// Вывод
		include "./Views/layout/layout.php";
	}
}