<!-- Required vendors -->

    
    <script src="{{ asset ('template/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset ('template/js/quixnav-init.js') }}"></script>
    <script src="{{ asset ('template/js/custom.min.js') }}"></script>
    
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <!-- Vectormap -->
    <script src="{{ asset ('template/vendor/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset ('template/vendor/morris/morris.min.js') }}"></script>

    <script src="{{ asset ('template/vendor/chartist/js/chartist.min.js') }}"></script>

     <script src="{{ asset('template/vendor/moment/moment.min.js') }}"></script>
    <script src="{{ asset('template/vendor/pg-calendar/js/pignose.calendar.min.js') }}"></script>


    <script src="{{ asset ('template/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset ('template/vendor/chart.js/Chart.bundle.min.js') }}"></script>

    <script src="{{ asset ('template/vendor/gaugeJS/dist/gauge.min.js') }}"></script>

    <!--  flot-chart js -->
    <script src="{{ asset ('template/vendor/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset ('template/vendor/flot/jquery.flot.resize.js') }}"></script>

    <!-- Owl Carousel -->
    <script src="{{ asset ('template/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>

    <!-- Counter Up -->
    <script src="{{ asset ('template/vendor/jqvmap/js/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset ('template/vendor/jqvmap/js/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset ('template/vendor/jquery.counterup/jquery.counterup.min.js') }}"></script>
    <!-- Chart ChartJS plugin files -->
    <script src="{{ asset('template/vendor/chart.js/Chart.bundle.min.js') }}"></script>
    {{-- select2 --}}
    <script src="{{ asset ('template/vendor/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('template/js/plugins-init/select2-init.js') }}"></script>

    <!-- Datatable -->
    <script src="{{ asset ('template/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset ('template/js/plugins-init/datatables.init.js') }}"></script>
    
    {{-- <script src="{{ asset ('template/js/dashboard/dashboard-1.js') }}"></script> --}}
    {{-- <script src="{{ asset('template/js/plugins-init/chartjs-init.js') }}"></script> --}}
    <script src="{{ asset ('template/js/dashboard/dashboard-2.js') }}"></script>

    @stack('scriptPlus')

    <script>
             $('.alert').fadeOut(6000, function() {
                $('.alert').remove();
            });
            // $(".alert").queue(function() {
            //     $(this).remove();
            //     // $(this).dequeue();
            // });
        $("button.cls-alert").click(function() {
            $(".alert").animate({
                height: 0,
            }, 2000);
            $(".alert").queue(function() {
                $(this).remove();
                $(this).dequeue();
            });
            });
    </script>