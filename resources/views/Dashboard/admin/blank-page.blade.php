@include("Dashboard.layouts.style")


        <div class="page-wrapper toggled">
            <!-- sidebar-wrapper -->
            @include("Dashboard.layouts.sidebar")
            <!-- sidebar-wrapper  -->

            <!-- Start Page Content -->
            <main class="page-content bg-light">
                <!-- Top Header -->
                @include("Dashboard.layouts.header")
                <!-- Top Header -->

                <div class="container-fluid">
                    <div class="layout-specing">
                        <div class="d-md-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Blank Page</h5>

                            <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
                                <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                                    <li class="breadcrumb-item text-capitalize"><a href="index.html">Landrick</a></li>
                                    <li class="breadcrumb-item text-capitalize active" aria-current="page">Blank Page</li>
                                </ul>
                            </nav>
                        </div>
                    
                        <div class="row">
                            <div class="col-12 mt-4">
                                <div class="card border-0 rounded shadow p-4">
                                    <h5 class="mb-0 mb-3">Blank Page</h5>
                                    <p class="text-muted mb-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Libero, aliquid soluta. Voluptas neque adipisci fuga magnam nulla exercitationem corrupti ducimus itaque soluta earum! Fugiat, animi id sit ad magnam facilis.</p>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                </div><!--end container-->

                <!-- Footer Start -->
                @include("Dashboard.dist.layouts.footer")
                <!-- End -->
            </main>
            <!--End page-content" -->
        </div>
        <!-- page-wrapper -->

        <!-- Offcanvas Start -->
        @include("Dashboard.dist.layouts.themes")
        <!-- Offcanvas End -->
        
        <!-- javascript -->
        <!-- JAVASCRIPT -->
        @include("Dashboard.dist.layouts.js")
    </body>

</html>