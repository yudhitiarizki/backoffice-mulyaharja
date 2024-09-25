<!--begin::Modal - Add task-->
<div class="modal fade" id="kt_modal_update_videos" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_update_videos_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Update Video</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-videos-modal-action="close">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-5 my-1">
                <!--begin::Form-->
                <form id="kt_modal_update_videos_form" class="form" action="/videos" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_videos_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                        data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_videos_header"
                        data-kt-scroll-wrappers="#kt_modal_update_videos_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">

                            <label for="formFile" class="form-label">Cover Image</label>

                            <!-- Preview Image -->
                            <div id="preview-update" class="preview">
                                <img id="previewImage-update" class="previewImage mb-4" src=""
                                    alt="Image Preview">
                            </div>
                            <!--begin::Label-->
                            <input class="form-control" type="file" name="image_url" id="formFile-update">
                            <!--begin::Hint-->
                            <div class="form-text">
                                Allowed file types: png, jpg, jpeg. If not provided, YouTube thumbnail will be
                                displayed.
                            </div>
                            <!--end::Hint-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Title</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="Name" id="name" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fw-bold fs-6 mb-2">Subtitle</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="subtitle" class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="Subtitle" id="subtitle" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fw-bold fs-6 mb-2">Location</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="location" class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="Location" id="location" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Video Links</label>
                            <!--end::Label-->

                            <div id="thumbnailContainer-update" class="previewImage"
                                style="margin-top: 10px; margin-bottom: 10px;"></div>

                            <!--begin::Input-->
                            <input type="text" id="youtubeLink-update" name="links"
                                class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="Paste youtube links" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Category</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-select form-select-solid" data-kt-select2="true" name="kategori"
                                id="kategori" data-placeholder="Select option"
                                data-dropdown-parent="#kt_modal_update_videos" data-allow-clear="true">
                                <option></option>
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Date</label>
                            <!--end::Label-->
                            <div class="position-relative d-flex align-items-center"
                                style="display: flex !important; flex: 1; justify-content: start; align-items: center;">
                                <span class="svg-icon svg-icon-2 position-absolute mx-4"
                                    style="top: 12px; right:0px;">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 2V5" stroke="#BEBEBE" stroke-width="1.5" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M16 2V5" stroke="#BEBEBE" stroke-width="1.5" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path opacity="0.4" d="M3.5 9.08984H20.5" stroke="#BEBEBE"
                                            stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M21 8.5V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5Z"
                                            stroke="#BEBEBE" stroke-width="1.5" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path opacity="0.4" d="M15.6947 13.7002H15.7037" stroke="#BEBEBE"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path opacity="0.4" d="M15.6947 16.7002H15.7037" stroke="#BEBEBE"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path opacity="0.4" d="M11.9955 13.7002H12.0045" stroke="#BEBEBE"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path opacity="0.4" d="M11.9955 16.7002H12.0045" stroke="#BEBEBE"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path opacity="0.4" d="M8.29431 13.7002H8.30329" stroke="#BEBEBE"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path opacity="0.4" d="M8.29431 16.7002H8.30329" stroke="#BEBEBE"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <input class="form-control form-control-solid" name="date" id="date"
                                    placeholder="Select Date" />
                            </div>
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Content</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <textarea name="description" id="description-update" class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="Description">
                            </textarea>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->


                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fw-bold fs-6 mb-2">Tags</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control form-control-solid" id="tags-update" name="tags"
                                placeholder="Write and enter to add custom tags" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-5">
                        <button type="reset" class="btn btn-light me-3"
                            data-kt-videos-modal-update-action="cancel">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-videos-modal-update-action="submit">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Add task-->
