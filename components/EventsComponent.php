<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 25/10/2018
 * Time: 22:15
 */

namespace app\components;

use app\models\tables\Tasks;
use app\models\tables\Users;
use yii\base\Component;
use yii\base\Event;

class EventsComponent extends Component
{
    public function init() {

        parent::init();

        Event::on(Tasks::class, Tasks::EVENT_AFTER_INSERT, function($event) {

            $model = $event->sender;
            $user = Users::findOne($model->id_developer);
            $message = "New task for you";

            echo "Message send";
            //                \Yii::$app->mailer->compose()
//                    ->setTo($user->email)
//                    ->setSubject("New task")
//                    ->setTextBody($message)
//                    ->send();
        });

}
}