<?php

namespace app\models\tables;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $number
 * @property string $name
 * @property string $details
 * @property int $id_developer
 * @property string $date_create
 * @property string $date_resolve
 * @property int $id_status
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    public function behaviors() {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['date_create', 'date_change'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['date_change'],
                ],
                'value' => new Expression('NOW()'),

            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'name'], 'required'],
            [['id_developer', 'id_status'], 'integer'],
            [['date_create', 'date_resolve', 'date_change'], 'safe'],
            [['number', 'name'], 'string', 'max' => 50],
            [['details'], 'string', 'max' => 500],
            [['number'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Number',
            'name' => 'Name',
            'details' => 'Details',
            'id_developer' => 'Id Developer',
            'date_create' => 'Date Create',
            'date_resolve' => 'Date Resolve',
            'id_status' => 'Id Status',
            'date_change' => 'Date Change',
        ];
    }

    public static function getTasksCurrentMonth()
    {
        return static::find()
            ->andWhere(['>', 'date_create', new Expression('LAST_DAY(CURDATE()) + INTERVAL 1 DAY - INTERVAL 1 MONTH') ])
            ->andWhere(['<', 'date_create', new Expression('DATE_ADD(LAST_DAY(CURDATE()), INTERVAL 1 DAY)') ]);
//            ->all();
    }

}