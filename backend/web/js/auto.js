$(document).ready(function () {
    $("#sel2").prop('disabled', true);
});

/*function tmpl_color(data) {
    S('#color').tmpl(data).appendTo('#vers');
}*/

function auto_type() {
    var div = $('#sel1');
    var data = { 
        id:$('option[name=auto]:selected', div).val()
    };
   $.post('/backend/web/auto/index', data, function (response) {
       var res = $.json.decode(response);
       console.log(res);
   });
}