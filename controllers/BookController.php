<?php
/**
 * Created by PhpStorm.
 * User: Dimailim
 * Date: 04.05.2019
 * Time: 22:13
 */

namespace app\controllers;
use app\models\Genre;
use app\models\Products;
use Yii;
use yii\web\HttpException;


class BookController extends AppController{

    public function actionView($id){
//        $id = Yii::$app->request->get('id');
        $book = Products::findOne($id);
        if(empty($book)){
            throw new HttpException(404, 'Запрошенная книга не найдена');
        }
        $hits = Products::find()->where(['hit' => 1])->limit(6)->all();
        $this->setMeta($book->product_name." | Magique biblio",$book->keyword,$book->description);
        return $this->render('view', compact('book','hits'));
    }

}