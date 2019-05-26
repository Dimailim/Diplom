<?php
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
<!--                    <form action="--><?//=Url::to(['category/login'])?><!--">-->
<!--                        <input type="text" placeholder="Логин" />-->
<!--                        <input type="password" placeholder="Пароль" />-->
<!--                        <span>-->
<!--								<input type="checkbox" class="checkbox"> -->
<!--								Keep me signed in-->
<!--							</span>-->
<!--                        <button type="submit" class="btn btn-primary">Login</button>-->
<!--                    </form>-->
                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'layout' => 'horizontal',
                    ]); ?>
                    <h2>Авторизация</h2>
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true])->textInput()->input('username',['placeholder'=>'Логин'])->label(false); ?>

                    <?= $form->field($model, 'password')->passwordInput()->input('password',['placeholder'=>'Пароль'])->label(false); ?>
<!--                    --><?//= $form->field($model, 'rememberMe')->checkbox() ?>
                    <div class="form-group">
                        <div class="col-lg-offset-1 col-lg-11">
                            <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <br><br>
                <h2 class="or">ИЛИ</h2>
            </div>
            <div class="col-sm-4">
                <br><br><br><br><br><br>
                <div class="signup-form"><!--sign up form-->
                        <a href="<?=Url::to(['category/signup'])?>"  class="btn btn-primary">Регистрация</a>
                    </form>
                </div><!--/sign up form-->
                <br><br><br><br><br><br><br><br><br>
            </div>
        </div>
    </div>
</section><!--/form-->