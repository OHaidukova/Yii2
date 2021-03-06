<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property int $role_id
 * @property  Roles $role
 */

// @property  string $address
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password'], 'required'],
            [['role'], 'integer'],
            [['login'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 100],
            [['login'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
            'role' => 'Role',
            'email' => 'Email'
        ];
    }

//    public function getAddress()
//    {
//        return "New address";
//    }

    public function getRole()
    {
        return $this->hasOne(Roles::class, ['id' => 'role_id']);
    }

    public static function getUserWithRole($id)
    {
        return static::find()
            ->where(['id' => 2])
            ->with('role')
            ->one();
    }

}