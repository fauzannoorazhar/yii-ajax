<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ArtikelKomentar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="artikel-komentar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_artikel')->textInput() ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'konten')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'create_at')->textInput() ?>

    <?= $form->field($model, 'create_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
