<?php
namespace Test\Controllers;

use Test\Models\NewsModel;
use Test\DB\DataBase;

class NewsController
{
	// Количество новостей на странице
	public $limit = 4;
	
	public function render($view, $data=[])
	{
		extract($data);

		// Буферизация вывода
		ob_start();
		include "./Views/news/{$view}.php";
		$content = ob_get_contents();
		ob_end_clean();

		// Вывод
		include "./Views/layout/layout.php";
	}

	public function actionList($pageNum)
	{
		// Получение списка новостей начиная с самой ранней
		$row = NewsModel::getLast();

		// Вычисляем offset для SQL запроса
		$offset = ($pageNum - 1) * $this->limit;
		$news = NewsModel::getRows($offset, $this->limit);

		// Получение общего кол-ва новостей
		$pagesAmount = NewsModel::getCount();

		// Текущая страница новостей
		$currNewsPage = $pageNum;

		// Обращение к функции вывода
		$this->render('newsList', [
			'row' => $row,
			'news' => $news,
			'pagesAmount' => $pagesAmount,
			'currNewsPage' => $currNewsPage,
		]);
	}

	public function actionDetail($id)
	{
		// Получение всей информации о новости
		$row = NewsModel::getItem($id);

		// Обращение к функции вывода
		$this->render('newsDetail', [
			'row'=>$row,
		]);
	}
}