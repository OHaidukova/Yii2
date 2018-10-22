<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 21/10/2018
 * Time: 21:36
 */

namespace app\behaviors;


use yii\base\Behavior;

class NewBehavior extends Behavior
{
    public $message = "behavior";

    public function myBehavior() {
        echo $this->message . $this->owner->title;
    }
}