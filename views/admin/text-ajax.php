<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Artikel */
/* @var $form yii\widgets\ActiveForm */
?>

<?php /*$form = ActiveForm::begin([
    'type' => ActiveForm::TYPE_HORIZONTAL,
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>false,
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'label' => 'col-sm-2',
            'wrapper' => 'col-sm-4',
            'error' => '',
            'hint' => '',
        ],
    ]
]);*/ ?>

<div class="artikel-form box box-primary">

    <div class="box-header">
        <h3 class="box-title">Form Artikel</h3>
    </div>
	<div class="box-body">

    <div class="row">
        <div class="col-lg-5">
            <?php /*$form = ActiveForm::begin([
                'id' => 'contact-form',
                'enableAjaxValidation' => true,
                'enableClientValidation' => true
            ]); ?>

                <?= $form->field($model, 'name') ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'subject') ?>
                <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>
            <?php ActiveForm::end();*/ ?>

            <?php 

            $form = ActiveForm::begin();

            foreach ($models as $index => $model) {
                echo $form->field($model, "[$index]judul")->label($model->judul);
            } ?>

            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>

            <?php ActiveForm::end();

            ?>
        </div>
    </div>

	</div>

</div>

<?php /*ActiveForm::end();*/ ?>
