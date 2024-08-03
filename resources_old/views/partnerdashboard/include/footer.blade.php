</div>
<!-- END wrapper -->



<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor js -->
<script src="{{ asset('admin/assets/js/vendor.min.js') }}"></script>

<!-- optional plugins -->
<script src="{{ asset('admin/assets/libs/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/flatpickr/flatpickr.min.js') }}"></script>

<!-- page js -->
<script src="{{ asset('admin/assets/js/pages/dashboard.init.js') }}"></script>

<!-- Plugins js -->
<script src="{{ asset('admin/assets/libs/dropzone/min/dropzone.min.js') }}"></script>

<!-- App js -->
<script src="{{ asset('admin/assets/js/app.min.js') }}"></script>
<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>


<script>

    CKEDITOR.replace( 'editor1', {
        allowedContent: true,
    } );
    CKEDITOR.replace( 'editor2', {
        allowedContent: true,
    } );
    CKEDITOR.replace( 'editor3', {
        allowedContent: true,
    } );
    CKEDITOR.replace( 'editor4', {
        allowedContent: true,
    } );


</script>
@stack('scripts')

</body>
</html>
