<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ArtikelStatus */

$this->title = "Tambah Artikel Status";
$this->params['breadcrumbs'][] = ['label' => 'Artikel Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artikel-status-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
