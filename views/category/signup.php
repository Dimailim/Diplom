<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="container" >
    <div class="signup-form"><!--sign up form-->

        <?php  $form = ActiveForm::begin() ?>
        <h2> Регистрация нового пользователя</h2>
        <?= $form->field($signup,'username')->textInput()->input('username',['placeholder'=>'Логин'])->label(false); ?>
        <?= $form->field($signup,'password')->passwordInput()->input('password',['placeholder'=>'Пароль'])->label(false); ?>
        <?= $form->field($signup,'email')->textInput()->input('email',['placeholder'=>'E-mail'])->label(false); ?>
        <?= $form->field($signup,'surname')->textInput()->input('surname',['placeholder'=>'Фамилия'])->label(false); ?>
        <?= $form->field($signup,'name')->textInput()->input('name',['placeholder'=>'Имя'])->label(false); ?>
        <?= $form->field($signup,'lastname')->textInput()->input('lastname',['placeholder'=>'Отчество'])->label(false); ?>
        <?= $form->field($signup,'phone')->textInput()->input('phone',['placeholder'=>'Номер телефона'])->label(false); ?>
        <?= $form->field($signup,'country')->textInput()->input('country',['placeholder'=>'Страна'])->label(false); ?>
        <?= $form->field($signup,'address')->textInput()->input('address',['placeholder'=>'Адрес'])->label(false); ?>
        <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary']); ?>

        <br><br><br><br><br><br><br>
        <?php ActiveForm::end();?>
    </div>

</div>




