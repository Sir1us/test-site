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
        <option value="<?= $item['id']?>"<?= $model->country_id == $item['id'] ? 'selected' : ''?>><?= $item['name'] ?></option>
    <?php endforeach; ?>
    </select>

    <label for="sport_id">Sport</label>
    <select name="sport_id" id="sport_id" style="margin-bottom: 15px; width: 100%" class="btn dropdown-toggle btn-primary" title="">
        <?php foreach ($get_sports as $val) : ?>
            <option value="<?= $val['id'] ?>"<?= $model->sport_id == $val['id'] ? 'selected' : ''?>><?= $val['name'] ?></option>
        <?php endforeach; ?>
    </select>

    <div class="form-group" style="width: 100%">
        <label for="mark_name">Mark:</label>
        <div class="input-group">
            <select name="mark_id" id="mark_names" style="height: 34px; width: 100%; border-radius:4px 0 0 0; " class="btn btn-primary dropdown-toggle" title="">
                <option></option>
                <?php foreach ($get_marks as $mark) : ?>
                    <option value="<?=$mark['id']?>"<?= $model->mark_id == $mark['id'] ? 'selected' : ''?>><?= $mark['mark_name'] ?></option>
                <?php endforeach; ?>
            </select>
            <div class="input-group-btn">
                <button type="button" class="btn btn-info" style="border-radius: 0;" onclick="edit_mark()" data-toggle="modal" data-target="#range_window">Edit</button>
            </div>
            <div class="input-group-btn">
                <button type="button" class="btn btn-success" data-toggle="modal" onclick="refresh_mark()" data-target="#range_window" data-whatever="@mdo">Create New Mark</button>
            </div>
        </div>
    </div>


        <label for="short_name">Short name</label>
        <?= Html::input('text', "short_name", $model->short_name ? $model->short_name : '', ['class'=> 'form-control', 'id' => 'short_name', 'style' => 'margin-bottom: 15px']) ?>

        <label for="live_monitor_name">Live monitor name</label>
        <?= Html::input('text', "live_monitor_name", $model->live_monitor_name ? $model->live_monitor_name : '', ['class'=> 'form-control', 'id' => 'live_monitor_name', 'style' => 'margin-bottom: 15px']) ?>

        <label for="teaser_name">Teaser name</label>
        <?= Html::input('text', "teaser_name", $model->teaser_name ? $model->teaser_name : '', ['class'=> 'form-control', 'id' => 'teaser_name', 'style' => 'margin-bottom: 15px']) ?>

        <label for="last_update">Last update</label>
        <?= Html::input('text', "last_update", $model->last_update ? $model->last_update : '', ['class'=> 'form-control', 'id' => 'last_update', 'style' => 'margin-bottom: 15px', 'readonly' => 'readonly']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>


<div class="modal fade" id="range_window" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog " style="width:470px;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Mark Form</h4>
            </div>
            <div class="modal-body" id="mark_form">
                <input type="hidden" name="id" value="">
                <div class="form-group">
                    <label for="marks_name">Mark name:</label>
                    <input type="text" class="form-control transfield_rl" name="marks_name" value="" required>
                </div>
                <div class="form-group">
                    <label for="slug">Slug:</label>
                    <input type="text" class="form-control" name="slug" value=""  required>
                </div>
                <div class="form-group">
                    <label for="short_name">Short name:</label>
                    <input type="text" class="form-control transfield_rl" name="short_name" value=""  required>
                </div>
                <label>Default mark:</label>
                <div class="form-group">
                    <div class="material-switch">
                        <input id="someSwitchOptionSuccess" name="default" type="checkbox">
                        <label for="someSwitchOptionSuccess" class="label-success"></label>
                        <span><b></b></span>
                    </div>
                </div>
            </div>
            <!--кнопки-->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="add_par_mark()">Save</button>
            </div>
        </div>
    </div>
</div>
