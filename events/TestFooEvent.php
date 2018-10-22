<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 21/10/2018
 * Time: 20:25
 */

namespace app\events;

use yii\base\Event;

class TestFooEvent extends Event
{
    public $message;
}