<?php
namespace Test\Controllers;

use Test\Models\NewsModel;
use Test\DB\DataBase;
use Test\Controllers\MainController;

class NewsController  extends MainController
{
	// Количество новостей на странице
	public $limit = 4;

	public function actionList($listId)
	{
		// Получение списка новостей начиная с самой ранней
		$row = NewsModel::getLast();

		// Вычисляем offset для SQL запроса
		$offset = ($listId - 1) * $this->limit;
		$news = NewsModel::getRows($offset, $this->limit);

		// Получение общего кол-ва новостей
		$listsAmount = NewsModel::getCount();

		// Текущая страница новостей
		$currNewsList = $listId;

		// Обращение к функции вывода
		$this->render("./Views/news/newsList.php", [
			'row' => $row,
			'news' => $news,
			'listsAmount' => $listsAmount,
			'currNewsList' => $currNewsList,
		]);
	}

	public function actionDetail($detailId)
	{
		// Получение всей информации о новости
		$row = NewsModel::getItem($detailId);

		// Обращение к функции вывода
		$this->render('./Views/news/newsDetail.php', [
			'row'=>$row,
		]);
	}
}