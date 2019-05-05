<?php
/**
 * Created by PhpStorm.
 * User: Dimailim
 * Date: 03.05.2019
 * Time: 20:50
 */

namespace app\controllers;


use yii\web\Controller;

class AppController extends Controller{

    public function  setMeta($title = null, $keywords = null, $description = null ){
        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);
    }

}