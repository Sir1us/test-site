<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SportformSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sportform-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'participant_num') ?>

    <?= $form->field($model, 'participant_type') ?>

    <?= $form->field($model, 'market_types') ?>

    <?php // echo $form->field($model, 'result_types') ?>

    <?php // echo $form->field($model, 'del') ?>

    <?php // echo $form->field($model, 'ut') ?>

    <?php // echo $form->field($model, 'scope_data') ?>

    <?php // echo $form->field($model, 'sport_id') ?>

    <?php // echo $form->field($model, 'is_live')->checkbox() ?>

    <?php // echo $form->field($model, 'pair_cnt') ?>

    <?php // echo $form->field($model, 'status_t') ?>

    <?php // echo $form->field($model, 'last_update') ?>

    <?php // echo $form->field($model, 'additionally') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
