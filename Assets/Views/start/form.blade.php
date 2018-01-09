@extends('start.template')
@section("content")
    <style>
        .form-control{
            color:black!important;
        }
    </style>
    <p>
        This is an example form
    <p>
    <div>
        @if( isset( $error ) )

            @foreach( $error AS $r )
                <div class="alert alert-danger alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong></strong> {{ $r }}
                </div>
            @endforeach
        @endif

            @if( isset( $success ) && $success === true )
                <div class="alert alert-success alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong></strong> {{ "Information processed successfully" }}
                </div>
            @endif
        <form method="POST" action="/form_example" class="form">
            <div class="form-group">
                <label>Name: *</label>
                <input class="form-control" type="text" name="name" id="name" required="required" />
            </div>
            <div class="form-group">
                <label>Email: *</label>
                <input class="form-control" type="email" name="email" id="email" required="required" />
            </div>
            <div class="form-group">
                <label>Address: *</label>
                <input class="form-control" type="text" name="address" id="address" required="required" />
            </div>
            <div class="form-group">
                <label>Nickname:</label>
                <input class="form-control" type="text" name="nickname" id="nickname" />
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary"> <i class="fa fa-envelope" title="Send" aria-hidden="true"></i> </button>
            </div>
        </form>
    </div>

@stop