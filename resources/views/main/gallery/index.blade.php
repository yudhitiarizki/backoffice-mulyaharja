@extends('app')

@section('style')
    <style>

    </style>
@endsection

@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Gallery
                        <!--begin::Separator-->
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <!--end::Separator-->
                        <!--begin::Description-->
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">MulyaHarja</small>
                        <!--end::Description-->
                    </h1>
                    <!--end::Title-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                            rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <input type="text" data-kt-gallery-table-filter="search" id="search-table"
                                    class="form-control form-control-solid w-250px ps-14" placeholder="Search gallery" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-gallery-table-toolbar="base">
                                <!--begin::Filter-->

                                <!--begin::Add gallery-->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_add_gallery">
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
                                    <!--end::Svg Icon-->Add Gallery</button>
                                <!--end::Add gallery-->
                            </div>
                            <!--end::Toolbar-->
                            <!--begin::Group actions-->
                            <div class="d-flex justify-content-end align-items-center d-none"
                                data-kt-gallery-table-toolbar="selected">
                                <div class="fw-bolder me-5">
                                    <span class="me-2" data-kt-gallery-table-select="selected_count"></span>Selected
                                </div>
                                <button type="button" class="btn btn-danger"
                                    data-kt-gallery-table-select="delete_selected">Delete Selected</button>
                            </div>
                            <!--end::Group actions-->

                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <div class="w-100 table-responsive">

                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_gallery">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-50px">No</th>
                                        <th class="min-w-125px">Gallery</th>
                                        <th class="min-w-125px">Title</th>
                                        <th class="min-w-100px">Actions</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="text-gray-600 fw-bold">
                                    <!--begin::Table row-->
                                    @foreach ($data as $idx => $item)
                                        <tr>
                                            <td>{{ $idx + 1 }}</td>
                                            <td class="d-flex align-items-center">
                                                <!--begin:: Avatar -->
                                                <div class="symbol symbol-50px overflow-hidden me-3">
                                                    <div class="symbol-label">
                                                        <img src="{{ $item->image_url }}" alt="{{ $item->name }}"
                                                            class="w-100" />
                                                    </div>
                                                </div>
                                                <!--end::Avatar-->
                                            </td>
                                            <td>{{ $item->name }}</td>

                                            <!--begin::Action=-->
                                            <td>
                                                <div
                                                    class=" flex-shrink-0 btn-lg p-0 d-flex align-items-center justify-content-start gap-3">
                                                    <a href="#" data-id="{{ $item->id }}"
                                                        class="btn btn-icon btn-warning mdl-update" data-bs-toggle="modal"
                                                        data-bs-target="#kt_modal_update_gallery"><i
                                                            class="fas fa-pen fs-4"></i></a>
                                                    <a href="#" data-id="{{ $item->id }}" data-bs-toggle="modal"
                                                        data-bs-target="#kt_modal_delete"
                                                        class="btn btn-icon btn-danger mdl-delete"><i
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
                            <!--end::Table-->
                        </div>
                    </div>
                    <!--end::Card body-->
                </div>

            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->

    @include('main.gallery.modal-create')
    @include('main.gallery.modal-update')
    @include('components.modal-delete')
@endsection

@section('script')
    <script src="{{ asset('js/gallery.js') }}"></script>

    <script>
        $('.mdl-delete').click(function() {
            $('#from-delete').attr('action', '/gallery/' + $(this)
                .attr('data-id'))
        });

        $('.mdl-update').click(function() {
            $('#kt_modal_update_gallery_form').attr('action', '/gallery/' + $(this)
                .attr('data-id'))
            $.ajax({
                type: "GET",
                url: "/gallery/" + $(this).attr('data-id'),
                success: function(response) {
                    $('#name').val(response.name)

                    $("#previewImage-update").attr('src', response.image_url);
                    $("#preview-update").show();
                }
            });
        });
    </script>
    @include('components.flash-message')
@endsection
