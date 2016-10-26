<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Sportform */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sportform-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'participant_num')->textInput() ?>

    <?= $form->field($model, 'participant_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'market_types')->textInput() ?>

    <?= $form->field($model, 'result_types')->textInput() ?>

    <?= $form->field($model, 'del')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ut')->textInput() ?>

    <?= $form->field($model, 'scope_data')->textInput() ?>

    <?= $form->field($model, 'sport_id')->textInput() ?>

    <?= $form->field($model, 'is_live')->checkbox() ?>

    <?= $form->field($model, 'pair_cnt')->textInput() ?>

    <?= $form->field($model, 'status_t')->textInput() ?>

    <?= $form->field($model, 'last_update')->textInput() ?>

    <?= $form->field($model, 'additionally')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
