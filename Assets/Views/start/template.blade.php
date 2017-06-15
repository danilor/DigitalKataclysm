<html>
@include('start.blocks.head')
<body>
<section id="about" class="section-space-padding pattern-bg">
    <div class="container">
        @include("start.blocks.header")

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="navigation_space">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">

                            <ul class="nav navbar-nav">
                                <li class=""><a href="/"><span class="fa fa-home"></span>{{ "Home" }}</a></li>
                                <li class=""><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-list"></span> {{ "Examples" }}</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/yvideo/wvO3zJaNBjs"><span class="fa fa-youtube-play"></span> {{ "Youtube Video" }}</a></li>
                                        <li><a href="/database_example"><span class="fa fa-database"></span> {{ "DB" }}</a></li>

                                    </ul>
                                </li>
                                <li class=""><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-link"></span> {{ "External Links" }}</a>
                                    <ul class="dropdown-menu">
                                        <li><a target="_blank" href="{{ config("urls.github") }}"><span class="fa fa-github"></span> {{ "Github" }}</a></li>
                                        <li><a target="_blank" href="{{ config("urls.twitter") }}"><span class="fa fa-twitter"></span> {{ "Twitter" }}</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="about-us">
                    @yield("content")
                </div>
            </div>
        </div>

        <row class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="row">
                    <div class="col-xs-4">
                    </div>
                    <div class="footer_icons col-xs-2">
                        <a target="_blank" href="{{ config("urls.github") }}"><img src="/img/landing/githublogo.png" alt="Github" /></a>
                    </div>
                    <div class="footer_icons col-xs-2">
                        <a target="_blank" href="{{ config("urls.twitter") }}"><img src="/img/landing/twitterlogo.png" alt="Twitter" /></a>
                    </div>
                </div>
            </div>
        </row>
    </div>

</section>

<!-- About Us End -->
</body>
@include("templates.blocks.footerJs")
</html>