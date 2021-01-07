function getFormData($form){
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}

$.validator.setDefaults({
	submitHandler: function () {
        var $form = $("#signupForm");
        var data = getFormData($form);

        $("body").addClass("modal-open");
        $("modal").addClass("show");
        $("#exampleModalCenter").addClass("show").show();
        $(".modal-backdrop").addClass("show").show();

        setTimeout(
            function() 
            {
                $("body").removeClass("modal-open");
                $("modal").removeClass("show");
                $("#exampleModalCenter").removeClass("show").hide();
                $(".modal-backdrop").removeClass("show").hide();
            }
        , 5000);
        
	},
});

$("#signupForm").validate({
	rules: {
		firstname: "required",
		lastname: "required",
		username: {
			required: true,
			minlength: 2,
		},
		email: {
			required: true,
			email: true,
		},
		password: {
			required: true,
			minlength: 5,
		},
		confirm_password: {
			required: true,
			minlength: 5,
			equalTo: "#password",
		},
		referral: {
			required: function (element) {
				return $("#referral").val().length > 0;
			},
			minlength: 6,
		},
		agree: "required",
	},
	messages: {
		firstname: "Please enter your firstname",
		lastname: "Please enter your lastname",
		username: {
			required: "Please enter a username",
			minlength: "Your username must consist of at least 2 characters",
		},
		email: "Please enter a valid email address",
		password: {
			required: "Please provide a password",
			minlength: "Your password must be at least 5 characters long",
		},
		confirm_password: {
			required: "Please provide a password",
			minlength: "Your password must be at least 5 characters long",
			equalTo: "Please enter the same password as above",
		},
		referral: {
			required: "required",
		},
		agree: "Please accept our policy",
	},
	errorElement: "em",
	errorPlacement: function (error, element) {
		error.addClass("help-block");

		if (element.prop("type") === "checkbox") {
			error.insertAfter(element.parent("label"));
		} else if (element.hasClass("referral")) {
			error.insertAfter(element.parent(".input-group"));
		} else {
			error.insertAfter(element);
		}
	},
	highlight: function (element, errorClass, validClass) {
		$(element)
			.parents(".validate")
			.addClass("has-error")
			.removeClass("has-success");
	},
	unhighlight: function (element, errorClass, validClass) {
		$(element)
			.parents(".validate")
			.addClass("has-success")
			.removeClass("has-error");
	},
});

$("#agree").on("change", function () {
	if ($("#signupForm").valid() && $(this).is(":checked")) {
		$("#submit").prop("disabled", false);
	} else {
		$("#submit").prop("disabled", "disabled");
	}
});

$("#redeem").on("click", function () {
    var referral = $("#referral");
    referralValue = referral.val();
	$.getJSON("http://localhost/moolahgo/api/user/process.php?referralcode=" + referralValue, function () {
    })
    .done(function () {
        $("#referralcode").val(referralValue);
        referral.parent().addClass("applied");
    })
    .fail(function () {
        alert("Invalid referral code!");
    });
});

$("#cancel").on("click", function(){
    if (confirm('Are you sure you want to remove the referral code?')) {
        $("#referral, #referralcode").val("");
        $(".applied").removeClass("applied");
    }
})