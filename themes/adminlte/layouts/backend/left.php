<?php
    use app\models\PelayananStatus;
?>

<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= Yii::getAlias('@web').'/images/img.png'; ?>" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= ucwords(Yii::$app->user->identity->username) ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form> 
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Halaman Depan', 'icon' => 'home', 'url' => ['/frontend/index']],

                    ['label' => 'MENU NAVIGASI', 'options' => ['class' => 'header']],
                    ['label' => 'Dashboard', 'icon' => 'home', 'url' => ['/admin/index']],
                    ['label' => 'Test Ajax', 'icon' => 'home', 'url' => ['/admin/test-ajax']],

                    ['label' => 'Artikel', 'icon' => 'home', 'url' => ['/artikel/']],
                    ['label' => 'Artikel Status', 'icon' => 'home', 'url' => ['/artikel-status/']],
                    ['label' => 'Artikel Kategori', 'icon' => 'home', 'url' => ['/artikel-kategori/']],

                    ['label' => 'MODULES', 'options' => ['class' => 'header']],
                    ['label' => 'Forum', 'icon' => 'home', 'url' => ['/forum/default/index']],
                    ['label' => 'Api', 'icon' => 'home', 'url' => ['/api/rest/index']],

                    ['label' => 'MENU USER', 'options' => ['class' => 'header']],
                    ['label' => 'User', 'icon' => 'user', 'url' => ['/user'],],
                    ['label' => 'Logout', 'url' => ['site/logout'], 'template' => '<a href="{url}" data-method="post">{icon} {label}</a>' , 'visible' => !Yii::$app->user->isGuest],
                ],
            ]
        ) ?>

    </section>

</aside>
