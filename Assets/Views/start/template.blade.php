<html>
@include('start.blocks.head')
<body>
<section id="about" class="section-space-padding pattern-bg">
    <div class="container">
        @include("start.blocks.header")
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