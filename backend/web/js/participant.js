/**
 * Created on 25.10.16.
 */
/**
 * js функция, создает и меняет марки
 */

function add_par_mark() {

    var div = $('.modal-body').get(0);
    var data = {
        //_csrf:$('meta[name="csrf-token"]').attr("content"),
        mark_name:$('input[name=marks_name]', div).val(),
        slug:$('input[name=slug]', div).val(),
        short_name:$('input[name=short_name]', div).val(),
        id:$('input[name=id]', div).val()
    };
    data['default'] = $('input[name=default]', div).is(':checked') ? '1' : '0';
    var mark_def_id = $('#mark_names').val();
    $.post('/participant/update_mark/', data, function (response) {
        var list = $.json.decode(response);
        $('#mark_names').html('');
        $.each(list,function() {
            $('<option/>', {
                val:  this.id,
                text: this.mark_name
            }).appendTo('#mark_names');
        });
        $('#mark_names').val(mark_def_id);
    })
}
/**
 * js функция, загружает марк в поле edit
 */
function edit_mark() {

    var mark_id = $('#mark_names').val();
    if(!mark_id) return;
    $.get('/participant/get_mark?mark_id='+mark_id, function (response) {
        var mark = $.json.decode(response);
        $('#mark_form input[name=id]').val(mark.id);
        $('#mark_form input[name=marks_name]').val(mark.mark_name);
        $('#mark_form input[name=slug]').val(mark.slug);
        $('#mark_form input[name=short_name]').val(mark.short_name);
        if (mark.default == '1') {
            $('#mark_form input[name=default]').attr('checked', 'checked');
        } else {
            $('#mark_form input[name=default]').removeAttr('checked');
        }
    })
}
/**
 * js функция, загружает пустые данные для create
 */
function refresh_mark() {
    var mark_id = $('#mark_names').val();
    $.get('/participant/get_mark?mark_id='+mark_id, function () {
        $('#mark_form input[name=id]').val("");
        $('#mark_form input[name=marks_name]').val("");
        $('#mark_form input[name=slug]').val("");
        $('#mark_form input[name=short_name]').val("");
        $('#mark_form input[name=default]').removeAttr('checked');
    })
}


