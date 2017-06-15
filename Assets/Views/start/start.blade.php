@extends('start.template')
@section("content")
    <p>DIGITAL KATACLYSM (Current version {{ \Kataclysm\Kataclysm::CURRENT_VERSION }}) is a Framework
        inspired in applications such as Laravel and other MVC frameworks. It tries to stay as loyal to the
        Laravel structure (and ideology) and at the same time have its own magic in it. It is even using some of the most popular Laravel packages, but trying to use only the necessary ones.</p>
    <p>
        Current Environment:
    </p>
    <p>
    <center>
        <strong>
            {{ env("ENV") }} | KEY:  {{ config("app.app_key") }}
        </strong>
    </center>
    </p>

    <p>
        This is a working process, so its normal find some issues and errors. If you find something that you consider that slipped from my hands, please let me know.
    </p>

    <p>This is a temporal landing page. You can wait for the most awesome landing page you have ever see in the future, so this one is going to be replaced.</p>
    <p>
        In the meantime, why don't you check my <a href="/mygithub">Github account</a>? Maybe you can find something of your interest!
        Or maybe you want to see a <a href="/yvideo/wvO3zJaNBjs">nice video</a> that shows you how the dynamic URL works!
    </p>
@stop