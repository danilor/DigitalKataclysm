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
                        <p>DIGITAL KATACLYSM (Current version {{ \Kataclysm\Kataclysm::CURRENT_VERSION }}) is a Framework inspired in applications such as Laravel and other MVC frameworks. It tries to stay as loyal to the Laravel structure and at the same time have its own magic in it. It is even using some of the most popular Laravel packages, but trying to use only the necessary ones.</p>
                        <p>
                            Current Environment:
                        </p>
                        <p>
                            <center>
                                <strong>
                                    {{ env("ENV") }}
                                </strong>
                            </center>
                        </p>

                        <p>
                            This is a working process, so its normal find some issues and errors. If you find something that you consideer that slipped from my hands, please let me know.
                        </p>

                        <p>This is a temporal landing page. You can wait for the most awesome landing page you have ever see in the future, so this one is going to be replaced.</p>
                        <p>
                            In the meantime, why don't you check my <a href="/mygithub">Github account</a>? Maybe you can find something of your interest! Or maybe you want to see a <a href="/yvideo/k9yQEG7mlTU">nice video</a> that shows you how the dynamic URL works!
                        </p>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- About Us End -->
    </body>
    @include("templates.blocks.footerJs")

</html>