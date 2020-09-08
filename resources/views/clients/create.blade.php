@extends('layouts.app')
@section('styles')

@endsection

@section('content')
<section class="padding-block">
    <div class="container-fluid">
        {{ Form::open(['route' => 'client.store']) }}
            <div class="row">
                    <div class="col-lg-8"><!-- first column -->
                        <div class="card custom-card create-wrapper">
                            <div class="card-header">
                                <h3>Add a Client</h3>
                            </div>
                            <div class="card-body">
                                <div class="contact-form">
                                    <div class="row"><!-- main row open-->
                                        <!-- opening of one field -->
                                        {!! Form::label('name', 'Organization/Company Name: <span class="required-field"> *</span>', ['class' => 'col-xs-2 col-md-2'], false); !!}
                                        <div class="col-xs-10 col-md-10 form-group">
                                            {!! Form::text('org', null, ['class' => 'form-control', 'data-validation' => 'required']) !!}
                                        </div>
                                        {!! Form::label('address', 'Address: <span class="required-field"></span>', ['class' => 'col-xs-2 col-md-2'], false); !!}
                                        <div class="col-xs-10 col-md-10 form-group">
                                            {!! Form::text('address', null, ['class' => 'form-control']) !!}
                                        </div>
                                        {!! Form::label('vatpan', 'VAT/PAN: <span class="required-field"></span>', ['class' => 'col-xs-2 col-md-2'], false); !!}
                                        <div class="col-xs-10 col-md-10 form-group">
                                            {!! Form::text('vatpan', null, ['class' => 'form-control']) !!}
                                        </div>
                                        {!! Form::label('phone', 'Phone: <span class="required-field"></span>', ['class' => 'col-xs-2 col-md-2'], false); !!}
                                        <div class="col-xs-10 col-md-10 form-group">
                                            {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                                        </div>
                                        {!! Form::label('website', 'Website: <span class="required-field"></span>', ['class' => 'col-xs-2 col-md-2'], false); !!}
                                        <div class="col-xs-10 col-md-10 form-group">
                                            {!! Form::text('website', null, ['class' => 'form-control']) !!}
                                        </div>
                                        {!! Form::label('contact', 'Contact Person Name: <span class="required-field"></span>', ['class' => 'col-xs-2 col-md-2'], false); !!}
                                        <div class="col-xs-10 col-md-10 form-group">
                                            {!! Form::text('contact_person_name[]', null, ['id' => 'ds', 'class' => 'form-control to-be-clone']) !!}
                                            <div id="dynamic_field" class="dynamic-field" style=""></div>
                                            <a href="javascript:void(0);" id="add" class="btn custom-btn btn-success" style="margin-top:5px;float:right"><i class="fas fa-plus"></i></a>
                                            <a href="javascript:void(0);" id="remove" class="btn custom-btn btn-danger" style="margin-top:5px;float:right"><i class="fas fa-times"></i></a>
                                        </div>

                                        {!! Form::label('email', 'Email: <span class="required-field"></span>', ['class' => 'col-xs-2 col-md-2'], false); !!}
                                        <div class="col-xs-10 col-md-10 form-group">
                                            {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                        </div>
                                        {!! Form::label('notes', 'Notes: <span class="required-field"></span>', ['class' => 'col-xs-2 col-md-2'], false); !!}
                                        <div class="col-xs-10 col-md-10 form-group">
                                            {!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                    <p class="text-right">
                                        <button class="btn custom-btn btn-success" type="submit">Create</button>
                                        <a href="{{route('client.index')}}" class="btn custom-btn btn-clear" type="submit">Cancel</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
        {!! Form::close() !!}
            </div>
    </div>
</section>

@endsection

@section('scripts')

    {{-- <script>
        $(document).ready(function(){
            var i = 1;

            // $('#add').click(function(){
            //     i++;
            //     $('#dynamic_field').append('<div class="row" id="added-row'+i+'" style="margin-top:5px;"><input type="text" placeholder="Enter name" name="contact_person_name[]" class="form-control col-lg-10" style="margin-left:15px;"><a href="javascript:void(0);" class="btn-remove col-lg-1 btn custom-btn btn-danger" id="'+i+'"><i class="fas fa-times"></i></a></div>').show('slow');
            // });


            // $(document).on('click', '.btn-remove', function(){
            //     var button_id = $(this).attr("id");
            //     $('#added-row'+button_id+'').remove();
            // });

        });
    </script> --}}
    <script>
        $(document).ready(function(){
            $("#add").click(function(){
                $(".to-be-clone").clone().last().appendTo(".dynamic-field");
            });

            $("#remove").click(function(){
                $(".to-be-clone").not(':first').last().remove();
            });
        });
    </script>
@endsection
