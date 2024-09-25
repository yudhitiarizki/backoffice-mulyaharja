<div class="modal fade" id="kt_modal_delete" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <form class="form" id="from-delete" action="" method="POST" onsubmit="onSubmitFormDelete()">
                @csrf
                {{ method_field('DELETE') }}
                <div class="modal-body py-5 px-lg-1">
                    <div class="row mb-4 text-center">
                        <div class="col-md-12">
                            <div style="text-align: center;display: flex;justify-content: center;">
                                <svg width="101" height="101" viewBox="0 0 101 101" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M50.5 6.3125C41.7606 6.3125 33.2174 8.90405 25.9508 13.7594C18.6842 18.6148 13.0205 25.516 9.67609 33.5902C6.33165 41.6644 5.45659 50.549 7.16157 59.1206C8.86655 67.6921 13.075 75.5655 19.2547 81.7453C25.4345 87.925 33.3079 92.1335 41.8795 93.8384C50.451 95.5434 59.3356 94.6684 67.4098 91.3239C75.4841 87.9795 82.3852 82.3158 87.2406 75.0493C92.096 67.7827 94.6875 59.2395 94.6875 50.5C94.6875 38.7807 90.0321 27.5415 81.7453 19.2547C73.4585 10.968 62.2193 6.3125 50.5 6.3125ZM50.5 88.375C43.0091 88.375 35.6863 86.1537 29.4578 81.9919C23.2293 77.8301 18.3748 71.9149 15.5081 64.9941C12.6414 58.0734 11.8914 50.458 13.3528 43.111C14.8142 35.7639 18.4214 29.0152 23.7183 23.7183C29.0153 18.4214 35.7639 14.8142 43.111 13.3528C50.458 11.8913 58.0734 12.6414 64.9942 15.5081C71.9149 18.3747 77.8302 23.2293 81.9919 29.4578C86.1537 35.6863 88.375 43.009 88.375 50.5C88.375 60.5451 84.3846 70.1787 77.2817 77.2817C70.1787 84.3846 60.5451 88.375 50.5 88.375Z"
                                        fill="#F7BBC4" />
                                    <path
                                        d="M37.415 41.8867V71.6884C37.415 72.5168 38.0866 73.1884 38.915 73.1884H62.745C63.5735 73.1884 64.245 72.5168 64.245 71.6884V41.8867H37.415Z"
                                        fill="#E41C39" />
                                    <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M55.3017 34.0613V31.7075C55.3017 31.1552 54.854 30.7075 54.3017 30.7075H47.3584C46.8061 30.7075 46.3584 31.1552 46.3584 31.7075V34.0613H35.6792C35.4031 34.0613 35.1792 34.2851 35.1792 34.5613V36.915C35.1792 37.1912 35.4031 37.415 35.6792 37.415H65.9809C66.257 37.415 66.4809 37.1912 66.4809 36.915V34.5613C66.4809 34.2851 66.257 34.0613 65.9809 34.0613H55.3017Z"
                                        fill="#E41C39" />
                                </svg>
                            </div>
                            <p class="mt-3 fs-3 fw-bold">Are you sure to remove the data?</p>
                            <div style="margin-top:20px;">
                                <button type="reset" id="kt_modal_add_customer_cancel"
                                    class="btn btn-outline btn-outline-danger btn-active-light-danger btn-popup-confirmation-outline"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" id="kt_modal_delete"
                                    class="btn btn-danger btn-popup-confirmation">
                                    <span class="indicator-label">Yes, remove</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function disableButtonDelete() {
        $('#kt_modal_delete').prop('disabled', true);
    }

    function onSubmitFormDelete() {
        disableButtonDelete();
    }
</script>
