<footer class="footer">
    © 2019 Annex by Gabriel Chagas.
</footer>

</div>
<!-- End Right content here -->

</div>
<!-- END wrapper -->


<!-- jQuery  -->
<script src="{{asset('app-assets/js/jquery.min.js')}}"></script>
<script src="{{asset('app-assets/js/popper.min.js') }}"></script>
<script src="{{asset('app-assets/js/bootstrap.min.js') }}"></script>
<script src="{{asset('app-assets/js/modernizr.min.js') }}"></script>
<script src="{{asset('app-assets/js/detect.js') }}"></script>
<script src="{{asset('app-assets/js/fastclick.js') }}"></script>
<script src="{{asset('app-assets/js/jquery.slimscroll.js') }}"></script>
<script src="{{asset('app-assets/js/jquery.blockUI.js') }}"></script>
<script src="{{asset('app-assets/js/waves.js') }}"></script>
<script src="{{asset('app-assets/js/jquery.nicescroll.js') }}"></script>
<script src="{{asset('app-assets/js/jquery.scrollTo.min.js') }}"></script>

<script src="{{asset('app-assets/plugins/skycons/skycons.min.js') }}"></script>
<script src="{{asset('app-assets/plugins/raphael/raphael-min.js') }}"></script>
<script src="{{asset('app-assets/plugins/morris/morris.min.js') }}"></script>

<script src="{{asset('app-assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('app-assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<!-- Buttons examples -->
<script src="{{asset('app-assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('app-assets/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('app-assets/plugins/datatables/jszip.min.js')}}"></script>
<script src="{{asset('app-assets/plugins/datatables/pdfmake.min.js')}}"></script>
<script src="{{asset('app-assets/plugins/datatables/vfs_fonts.js')}}"></script>
<script src="{{asset('app-assets/plugins/datatables/buttons.html5.min.js')}}"></script>
<script src="{{asset('app-assets/plugins/datatables/buttons.print.min.js')}}"></script>
<script src="{{asset('app-assets/plugins/datatables/buttons.colVis.min.js')}}"></script>
<!-- Responsive examples -->
<script src="{{asset('app-assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('app-assets/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('app-assets/pages/datatables.init.js')}}"></script>
<script src="{{asset('app-assets/plugins/dropzone/dist/dropzone.js')}}"></script>
<script src="{{asset('app-assets/plugins/dropify/js/dropify.min.js')}}"></script>
<!-- Sweet-Alert  -->
<script src="{{asset('app-assets/plugins/sweet-alert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('app-assets/plugins/sweet-alert2/sweet-alert.init.js')}}"></script> 
{{-- Jquery Mask --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script> 


<script src="{{asset('app-assets/pages/dashborad.js')}}"></script>

<!-- App js -->
<script src="{{asset('app-assets/js/app.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable-buttons').DataTable();
        $('.dropify').dropify();  
    } );
</script>
@stack('js')
</body>
</html>