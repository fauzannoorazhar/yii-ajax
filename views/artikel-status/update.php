<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ArtikelStatus */

$this->title = "Sunting Artikel Status";
$this->params['breadcrumbs'][] = ['label' => 'Artikel Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="artikel-status-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
