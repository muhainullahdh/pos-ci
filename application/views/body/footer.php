<footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 footer-copyright text-center">
                <p class="mb-0">Copyright 2023 © Fantecno theme by pixelstrap  </p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- latest jquery-->
    <!-- Bootstrap js-->
    <script>
        localStorage.removeItem("page-wrapper");

    </script>
    <script src="<?= base_url() ?>assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="<?= base_url() ?>assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="<?= base_url() ?>assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js-->
    <script src="<?= base_url() ?>assets/js/scrollbar/simplebar.js"></script>
    <script src="<?= base_url() ?>assets/js/scrollbar/custom.js"></script>
    <!-- Sidebar jquery-->
    <script src="<?= base_url() ?>assets/js/config.js"></script>
    <script src="<?= base_url() ?>assets/js/sweet-alert/sweetalert.min.js"></script>

    <!-- Plugins JS start-->
    <script src="<?= base_url() ?>assets/js/cleave/cleave.min.js"></script>
    <script src="<?= base_url() ?>assets/js/cleave/custom-cleave.js"></script>
    <script src="<?= base_url() ?>assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/js/datatable/datatables/datatable.custom.js"></script>
    <script src="<?= base_url() ?>assets/js/sidebar-menu.js"></script>
    <script src="<?= base_url() ?>assets/js/clock.js"></script>
    <script src="<?= base_url() ?>assets/js/slick/slick.min.js"></script>
    <script src="<?= base_url() ?>assets/js/slick/slick.js"></script>
    <script src="<?= base_url() ?>assets/js/header-slick.js"></script>
    <!-- <script src="<?= base_url() ?>assets/js/chart/apex-chart/apex-chart.js"></script>
    <script src="<?= base_url() ?>assets/js/chart/apex-chart/stock-prices.js"></script>
    <script src="<?= base_url() ?>assets/js/chart/apex-chart/moment.min.js"></script> -->
    <script src="<?= base_url() ?>assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="<?= base_url() ?>assets/js/dashboard/default.js"></script>
    <!-- <script src="<?= base_url() ?>assets/js/notify/index.js"></script> -->
    <script src="<?= base_url() ?>assets/js/typeahead/handlebars.js"></script>
    <script src="<?= base_url() ?>assets/js/typeahead/typeahead.bundle.js"></script>
    <script src="<?= base_url() ?>assets/js/typeahead/typeahead.custom.js"></script>
    <script src="<?= base_url() ?>assets/js/typeahead-search/handlebars.js"></script>
    <script src="<?= base_url() ?>assets/js/typeahead-search/typeahead-custom.js"></script>
    <script src="<?= base_url() ?>assets/js/height-equal.js"></script>
    <script src="<?= base_url() ?>assets/js/animation/wow/wow.min.js"></script>



    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="<?= base_url() ?>assets/js/script.js"></script>
    <!-- <script src="<?= base_url() ?>assets/js/theme-customizer/customizer.js"></script> -->
    <!-- Plugin used-->
    <script>new WOW().init();</script>
    <script>
        // xx();
        // function xx()
        // {
        //     if (localStorage.getItem("page-wrapper") == 'horizontal-wrapper') {
        //         localStorage.removeItem("page-wrapper");
        //     }
        // }
        $(document).ready(function(){

            var t = $('#t_barang').DataTable(
                {order:[[0,"desc"]]}
            );
            console.log(localStorage.getItem("page-wrapper"))
            // $(function($) {
            //   let url = window.location.href;
            //   $('nav ul li a').each(function() {
            //     if (this.href === url) {
            //       $(this).closest('a').addClass('active');
            //     }
            //   });
            // });
            // console.log(localStorage.getItem("page-wrapper"))
            // setTimeout(() => {
                // if (localStorage.getItem("page-wrapper") == 'horizontal-wrapper') {
                    // $(".page-wrapper").attr(
                    // "class",
                    // "page-wrapper compact-wrapper"
                    // );
                    // // $(this).addClass("active");
                    // localStorage.setItem("page-wrapper","compact-wrapper");
                // }
            // }, 1000);

            // // for sidebar menu entirely but not cover treeview
            // $('ul.navigation .nav-item a').filter(function() {
            //     return this.href == location.href
            // }).parent().addClass('active');

            // // for treeview
            // $('ul.nav-collapse li a').filter(function() {
            //     return this.href == location.href
            // }).parentsUntil(".nav > .nav.nav-collapse li a").addClass('active');

            // $('div.collapse li a').filter(function() {
            //     return this.href == location.href
            // }).parentsUntil(".nav > collapse li a").addClass('show');
        });
    </script>
  </body>
</html>
