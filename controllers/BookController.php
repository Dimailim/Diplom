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
use app\models\Review;
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
        $review = new Review();
        if($review->load(Yii::$app->request->post())  && $review->validate()){
            $review->product_id = $book->id;
            if($review->save()){
                Yii::$app->session->setFlash('success','Отзыв успешно отправлен!  Спасибо! ;)');
                return $this->refresh();
            }
            else{
                Yii::$app->session->setFlash('error','Упс! Что-то пошло не так. Прроизошла ошибка, напишите в тех. поддержку, или  попробуйте снова!');
            }
        }
        $res = Review::find()->where(['product_id' => $book->id])->all();
        return $this->render('view', compact('book','hits','res','review'));

    }

}