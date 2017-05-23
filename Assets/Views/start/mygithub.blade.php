<html>
    <head>
        <!-- LANDING PAGE BASED ON https://onepagelove.com/tust -->
        <title>
            Digital Kataclysm
        </title>

        @include("templates.blocks.headerCSS")

        <!-- Landing page style -->
        <link rel="stylesheet" href="/css/landing/style.css" />
        <!-- Google Web Fonts  -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700|Nosifer">


    </head>
    <body>
    <section id="about" class="section-space-padding pattern-bg">
        <div class="container">
            <div class="section-title">
                <i class="fa fa-rocket" aria-hidden="true"></i>
                <h3>{{ "DIGITAL" }} <span>{{ "KATACLYSM" }}</span></h3>
            </div>

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="about-us">
                        <center>
                            <div class="github-widget" data-username="danilor"></div>
                            <script src="/js/landing/githubwidget.js"></script>
                        </center>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- About Us End -->
    </body>
    @include("templates.blocks.footerJs")

</html>