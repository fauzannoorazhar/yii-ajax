<?php

namespace app\controllers;

use yii;
use yii\base\DynamicModel;

class AdminController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionTestAjax()
    {
    	/*$model = new DynamicModel([
        'name', 'email', 'subject', 'body'
	    ]);
	    $model->addRule(['name', 'email', 'subject', 'body'], 'required')
        ->addRule(['email'], 'email');
	 
	    if ($model->load(Yii::$app->request->post()) && $model->validate()) {
	        
	        \Yii::$app->response->format = 'json';

            return $model;
	    }

    	return $this->render('text-ajax',['model' => $model]);*/

    	$models = \app\models\Artikel::find()->indexBy('id')->all();

        if (\yii\base\Model::loadMultiple($models, Yii::$app->request->post()) && \yii\base\Model::validateMultiple($models)){
            foreach ($models as $models) {
                $models->save(false);
            }

            return $this->refresh();
        }

        return $this->render('text-ajax',['models' => $models]);
    }

}
