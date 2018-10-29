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
use yii\imagine\Image;

class Test extends Model
{
    public $name;
    public $content;
    public $image;

    const EVENT_FOO_START = 'foo_start';
    const EVENT_FOO_END = 'foo_end';

    public function rules() {

//        return [
//            [['name'], 'myValidate']
//        ];

        return [
            [['image'], 'file', 'extensions' => 'jpg, png'],
            [['name', 'content'], 'safe']
        ];
    }

    public function upload() {

        if($this->validate()) {
            $baseName = $this->image->getBaseName() . "." . $this->image->getExtension();
            $fileName = '@webroot/img/' . $baseName;
            $this->image->saveAs(\Yii::getAlias($fileName));
            Image::thumbnail($fileName, 100, 120)->save(\Yii::getAlias('@webroot/img/small/' . $baseName));
        } return false;

    }

//    public function behaviors() {
//        return [
//            'my' => [
//                'class' => NewBehavior::class,
//                'message' => 'Local behavior'
//                ]
//        ];
//    }
//
//    public function myValidate($attr, $params) {
//        if($this->$attr != 'new') {
//            $this->addError($attr, 'Name is different');
//        }
//    }
//
//    public function foo() {
//
//        $event = new TestFooEvent();
//        $event->message = date('Y-m-d');
//
//        $this->trigger(static::EVENT_FOO_START, $event);
//        echo 'Action 1<br>';
//        echo 'Action 2<br>';
//        echo 'Action 3<br>';
//        $this->trigger(static::EVENT_FOO_END);
//    }
}