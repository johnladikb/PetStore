<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pets */
/* @var $req app\models\RequiredForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pets-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idCategory')->textInput() ?>

    <?= $form->field($req, 'Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($req, 'Description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Cost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Picture')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DatePosted')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
