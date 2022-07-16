console.log("thumborurl admin");
$('#thumborurl-save-btn').click(function(e) {
    url = OC.generateUrl('/apps/thumborurl/api/1.0/save_settings');
    var thumborBase = $('input[name=thumbor_base]').val();
    var thumborKey = $('input[name=thumbor_key]').val();
    var thumborDir = $('input[name=thumbor_dir]').val();
    var req = { thumbor_base: thumborBase, thumbor_key: thumborKey, thumbor_dir: thumborDir };

    $.ajax({
        url: url,
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(req),
    }).done(function(resp) {
        console.log(resp);
    }).fail(function(resp) {
        console.log(resp);
    });
});
