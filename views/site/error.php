<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use \yii\helpers\Url;

$this->title = $name;
?>
<body>
<div class="container text-center">

    <div class="content-404">
<!--        <img src="images/404/404.png" class="img-responsive" alt="" />-->
        <?=Html::img("@web/images/404/404.png",['class' => 'img-responsive']) ?>
        <h1><b>УПС!</b> <?= Html::encode($this->title) ?></h1>
        <p> <?= nl2br(Html::encode($message)) ?></p>
        <p>Uh... So it looks like you brock something. The page you are looking for has up and Vanished.</p>
        <h2><a href="<?=Url::home();?>">Верните меня на главную страницу, пожаааалуйста!</a></h2>

    </div>
</div>
<!--<div class="site-error">-->
<!---->
<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
<!---->
<!--    <div class="alert alert-danger">-->
<!--        --><?//= nl2br(Html::encode($message)) ?>
<!--    </div>-->
<!---->
<!--    <p>-->
<!--        The above error occurred while the Web server was processing your request.-->
<!--    </p>-->
<!--    <p>-->
<!--        Please contact us if you think this is a server error. Thank you.-->
<!--    </p>-->
<!---->
<!--</div>-->
