<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use PhpOffice\PhpWord\Shared\Converter;

use app\models\LoginForm;
use app\models\User;
use app\models\Artikel;
use yii\web\UploadedFile;

use Faker\Factory;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }  

    /**
     * Displays homepage.
     *
     * @return string
     */

    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }
        return $this->redirect(['admin/index']);
    }

    public function actionLogin()
    {
        $this->layout = 'backend//main-login';

        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['admin/index']);
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['admin/index']);
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionDev($jam)
    {
        return ((9999 - $jam)**2);
    }

    public function actionFaker($row=10,$iterate=1)
    {
        $start = microtime(true);
        $faker = Factory::create();
        $datas = [];
        for($j=1; $j<= $iterate; $j++){
            for($i=1; $i<= $row;$i++){                                     
                $datas[$i] = [
                    $faker->country,
                    $faker->realText($maxNbChars = 200, $indexSize = 2)
                ];
            }   
            \Yii::$app->db->createCommand()->batchInsert('artikel', ['judul', 'konten'], $datas)->execute();
        }   
         
        $time_elapsed_us = microtime(true) - $start;
        echo ($row*$iterate).' = '.$time_elapsed_us.' <br>';
    }
}
