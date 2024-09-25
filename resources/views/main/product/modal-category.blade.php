<!--begin::Modal - Add task-->
<div class="modal fade" id="kt_modal_category" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-500px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_category_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Product Category </h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
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
            <div class="modal-body scroll-y mx-5 mx-xl-5 my-1" id="kt_modal_body_add_category">
                <!--begin::Form-->
                <div>
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_category_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                        data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_category_header"
                        data-kt-scroll-wrappers="#kt_modal_add_Category_scroll" data-kt-scroll-offset="300px">

                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_add_category">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2"
                                        rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                        fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Add Category</button>
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_category">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="min-w-50px">No</th>
                                    <th class="min-w-125px">Name</th>
                                    <th>Action</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">
                                <!--begin::Table row-->
                                @foreach ($category as $idx => $item)
                                    <tr>
                                        <td>{{ $idx + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <!--begin::Action=-->
                                        <td>
                                            <div
                                                class=" flex-shrink-0 btn-lg p-0 d-flex align-items-center justify-content-start gap-3">
                                                <a href="#" data-id="{{ $item->id }}"
                                                    data-name="{{ $item->name }}"
                                                    class="btn btn-sm btn-icon btn-warning mdl-update-category"
                                                    data-bs-toggle="modal" data-bs-target="#kt_modal_update_category"><i
                                                        class="fas fa-pen fs-4"></i></a>
                                                <a href="#" data-id="{{ $item->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_delete"
                                                    class="btn btn-sm btn-icon btn-danger mdl-delete-category"><i
                                                        class="fas fa-trash fs-4"></i></a>
                                            </div>

                                        </td>
                                        <!--end::Action=-->
                                    </tr>
                                @endforeach

                                <!--end::Table row-->
                            </tbody>
                            <!--end::Table body-->
                        </table>

                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-end pt-5">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Close</button>
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Add task-->
