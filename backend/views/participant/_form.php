<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Participant */
/* @var $get_list_country backend\models\Participant */
/* @var $get_sports backend\models\Participant */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="participant-form">

    <?php $form = ActiveForm::begin(); ?>
        <label for="name">Name</label>
    <?= Html::input('text', "name", $model->name ? $model->name : '', ['class'=> 'form-control', 'id' => 'name', 'style' => 'margin-bottom: 15px']) ?>

    <label for="gender">Gender</label>
    <?= Html::dropDownList("gender", null ,["male" => "male" , "female" => "female"], ['class' => ['form-control', 'dropdown-toggle', 'btn-primary', 'btn'], 'style' => 'margin-bottom: 15px']) ?>

    <label for="type">Type</label>
    <?= Html::dropDownList("type", null ,["team" => "team", "athlete" => "athlete"], ['class' => ['form-control', 'dropdown-toggle', 'btn-primary', 'btn'], 'style' => 'margin-bottom: 15px']) ?>

    <label for="country_id">Country</label>
    <select name="country_id" id="country_id" style="margin-bottom: 15px; width: 100%" class="btn dropdown-toggle btn-primary" title="">
    <?php foreach ($get_list_country as $item) : ?>
        <option value="<?= $item['id'] ? $item['id'] : $item['id'] = 35?>"<?= $model->country_id == $item['id'] ? 'selected' : ''?>><?= $item['name'] ?></option>
    <?php endforeach; ?>
    </select>

    <label for="sport_id">Sport</label>
    <select name="sport_id" id="sport_id" style="margin-bottom: 15px; width: 100%" class="btn dropdown-toggle btn-primary" title="">
        <?php foreach ($get_sports as $val) : ?>
            <option value="<?= $val['id'] ?>"<?= $model->sport_id == $val['id'] ? 'selected' : ''?>><?= $val['name'] ?></option>
        <?php endforeach; ?>
    </select>

        <label for="mark_id">Mark</label>
        <?= Html::input('text', "mark_id", $model->mark_id ? $model->mark_id : '', ['class'=> 'form-control', 'id' => 'mark_id', 'style' => 'margin-bottom: 15px']) ?>

        <label for="short_name">Short name</label>
        <?= Html::input('text', "short_name", $model->short_name ? $model->short_name : '', ['class'=> 'form-control', 'id' => 'short_name', 'style' => 'margin-bottom: 15px']) ?>

        <label for="live_monitor_name">Live monitor name</label>
        <?= Html::input('text', "live_monitor_name", $model->live_monitor_name ? $model->live_monitor_name : '', ['class'=> 'form-control', 'id' => 'live_monitor_name', 'style' => 'margin-bottom: 15px']) ?>

        <label for="teaser_name">Teaser name</label>
        <?= Html::input('text', "teaser_name", $model->teaser_name ? $model->teaser_name : '', ['class'=> 'form-control', 'id' => 'teaser_name', 'style' => 'margin-bottom: 15px']) ?>

        <label for="last_update">Last update</label>
        <?= Html::input('text', "last_update", $model->last_update ? $model->last_update : '', ['class'=> 'form-control', 'id' => 'last_update', 'style' => 'margin-bottom: 15px']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
