"use strict";

var KTUsersAddUser = (function () {
    const modalElement = document.getElementById("kt_modal_add_user");
    const formElement = modalElement.querySelector("#kt_modal_add_user_form");
    const modal = new bootstrap.Modal(modalElement);

    return {
        init: function () {
            const formValidation = FormValidation.formValidation(formElement, {
                fields: {
                    user_name: {
                        validators: {
                            notEmpty: { message: "Full name is required" },
                        },
                    },
                    user_email: {
                        validators: {
                            notEmpty: {
                                message: "Valid email address is required",
                            },
                        },
                    },
                    phone_number: {
                        validators: {
                            notEmpty: {
                                message: "Phone Number is required",
                            },
                        },
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: "Password is required",
                            },
                        },
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: "",
                    }),
                },
            });

            const submitButton = modalElement.querySelector(
                '[data-kt-users-modal-action="submit"]'
            );
            submitButton.addEventListener("click", (event) => {
                event.preventDefault();
                formValidation.validate().then(function (status) {
                    if (status === "Valid") {
                        submitButton.setAttribute("data-kt-indicator", "on");
                        submitButton.disabled = true;
                        $("#kt_modal_add_user_form").submit();
                        // setTimeout(function () {
                        //     submitButton.removeAttribute("data-kt-indicator");
                        //     submitButton.disabled = false;
                        //     Swal.fire({
                        //         text: "Form has been successfully submitted!",
                        //         icon: "success",
                        //         buttonsStyling: false,
                        //         confirmButtonText: "Ok, got it!",
                        //         customClass: {
                        //             confirmButton: "btn btn-primary",
                        //         },
                        //     }).then(function (result) {
                        //         if (result.isConfirmed) {
                        //             modal.hide();
                        //         }
                        //     });
                        // }, 2000);
                    } else {
                        Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: { confirmButton: "btn btn-primary" },
                        });
                    }
                });
            });

            modalElement
                .querySelector('[data-kt-users-modal-action="cancel"]')
                .addEventListener("click", (event) => {
                    event.preventDefault();
                    Swal.fire({
                        text: "Are you sure you would like to cancel?",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "Yes, cancel it!",
                        cancelButtonText: "No, return",
                        customClass: {
                            confirmButton: "btn btn-primary",
                            cancelButton: "btn btn-active-light",
                        },
                    }).then(function (result) {
                        if (result.value) {
                            formElement.reset();
                            modal.hide();
                        } else if (result.dismiss === "cancel") {
                            Swal.fire({
                                text: "Your form has not been cancelled!",
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

            modalElement
                .querySelector('[data-kt-users-modal-action="close"]')
                .addEventListener("click", (event) => {
                    event.preventDefault();
                    Swal.fire({
                        text: "Are you sure you would like to cancel?",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "Yes, cancel it!",
                        cancelButtonText: "No, return",
                        customClass: {
                            confirmButton: "btn btn-primary",
                            cancelButton: "btn btn-active-light",
                        },
                    }).then(function (result) {
                        if (result.value) {
                            formElement.reset();
                            modal.hide();
                        } else if (result.dismiss === "cancel") {
                            Swal.fire({
                                text: "Your form has not been cancelled!",
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

var KTUsersupdateUser = (function () {
    const modalElement = document.getElementById("kt_modal_update_user");
    const formElement = modalElement.querySelector(
        "#kt_modal_update_user_form"
    );
    const modal = new bootstrap.Modal(modalElement);

    return {
        init: function () {
            const formValidation = FormValidation.formValidation(formElement, {
                fields: {
                    user_name: {
                        validators: {
                            notEmpty: { message: "Full name is required" },
                        },
                    },
                    user_email: {
                        validators: {
                            notEmpty: {
                                message: "Valid email address is required",
                            },
                        },
                    },
                    phone_number: {
                        validators: {
                            notEmpty: {
                                message: "Phone Number is required",
                            },
                        },
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: "Password is required",
                            },
                        },
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: "",
                    }),
                },
            });

            const submitButton = modalElement.querySelector(
                '[data-kt-users-modal-update-action="submit"]'
            );
            submitButton.addEventListener("click", (event) => {
                event.preventDefault();
                formValidation.validate().then(function (status) {
                    if (status === "Valid") {
                        submitButton.setAttribute("data-kt-indicator", "on");
                        submitButton.disabled = true;
                        $("#kt_modal_update_user_form").submit();
                        // setTimeout(function () {
                        //     submitButton.removeAttribute("data-kt-indicator");
                        //     submitButton.disabled = false;
                        //     Swal.fire({
                        //         text: "Form has been successfully submitted!",
                        //         icon: "success",
                        //         buttonsStyling: false,
                        //         confirmButtonText: "Ok, got it!",
                        //         customClass: {
                        //             confirmButton: "btn btn-primary",
                        //         },
                        //     }).then(function (result) {
                        //         if (result.isConfirmed) {
                        //             modal.hide();
                        //         }
                        //     });
                        // }, 2000);
                    } else {
                        Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: { confirmButton: "btn btn-primary" },
                        });
                    }
                });
            });

            modalElement
                .querySelector('[data-kt-users-modal-update-action="cancel"]')
                .addEventListener("click", (event) => {
                    event.preventDefault();
                    Swal.fire({
                        text: "Are you sure you would like to cancel?",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "Yes, cancel it!",
                        cancelButtonText: "No, return",
                        customClass: {
                            confirmButton: "btn btn-primary",
                            cancelButton: "btn btn-active-light",
                        },
                    }).then(function (result) {
                        if (result.value) {
                            formElement.reset();
                            modal.hide();
                        } else if (result.dismiss === "cancel") {
                            Swal.fire({
                                text: "Your form has not been cancelled!",
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

            modalElement
                .querySelector('[data-kt-users-modal-action="close"]')
                .addEventListener("click", (event) => {
                    event.preventDefault();
                    Swal.fire({
                        text: "Are you sure you would like to cancel?",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "Yes, cancel it!",
                        cancelButtonText: "No, return",
                        customClass: {
                            confirmButton: "btn btn-primary",
                            cancelButton: "btn btn-active-light",
                        },
                    }).then(function (result) {
                        if (result.value) {
                            formElement.reset();
                            modal.hide();
                        } else if (result.dismiss === "cancel") {
                            Swal.fire({
                                text: "Your form has not been cancelled!",
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
    KTUsersAddUser.init();
    KTUsersupdateUser.init();
});

const table = $("#kt_table_users").DataTable();
$("#search-table").on("keyup", function () {
    table.search(this.value).draw();
});
