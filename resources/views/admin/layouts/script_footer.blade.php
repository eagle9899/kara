<!-- Vendor JS Files -->
<script src="{{ asset('dist/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('dist/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/vendor/chart.js/chart.min.js') }}"></script>
<script src="{{ asset('dist/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('dist/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('dist/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('dist/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('dist/js/main.js') }}"></script>
<script src="{{ asset('dist/js/iziToast.min.js') }}"></script>
<script src="{{ asset('dist/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('dist/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dist/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('dist/js/validate.js') }}"></script>
<script src="{{ asset('dist/js/jscolor.js') }}"></script>

<script>
  $('.select2').select2({
    theme: 'bootstrap-5',
    containerCssClass: 'select2--small', 
  });
  $(document).ready(function(){
    $('.form-tabledata').DataTable();
  });
</script>
{{-- 
    
    <script src="{{ asset('dist/js/scripts.js') }}"></script>
<script src="{{ asset('dist/js/custom.js') }}"></script>

--}}