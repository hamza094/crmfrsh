@extends('header')
@section('crm')
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-8 page pd-r">
                <div class="page-top">
                    <div>
            <span>
                <span class="page-top_heading">Leads </span>
                <span class="page-top_arrow"> > </span>
                <span> {{$lead->name}}</span>
            </span>
                        <div class="float-right">
                            buttons
                        </div>
                    </div>
                </div>
                <div class="page-content">
                    <div class="row">
                        <div class="col-md-2">
                      <single-lead :lead="{{$lead}}" v-cloak>
                          <template v-slot:trig>
                              @if($score <=49)
                              <span role="button" class="score-point score-point_cold">{{$score}}</span>
                              @else
                                  <span role="button" class="score-point score-point_hot">{{$score}}</span>
                              @endif
                          </template>
                          <div class="score">
                              <div class="score-content">
                                  <p class="score-content_para"><i class="far fa-clock"></i><b>Lead</b> since {{$lead->created_at->diffForHumans()}} with current in stage <b>Connected</b></p>
                                  <div class="score-content_point">
                                      <p class="score-content_point-para"><b>Top scoring factors</b></p>
                                      <div class="row">
                                          <div class="col-md-3">
                                              <p class="score-content_point-cold">
                                                  @if($score <=49)
                                                  <span class="score-content_point-cold_point">{{$score}}</span><br><span class="score-content_point-cold_status">Cold</span></p>
                                              @else
                                                  <span class="score-content_point-hot_point">{{$score}}</span><br><span class="score-content_point-hot_status">Hot</span></p>
                                              @endif
                                          </div>
                                          <div class="col-md-9">
                                           @foreach($lead->scores as $score)
                                               <p class="lead-score"><span><i class="fas fa-arrow-up"></i></span> {{$score->message}}</p>
                                                  <p class="lead-score"><span><i class="fas fa-arrow-up"></i></span> Lead Updated</p>

                                              @endforeach
                                          </div>
                                      </div>
                                  </div>
                              </div>

                          </div>
                      </single-lead>
                        </div>
                        <div class="col-md-10">
                            <div class="content">
                                <p class="content-name">{{$lead->name}}</p>
                                <p class="content-info">Sales Manager<span class="content-dot"></span>Widjets.co</p>
                                <p class="content-map"><i class="fas fa-map-marker-alt"></i><a href="http://maps.google.com/?q=1200 Pennsylvania Ave SE, Washington, District of Columbia, 20003" target="_blank">Mongolia, Usa</a></p>
                            </div>
                        </div>
                    </div>
                    <p></p>
                </div>

            </div>
            <div class="col-md-4">
                by
            </div>
        </div>
    </div>



@endsection


 
