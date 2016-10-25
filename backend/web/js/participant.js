/**
 * Created on 25.10.16.
 */
/**
 * js функция, создает и меняет марки
 */

function add_par_mark() {
    var div = $('.modal-body').get(0);
    var data = {
        marks_name:$('input[name=marks_name]', div).val(),
        slug:$('input[name=slug]', div).val(),
        short_name:$('input[name=short_name]', div).val(),
        id:$('input[name=id]', div).val()
    };
    data['default'] = $('input[name=default]', div).is(':checked') ? 't' : 'f';
    $.post('/participant/update_mark/', data, function (response) {
        console.log(response);
        var list = $.json.decode(response);
        $('#mark_names').html('');
        $('#mark_list_tmpl').tmpl(list).appendTo('#mark_names');
        $('#mark_names option[value='+data.id+']').attr('selected', true);
        //$('#mark_names').val(data.id);
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
        $('#mark_form input[name=marks_name]').val(mark.name);
        $('#mark_form input[name=slug]').val(mark.slug);
        $('#mark_form input[name=short_name]').val(mark.short_name);
        if (mark.default == 't') {
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


