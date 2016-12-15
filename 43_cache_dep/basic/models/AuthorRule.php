<?php
namespace app\models;

use yii\rbac\Rule;// execute

use Yii;

class AuthorRule extends Rule
{
    
    public $name = "isAuthor";

    public function execute($user, $item, $params)
    {
        $action = Yii::$app->controller->action->id;

        if ($action == 'delete') {
            $cateid = Yii::$app->request->get("id");
            $cate = Category::findOne($cateid);
            return $cate->adminid == $user;
        }

        return true;

    }

}
