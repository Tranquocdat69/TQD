<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model frontend\models\Experiences */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="experiences-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'user_id')->textInput() ?> -->

    <?= $form->field($model, 'exp')->textArea() ?>

    <?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>

    <?= 
    $form->field($model, 'started_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter date ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format'=>'yyyy/mm/dd'
        ]
    ]);?>
    <?= 
    $form->field($model, 'end_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter date ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format'=>'yyyy/mm/dd'
        ]
    ]);?>
   <div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
