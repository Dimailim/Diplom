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
use yii\data\Pagination;
use yii\web\HttpException;


class CategoryController extends AppController{

    public function  actionIndex(){ //действие по умолчанию
        $hits = Products::find()->where(['hit' => 1])->limit(6)->all();
        //debug($hits);
        $this->setMeta('Magique biblio - книжный интернет-магазин. Diplom by Dmitry Gvozdev');
        return $this->render('index',compact('hits'));
    }
    public function actionView($id){
        $id = Yii::$app->request->get('id');
        $genre = Genre::findOne($id);
        if(empty($genre)){
            throw new HttpException(404, 'Запрошенная категория не найдена');
        }
//        $products = Products::find()->where(['genre_id' => $id ])->all();
        $pages = Products::find()->where(['genre_id' => $id ]);
        $page = new Pagination(['totalCount'=> $pages->count(), 'pageSize'=> 9,'forcePageParam' => false, 'pageSizeParam' => false ]);
        $products = $pages->offset($page->offset)->limit($page->limit)->all();
        $this->setMeta('Magique biblio | '.$genre['genre_name'],$genre['keyword'],$genre['description']);
        //debug($genre);
        return $this->render('view',compact('products','genre', 'page'));
    }

}