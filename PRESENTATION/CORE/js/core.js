
function ajax_call(base_url,data,url) {
    
    jQuery.ajax({
        url: base_url +'/'+ url,
        dataType: 'json',
        type: 'post',
        data: data,
        success: function (response) {
            return response;
        },
    });
}
function ajax_call_dropdown(base_url,data,url ,field) {
    jQuery('#'+field).empty();
    jQuery('#'+field).append(jQuery("<option></option>").attr("value", "").text('Select'));
    jQuery.ajax({
        url: base_url +'/'+ url,
        dataType: 'json',
        type: 'post',
        data: data,
        success: function (response) {
            jQuery.each(response, function (key, value) {
                    jQuery('#'+field).append(jQuery("<option ></option>").attr("value", key).text(value));
            });
        },
    });
}
function cofirmbox(title,content ,field) {
                                $.confirm({
                                    title: title,
                                    content:content,
                                    type: 'green',
                                    typeAnimated: true,
                                    buttons: {
                                        close: function () {
                                        }
                                    }
                                });
}
function datepick(fieldId) {
        jQuery('#'+fieldId).datepicker({
            dateFormat: 'yy-mm-dd',
            minDate:0,
        });
}
function timepick(fieldId) {
        jQuery('#'+fieldId).datepicker({
            datepicker: false,
            format: 'H:i',
        });
}
