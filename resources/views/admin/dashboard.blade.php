<!doctype html>
<html class="no-js" lang=""> 
<head>
    <title></title>
    @include('../files/dash-links')
   <style>
        .navbar .navbar-nav li > a.dash-active {
            font-weight: 700;
            color: #fff !important
        }
    </style>
</head>

<body>
    @include('../files/dash-sidebar')
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        @include('../files/adminHeader')
        <!-- /#header -->
        <section>
            <div class="container">
                <div class="mnain-tbl py-4">
                    <h2 class="text-center">Admin Home</h2>
                </div>
            </div>
        </section>
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js-admin/main.js"></script>

</body>
</html>
