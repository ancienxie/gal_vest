<?php
namespace Test\Controllers;

class ErrorsController extends MainController
{
    public function actionNotFound()
	{
		$this->render('./Views/errors/notFound.php', []);
	}
}