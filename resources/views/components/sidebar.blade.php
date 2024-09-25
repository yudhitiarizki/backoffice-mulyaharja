 <!--begin::Aside-->
 <div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
     data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
     data-kt-drawer-toggle="#kt_aside_mobile_toggle">
     <!--begin::Brand-->
     <div class="aside-logo flex-column-auto" id="kt_aside_logo">
         <!--begin::Logo-->
         <a href="/" class="d-flex align-items-center justify-content-center text-black gap-3 fw-bolder">
             <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                 <div class="symbol-label">
                     <img src="{{ \App\Helpers\GetDataHelpers::get_logo() }}" alt="logo" class="w-75" />
                 </div>
             </div>
             Mulyaharja
         </a>
         <!--end::Logo-->
         <!--begin::Aside toggler-->
         <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
             data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
             data-kt-toggle-name="aside-minimize">
             <!--begin::Svg Icon | path: icons/duotune/arrows/arr074.svg-->
             <span class="svg-icon svg-icon-1 rotate-180">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                     fill="none">
                     <path
                         d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z"
                         fill="black" />
                 </svg>
             </span>
             <!--end::Svg Icon-->
         </div>
         <!--end::Aside toggler-->
     </div>
     <!--end::Brand-->
     <!--begin::Aside menu-->
     <div class="aside-menu flex-column-fluid">
         <!--begin::Aside Menu-->
         <div class="hover-scroll-overlay-y my-2 py-5 py-lg-8" id="kt_aside_menu_wrapper" data-kt-scroll="true"
             data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
             data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
             data-kt-scroll-offset="0">
             <!--begin::Menu-->


             <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                 id="#kt_aside_menu" data-kt-menu="true">

                 <div class="menu-item {{ request()->is('dashboard') ? 'here show' : '' }}">
                     <a class="menu-link" href="/dashboard">
                         <span class="menu-icon">
                             <i class="bi bi-grid fs-3"></i>
                         </span>
                         <span class="menu-title">Dashboard</span>
                     </a>
                 </div>

                 <div class="menu-item {{ request()->is('company-profile') ? 'here show' : '' }}">
                     <a class="menu-link" href="/company-profile">
                         <span class="menu-icon">
                             <i class="bi bi-building fs-3"></i>
                         </span>
                         <span class="menu-title">Information</span>
                     </a>
                 </div>

                 {{-- <div data-kt-menu-trigger="click"
                     class="menu-item {{ request()->is('company-profile') ? 'here show' : '' }} menu-accordion">
                     <span class="menu-link">
                         <span class="menu-icon">
                             <i class="bi bi-building fs-3"></i>
                         </span>
                         <span class="menu-title">Information</span>
                         <span class="menu-arrow"></span>
                     </span>
                     <div
                         class="menu-sub menu-sub-accordion {{ request()->is('company-profile') ? 'menu-active-bg' : '' }}">
                         <div class="menu-item">
                             <a class="menu-link {{ request()->is('company-profile') ? 'active' : '' }}"
                                 href="/company-profile">
                                 <span class="menu-bullet">
                                     <span class="bullet bullet-dot"></span>
                                 </span>
                                 <span class="menu-title">Company Profile</span>
                             </a>
                         </div>
                     </div>
                 </div> --}}

                 <div class="menu-item {{ request()->is('users') ? 'here show' : '' }}">
                     <a class="menu-link" href="/users">
                         <span class="menu-icon">
                             <i class="bi bi-people fs-3"></i>
                         </span>
                         <span class="menu-title">Users</span>
                     </a>
                 </div>

                 <div class="menu-item {{ request()->is('category') ? 'here show' : '' }}">
                     <a class="menu-link" href="/category">
                         <span class="menu-icon">
                             <i class="bi bi-bookmarks fs-3"></i>
                         </span>
                         <span class="menu-title">Category</span>
                     </a>
                 </div>

                 <div class="menu-item {{ request()->is('activity') ? 'here show' : '' }}">
                     <a class="menu-link" href="/activity">
                         <span class="menu-icon">
                             <i class="bi bi-person-workspace fs-3"></i>
                         </span>
                         <span class="menu-title">Activity</span>
                     </a>
                 </div>

                 <div class="menu-item {{ request()->is('gallery') ? 'here show' : '' }}">
                     <a class="menu-link" href="/gallery">
                         <span class="menu-icon">
                             <i class="bi bi-image-alt fs-3"></i>
                         </span>
                         <span class="menu-title">Gallery</span>
                     </a>
                 </div>

                 <div class="menu-item {{ request()->is('news') ? 'here show' : '' }}">
                     <a class="menu-link" href="/news">
                         <span class="menu-icon">
                             <i class="bi bi-newspaper fs-3"></i>
                         </span>
                         <span class="menu-title">News</span>
                     </a>
                 </div>

                 <div class="menu-item {{ request()->is('product') ? 'here show' : '' }}">
                     <a class="menu-link" href="/product">
                         <span class="menu-icon">
                             <i class="bi  bi-box-seam fs-3"></i>
                         </span>
                         <span class="menu-title">Product</span>
                     </a>
                 </div>

                 <div class="menu-item {{ request()->is('videos') ? 'here show' : '' }}">
                     <a class="menu-link" href="/videos">
                         <span class="menu-icon">
                             <i class="bi bi-camera-reels fs-3"></i>
                         </span>
                         <span class="menu-title">Videos</span>
                     </a>
                 </div>



             </div>
             <!--end::Menu-->
         </div>
     </div>
     <!--end::Aside menu-->
 </div>
 <!--end::Aside-->
