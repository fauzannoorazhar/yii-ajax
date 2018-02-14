<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ArtikelKomentar */

$this->title = 'Update Artikel Komentar: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Artikel Komentars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="artikel-komentar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
