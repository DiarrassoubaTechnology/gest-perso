@extends('layouts.main')

@section('menu')

    <!-- Header  -->
    @include('components.header')
    <!-- END Header  -->

    <!-- Header  -->
    @include('components.sidebar')
    <!-- END Header  -->

@endsection

@section('contain')

    <!-- Page wrapper  -->
    <div class="page-wrapper">

        <!-- Bread crumb and right sidebar toggle -->
        @include('components.breadcrumb')
        <!-- End Bread crumb and right sidebar toggle -->

        <!-- Footer  -->
        @include('components.footer')
        <!-- END Footer  -->
        
    </div>

@endsection