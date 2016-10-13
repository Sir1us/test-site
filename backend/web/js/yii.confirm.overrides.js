/**
 * Override the default yii confirm dialog. This function is
 * called by yii when a confirmation is requested.
 *
 * @param string message the message to display
 * @param string ok callback triggered when confirmation is true
 * @param string cancelCallback callback triggered when cancelled
 */
yii.confirm = function (message, okCallback, cancelCallback) {
    swal({
        title: message,
        type: 'warning',
        showCancelButton: true,
        closeOnConfirm: true,
        allowOutsideClick: true
    }, okCallback);
};


//Также это будет работать при использовании кнопок в коде проекта:
/*
<?php

    use yii\helpers\Html;

//...

echo Html::submitButton(
    'Кнопка',
    [
        'class' => 'btn',
    'data-confirm' => Yii::t('yii', 'Вы точно хотите это сделать?'),
]
);*/
