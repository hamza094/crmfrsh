@extends('header')
@section('crm')
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-8 page pd-r">
                <div class="page-top">
                    <div>
            <span>
                <span class="page-top_heading">Projects </span>
                <span class="page-top_arrow"> > </span>
                <span> <a href="{{$project->path()}}">{{$project->name}}</a></span>
                <span class="page-top_arrow"> > </span>
                <span>Activities</span>
            </span>
                    </div>
                </div>
<div class="container mt-3">
  <div class="activity mb-5">
    <ul>
       @foreach($project->activity as $activity)
        <li>
        @include("project.activities.{$activity->description}")
            <p class="activity-info"><span>{{$activity->user->name}} </span><span class="activity-info_dot"></span><span> {{$activity->created_at->diffForHumans(null,true)}} ago</span></p>
        </li>
        @endforeach
    </ul>
  </div>
</div>

            </div>
            <div class="col-md-4">
                by
            </div>
        </div>
    </div>



@endsection