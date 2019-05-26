<?php
/**
 * Created by PhpStorm.
 * User: Dimailim
 * Date: 23.05.2019
 * Time: 0:58
 */

namespace app\modules\admin\controllers;


use yii\web\Controller;
use yii\filters\AccessControl;
use yii\rbac\PhpManager;

class AppAdminController extends Controller {

    public function behaviors()
    {
       return[ 'access' => [
            'class' => AccessControl::className(),
            'rules' =>[
                [
                    'allow' => true,
                    'roles' => ['@']
                ],

            ],
        ],
       ];

    }

}