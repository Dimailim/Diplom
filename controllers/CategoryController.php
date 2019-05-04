<?php
/**
 * Created by PhpStorm.
 * User: Dimailim
 * Date: 03.05.2019
 * Time: 20:54
 */

namespace app\controllers;
use app\models\Categories;
use app\models\Genre;
use app\models\Products;
use Yii;



class CategoryController extends AppController{

    public function  actionIndex(){ //действие по умолчанию
        $hits = Products::find()->where(['hit' => 1])->limit(6)->all();
        //debug($hits);
        return $this->render('index',compact('hits'));
    }
    public function actionView($id){
        $id = Yii::$app->request->get('id');
       // debug($id);
        $genre = Genre::find()->where(['id' => $id])->all();
        $products = Products::find()->where(['genre_id' => $id ])->all();
        return $this->render('view',compact('products','genre'));
    }
}