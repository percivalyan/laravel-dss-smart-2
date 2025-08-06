<!-- Core JS Files -->
<script src="{{ asset('admin/assets/js/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>

<!-- Charts Plugin -->
<script src="{{ asset('admin/assets/js/chartist.min.js') }}"></script>

<!-- Notifications Plugin -->
<script src="{{ asset('admin/assets/js/bootstrap-notify.js') }}"></script>

<!-- Google Maps Plugin -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="{{ asset('admin/assets/js/light-bootstrap-dashboard.js?v=1.4.0') }}"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="{{ asset('admin/assets/js/demo.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        demo.initChartist();

        $.notify({
            icon: "pe-7s-gift",
            message: "Hello <b>{{ auth()->user()->name }}</b>, welcome to your dashboard! This is a demo notification, check the <b>Notifications</b> section for more examples.",
        }, {
            type: "info",
            timer: 4000,
        });
    });
</script>

{{-- <script>
    document.querySelectorAll('.toggle-submenu').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const parentLi = this.parentElement;
            parentLi.classList.toggle('active');
        });
    });
</script> --}}
