<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/10/2018
 * Time: 23:40
 */

namespace app\models;


use app\behaviors\NewBehavior;
use app\events\TestFooEvent;
use yii\base\Event;
use yii\base\Model;

class Test extends Model
{
    public $title;
    public $content;

    const EVENT_FOO_START = 'foo_start';
    const EVENT_FOO_END = 'foo_end';

    public function rules() {

        return [
            [['title'], 'myValidate']
        ];
    }

    public function behaviors() {
        return [
            'my' => [
                'class' => NewBehavior::class,
                'message' => 'Local behavior'
                ]
        ];
    }

    public function myValidate($attr, $params) {
        if($this->$attr != 'new') {
            $this->addError($attr, 'Name is different');
        }
    }

    public function foo() {

        $event = new TestFooEvent();
        $event->message = date('Y-m-d');

        $this->trigger(static::EVENT_FOO_START, $event);
        echo 'Action 1<br>';
        echo 'Action 2<br>';
        echo 'Action 3<br>';
        $this->trigger(static::EVENT_FOO_END);
    }
}