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
    </div>
</section>
<!-- About Us End -->
</body>
@include("templates.blocks.footerJs")
</html>