<footer class="footer">
    <div class="container-fluid">
        <nav class="float-left">
            <ul>

            </ul>
        </nav>
        <div class="copyright float-right">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            UOK Students.
        </div>
    </div>
</footer>
</div>
</div>

<!--   Core JS Files   -->
<script src="{{ asset('admin/js/core/jquery.min.js') }}"></script>
<script src="{{ asset('admin/js/core/popper.min.js') }}"></script>
<script src="{{ asset('admin/js/core/bootstrap-material-design.min.js') }}"></script>
<script src="{{ asset('admin/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<!-- Plugin for the momentJs  -->
<script src="{{ asset('admin/js/plugins/moment.min.js') }}"></script>
<!--  Plugin for Sweet Alert -->
<script src="{{ asset('admin/js/plugins/sweetalert2.js') }}"></script>
<!-- Forms Validations Plugin -->
<script src="{{ asset('admin/js/plugins/jquery.validate.min.js') }}"></script>
<!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="{{ asset('admin/js/plugins/jquery.bootstrap-wizard.js') }}"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ asset('admin/js/plugins/bootstrap-selectpicker.js') }}"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="{{ asset('admin/js/plugins/bootstrap-datetimepicker.min.js') }}"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
<script src="{{ asset('admin/js/plugins/jquery.dataTables.min.js') }}"></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{ asset('admin/js/plugins/bootstrap-tagsinput.js') }}"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{ asset('admin/js/plugins/jasny-bootstrap.min.js') }}"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="{{ asset('admin/js/plugins/fullcalendar.min.js') }}"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="{{ asset('admin/js/plugins/jquery-jvectormap.js') }}"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{ asset('admin/js/plugins/nouislider.min.js') }}"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="{{ asset('admin/js/core.js') }}"></script>
<!-- Library for adding dinamically elements -->
<script src="{{ asset('admin/js/plugins/arrive.min.js') }}"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chartist JS -->
<script src="{{ asset('admin/js/plugins/chartist.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('admin/js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('admin/js/material-dashboard.js?v=2.1.2"') }} type=" text/javascript"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('admin/demo/demo.js') }}"></script>

<script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        md.initDashboardPageCharts();

    });
</script>

{{-- player   js --}}
<script src="{{ asset('js/playerjs.js') }}"></script>

{{-- Movie js --}}

<script src="{{ asset('admin/js/custom/movie.js') }}"></script>
<script src="{{ asset('js/custom/movie.js') }}"></script>

{{-- Toaster --}}
<script src="{{ asset('admin/js/toastr.min.js') }}"></script>
{{-- Select 2 --}}
<script src="{{ asset('admin/js/select2.min.js') }}"></script>
<script>
    @if (Session::has('success'))
        toastr.success('{{ Session::get('success') }}');
    @endif


    @if (Session::has('update'))
        toastr.info("{{ Session::get('update') }}")
    @endif

    @if (Session::has('delete'))
        toastr.error("{{ Session::get('delete') }}")
    @endif
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            var that = $(this);
            var n = confirm('Are you sure to delete this?');
            if (n) {
                that.closest('form').submit();
            } else {

            }
        });


    });
    //select2 for multiple select
    $('.select2').select2({
        width: '100%'
    });
</script>
</body>

</html>
