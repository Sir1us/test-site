<?php
/* @var $this yii\web\View */


/**
 * @var $data
 */
?>
<div>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">

        <div role="tabpanel" class="tab-pane active" id="home">
            <div class="form-group">
                <label for="sel1">Select list (select one):</label>
                <select class="form-control" id="sel1" onchange="auto_type();">
                    <option value="">--Car make--</option>
                    <?php foreach ($data as $item): ?>
                    <option name="auto" value="<?=$item['name']?>"><?=$item['name']?></option>
                    <?php endforeach; ?>
                </select>

                <label for="sel2">Select list (select one):</label>
                <select class="form-control" id="sel2">
                    <option value="">--Color--</option>
                </select>
                </div>
        </div>

        <div role="tabpanel" class="tab-pane" id="profile">2</div>
        <div role="tabpanel" class="tab-pane" id="messages">3</div>
        <div role="tabpanel" class="tab-pane" id="settings">4</div>
    </div>

</div>

<script type="text/x-jquery-tmpl" id="version_list_tmpl">
<option value="" id="color" version_key=""></option>
</script>