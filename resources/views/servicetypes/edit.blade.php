@extends('layouts.app')
@section('styles')

@endsection

@section('content')
<section class="padding-block">
    <div class="container-fluid">
        {{ Form::open(['route' => ['servicetype.update', 'id' => $servicetype->id], 'method'=>'PATCH']) }}
            <div class="row">
                    <div class="col-lg-8"><!-- first column -->
                        <div class="card custom-card create-wrapper">
                            <div class="card-header">
                                <h3>Edit Service Type Info</h3>
                            </div>
                            <div class="card-body">
                                <div class="contact-form">
                                    <div class="row"><!-- main row open-->
                                        <!-- opening of one field -->
                                        {!! Form::label('title', 'Title: <span class="required-field"> *</span>', ['class' => 'col-xs-2 col-md-2'], false); !!}
                                        <div class="col-xs-10 col-md-10 form-group">
                                            {!! Form::text('title', $servicetype->title, ['class' => 'form-control', 'data-validation' => 'required']) !!}
                                        </div>
                                        {!! Form::label('description', 'Description: <span class="required-field"></span>', ['class' => 'col-xs-2 col-md-2'], false); !!}
                                        <div class="col-xs-10 col-md-10 form-group">
                                            {!! Form::text('description', $servicetype->description, ['class' => 'form-control']) !!}
                                        </div>
                                       
                                    </div>
                
                                    <p class="text-right">
                                        <button class="btn custom-btn btn-success" type="submit">Update</button>
                                        <a href="{{route('servicetype.index')}}" class="btn custom-btn btn-clear" type="submit">Cancel</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                
                    </div>
        {!! Form::close() !!}
    </div>
</section>


{{-- // <script>
// function duplicateName(element){
// var name = $(element).val();

// $.ajax({
//  type: "POST",
//  data: {
//      name_ajax: name,
//      _token: "{{csrf_token()}}"
// },
//  url: '{{route("check-name")}}',
//  success:function(response){
//      if(response.exists == 'true'){
//         $('#name_error').html("Already Exists");
//         // alert('true');
//         // console.log('success');
//      }else{
//         $('#name_error').html("Name available");
//         //  alert('false');
//      }
//  },
//  error:function(error){
    
//  }    
// });
// }
// </script> --}}

@endsection