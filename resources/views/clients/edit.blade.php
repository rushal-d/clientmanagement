@extends('layouts.app')
@section('styles')

@endsection

@section('content')
<section class="padding-block">
    <div class="container-fluid">
        {{ Form::open(['route' => ['client.update', 'id' => $client->id], 'method'=>'PATCH']) }}
            <div class="row">
                    <div class="col-lg-8"><!-- first column -->
                        <div class="card custom-card create-wrapper">
                            <div class="card-header">
                                <h3>Edit Client Info</h3>
                            </div>
                            <div class="card-body">
                                <div class="contact-form">
                                    <div class="row"><!-- main row open-->
                                        <!-- opening of one field -->
                                        {!! Form::label('name', 'Org Name: <span class="required-field"> *</span>', ['class' => 'col-xs-2 col-md-2'], false); !!}
                                        <div class="col-xs-10 col-md-10 form-group">
                                            {!! Form::text('org', $client->org_name, ['class' => 'form-control', 'data-validation' => 'required']) !!}
                                        </div>
                                        {!! Form::label('address', 'Address: <span class="required-field"></span>', ['class' => 'col-xs-2 col-md-2'], false); !!}
                                        <div class="col-xs-10 col-md-10 form-group">
                                            {!! Form::text('address', $client->address, ['class' => 'form-control']) !!}
                                        </div>
                                        {!! Form::label('vatpan', 'VAT/PAN: <span class="required-field"></span>', ['class' => 'col-xs-2 col-md-2'], false); !!}
                                        <div class="col-xs-10 col-md-10 form-group">
                                            {!! Form::text('vatpan', $client->pan_no, ['class' => 'form-control']) !!}
                                        </div>
                                        {!! Form::label('phone', 'Phone: <span class="required-field"></span>', ['class' => 'col-xs-2 col-md-2'], false); !!}
                                        <div class="col-xs-10 col-md-10 form-group">
                                            {!! Form::text('phone', $client->phone, ['class' => 'form-control']) !!}
                                        </div>
                                        {!! Form::label('website', 'Website: <span class="required-field"></span>', ['class' => 'col-xs-2 col-md-2'], false); !!}
                                        <div class="col-xs-10 col-md-10 form-group">
                                            {!! Form::text('website', $client->website, ['class' => 'form-control']) !!}
                                        </div>
                                        @foreach($allContactNames as $allContactName)
                                            <div class="col-xs-12 col-md-12 form-group clone">
                                                <div class="row form-group ">
                                                    {!! Form::label('contact', 'Contact PN: <span class="required-field"></span>', ['class' => 'col-xs-2 col-md-2'], false); !!}
                                                    {!! Form::text('contact_person_name[]', $allContactName, ['id' =>'remove-this', 'class' => 'col-md-9 col-xs-9 form-control to-be-clone', 'style' => 'margin-left:15px']) !!}
                                                    {{-- <a href="javascript:void(0);" class="col-xs-1 col-md-1 btn custom-btn btn-danger remove-button" data-id="{{$loop->iteration}}"><i class="fas fa-trash"></i></a> --}}
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="col-lg-12">
                                            <div class="dynamic-field"></div>
                                            <a href="javascript:void(0);" id="remove" class="btn custom-btn btn-danger" style="margin-bottom:5px;float:right"><i class="fas fa-times"></i></a>
                                            <a href="javascript:void(0);" id="add" class="btn custom-btn btn-success" style="float:right"><i class="fas fa-plus"></i></a>
                                        </div>
                                        {!! Form::label('email', 'Email: <span class="required-field"> *</span>', ['class' => 'col-xs-2 col-md-2'], false); !!}
                                        <div class="col-xs-10 col-md-10 form-group">
                                            {!! Form::text('email', $client->email, ['class' => 'form-control']) !!}
                                        </div>
                                        {!! Form::label('notes', 'Notes: <span class="required-field"> *</span>', ['class' => 'col-xs-2 col-md-2'], false); !!}
                                        <div class="col-xs-10 col-md-10 form-group">
                                            {!! Form::textarea('notes', $client->notes, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                    <p class="text-right">
                                        <button class="btn custom-btn btn-success" type="submit">Update</button>
                                        <a href="{{route('client.index')}}" class="btn custom-btn btn-clear" type="submit">Cancel</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
        {!! Form::close() !!}
    </div>
</section>

@endsection

@section('scripts')

    <script>
        $("#add").click(function(){
                $(".clone").clone().last().appendTo(".dynamic-field");
        });

        $("#remove").click(function(){
                $(".clone").not(':first').last().remove();
        });

        // $(document).on('click', '.remove-button', function(){
        //         $(".clone").not(':first').last().remove();
        //     // $('#remove-this').remove();
        // });

    </script>

@endsection
