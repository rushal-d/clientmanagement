@extends('layouts.app')
@section('styles')

@endsection
@section('content')

    <section class="padding-block">
        <div class="container-fluid">
            <form id="contact" method="post" class="form create" role="form">
                <div class="row">
                    <div class="col-lg-9"><!-- first column --> 
                        <div class="card custom-card create-wrapper">
                            <div class="card-header level">
                                <a href="{{URL::previous()}}" class="btn btn-primary" style="float:left;margin-bottom:5px;">Go Back</a>
                            <h3 class="flex">{{$title}}</h3>
                            </div>
                            <div class="card-body">
                                <div class="contact-form">
                                    <div class="row"><!-- main row open-->
                                        <!-- opening of one field -->
                                        <label class="col-xs-2 col-md-2">Title</label>
                                        <span class="col-xs-10 col-md-10 form-group">
                                            <p>{{$servicetype->title}}</p>
                                        </span>
                                        @if($servicetype->description != null)
                                            <label class="col-xs-2 col-md-2">Description</label>
                                            <span class="col-xs-10 col-md-10 form-group">
                                                <p>{{$servicetype->description}}</p>
                                            </span>
                                        @endif

                                    </div><!-- row main close -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
@section('scripts')
@endsection
