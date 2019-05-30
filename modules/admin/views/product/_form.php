<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\Genre;
use \app\components\MenuWidget;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
mihaildev\elfinder\Assets::noConflict($this);

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">


    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?//= $form->field($model, 'genre_id')->textInput() ?>

    <?=  $form->field($model, 'genre_id')->dropDownList(ArrayHelper::map(Genre::find()->all(), 'id','genre_name'))?>

    <?= $form->field($model, 'product_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'publisher')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'year_of_publishing')->textInput() ?>

    <?= $form->field($model, 'pages')->textInput() ?>

<!--    --><?//= $form->field($model, 'age')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'age')->dropDownList(
        [
            '0+' => '0+',
            '6+' => '6+',
            '12+' => '12+',
            '16+' => '16+',
            '18+' => '18+',
        ]
    ); ?>

    <?//= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?/*= $form->field($model, 'content')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]);*/?>

   <?= $form->field($model, 'content')->widget(CKEditor::className(), [
            'editorOptions' => ElFinder::ckeditorOptions('elfinder',[]),]); ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'keyword')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'hit')->textInput() ?>

    <?= $form->field($model,'hit')->dropDownList(
        [
            '0' => 'Нет',
            '1' => 'Да' ,
        ]
    ); ?>

    <?//= $form->field($model, 'new')->textInput() ?>

    <?= $form->field($model,'new')->dropDownList(
        [
            '0' => 'Нет',
            '1' => 'Да' ,
        ]
    ); ?>

    <?//= $form->field($model, 'sale')->textInput() ?>

    <?= $form->field($model,'sale')->dropDownList(
        [
            '0' => 'Нет',
            '1' => 'Да' ,
        ]
    ); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
