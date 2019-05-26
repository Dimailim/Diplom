<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends AppAdminController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $role = Yii::$app->user->identity->role;
       if($role === 'admin' ){
           return $this->render('index');
       }
       else{
           return $this->goHome();
       }

    }
}
