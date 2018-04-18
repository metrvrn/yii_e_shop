<?php

namespace app\controllers\admin;

use app\models\User;
use app\models\catalog\PricesTypes;
use yii\data\Pagination;

class UserController extends AdminController
{
    public $layout = 'admin';

    public function actionIndex()
    {
        $userQuery = User::find()->with('priceType');
        $page = new Pagination([
            'totalCount' => $userQuery->count()
        ]);
        $users = $userQuery
            ->limit($page->limit)
            ->offset($page->offset)
            ->all();
        return $this->render('index', [
            'users' => $users,
            'pagination' => $page
        ]);
    }

    public function actionDetail($id)
    {
        $user = User::findOne(['id' => $id]);
        $priceTypes = PricesTypes::find()->all();
        return $this->render('detail', [
            'user' => $user,
            'priceTypes' => $priceTypes
        ]);
    }
}