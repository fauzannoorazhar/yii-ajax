<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use dosamigos\ckeditor\CKEditor;
use app\models\ArtikelKategori;
use app\models\ArtikelStatus;

/* @var $this yii\web\View */
/* @var $model app\models\Artikel */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
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
]); ?>

    <?php foreach ($models as $index => $model) { ?>
        <div class="box box-primary">

            <div class="box-header">
                <h3 class="box-title">Form Artikel <?= $model->judul ?></h3>
            </div>

            <div class="box-body">

                <?= $form->field($model, '[$index]judul',[
                    'horizontalCssClasses' => [
                        'wrapper' => 'col-sm-6',
                    ],
                ])->textArea(['rows' => 4]) ?>

                <?= $form->field($model, '[$index]konten',[
                    'horizontalCssClasses' => [
                        'wrapper' => 'col-sm-6',
                    ],
                ])->widget(CKEditor::className(), [
                    'options' => ['rows' => 6],
                    'preset' => 'advanced'
                ]) ?>

                <?= $form->field($model, '[$index]id_artikel_kategori')->widget(select2::className(), [
                    'data' => ArtikelKategori::getList(),
                    'options' => [
                        'placeholder' => 'Pilih Kategori',
                    ]
                ]) ?>

                <?= $form->field($model, '[$index]id_artikel_status')->widget(select2::className(), [
                    'data' => ArtikelStatus::getList(),
                    'options' => [
                        'placeholder' => 'Pilih Status',
                    ]
                ]) ?>

                <?= $form->field($model, '[$index]cover')->fileInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'file')->fileInput(['maxlength' => true]) ?>

            </div>

        </div>
    <?php } ?>

<div class="box box-primary">
    <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan',['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>