@extends('layout')

@section('content')

<section id="pricing" class="pricing-area pt-95 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-20">
                        <h4 class="title">Rick and Morty Characters</h4>
                        <p class="text"></p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            

            
            <div class="row justify-content-center">  
                @foreach($output['results'] as $key=>$value)
                
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="pricing mt-40">
                        <div class="pricing-baloon">
                            <img src="{!!url('assets/images/baloon.svg')!!}" alt="baloon">
                        </div>
                        <div class="pricing-header">
                            <h5 class="sub-title">{!!$value['name']!!}</h5>
                        </div>
                        <div>
                            <img src="{!!$value['image']!!}" alt="{!!$value['name']!!}">
                        </div>
                        <div class="pricing-list">
                            <ul>
                                <li><i class="lni-check-mark-circle"></i><strong>Species:-</strong>{!!$value['species']!!}</li>
                                <li><i class="lni-check-mark-circle"></i><strong>Origin:-</strong>{!!$value['origin']['name']!!}</li>
                                <li><i class="lni-check-mark-circle"></i><strong>Episodes:-</strong>{!!\App\Http\Controllers\CharactersController::getEpisode($value['episode'][0])!!}</li>
                            </ul>
                        </div>
                        <!--<div class="pricing-btn rounded-buttons text-center">
                            <a class="main-btn rounded-one" href="#">GET STARTED</a>
                        </div>-->
                        <div class="bottom-shape">
                            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 350 112.35"><defs><style>.color-2{fill:#0067f4;isolation:isolate;}.cls-1{opacity:0.1;}.cls-2{opacity:0.2;}.cls-3{opacity:0.4;}.cls-4{opacity:0.6;}</style></defs><title>bottom-part1</title><g><g data-name="Group 747"><path data-name="Path 294" class="cls-1 color-2" d="M0,24.21c120-55.74,214.32,2.57,267,0S349.18,7.4,349.18,7.4V82.35H0Z" transform="translate(0 0)"/><path data-name="Path 297" class="cls-2 color-2" d="M350,34.21c-120-55.74-214.32,2.57-267,0S.82,17.4.82,17.4V92.35H350Z" transform="translate(0 0)"/><path data-name="Path 296" class="cls-3 color-2" d="M0,44.21c120-55.74,214.32,2.57,267,0S349.18,27.4,349.18,27.4v74.95H0Z" transform="translate(0 0)"/><path data-name="Path 295" class="cls-4 color-2" d="M349.17,54.21c-120-55.74-214.32,2.57-267,0S0,37.4,0,37.4v74.95H349.17Z" transform="translate(0 0)"/></g></g></svg>
                        </div>
                    </div> <!-- single pricing -->
                </div>     
                @endforeach         
                
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
@stop