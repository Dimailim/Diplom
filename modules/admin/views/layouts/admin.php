<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\ieAppAsset;
use yii\helpers\Url;
use yii\bootstrap\Modal;

AppAsset::register($this);
ieAppAsset::register($this);


?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title>Админ панель | <?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <link rel="shortcut icon" href="/images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="/images/ico/apple-touch-icon-57-precomposed.png">
    </head><!--/head-->

    <body>
    <?php $this->beginBody() ?>

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <!--                    <img src="/images/home/logo.png" alt="" />-->
<!--                        <a href="--><?//= Url::home()?><!--">--><?//= Html::img('@web/images/home/logo.png'); ?><!--</a>-->
                        <h4>Админ панель</h4>
                    </div>

                </div>
                <div class="col-sm-8">

                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-user"></i>Вы вошли как <?=Yii::$app->user->identity->username?> </a></li>
                            <li><a href="<?=Url::home()?>"><i class="fa fa-lock"></i>Вернуться на сайт</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="<?= Url::to(['/admin'])?>" class="active">Главная</a></li>
                            <li><a href="<?=Url::to(['order/index'])?>">Заказы</a></li>
                            <li class="dropdown"><a href="#">Категории<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="<?=Url::to(['category/index'])?>">Список категорий</a></li>
                                <li><a href="<?=Url::to(['category/create'])?>">Создать категорию</a></li>
                            </ul>
                            </li>
                            <li class="dropdown"><a href="#">Товары<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="<?=Url::to(['product/index'])?>">Список товаров</a></li>
                                    <li><a href="<?=Url::to(['product/create'])?>">Создать товар</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Жанры<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="<?=Url::to(['genre/index'])?>">Список жанров</a></li>
                                    <li><a href="<?=Url::to(['genre/create'])?>">Создать жанр</a></li>
                                </ul>
                            </li>
                            <li><a href="<?=Url::to(['review/index'])?>">Отзывы</a></li>
                            <li><a href="<?=Url::to(['user/index'])?>">Пользователи</a></li>

                        </ul>
                    </div>
                </div>
        </div>
        </div>
    </div><!--/header-bottom-->
    </header><!--/header-->
    <div class="container">
        <?php if( Yii::$app->session->hasFlash('success') ): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo Yii::$app->session->getFlash('success'); ?>
            </div>
        <?php endif;?>
        <?=$content;?>
    </div>


    <footer id="footer"><!--Footer-->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2019 Diplom by Dmitry Gvozdev. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span> edited by Dimailim</p>
                </div>
            </div>
        </div>
    </footer><!--/Footer-->

    <?php $this->endBody() ?>
    </body>

    </html>
<?php $this->endPage() ?>