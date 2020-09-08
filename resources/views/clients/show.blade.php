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
                            <h3 class="flex">{{$client->org_name}}'s Details</h3>
                            </div>
                            <div class="card-body">
                                <div class="contact-form">
                                    <div class="row"><!-- main row open-->
                                        <!-- opening of one field -->
                                        <label class="col-xs-2 col-md-2">Client Name</label>
                                        <span class="col-xs-10 col-md-10 form-group">
                                            <p>{{$client->org_name}}</p>
                                        </span>
                                        @if($client->address != null)
                                            <label class="col-xs-2 col-md-2">Address</label>
                                            <span class="col-xs-10 col-md-10 form-group">
                                                <p>{{$client->address}}</p>
                                            </span>
                                        @endif
                                        @if($client->pan_no != null)
                                            <label class="col-xs-2 col-md-2">VAT/PAN</label>
                                            <span class="col-xs-10 col-md-10 form-group">
                                                <p>{{$client->pan_no}}</p>
                                            </span>
                                        @endif
                                        @if($client->phone != null)
                                            <label class="col-xs-2 col-md-2">Phone</label>
                                            <span class="col-xs-10 col-md-10 form-group">
                                                <p>{{$client->phone}}</p>
                                            </span>
                                        @endif
                                        @if($client->website != null)
                                            <label class="col-xs-2 col-md-2">Website</label>
                                            <span class="col-xs-10 col-md-10 form-group">
                                                <p>{{$client->website}}</p>
                                            </span>
                                        @endif
                                        @if($client->contact_person_name != null)
                                            <label class="col-xs-2 col-md-2">Contact Person</label>
                                            <span class="col-xs-10 col-md-10 form-group">
                                                <p>{{$client->contact_person_name}}</p>
                                            </span>
                                        @endif
                                        @if($client->email != null)
                                            <label class="col-xs-2 col-md-2">Email</label>
                                            <span class="col-xs-10 col-md-10 form-group">
                                                <p>{{$client->email}}</p>
                                            </span>
                                        @endif
                                        @if($client->notes != null)
                                            <label class="col-xs-2 col-md-2">Notes</label>
                                            <span class="col-xs-10 col-md-10 form-group">
                                                <p>{{$client->notes}}</p>
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
