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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Dashboard
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

                <!--begin::Row-->
                <div class="row gy-5 g-xl-8">

                    <!--begin::Col-->
                    <div class="d-flex gap-3 mb-4" style="padding-right: 25px">
                        <div class="col-4 info-user">
                            <div class="title-info mb-1">
                                Total Users
                            </div>
                            <div class="main-info">
                                {{ $totalUsers }}
                            </div>
                        </div>
                        <div class="col-4 info-user active">
                            <div class="title-info mb-1">
                                Active Users
                            </div>
                            <div class="main-info">
                                {{ $totalActiveUsers }}
                            </div>
                        </div>
                        <div class="col-4 info-user inactive">
                            <div class="title-info mb-1">
                                Inactive Users
                            </div>
                            <div class="main-info">
                                {{ $totalInactiveUsers }}
                            </div>
                        </div>
                    </div>


                </div>
                <!--end::Row-->

                <!--begin::Row-->
                <div class="row g-5 g-xl-8">
                    <!--begin::Col-->
                    <div class="col-xl-4">
                        <!--begin::Mixed Widget 5-->
                        <div class="card card-xxl-stretch mb-xl-8" style="height: fit-content;">
                            <!--begin::Beader-->
                            <div class="card-header border-0 py-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder fs-3 mb-1">Data</span>
                                    <span class="text-muted fw-bold fs-7">Total Data</span>
                                </h3>
                                <div class="card-toolbar">
                                    <!--begin::Menu-->

                                    <!--end::Menu-->
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body d-flex flex-column pt-0">
                                <!--begin::Items-->
                                <div>
                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack mb-5">
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center me-2">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-50px me-3">
                                                <div class="symbol-label bg-light">
                                                    <i class="bi bi-people fs-3"></i>
                                                </div>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Title-->
                                            <div>
                                                <a href="#"
                                                    class="fs-6 text-gray-800 text-hover-primary fw-bolder">Users</a>
                                                <div class="fs-7 text-muted fw-bold mt-1"></div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Section-->
                                        <!--begin::Label-->
                                        <div class="badge badge-light fw-bold py-4 px-3">{{ $total_user }}</div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack mb-5">
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center me-2">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-50px me-3">
                                                <div class="symbol-label bg-light">
                                                    <i class="bi bi-person-workspace fs-3"></i>
                                                </div>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Title-->
                                            <div>
                                                <a href="#"
                                                    class="fs-6 text-gray-800 text-hover-primary fw-bolder">Activity</a>
                                                <div class="fs-7 text-muted fw-bold mt-1"></div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Section-->
                                        <!--begin::Label-->
                                        <div class="badge badge-light fw-bold py-4 px-3">{{ $total_activity }}</div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack mb-5">
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center me-2">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-50px me-3">
                                                <div class="symbol-label bg-light">
                                                    <i class="bi bi-newspaper fs-3"></i>
                                                </div>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Title-->
                                            <div>
                                                <a href="#"
                                                    class="fs-6 text-gray-800 text-hover-primary fw-bolder">News</a>
                                                <div class="fs-7 text-muted fw-bold mt-1"></div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Section-->
                                        <!--begin::Label-->
                                        <div class="badge badge-light fw-bold py-4 px-3">{{ $total_news }}</div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack mb-5">
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center me-2">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-50px me-3">
                                                <div class="symbol-label bg-light">
                                                    <i class="bi  bi-box-seam fs-3"></i>
                                                </div>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Title-->
                                            <div>
                                                <a href="#"
                                                    class="fs-6 text-gray-800 text-hover-primary fw-bolder">Product</a>
                                                <div class="fs-7 text-muted fw-bold mt-1"></div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Section-->
                                        <!--begin::Label-->
                                        <div class="badge badge-light fw-bold py-4 px-3">{{ $total_product }}</div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack mb-5">
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center me-2">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-50px me-3">
                                                <div class="symbol-label bg-light">
                                                    <i class="bi bi-camera-reels fs-3"></i>
                                                </div>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Title-->
                                            <div>
                                                <a href="#"
                                                    class="fs-6 text-gray-800 text-hover-primary fw-bolder">Videos</a>
                                                <div class="fs-7 text-muted fw-bold mt-1"></div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Section-->
                                        <!--begin::Label-->
                                        <div class="badge badge-light fw-bold py-4 px-3">{{ $total_video }}</div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Item-->

                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Mixed Widget 5-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-8">
                        <!--begin::Tables Widget 5-->
                        <div class="card card-xxl-stretch mb-5 mb-xl-8" style="height: fit-content;">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder fs-3 mb-1">Latest Products</span>
                                </h3>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body py-3">
                                <div class="tab-content">
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade show active" id="kt_table_widget_5_tab_1">
                                        <!--begin::Table container-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                                                <!--begin::Table head-->
                                                <thead>
                                                    <tr class="border-0">
                                                        <th class="p-0 w-50px"></th>
                                                        <th class="p-0 min-w-150px"></th>
                                                        <th class="p-0 min-w-140px"></th>
                                                        <th class="p-0 min-w-110px"></th>
                                                        <th class="p-0 min-w-50px"></th>
                                                    </tr>
                                                </thead>
                                                <!--end::Table head-->
                                                <!--begin::Table body-->
                                                <tbody>
                                                    @foreach ($product as $data)
                                                        <tr>
                                                            <td>
                                                                <div class="symbol symbol-45px me-2">
                                                                    <span class="symbol-label">
                                                                        <img src="{{ $data->cover }}"
                                                                            class="h-50 align-self-center"
                                                                            alt="" />
                                                                    </span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $data->name }}</a>
                                                                <span
                                                                    class="text-muted fw-bold d-block">{{ number_format(floatval($data->price), 2, ',', '.') }}</span>
                                                            </td>
                                                            <td class="text-end text-muted fw-bold">
                                                                {{ $data->created_at }}</td>
                                                            <td class="text-end">
                                                                <span
                                                                    class="badge badge-light-success">{{ $data->Category?->name }}</span>
                                                            </td>
                                                            <td class="text-end">
                                                                <a href="/product"
                                                                    class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                                                    <span class="svg-icon svg-icon-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none">
                                                                            <rect opacity="0.5" x="18" y="13"
                                                                                width="13" height="2"
                                                                                rx="1"
                                                                                transform="rotate(-180 18 13)"
                                                                                fill="black" />
                                                                            <path
                                                                                d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                                                fill="black" />
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                        </div>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Tap pane-->
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Tables Widget 5-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection

@section('script')
@endsection
