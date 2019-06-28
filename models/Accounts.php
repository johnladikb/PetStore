<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "accounts".
 *
 * @property int $idAccount
 * @property string $Email
 * @property string $Password
 * @property string $FirstName
 * @property string $LastName
 * @property string $Address
 * @property string $City
 * @property string $State
 * @property string $Zip
 * @property string $Phone
 */
class Accounts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accounts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Email', 'Password'], 'required'],
            [['Email', 'Password', 'FirstName', 'LastName', 'Address', 'City', 'State', 'Zip', 'Phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idAccount' => 'Id Account',
            'Email' => 'Email',
            'Password' => 'Password',
            'FirstName' => 'First Name',
            'LastName' => 'Last Name',
            'Address' => 'Address',
            'City' => 'City',
            'State' => 'State',
            'Zip' => 'Zip',
            'Phone' => 'Phone',
        ];
    }
}
