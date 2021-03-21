@extends('layouts.main')

@section('content')
    <div id="demo" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ul class="carousel-indicators">
            @foreach ($listslide as $ASlide)
                @if ($loop->first)
                    <li data-target="#demo" data-slide-to="{{ $loop->index }}" class="active"></li>

                @else
                    <li data-target="#demo" data-slide-to="{{ $loop->index }}"></li>
                @endif

            @endforeach
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            @foreach ($listslide as $ASlide)
                @if ($loop->first)
                    <div class="carousel-item active">
                        <img src="{{ $ASlide->urlimg }}" alt="{{ $ASlide->title }}" width="640px" height="360px">
                    </div>
                @else
                    <div class="carousel-item">
                        <img src="{{ $ASlide->urlimg }}" alt="{{ $ASlide->title }}" width="640px" height="360px">
                    </div>
                @endif
            @endforeach
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"> </span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"> </span>
        </a>
    </div>


    <div class="row mt-3">
        @foreach ($listcake as $ACake)
            {{-- <option value="{{$lc->name_cake}}">{{$lc->name_cake}}</option> --}}
            <div class="col-md-4">
                <img src="{{ $ACake->urlimg }}" width="100%" height="250px">
                <div>{{ $ACake->namecake }}</div>
                <div>{{ $ACake->cost }}</div>
            </div>
        @endforeach
        <br>
        <br>
        @if (Session::has('username'))
            {{ session('username') }}
        @else
            <span>Session it not set</span>
        @endif
    </div>
@endsection
