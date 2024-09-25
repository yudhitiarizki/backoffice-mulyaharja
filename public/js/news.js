"use strict";

var KTAddNews = (function () {
    const modalElement = document.getElementById("kt_modal_add_news");
    const formElement = modalElement.querySelector("#kt_modal_add_news_form");
    const modal = new bootstrap.Modal(modalElement);

    return {
        init: function () {
            const formValidation = FormValidation.formValidation(formElement, {
                fields: {
                    name: {
                        validators: {
                            notEmpty: { message: "Name is required" },
                        },
                    },
                    image_url: {
                        validators: {
                            notEmpty: { message: "Cover is required" },
                        },
                    },
                    kategori: {
                        validators: {
                            notEmpty: { message: "Category is required" },
                        },
                    },
                    date: {
                        validators: {
                            notEmpty: { message: "Date is required" },
                        },
                    },
                    description: {
                        validators: {
                            notEmpty: { message: "Description is required" },
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
                '[data-kt-news-modal-action="submit"]'
            );
            submitButton.addEventListener("click", (event) => {
                event.preventDefault();
                formValidation.validate().then(function (status) {
                    if (status === "Valid") {
                        submitButton.setAttribute("data-kt-indicator", "on");
                        submitButton.disabled = true;
                        $("#kt_modal_add_news_form").submit();
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
                .querySelector('[data-kt-news-modal-action="cancel"]')
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
                            $("#previewImage").hide();
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
                .querySelector('[data-kt-news-modal-action="close"]')
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
                            $("#previewImage").hide();
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

var KTUpdateNews = (function () {
    const modalElement = document.getElementById("kt_modal_update_news");
    const formElement = modalElement.querySelector(
        "#kt_modal_update_news_form"
    );
    const modal = new bootstrap.Modal(modalElement);

    return {
        init: function () {
            const formValidation = FormValidation.formValidation(formElement, {
                fields: {
                    name: {
                        validators: {
                            notEmpty: { message: "Name is required" },
                        },
                    },
                    kategori: {
                        validators: {
                            notEmpty: { message: "Category is required" },
                        },
                    },
                    date: {
                        validators: {
                            notEmpty: { message: "Date is required" },
                        },
                    },
                    description: {
                        validators: {
                            notEmpty: { message: "Description is required" },
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
                '[data-kt-news-modal-update-action="submit"]'
            );
            submitButton.addEventListener("click", (event) => {
                event.preventDefault();
                formValidation.validate().then(function (status) {
                    if (status === "Valid") {
                        submitButton.setAttribute("data-kt-indicator", "on");
                        submitButton.disabled = true;
                        $("#kt_modal_update_news_form").submit();
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
                .querySelector('[data-kt-news-modal-update-action="cancel"]')
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
                            $("#previewImage").hide();
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
                .querySelector('[data-kt-news-modal-action="close"]')
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
                            $("#previewImage").hide();
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
    KTAddNews.init();
    KTUpdateNews.init();
});

const table = $("#kt_table_news").DataTable();
$("#search-table").on("keyup", function () {
    table.search(this.value).draw();
});

$("#formFile").on("change", function (event) {
    const file = event.target.files[0];
    const preview = $("#preview");
    const previewImage = $("#previewImage");

    // Validate file type
    const allowedTypes = ["image/png", "image/jpeg", "image/jpg"];
    if (file && allowedTypes.includes(file.type)) {
        const reader = new FileReader();

        reader.onload = function (e) {
            previewImage.attr("src", e.target.result);
            preview.show();
        };

        reader.readAsDataURL(file);
    } else {
        Swal.fire({
            text: "Invalid file type. Please upload a PNG, JPG, or JPEG image.",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "Ok, got it!",
            customClass: {
                confirmButton: "btn btn-primary",
            },
        });
        $(this).val(""); // Clear the input
        preview.hide();
    }
});

$("#formFile-update").on("change", function (event) {
    const file = event.target.files[0];
    const preview = $("#preview-update");
    const previewImage = $("#previewImage-update");

    // Validate file type
    const allowedTypes = ["image/png", "image/jpeg", "image/jpg"];
    if (file && allowedTypes.includes(file.type)) {
        const reader = new FileReader();

        reader.onload = function (e) {
            previewImage.attr("src", e.target.result);
            preview.show();
        };

        reader.readAsDataURL(file);
    } else {
        Swal.fire({
            text: "Invalid file type. Please upload a PNG, JPG, or JPEG image.",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "Ok, got it!",
            customClass: {
                confirmButton: "btn btn-primary",
            },
        });
        $(this).val(""); // Clear the input
        preview.hide();
    }
});
