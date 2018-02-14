<?php

namespace app\controllers;

class FrontendController extends \yii\web\Controller
{
	public $layout = '@app/themes/adminlte/layouts/main-frontend.php';

    public function actionIndex()
    {
    	$komentar = new \app\models\ArtikelKomentar();

        return $this->render('index',[
        	'komentar' => $komentar
        ]);
    }

}
