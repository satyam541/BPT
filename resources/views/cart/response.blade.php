@extends('layouts.master')
@section('header')

<meta name="robots" content="noindex, nofollow" /> 
@endsection
@section('content')
        
<section class="flex-container quick-links">
        <div class="container-xl">
              <div class="static-text">
						<h2 class="heading">{{ $title }}</h2>
						{!! $message !!}
            </div>					
        </div>
</section>
@endsection