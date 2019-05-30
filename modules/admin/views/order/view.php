<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = 'Заказ №'.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        <?//= Html::a('Удалить', ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => 'Вы уверены что хотите удалить этот заказ',
//                'method' => 'post',
//            ],
//        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'created_at',
            'updated_at',
            'qty',
            'sum',
            [
                'attribute' => 'status',
                'value' => function($data){
                    return !$data->status ? "<span class='text-danger'>Активен</span>" : "<span class='text-success'>Завершен</span>";
                },
                'format' => 'html',
            ],
            //'status',
            'name',
            'email:email',
            'phone',
            'address',
        ],
    ]) ?>
    <?php $items = $model->orderItems; //debug($items)?>
    <h4>Заказанные товары </h4>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Название</th>
                <th>Цена</th>
                <th>Количество</th>
                <th>Сумма </th>

            </tr>
            </thead>
            <tbody>
                <?foreach ($items as $item):?>
                <tr>
                    <td><a href="<?=Url::to(['/book/view', 'id'=> $item->product_id])?>"><?=$item->name?></a></td>
                    <td><?=$item->price?> ₽</td>
                    <td><?=$item->qty_item?></td>
                    <td><?=$item->sum_item?> ₽</td>
                </tr>
            <? endforeach;?>
            </tbody>
        </table>
    </div>

</div>
