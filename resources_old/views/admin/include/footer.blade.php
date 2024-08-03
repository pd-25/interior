</div>
<!-- END wrapper -->



<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor js -->
<script src="{{ asset('admin/assets/js/vendor.min.js') }}"></script>

<!-- optional plugins -->
{{-- <script src="{{ asset('admin/assets/libs/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/flatpickr/flatpickr.min.js') }}"></script>

<!-- page js -->
<script src="{{ asset('admin/assets/js/pages/dashboard.init.js') }}"></script>

<!-- Plugins js -->
<script src="{{ asset('admin/assets/libs/dropzone/min/dropzone.min.js') }}"></script> --}}

<!-- App js -->
<script src="{{ asset('admin/assets/js/app.min.js') }}"></script>
<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>

<script src="{{ asset('admin/assets/js/pages/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/pages/dataTables.bootstrap4.min.js') }}"></script>

<script>

    if($('#editor1').length>0){
        CKEDITOR.replace( 'editor1', {
            allowedContent: true,
        });
    }

    if($('#editor2').length>0){
        CKEDITOR.replace( 'editor2', {
            allowedContent: true,
        });
    }
    
    if($('#editor3').length>0){
        CKEDITOR.replace( 'editor3', {
            allowedContent: true,
        });
    }
    
    if($('#editor4').length>0){
        CKEDITOR.replace( 'editor4', {
            allowedContent: true,
        });
    }    

    $(document).ready(function() {
        // Default Datatable
        if($('#dataTable').length>0){
            $('#dataTable').DataTable({
                "language": {
                    "paginate": {
                        "previous": "<i class='uil uil-angle-left'>",
                        "next": "<i class='uil uil-angle-right'>"
                    }
                },
                "drawCallback": function () {
                    $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
                }
            });
        }    
    });    


</script>
@stack('scripts')

@yield('custom_script')

</body>
</html>
