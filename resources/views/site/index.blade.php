@extends('layouts.frontend.main')

@section('content')

  @include('site.section_about')
    <!-- ======= Features Section ======= -->
  @include('site.section_publikasi')  
    <!-- ======= informasi Section ======= -->
    @include('site.section_informasi')  
    <!-- ======= Contact Section ======= -->
  @include('site.section_contact') 
 
 
@endsection
