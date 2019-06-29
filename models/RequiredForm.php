<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RequiredForm extends Model
{
    public $Name;
    public $Description;
    
    
    
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['Name', 'Description'], 'required']
        ];
    }
    
}
