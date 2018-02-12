<?php

use yii\helpers\Html;

dmstr\web\AdminLteAsset::register($this);
app\assets\FrontendAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <?php $this->beginBody() ?>
    <body>
    	<?= $this->render('frontend/header.php') ?>

        <?= $this->render('frontend/content.php',['content' => $content]) ?>
    </body>
    <?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>

