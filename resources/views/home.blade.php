@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{route('jobs.create')}}">Post New Job</a>
                    </div>
                    <div class="pull-left">
                        <a class="btn btn-success" href="{{route('jobs.index')}}">See Avalible job</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
