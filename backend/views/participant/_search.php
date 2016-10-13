<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ParticipantSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="participant-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'gender') 
    ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'country_id') ?>

    <?php // echo $form->field($model, 'sport_id') ?>

    <?php // echo $form->field($model, 'del') ?>

    <?php // echo $form->field($model, 'ut') ?>

    <?php // echo $form->field($model, 'enet_id') ?>

    <?php // echo $form->field($model, 'status_t') ?>

    <?php // echo $form->field($model, 'last_update') ?>

    <?php // echo $form->field($model, 'short_name') ?>

    <?php // echo $form->field($model, 'mark_id') ?>

    <?php // echo $form->field($model, 'live_monitor_name') ?>

    <?php // echo $form->field($model, 'teaser_name') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
