@if (Session::get('success'))
    <script>
        Toastify({
            text: "{{ Session::get('success') }}",
            duration: 2000,
            position: "center",
            style: {
                background: "#198754"
            },
        }).showToast();
    </script>
@endif

@if (Session::get('error'))
    <script>
        Toastify({
            text: "{{ Session::get('error') }}",
            duration: 2000,
            position: "center",
            style: {
                background: "#dc3545"
            },
        }).showToast();
    </script>
@endif
