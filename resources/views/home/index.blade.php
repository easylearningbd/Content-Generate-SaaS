 @extends('home.home_master')
 @section('home')
 
    @include('home.layout.get_started')
    @include('home.layout.how_it_works')
    @include('home.layout.pricing')        
            
    @include('home.layout.asked_questions')   
    @include('home.layout.productivity')           

@endsection