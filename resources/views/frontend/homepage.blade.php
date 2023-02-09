@extends('layouts.frontend')

@section('home')
<section class="banner-area relative" id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-center">
            <div class="banner-content col-lg-12">
                <h1 class="text-white">
                    <span>1500+</span> Lowongan Gaming Terbaru Ada Disini				
                </h1>	
                <form action="{{ route('search') }}" class="serach-form-area">
                    <div class="row justify-content-center form-wrap">
                        <div class="col-lg-4 form-cols">
                            <input type="text" class="form-control" name="search" placeholder="What are you looking for?">
                        </div>
                        <div class="col-lg-3 form-cols">
                            <div class="default-select" id="default-selects">
                                <select name="location">
                                    <option value="0">Cari Berdasarkan Wilayah</option>
                                    @foreach($searchLocations as $id=>$searchLocations)
                                        <option value="{{ $id }}">{{ $searchLocations }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 form-cols">
                            <div class="default-select" id="default-selects2">
                                <select name="category">
                                    <option value="0">Cari Berdasarkan Game</option>
                                    @foreach($searchCategories as $id=>$searchCategories)
                                        <option value="{{ $id }}">{{ $searchCategories }}</option>
                                    @endforeach
                                </select>
                            </div>										
                        </div>
                        <div class="col-lg-2 form-cols">
                            <button type="submit" class="btn btn-info">
                              <span class="lnr lnr-magnifier"></span> Cari
                            </button>
                        </div>								
                    </div>
                </form>	
            </div>											
        </div>
    </div>
</section>
@endsection

@section('content')
<center><h3 class="mb-3">Postingan pekerjaan paling populer</h3></center>
<div class="row mb-5">
    @foreach($top_rates as $top_rate)
    <div class="col-lg-4">
        <div class="card h-100 p-3">
            <div class="single-rated">
                @if($top_rate->company->logo)
                    <img class="img-fluid w-100 mb-3" src="{{ Storage::url('images/companies/'. $top_rate->company->logo) }}" alt="">
                @endif
                <a href=""><h4>{{ $top_rate->title }}</h4></a>
                    <h6>{{ $top_rate->company->name }}</h6>
                <p>
                   {{ $top_rate->short_description }}
                </p>
                    <h5>Job Nature: {{  $top_rate->job_nature }} </h5>
                    <p class="address"><span class="lnr lnr-map"></span>{{  $top_rate->address }}</p>
                <p class="address"><span class="lnr lnr-database"></span> {{ $top_rate->salary }}</p>
            </div>		
        </div>
    </div>
    @endforeach

</div>
<div class="row mb-5">
    <div class="col-lg-6 sidebar">
        <div class="single-slidebar">
            <h4>Pekerjaan berdasarkan wilayah</h4>
            <ul class="cat-list">
                @foreach($locations as $location)
                    <li><a class="justify-content-between d-flex" href="{{ route('location.show', $location->id) }}"><p>{{ $location->name }}</p><span> {{$location->jobs_count}} </span></a></li> 
                @endforeach
            </ul>
        </div>			
    </div>
    <div class="col-lg-6 sidebar">
        <div class="single-slidebar">
            <h4>Pekerjaan berdasarkan kategori</h4>
            <ul class="cat-list">
                @foreach($categories as $category)
                    <li><a class="justify-content-between d-flex" href="{{ route('category.show', $category->id) }}"><p>{{ $category->name }}</p><span> {{$category->jobs_count}} </span></a></li> 
                @endforeach
            </ul>
        </div>	
    </div>
</div>
<center><h3>Semua Pekerjaan</h3></center>
<div class="row justify-content-center d-flex">
    <div class="col-lg-12 post-list justify-content-center">
           @foreach($jobs as $job)
                <div class="single-post d-flex flex-row align-items-center" style="column-gap: 4rem;">
                    @if($job->company->logo)
                        <div class="thumb">
                            <img class="im" src="{{ Storage::url('images/companies/'. $job->company->logo) }}" alt="">
                        </div>
                    @else
                        <div class="thumb">
                            <img src="{{ asset('img/pages/f1.jpg') }}" alt="">
                        </div>
                    @endif
                    <div class="details">
                        <div class="title d-flex flex-row justify-content-between">
                            <div class="titles">
                                <a href="route('jobs.show', $job->id) "><h4> {{$job->title}} </h4></a>
                                <h6>{{ $job->company->name }} </h6>					
                            </div>
                        </div>
                        <p>
                           {{ $job->short_description }}
                        </p>
                        <h5>Job Nature:  {{$job->job_nature}} </h5>
                        <p class="address"><span class="lnr lnr-map"></span>  {{$job->address}} </p>
                        <p class="address"><span class="lnr lnr-database"></span>  {{$job->salary}} </p>
                    </div>
                </div>  
           @endforeach
        <a class="text-uppercase loadmore-btn mx-auto d-block" href="{{ route('job.index') }}">Muat Lebih Banyak Pekerjaan</a>
    </div>	
</div>
@endsection