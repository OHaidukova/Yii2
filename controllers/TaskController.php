<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/10/2018
 * Time: 21:53
 */

namespace app\controllers;


use app\models\ContactForm;
use app\models\tables\Tasks;
use app\models\tables\Users;
use app\models\Test;
use yii\base\Event;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class TaskController extends Controller
{
//    public $layout = 'new';
    public $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    public function actionIndex() {

        $provider = new ActiveDataProvider([
            'query' => Tasks::getTasksCurrentMonth(),
        ]);

        return $this->render('index', [
            'provider' => $provider,
            'months' => $this->months,
        ]);

//        var_dump($tasks);

//        var_dump(\Yii::$app->request->get('id'));
//        var_dump('55');

//        $model = new Test();
//        $model->title = 'new';
//        var_dump($model->validate());
//        var_dump($model->getErrors());
//        exit;

//        return $this->render('index', [
//            'title' => 'Yii2',
//            'content' => 'test'
//        ]);

//        Without layout
//        return $this->renderPartial('index', [
//            'title' => 'Yii2',
//            'content' => 'test'
//        ]);
    }

    public function actionTest() {
//        \Yii::$app->db->createCommand("
//             INSERT INTO test(name, content, created) VALUES
//                ('name1', 'content1', NOW()),
//                ('name2', 'content2', NOW()),
//                ('name3', 'content3', NOW())
//         ")->execute();

//        $res = \Yii::$app->db->createCommand("
//            SELECT * FROM test
//        ")->queryAll();

//        $res = \Yii::$app->db->createCommand("
//            SELECT * FROM test WHERE id = 1
//        ")->queryOne();

//        $res = \Yii::$app->db->createCommand("
//            SELECT id FROM test
//        ")->queryColumn();

//        $res = \Yii::$app->db->createCommand("
//           SELECT COUNT(*) FROM test
//        ")->queryScalar();

//        $id = 1;
//        $res = \Yii::$app->db->createCommand("
//            SELECT * FROM test WHERE id = :id
//        ")
//            ->bindParam(':id', $id)
//            ->queryAll();
//        var_dump($res);

//        Create data!!!!
//        $user = new Users();
//        $user->login = 'Deny2';
//        $user->password = '1';
//        $user->role = 2;
//
//        $user->save();

//        Read data: find PrimaryKey!!!!
//        $user = Users::findOne(1);
//        var_dump($user);
//        $user1 = Users::findOne(['login' => 'admin']);
//        var_dump($user1);
//        $users = Users::findAll([1, 2]);
//        var_dump($users);
//        $users = Users::find()->all();
//        var_dump($users);

//        Change data!!!!
//        $user = Users::findOne(1);

//        For new record after found data
//        $user->isNewRecord = true;
//        For autoincrement
//        $user->id = null

//        $user->login = 'admin_new';
//        $user->save();

//        Delete data!!!!
//        $user = Users::findOne(1);
//        $user->delete();

//        Users::deleteAll(['login' => 'admin']);
//        Users::deleteAll('id' > 3);
//        Users::deleteAll(['>', 'id', 3]);

//        var_dump(Users::find()
//            ->select('id', 'login')
//            ->where('<', 'id', 3)
//        );

//        For portions!!!!!
//        var_dump(Users::find()->batch(1000));


//        New property!!!!!
//        $user = Users::findOne(2);
//        var_dump($user->address);

//        $user = Users::findOne(2);
//        var_dump($user->role);

//        $user = Users::getUserWithRole(2);
//
//        var_dump($user);



//        Events!!!!!
//        $model = new Test();
//
//        $handler = function() {
//            echo 'First works<br>';
//        };
//
//        $model->on(Test::EVENT_FOO_START, $handler);
//
//        $model->on(Test::EVENT_FOO_END, function() {
//            echo 'Last works<br>';
//        });
//
//        $model->foo();
//
//        $model->off(Test::EVENT_FOO_START, $handler);
//        $model->foo();


        // Events for every Test!!!!!
//        $handler = function($event) {
//            echo "First works {$event->message}<br>";
//        };
//
//        Event::on(Test::class, Test::EVENT_FOO_START, $handler);
//
//        $model = new Test();
//        $model->foo();

        //Event for Users!!!
//        Event::on(Users::class, Users::EVENT_AFTER_INSERT, function($event) {
//            $task = new Tasks([
//                'number' => '105',
//                'name' => 'Read document',
//                'id_developer' => $event->sender->id,
//                'date_create' => date('Y-m-d'),
//            ]);
//
//            $task->save();
//        });
//
//        $user = new Users();
//
//        $user->login = 'Mark';
//        $user->password = '1';
//
//        $user->save();


//        Behaviors!!!!
//
//        $model = new Test();

//        $model->attachBehavior('my', [
//            'class' => NewBehavior::class,
//            'message' => 'Local behavior for one test'
//        ]);
//
//        $model->detachBehavior('my');
//
//        $model->title = ' new title ';
//        $model->myBehavior();
//
///
///
///   //        Behaviors!!!!
//        $task = new Tasks([
//                'number' => '106',
//                'name' => 'Create behaviors',
//                'id_developer' => 2,
//            ]);
//
//            $task->save();

    }

    public function actionCache() {

        $key = 'number';
        $cache = \Yii::$app->cache;

//        $cache->flush();

        if($cache->exists($key)) {
            var_dump("123");
            $number = $cache->get($key);
        }
        else {
            $number = rand();
            $cache->set($key, $number, 10);
        };

        var_dump($number);
    }

}