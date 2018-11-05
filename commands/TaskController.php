<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 02/11/2018
 * Time: 21:17
 */

namespace app\commands;


use app\models\tables\Tasks;
use app\models\tables\Users;
use yii\console\Controller;

class TaskController extends Controller
{
//    public $message = "Hello, ";
//
//    public function actionTest($id) {
//        $user = Users::findOne($id);
//        var_dump($this->message, $user->login);
//    }
//
//    public function options($actionID) {
//        return [
//            'message'
//        ];
//    }

    public function actionTest() {
        $task = Tasks::getTasksEnd();

        for($i = 0; $i < count($task) - 1; $i++) {
            var_dump($user = Users::findOne($task[$i]->id_developer));
        };

    }

}