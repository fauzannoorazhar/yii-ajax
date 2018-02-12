<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Artikel */

$this->title = "Detail Artikel";
$this->params['breadcrumbs'][] = ['label' => 'Artikel', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artikel-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Artikel</h3>
    </div>

    <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
        'attributes' => [
            [
                'attribute' => 'id',
                'format' => 'raw',
                'value' => $model->id,
            ],
            [
                'attribute' => 'id_artikel_kategori',
                'format' => 'raw',
                'value' => $model->id_artikel_kategori,
            ],
            [
                'attribute' => 'id_artikel_status',
                'format' => 'raw',
                'value' => $model->id_artikel_status,
            ],
            [
                'attribute' => 'judul',
                'format' => 'raw',
                'value' => $model->judul,
            ],
            [
                'attribute' => 'konten',
                'format' => 'raw',
                'value' => $model->konten,
            ],
            [
                'attribute' => 'cover',
                'format' => 'raw',
                'value' => $model->cover,
            ],
            [
                'attribute' => 'file',
                'format' => 'raw',
                'value' => $model->file,
            ],
            [
                'attribute' => 'create_at',
                'format' => 'raw',
                'value' => $model->create_at,
            ],
            [
                'attribute' => 'create_by',
                'format' => 'raw',
                'value' => $model->create_by,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Artikel', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Artikel', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
