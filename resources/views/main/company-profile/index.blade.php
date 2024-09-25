@extends('app')

@section('style')
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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Company Profile
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

                <div class="card mb-5 mb-xl-10" style="border-radius: 12px;">
                    <div class="card-body pt-9 pb-0">
                        <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                            <div class="row row-image-profile">
                                <div class="me-7 mb-4 justify-content-center img-profile">
                                    <div
                                        class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative container-img-profile">
                                        <img src="{{ $data?->logo }}" alt="image"
                                            style="object-fit: cover;border-radius: 4px;width: 106px; height: 106px;" />
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="row">
                                    <div class="col-md-auto" style="align-content: end;text-align:center">
                                        <p class="company_name" style="font-weight: 600;font-size: 18px;">
                                            {{ $data?->name }}
                                        </p>
                                    </div>
                                    <div class="col-md-6" style="color:#BEBEBE;align-content: end;justify-content:right">
                                        <p class="company_name">
                                            {{ $data?->locations }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="d-flex flex-wrap pe-8">
                                            <div class="mb-3">
                                                <div class="value-detail-profile"
                                                    style="max-width:650px; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden; text-overflow: ellipsis;">
                                                    {{ $data->description }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 d-flex my-4 justify-content-end" style="flex-grow: 1">
                                        <button href="#" data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_edit_profile"
                                            class="btn btn-bg-dark btn-color-white">Edit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
                                <input type="text" data-kt-activity-table-filter="search" id="search-table"
                                    class="form-control form-control-solid w-250px ps-14" placeholder="Search Contact" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-activity-table-toolbar="base">
                                <!--begin::Filter-->

                                <!--begin::Add activity-->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_add_contact">
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
                                    <!--end::Svg Icon-->Add Contact</button>
                                <!--end::Add activity-->
                            </div>
                            <!--end::Toolbar-->
                            <!--begin::Group actions-->
                            <div class="d-flex justify-content-end align-items-center d-none"
                                data-kt-activity-table-toolbar="selected">
                                <div class="fw-bolder me-5">
                                    <span class="me-2" data-kt-activity-table-select="selected_count"></span>Selected
                                </div>
                                <button type="button" class="btn btn-danger"
                                    data-kt-activity-table-select="delete_selected">Delete Selected</button>
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
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_contact">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                        <th>No</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>Actions</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="text-gray-600 fw-bold">
                                    <!--begin::Table row-->
                                    @foreach ($contact as $idx => $item)
                                        <tr>
                                            <td>{{ $idx + 1 }}</td>
                                            <td>{{ $item->phone_number }}</td>
                                            <td>{{ $item->email }}</td>
                                            <!--begin::Action=-->
                                            <td>
                                                <div
                                                    class=" flex-shrink-0 btn-lg p-0 d-flex align-items-center justify-content-start gap-3">
                                                    <a href="#" data-id="{{ $item->id }}"
                                                        class="btn btn-icon btn-warning mdl-update" data-bs-toggle="modal"
                                                        data-bs-target="#kt_modal_update_contact"><i
                                                            class="fas fa-pen fs-4"></i></a>
                                                    <a href="#" data-id="{{ $item->id }}"
                                                        data-bs-toggle="modal" data-bs-target="#kt_modal_delete"
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

    @include('main.company-profile.modal')
    @include('main.company-profile.modal-create')
    @include('main.company-profile.modal-update')
    @include('components.modal-delete')
@endsection

@section('script')
    <script src="{{ asset('js/company-profile.js') }}"></script>
    <script>
        $('.mdl-delete').click(function() {
            $('#from-delete').attr('action', '/company-profile/contact/' + $(this)
                .attr('data-id'))
        });

        $('.mdl-update').click(function() {
            $('#kt_modal_update_contact_form').attr('action', '/company-profile/contact/' + $(this)
                .attr('data-id'))
            $.ajax({
                type: "GET",
                url: "/company-profile/contact/" + $(this).attr('data-id'),
                success: function(response) {
                    $('#phone_number').val(response.phone_number)
                    $('#email').val(response.email)
                }
            });
        });
    </script>
    @include('components.flash-message')
@endsection
