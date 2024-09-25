"use strict";

var KTAddVideo = (function () {
    const modalElement = document.getElementById("kt_modal_add_videos");
    const formElement = modalElement.querySelector("#kt_modal_add_videos_form");
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
                    links: {
                        validators: {
                            notEmpty: { message: "Youtube Link is required" },
                            regexp: {
                                regexp: /^(https?:\/\/)?(www\.)?(youtube\.com\/(?:v\/|e(?:mbed)\/|watch\?v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})(?:\S+)?$/,
                                message: "The link is not a valid YouTube URL",
                            },
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
                '[data-kt-videos-modal-action="submit"]'
            );
            submitButton.addEventListener("click", (event) => {
                event.preventDefault();
                formValidation.validate().then(function (status) {
                    if (status === "Valid") {
                        submitButton.setAttribute("data-kt-indicator", "on");
                        submitButton.disabled = true;
                        $("#kt_modal_add_videos_form").submit();
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
                .querySelector('[data-kt-videos-modal-action="cancel"]')
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
                .querySelector('[data-kt-videos-modal-action="close"]')
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

var KTUpdateVideo = (function () {
    const modalElement = document.getElementById("kt_modal_update_videos");
    const formElement = modalElement.querySelector(
        "#kt_modal_update_videos_form"
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
                    links: {
                        validators: {
                            notEmpty: { message: "Youtube Link is required" },
                            regexp: {
                                regexp: /^(https?:\/\/)?(www\.)?(youtube\.com\/(?:v\/|e(?:mbed)\/|watch\?v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})(?:\S+)?$/,
                                message: "The link is not a valid YouTube URL",
                            },
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
                '[data-kt-videos-modal-update-action="submit"]'
            );
            submitButton.addEventListener("click", (event) => {
                event.preventDefault();
                formValidation.validate().then(function (status) {
                    if (status === "Valid") {
                        submitButton.setAttribute("data-kt-indicator", "on");
                        submitButton.disabled = true;
                        $("#kt_modal_update_videos_form").submit();
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
                .querySelector('[data-kt-videos-modal-update-action="cancel"]')
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
                .querySelector('[data-kt-videos-modal-action="close"]')
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
    KTAddVideo.init();
    KTUpdateVideo.init();
});

const table = $("#kt_table_videos").DataTable();
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

function getYouTubeVideoID(url) {
    const regex =
        /(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
    const match = url.match(regex);
    return match ? match[1] : null;
}

document.getElementById("youtubeLink").addEventListener("input", function () {
    const url = this.value;
    const videoID = getYouTubeVideoID(url);

    if (videoID) {
        const thumbnailUrl = `https://img.youtube.com/vi/${videoID}/0.jpg`;
        document.getElementById(
            "thumbnailContainer"
        ).innerHTML = `<img src="${thumbnailUrl}" alt="YouTube Thumbnail" style="max-width: 100%; max-height: 200px;" />`;
    } else {
        document.getElementById("thumbnailContainer").innerHTML = "";
    }
});

document
    .getElementById("youtubeLink-update")
    .addEventListener("input", function () {
        const url = this.value;
        const videoID = getYouTubeVideoID(url);

        if (videoID) {
            const thumbnailUrl = `https://img.youtube.com/vi/${videoID}/0.jpg`;
            document.getElementById(
                "thumbnailContainer-update"
            ).innerHTML = `<img src="${thumbnailUrl}" alt="YouTube Thumbnail" style="max-width: 100%; max-height: 200px;" />`;
        } else {
            document.getElementById("thumbnailContainer-update").innerHTML = "";
        }
    });
