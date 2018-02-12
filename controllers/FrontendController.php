<?php

namespace app\controllers;

class FrontendController extends \yii\web\Controller
{
	public $layout = '@app/themes/adminlte/layouts/main-frontend.php';

    public function actionIndex()
    {
        return $this->render('index');
    }

}
