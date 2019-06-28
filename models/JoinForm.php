<?php
namespace app\models;

use Yii;
use yii\base\Model;

class JoinForm extends Model{
    public $Email;
    public $Password;
    public $Repeat;
    
    public function rules(){
        return [
            [['Email', 'Password', 'Repeat'], 'required'],
            ['Email', 'email'],
            ['Email', 'filter', 'filter'=>'trim'],
            ['Email', 'unique', 'targetClass'=>'app\models\Accounts', 'targetAttribute'=>'Email', 'message'=>'The address is already in use.'],
            
            ['Password', 'string', 'min'=>5],
            ['Repeat', 'compare', 'compareAttribute'=>'Password', 'message'=>'Password must match!']
        ];
    }
    public function attributeLabels(){
        return [
            'Email'=>'Email', 
            'Password'=>'Password',
            'Repeat'=>'Repeat password',
        ];
    }
}