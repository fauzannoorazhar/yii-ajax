<?php

namespace app\modules\api\controllers;

use yii;
use yii\web\Controller;
use app\models\Artikel;
use yii\web\Response;

/**
 * Default controller for the `api` module
 */
class RestController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        return $artikel = Artikel::find()->all();
    }

    /**
     * action to get more artikel
     * @param $lastId
     * @return html
     */
    public function actionLoadArtikel($id)
    {
        $artikel = Artikel::find()->andWhere('id > :params',['params' => $id])->orderBy(['id' => SORT_ASC])->limit(5)->all();

        foreach ($artikel as $data) {
            echo $array = '<div class="box box-default">
                <div class="box-body">
                    <div class="post">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="'.Yii::$app->request->baseUrl .'/images/img.png'.'">
                            <span class="username">
                                <a href="#">'.$data->judul.' - '.$data->id.'</a>
                                <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                            </span>
                            <span class="description">Shared publicly - 7:30 PM today</span>
                        </div>
                        <p>
                            Lorem ipsum represents a long-held tradition for designers,
                            typographers and the like. Some people hate it and argue for
                            its demise, but others ignore the hate as they create awesome
                            tools to help create filler text for everyone from bacon lovers
                            to Charlie Sheen fans.
                        </p>
                        <ul class="list-inline">
                            <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                            <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                            </li>
                            <li class="pull-right">
                            <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                            (5)</a></li>
                        </ul>
                        <input id="artikel-'.$data->id.'" class="form-control input-sm" type="text" placeholder="Type a comment">
                    </div>
                </div>
            </div>';
        }

        echo '<div class="load-more-artikel" lastID="'.$data->id.'">
                <div style="text-align: center">
                    <img src="'.Yii::$app->request->baseUrl.'/images/giphy.gif'.'" style="width: 50px">
                </div>
             </div>';
    }

    public function actionCreateKomentar()
    {
        $param1 = Yii::$app->request->post('param1', 'string');
        $param2 = Yii::$app->request->post('param2', null);

        print_r($param1);
    }
}
