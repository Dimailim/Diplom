<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
//use Yii;
$name  = Yii::$app->user->identity->name;
$email = Yii::$app->user->identity->email;
$phone = Yii::$app->user->identity->phone;
$address = Yii::$app->user->identity->address;

?>



<section id="cart_items">

    <div class="container">
        <?php if( Yii::$app->session->hasFlash('success') ): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo Yii::$app->session->getFlash('success'); ?>
            </div>
        <?php endif;?>

        <?php if( Yii::$app->session->hasFlash('error') ): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo Yii::$app->session->getFlash('error'); ?>
            </div>
        <?php endif;?>
        <?php if(!empty($session['cart'])): ?>
        <div class=" cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Товар</td>
                    <td class="description"></td>
                    <td class="price">Цена</td>
                    <td class="quantity">Количество</td>
                    <td class="total">Cумма</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($session['cart'] as $id => $item): ?>
                <tr>
                    <td class="cart_product">
                        <a href="<?=Url::to(['book/view', 'id'=> $id])?>"><?= Html::img("@web/images/books/{$item['img']}", ['alt'=> $item['product_name'], 'height' => '120']); ?></a>
                    </td>
                    <td class="cart_description">
                        <p><a href="<?=Url::to(['book/view', 'id'=> $id])?>"><?=$item['product_name']?></a></p>
                    </td>
                    <td class="cart_price">
                        <p><?=$item['price']?>₽</p>
                    </td>
                    <td class="cart_quantity">
                        <div class="cart_quantity_button">
                           <?=$item['qty']?>
                        </div>
                    </td>
                    <td class="cart_price">
                        <p><?= $item['qty'] * $item['price']?>₽</p>
                    </td>
                    <td class="cart_delete">
                        <a class="cart_quantity_delete del-item" href="" data-id="<?=$id?>"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                <? endforeach; ?>
                <tr>
                    <td colspan="5">Количество всех товаров: </td>
                    <td class="cart_total"><p class="cart_total_price"><?=$session['cart.qty']?></p></td>
                </tr>
                <tr>
                    <td colspan="5">Cтоимость всех товаров:</td>
                <td  class="cart_total">
                    <p class="cart_total_price" ><?=$session['cart.sum']; ?>₽</p>
                </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->
<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>Подтверждение заказа</h3>
            <p>Заполните форму, чтобы оформить заказ.</p>
        </div>
        <?if(Yii::$app->user->isGuest):?>
        <?php $form = ActiveForm::begin() ?>
        <?= $form->field($order,'name') ?>
        <?= $form->field($order,'email') ?>
        <?= $form->field($order,'phone') ?>
        <?= $form->field($order,'address') ?>
        <?= Html::submitButton('Подтвердить заказ', ['class' => 'btn btn-default']) ?>
        <?php $form = ActiveForm::end() ?>
        <?else:?>
            <?php $form = ActiveForm::begin() ?>
            <?= $form->field($order,'name')->textInput(['value' => $name]) ?>
            <?= $form->field($order,'email')->textInput(['value' => $email]) ?>
            <?= $form->field($order,'phone')->textInput(['value' => $phone]) ?>
            <?= $form->field($order,'address')->textInput(['value' => $address]) ?>
            <?= Html::submitButton('Подтвердить заказ', ['class' => 'btn btn-default']) ?>
            <?php $form = ActiveForm::end() ?>
        <?endif; ?>

    </div>
<?else: ?>
<p>Корзина пуста</p>
<? endif;?>

</section><!--/#do_action-->