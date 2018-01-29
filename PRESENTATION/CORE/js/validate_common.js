jQuery(document).ready(function ($) {
    plugin_url = $('#plugin_url').val();
    $.extend($.validator.messages, {
        required: "This field is required.",
        remote: "This value not allowed",
        email: "Please enter a valid email address.",
        url: "Please enter a valid URL.",
        date: "Please enter a valid date.",
        dateISO: "Please enter a valid date (ISO).",
        number: "Please enter a valid number.",
        digits: "Please enter only digits.",
        creditcard: "Please enter a valid credit card number.",
        equalTo: "Please enter the same value again.",
        accept: "Please enter a value with a valid extension.",
        maxlength: $.validator.format("Please enter not more than {0} characters."),
        minlength: $.validator.format("Please enter at least {0} characters."),
        rangelength: $.validator.format("Please enter a value between {0} and {1} characters long."),
        range: $.validator.format("Please enter a value between {0} and {1}."),
        max: $.validator.format("Please enter a value less than or equal to {0}."),
        min: $.validator.format("Please enter a value greater than or equal to {0}.")
    });
    $.validator.addMethod("exactlength", function (value, element, param) {
        return this.optional(element) || value.length == param;
    }, "Please enter exactly {0} characters.");
    $.validator.addMethod("letterswithbasicpunc", function (value, element) {
        value = value.trim();
        return this.optional(element) || /^[a-z-.,()'\+\"\s]+$/i.test(value);
    }, "Letters or punctuation only please");
    $.validator.addMethod("lettersnumberslashes", function (value, element) {
        value = value.trim();
        return this.optional(element) || /^[a-z0-9-.,&()'\+\"\s]+$/i.test(value);
    }, "Letters or punctuation only please");
    $.validator.addMethod("time24", function(value, element) {
    if (!/^\d{2}:\d{2}:\d{2}$/.test(value)) return false;
    var parts = value.split(':');
    if (parts[0] > 23 || parts[1] > 59 || parts[2] > 59) return false;
    return true;
    }, "Invalid time format.");
    $.validator.addMethod("timehourminute", function(value, element) {
    if (!/^\d{2}:\d{2}$/.test(value)) return false;
    var parts = value.split(':');
    if (parts[0] > 23 || parts[1] > 59) return false;
    return true;
    }, "Invalid time format.");
    $.validator.addMethod("customemail", function(value, element) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(value);
    }, "Please enter a valid email address");

    $.validator.addMethod("time", function(value, element) {  
    return this.optional(element) || /^(([0-1]?[0-9])|([2][0-3])):([0-5]?[0-9])(:([0-5]?[0-9]))?$/i.test(value);  
    }, "Please enter a valid time.");
     $.validator.addMethod("yearrange", function(value, element) {  
    return this.optional(element) || /^\d{4}-\d{4}?$/i.test(value);  
    }, "Please enter a valid year range in yyyy-yyyy format.");
    $.validator.addClassRules("time_value", {
        required: true ,
           time:true 
    });
    //  $.validator.addMethod("me", function(value, element) {  
    // return this.optional(element) || /^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/i.test(value);  
    // }, "Please enter a valid y.");
 
     
    /*  */


});
function isNumberKey(e)
{
    if (e.shiftKey || e.ctrlKey || e.altKey) { // if shift, ctrl or alt keys held down
        e.preventDefault();         // Prevent character input
    } else {
        var n = e.keyCode;
        if (!((n == 8)              // backspace
                || (n == 46)                // delete
                || (n == 9)                // tab
                || (n >= 35 && n <= 40)     // arrow keys/home/end
                || (n >= 48 && n <= 57)     // numbers on keyboard
                || (n >= 96 && n <= 105))   // number on keypad
                ) {
            e.preventDefault();     // Prevent character input
        }
    }
}

