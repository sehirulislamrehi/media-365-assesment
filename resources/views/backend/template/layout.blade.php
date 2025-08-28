<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="pixelstrap">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Media365 - Admin</title>
    @vite(['resources/js/app.js'])
    @include('backend.includes.css')

</head>

<body>
    <!-- loader starts-->
    <div class="loader-wrapper">
        <div class="loader">
            <div class="loader4"></div>
        </div>
    </div>
    <!-- loader ends-->

    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->

    <!-- MY MODAL -->
    <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

            </div>
        </div>
    </div>
    <!-- MY MODAL END -->

    <!-- MY MODAL large -->
    <div class="modal fade bd-example-modal-lg" id="largeModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

            </div>
        </div>
    </div>
    <!-- MY MODAL large END -->

    <!-- MY MODAL Extra large -->
    <div class="modal fade bd-example-modal-lg" id="extraLargeModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">

            </div>
        </div>
    </div>
    <!-- MY MODAL Extra large END -->

    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">

        <!-- Page Header Start-->
        @include('backend.includes.header')
        <!-- Page Header Ends -->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">

            <!-- Page Sidebar Start-->
            @include('backend.includes.left_sidebar')
            <!-- Page Sidebar Ends-->

            <div class="page-body">
                @yield('content')
            </div>

            <!-- footer start-->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 footer-copyright text-center">
                            <p class="mb-0">QoDesign</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    @include('backend.includes.script')

</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const userId = "{{ auth('web')->user()->id }}";

        Echo.channel('test.public')
            .listen('.public-notify', (e) => {
                // Only handle if the event is for this user
                if (userId == e.userId) {
                    if (e.table && $('.' + e.table).length) {
                        $('.' + e.table).DataTable().ajax.reload();
                    }
                }
            });
    });
</script>

</html>