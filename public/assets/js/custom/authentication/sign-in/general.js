"use strict";
var KTSigninGeneral = (function () {
    var form, submitBtn, validation;
    return {
        init: function () {
            form = document.querySelector("#kt_sign_in_form");
            submitBtn = document.querySelector("#kt_sign_in_submit");

            validation = FormValidation.formValidation(form, {
                fields: {
                    email: {
                        validators: {
                            notEmpty: { message: "Email address is required" },
                            emailAddress: { message: "Invalid email address" },
                        },
                    },
                    password: {
                        validators: {
                            notEmpty: { message: "Password is required" },
                        },
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                    }),
                },
            });

            submitBtn.addEventListener("click", function (e) {
                e.preventDefault();
                validation.validate().then(function (status) {
                    if (status == "Valid") {
                        submitBtn.setAttribute("data-kt-indicator", "on");
                        submitBtn.disabled = true;
                        setTimeout(function () {
                            form.submit();
                        }, 0);
                    } else {
                        Swal.fire({
                            text: "There are errors in the form. Please try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            },
                        });
                    }
                });
            });
        },
    };
})();

KTUtil.onDOMContentLoaded(function () {
    KTSigninGeneral.init();
});
