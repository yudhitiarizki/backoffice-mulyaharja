@if ($message = Session::get('success'))
    <script>
        Swal.fire({
            text: {!! json_encode($message) !!},
            icon: "success",
            buttonsStyling: false,
            confirmButtonText: "Ok, got it!",
            customClass: {
                confirmButton: "btn btn-primary",
            },
        })
    </script>
@endif

@if ($message = Session::get('error'))
    <script>
        Swal.fire({
            text: {!! json_encode($message) !!},
            icon: "error",
            showConfirmButton: true,
        });
    </script>
@endif

@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('info'))
    <div class="alert alert-info alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif
