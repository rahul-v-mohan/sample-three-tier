jQuery(document).ready(function ($) {
    /*
     * Login Form
     */
    $("#log_in_form").validate({
        rules: {
            email: {
                required: true,
                customemail: true,
            },
            password: {
                required: true,
            },
        },
    });
    $("#user_registration").validate({
        rules: {
            email: {
                required: true,
                customemail: true,
            },
            name: {
                required: true,
                letterswithbasicpunc: true,
            },
            mobile: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10,
            },
            gender: {
                required: true,
            },
        },
                errorPlacement: function(error, element) 
        {
            if ( element.is(":radio") ) 
            {
                error.appendTo( element.parents('.options') );
            }
            else 
            { // This is the default behavior 
                error.insertAfter( element );
            }
         }
    });
    $("#staff_registration").validate({
        rules: {
            email: {
                required: true,
                customemail: true,
            },
            name: {
                required: true,
                letterswithbasicpunc: true,
            },
            mobile: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10,
            },
            gender: {
                required: true,
            },
        },
                errorPlacement: function(error, element) 
        {
            if ( element.is(":radio") ) 
            {
                error.appendTo( element.parents('.options') );
            }
            else 
            { // This is the default behavior 
                error.insertAfter( element );
            }
         }
    });
    //////////////////////////////////////////////
    /*
     * Change Password
     */
    $("#change_password_form").validate({
        rules: {
            current_password: {
                required: true,
            },
            new_password: {
                required: true,
            },
            confirm_password: {
                required: true,
                equalTo: "#new_password"
            },
        },
    });
    /*
     * Forget Password
     */
    $("#forgetpassword_form").validate({
        rules: {
            email: {
                required: true,
                customemail: true,
            },
        },
    });
    $("#contact_form").validate({
        rules: {
            email: {
                required: true,
                customemail: true,
            },
            name: {
                required: true,
                letterswithbasicpunc: true,
            },
            message: {
                required: true,
            },
            mobile: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10,
            },
        },
    });
    


///////////////////////////////////////////////////////////////////////////////////////////
    /*
     * Paper Setting 
     */
    $("#paper_setting_form").validate({
        onfocusout: false,
        onkeyup: false,
        rules: {
            paper_name: {
                required: true,
                lettersnumberslashes: true,
            },
            paper_code: {
                required: true,
                lettersnumberslashes: true,
                remote: {
                    param: {
                        url: plugin_url + "/core/check_email.php",
                        type: "post",
                        data: {
                            type: 'papercode',
                            id: function () {
                                return $("input[name=edit_id]").val();
                            }
                        }
                    },
                    depends: function (element) {
                        return ($("#paper_code").val() != '' && $("#paper_code").val() != '0');
                    }
                }
            },
        },
    });
    /*
     * Student Registration Form
     */
    $("#student_registration_form").validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        rules: {
            name: {
                required: true,
                letterswithbasicpunc: true,
            },
            roll_no: {
                lettersnumberslashes: true,
                digits: true,
                remote: {
                    param: {
                        url: plugin_url + "/core/check_email.php",
                        type: "post",
                        data: {
                            type: 'rollnumberstndreg',
                            id: function () {
                                return $("input[name=edit_id]").val();
                            },
                            course_id: function () {
                                return $("#course_id").val();
                            },
                            semester_id: function () {
                                return $("#semester_id").val();
                            },
                        }
                    },
                    depends: function (element) {
                        return ($("#roll_no").val() != '' && $("#roll_no").val() != '0');
                    }
                }
            },
            mobile_no: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10,
            },
            registration_no: {
                digits: true,
                exactlength: {
                    depends: function (element) {
                        return ($("#registration_no").val() != '' && $("#registration_no").val() != '0');
                    },
                    param: 12
                },
                remote: {
                    param: {
                        url: plugin_url + "/core/check_email.php",
                        type: "post",
                        data: {
                            type: 'registrationnostud',
                            id: function () {
                                return $("input[name=edit_id]").val();
                            }
                        }
                    },
                    depends: function (element) {
                        return ($("#registration_no").val() != '' && $("#registration_no").val() != '0');
                    }
                }
            },
            email: {
                required: true,
                customemail: true,
                remote: {
                    url: plugin_url + "/core/check_email.php",
                    type: "post",
                    data: {
                        type: 'studentcreation',
                        id: function () {
                            return $("input[name=edit_id]").val();
                        }
                    }
                }
            },
            course_id: {
                required: true,
            },
            semester_id: {
                required: true,
            },
            registration_status: {
                required: true,
            },
            admission_no: {
                digits: true,
                remote: {
                    param: {
                        url: plugin_url + "/core/check_email.php",
                        type: "post",
                        data: {
                            type: 'admissionnostud',
                            id: function () {
                                return $("input[name=edit_id]").val();
                            }
                        }
                    },
                    depends: function (element) {
                        return ($("#admission_no").val() != '' && $("#admission_no").val() != '0');
                    }
                }
            },
            religion: {
                letterswithbasicpunc: true,
            },
            caste: {
                letterswithbasicpunc: true,
            },
        },
    });



});
