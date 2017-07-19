@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard User</div>

                <div class="panel-body">
                    Selamat : <b>Auth::User()->name</b>
                    Anda Login sebagai User
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
