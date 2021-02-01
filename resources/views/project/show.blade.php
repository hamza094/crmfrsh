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
                <span> {{$project->name}}</span>
            </span>
            @can ('access', $project)
                        <project-edit :project="{{json_encode($project)}}" :subscribe="{{json_encode($project->IsSubscribedTo)}}"  :members="{{json_encode($members)}}" ></project-edit>
                        @endcan
                    </div>
                </div>
                <div class="page-content">
                    <div class="row">
                        <div class="col-md-2">
                          @can ('access', $project)
                      <single-project :project="{{json_encode($project)}}" :scores="{{json_encode($scores)}}"
                       :details="{{json_encode($project->scores)}}"></single-project>
                       @endcan
                        </div>
                        <div class="col-md-10">
                            <div class="content">
                                <p class="content-name">{{$project->name}}</p>
                                <p class="content-info">
                                  @if($project->position !==null)
                                  {{$project->position}}
                                  @else
                                  Add Position
                                  @endif
                                  <span class="content-dot"></span>
                                  Add Company
                                </p>
                                @if($project->address !==null)
                                <p class="content-map"><i class="fas fa-map-marker-alt"></i><a href="http://maps.google.com/?q={{$project->address}}" target="_blank">{{$project->address}}</a></p>
                                @else
                                <p class="content-map"><i class="fas fa-map-marker-alt"></i> Add Address</p>
                                @endif
                            </div>
                          </div>
                   </div>
                    <hr>
                    <p class="pro-info">Project Detail</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="crm-info"> <b>Email</b>: <span> {{$project->email}} </span></p>
                                    <p class="crm-info"> <b>Mobile</b>: <span> {{$project->mobile}} </span></p>
                                    @if($project->postponed == null || $project->postponed !== 0)
                                    <p class="crm-info"> <b>Postponed reason</b>: <span> Not Defined  </span></p>
                                    @else
                                    <p class="crm-info"> <b>Postponed reason</b>: <span> {{$project->postponed}}  </span></p>
                                    @endif
                                    <p class="crm-info"> <b>Zipcode</b>: <span> {{$project->zipcode}} </span></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="crm-info"> <b>Address</b>: <span> {{$project->address}} </span></p>
                                    <p class="crm-info"> <b>Created At</b>: <span> {{$project->created_at->diffForHumans()}} </span></p>
                                    <p class="crm-info"> <b>Updated At</b>: <span> {{$project->updated_at->diffForHumans()}} </span></p>
                                    <p class="crm-info"> <b>Updated By</b>: <span> Hamza </span></p>
                            </div>
                            </div>
                    <hr>
                    @can ('access', $project)
                    <project-stage :project="{{$project}}"></project-stage>
                    <hr>
                    @endcan
                    <h3>RECENT ACTIVITIES</h3>
                    <div class="row">
                   <div class="col-md-7 mb-5">
                     <div class="activity">
                      @include('project.activities.card')
                    </div>
                   </div>
                   <div class="col-md-5">
                     <div class="project-info">
                       <div class="project-info_socre">
                         <p class="project-info_score-heading">Score</p>
                         @if($scores <= 49)
                         <p class="project-info_score-point project-info_score-point_cold">{{$scores}}</p>
                         @else
                             <p class="project-info_score-point project-info_score-point_hot">{{$scores}}</p>
                         @endif
                       </div>
                       <div class="project-info_rec">
                         <span>Last Seen</span>
                         <p>{{Carbon\Carbon::parse($project->user->lastseen())->diffforHumans()}}</p>
                       </div>
                       <div class="project-info_rec">
                         <span>Stage Updated</span>
                         <p>{{Carbon\Carbon::parse($project->stageUpdate())->diffforHumans()}}</p>
                       </div>
                       <div class="project-info_rec">
                         <span>Last modified</span>
                         <p>{{$project->updated_at->diffForHumans()}}</p>
                       </div>
                     </div>
                   </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 side_panel">
              @can ('access', $project)
                <project-panel :project="{{json_encode($project)}}"  :members="{{json_encode($members)}}"  :projectgroup="{{json_encode($projectgroup)}}"
                :cons="{{json_encode($cons)}}"></project-panel>
                @endcan
            </div>
        </div>
    </div>

@endsection


 
