<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ArtikelKategori */

$this->title = "Sunting Artikel Kategori";
$this->params['breadcrumbs'][] = ['label' => 'Artikel Kategoris', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="artikel-kategori-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
