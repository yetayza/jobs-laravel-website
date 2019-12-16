@extends('jobs.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Job-Laravel-Website</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('jobs.create')}}">Post New Job</a>
            </div>
        </div>
    </div>

    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    
    @endif

    <table class="table table-bordered">
        <tr>
 
        </tr>
        @foreach ($jobs as $job)
        <tr>
            <td>{{++$i}}</td>
            <td>{{$job->title}}</td>
            <td>{{$job->description}}</td>
            <td>
                <form action="{{route('jobs.destroy',$job->id)}}" method="POST">
                <a href="{{route('jobs.show',$job->id)}}">Show More</a>
                <a href="{{route('jobs.edit',$job->id)}}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $jobs->links()!!}
    @endsection