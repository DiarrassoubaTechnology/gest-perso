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


        <!-- Container fluid  -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-3 border-right pr-0">
                                    <div class="card-body border-bottom">
                                        <h4 class="card-title mt-2">Événement glisser-déposer</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="calendar-events" class="">
                                                    <div class="calendar-events mb-3" data-class="bg-info"><i
                                                            class="fa fa-circle text-info mr-2"></i>Rendez-vous à venir</div>
                                                    <div class="calendar-events mb-3" data-class="bg-success"><i
                                                            class="fa fa-circle text-success mr-2"></i>Rendez-vous passé
                                                    </div>
                                                    <div class="calendar-events mb-3" data-class="bg-danger"><i
                                                            class="fa fa-circle text-danger mr-2"></i>Rendez-vous annulé
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="card-body b-l calender-sidebar">
                                        <div id="calendar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Container fluid  -->

        <!-- Footer  -->
        @include('components.footer')
        <!-- END Footer  -->
        
    </div>

@endsection