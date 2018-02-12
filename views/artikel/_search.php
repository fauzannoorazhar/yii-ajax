<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ArtikelSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="artikel-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_artikel_kategori') ?>

    <?= $form->field($model, 'id_artikel_status') ?>

    <?= $form->field($model, 'judul') ?>

    <?= $form->field($model, 'konten') ?>

    <?php // echo $form->field($model, 'cover') ?>

    <?php // echo $form->field($model, 'file') ?>

    <?php // echo $form->field($model, 'create_at') ?>

    <?php // echo $form->field($model, 'create_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
