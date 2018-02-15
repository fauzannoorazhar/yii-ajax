<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ArtikelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Artikel';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artikel-index box box-primary">

    <div class="box-header">
        <?= Html::a('<i class="fa fa-plus"></i> Tambah Artikel', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-print"></i> Export Excel Artikel', Yii::$app->request->url.'&export=1', ['class' => 'btn btn-success btn-flat']) ?>
    </div>

    <div class="box-body">
    <?= Html::beginForm(['/artikel/update-all'],'post');?>
        <?php Pjax::begin(); ?>    
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    [
                        'class' => 'yii\grid\CheckboxColumn',
                        'headerOptions' => ['style' => 'text-align:center;'],
                        'contentOptions' => ['style' => 'text-align:center'],
                    ],
                    [
                        'class' => 'yii\grid\SerialColumn',
                        'header' => 'No',
                        'headerOptions' => ['style' => 'text-align:center'],
                        'contentOptions' => ['style' => 'text-align:center']
                    ],
                    [
                        'attribute' => 'judul',
                        'format' => 'raw',
                        'headerOptions' => ['style' => 'text-align:center;'],
                        'contentOptions' => ['style' => 'text-align:center;'],
                    ],
                    [
                        'attribute' => 'id_artikel_kategori',
                        'format' => 'raw',
                        'value' => function($data){
                            return $data->getRelationField('artikelKategori','nama');
                        },
                        'headerOptions' => ['style' => 'text-align:center;'],
                        'contentOptions' => ['style' => 'text-align:center;'],
                    ],
                    [
                        'attribute' => 'id_artikel_status',
                        'format' => 'raw',
                        'value' => function($data){
                            return $data->getRelationField('artikelStatus','nama');
                        },
                        'headerOptions' => ['style' => 'text-align:center;'],
                        'contentOptions' => ['style' => 'text-align:center;'],
                    ],

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'contentOptions' => ['style' => 'text-align:center;width:80px']
                    ],
                ],
            ]); ?>
        <?php Pjax::end(); ?>

        <?= Html::submitButton('Send', ['class' => 'btn btn-info',]);?>

    <?= Html::endForm();?>   
    </div>
</div>
