@extends('start.template')
@section("content")
    <p>
        This is a database test. This database is hosted in a free database site, so its posible that the database does not exist when you are testing this.
    <p>
    <div>
        @if( isset($offices) && count($offices) > 0 )
            <table width="100%" class="table table-bordered table-hover table-hovered table-responsive">
                <thead>
                    <tr>
                        <th>{{ "ID" }}</th>
                        <th>{{ "NAME" }}</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach( $offices AS $office )
                            <tr>
                                <td>{{ $office -> id }}</td>
                                <td>{{ $office -> name }}</td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
        @endif
    </div>

@stop