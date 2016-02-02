var Script = function () {

    $.validator.setDefaults({
        submitHandler: function() { alert("submitted!"); }
    });

    $().ready(function() {
        // validate the comment form when it is submitted
        $("#commentForm").validate();

        // validate signup form on keyup and submit
        $("#userForm").validate({
            rules: {
                user_name: {
                    minlength: 3
                },
                pass_user: {
                    minlength: 5
                },
                konfrim_pass_user: {
                    minlength: 5,
                    equalTo: "#pass_user"
                }
            },
            messages: {
                user_name: {
                    minlength: "Username harus lebih dari 2 karakter"
                },
                pass_user: {
                    minlength: "Password harus terdiri dari 5 karakter atau lebih"
                },
                konfir_pass_password: {
                    minlength: "Password harus terdiri dari 5 karakter atau lebih",
                    equalTo: "Konfirmasi password salah"
                }
            }
        });

        // propose username by combining first- and lastname
        $("#username").focus(function() {
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            if(firstname && lastname && !this.value) {
                this.value = firstname + "." + lastname;
            }
        });

        //code to hide topic selection, disable for demo
        var newsletter = $("#newsletter");
        // newsletter topics are optional, hide at first
        var inital = newsletter.is(":checked");
        var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
        var topicInputs = topics.find("input").attr("disabled", !inital);
        // show when newsletter is checked
        newsletter.click(function() {
            topics[this.checked ? "removeClass" : "addClass"]("gray");
            topicInputs.attr("disabled", !this.checked);
        });
    });


}();