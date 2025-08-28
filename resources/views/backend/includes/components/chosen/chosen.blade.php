<link href="{{ asset('backend/css/chosen/choosen.min.css') }}" rel="stylesheet">
<script src="{{ asset('backend/js/chosen/choosen.min.js') }}"></script>
<script>
    $(document).ready(function domReady() {
        $(".chosen").chosen({
            search_contains: true
        });
    });
</script>