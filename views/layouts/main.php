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
    <title><?= Html::encode($this->title) ?></title>
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
                    <a href="<?= Url::home()?>"><?= Html::img('@web/images/home/logo.png'); ?></a>
                </div>

            </div>
            <div class="col-sm-8">
                <div class="shop-menu pull-right">
                    <ul class="nav navbar-nav">
                        <li><a href="<?=Url::to(['wishlist/view'])?>"><i class="fa fa-star"></i> Закладки</a></li>
                        <li><a href="#" onclick="return getCart()"><i class="fa fa-shopping-cart"></i> Корзина</a></li>
                        <? if( Yii::$app->user->isGuest):?>
                        <li><a href="<?=Url::to(['category/login'])?>"><i class="fa fa-lock"></i> Авторизация</a></li>
                         <? else:?>
                            <li><a href="<?=Url::to(['category/logout'])?>"><i class="fa fa-lock"></i> Выйти(<?=Yii::$app->user->identity->username?>)</a></li>
                        <? endif; ?>
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
                <div class="mainmenu pull-left">
                    <ul class="nav navbar-nav collapse navbar-collapse">
                        <li><a href="<?= Url::home()?>" class="active">Главная</a></li>
                        <li class="dropdown"><a href="#">Магазин<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="<?=Url::to(['category/index'])?>">Книги</a></li>
                                <li><a href="<?=Url::to(['wishlist/view'])?>">Мои закладки</a></li>
                                <li><a href="#" onclick="return getCart()">Корзина</a></li>
                                <li><a href="<?=Url::to(['category/login'])?>">Авторизация</a></li>
                            </ul>
                        </li>
                        <li><a href="<?=Url::to(['category/contact'])?>">Контакты</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="search_box pull-right">
                    <form  method="get" action="<?= Url::to(['category/search'])?>">
                    <input type="text" placeholder="Поиск" name = "q"/>
                    </form>
                    <p align="right"><a href="<?=Url::to(['category/asearch']) ?>" ><font size="1"> Расширенный поиск</font></a></p>
                </div>
            </div>
        </div>
    </div>
</div><!--/header-bottom-->
</header><!--/header-->

<?=$content;?>

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
<?php
 Modal::begin([
         'header' => '<h2>Корзина</h2>',
         'id' => 'cart',
         'size' => 'modal-lg',
         'footer' => '<button type="button" class="btn btn-primary" data-dismiss="modal">Продолжить покупки</button>
        <a href="'.Url::to(['cart/view']).'" class="btn btn-primary">Оформить заказ</a>
        <button type="button" class="btn btn-primary" onclick="clearCart()">Очистить корзину</button>',
 ]);

 Modal::end();
?>

<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>