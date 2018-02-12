<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ArtikelKategori */

$this->title = "Tambah Artikel Kategori";
$this->params['breadcrumbs'][] = ['label' => 'Artikel Kategoris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artikel-kategori-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
