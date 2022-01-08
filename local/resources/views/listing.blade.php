@extends('layout')

@section('content')
    <!--====== HEADER ONE PART START ======-->

    <header class="header-area">

        <div class="navbar-area navbar-one navbar-transparent">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="#">
                                Rick and Morty Characters
                            </a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarOne" aria-controls="navbarOne" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarOne">
                                <ul class="navbar-nav m-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#pricing">Characters</a>
                                    </li>
                                </ul>
                            </div>
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>

        <div id="home" class="header-content-area d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-wrapper">
                            <div class="header-content-form s002">
                                <form method="GET" action="{!!url('listing')!!}">
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <fieldset>
                                        <legend>SEARCH CHARACTERS</legend>
                                    </fieldset>
                                    <div class="inner-form">
                                        <div class="input-field first-wrap">
                                            <input id="keyword" name="keyword" type="text" placeholder="Enter Name" value="{!!$output['info']['keyword']!!}">
                                        </div>
                                        <div class="input-field first-wrap">
                                            <input id="species" name="species" type="text" placeholder="Enter Species" value="{!!$output['info']['species']!!}">
                                        </div>
                                        <div class="input-field fifth-wrap">
                                            <!--<button class="btn-search" type="button">SEARCH</button>-->
                                            <input type="submit" value="SEARCH" class="btn-search">
                                        </div>
                                    </div>
                                </form>
                            </div> <!-- header content -->
                            <div class="header-image d-none d-lg-block">
                                <div class="image">
                                    <img src="{!!url('assets/images/header.png')!!}" alt="Header">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div class="header-shape">
                <img src="{!!url('assets/images/header-shape.svg')!!}" alt="shape">
            </div> <!-- header-shape -->
        </div> <!-- header content area -->
    </header>

    <!--====== HEADER ONE PART ENDS ======-->
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
            <div class="row mb-5 paging-bottom">
                <div class="col-md-12">
                    <div class="block-27">
                        
                        <ul>
                        @if($output['info']['prepage']>0)
                            <li class="active"><a href="{!!url('listing?page=').$output['info']['prepage'].$output['info']['urlstr']!!}">&lt;</a></li>
                        @else
                            <li><a href="#">&lt;</a></li>
                        @endif
                        @if($output['info']['curpage']<=5)
                            @for($i=1;$i<=5;$i++)
                                <li @if($output['info']['curpage'] == $i)class="active" @endif>
                                    <a href="{!!url('listing?page=').$i.$output['info']['urlstr']!!}"><span>{!!$i!!}</span></a>
                                </li>
                            @endfor
                        @else
                            @for($i=$output['info']['curpage']-2;$i<=$output['info']['curpage']+2;$i++)
                                <li @if($output['info']['curpage'] == $i)class="active" @endif>
                                    <a href="{!!url('listing?page=').$i.$output['info']['urlstr']!!}"><span>{!!$i!!}</span></a>
                                </li>
                            @endfor
                        @endif
                        @if($output['info']['nexpage']!='')
                            <li class="active"><a href="{!!url('listing?page=').$output['info']['nexpage'].$output['info']['urlstr']!!}">&gt;</a></li>
                        @else
                            <li><a href="#">&gt;</a></li>
                        @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!-- container -->
    </section>
@stop