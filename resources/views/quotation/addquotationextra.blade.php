@extends('layouts.app')
@section('styles')

@endsection

@section('content')
<section class="padding-block">
    <div class="container-fluid">
        {{ Form::open(['route' => 'quotation.savequotation']) }}
            <div class="row">
                    <div class="col-lg-12"><!-- first column -->
                        <div class="card custom-card create-wrapper">
                            <div class="card-header">
                                <h3>Add a Quotation</h3>
                            </div>
                            <div class="card-body">
                                <div class="contact-form">
                                    <div class="row"><!-- main row open-->
                                        <!-- opening of one field -->
                                        {!! Form::label('client', 'Client: <span class="required-field"> *</span>', ['class' => 'col-xs-2 col-md-2'], false); !!}
                                        <div class="col-xs-10 col-md-10 form-group">
                                            <p>{{$selectedClient->org_name}}</p>
                                            @php 
                                                $quotation_id = request('quotation_id');
                                            @endphp
                                            {!! Form::hidden('client_id', $selectedClient->id) !!}
                                            {!! Form::hidden('quotation_id', $quotation_id) !!}
                                            {!! Form::hidden('main_taxable', $selectedTax) !!}
                                        </div>
                                    </div>
                                    <div class="row to-be-clone" data-increment-id="1" style="border: 1px solid #000;padding: 10px;margin-bottom:5px"><!-- main row open-->
                                        <!-- opening of one field -->
                                        <div class="col-lg-4">
                                            <div class="row">
                                                {!! Form::label('servicetype', 'Service Type: <span class="required-field"> *</span>', ['class' => 'col-xs-4 col-md-4'], false); !!}
                                                <div class="col-xs-8 col-md-8 form-group">
                                                    {!! Form::select('quotation[1][servicetype_id]', $servicetype, null, ['class' => 'form-control servicetype_id_input', 'data-validation' => 'required']) !!}
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row">
                                                {!! Form::label('amount', 'Amount: <span class="required-field"></span>', ['class' => 'col-xs-4 col-md-4'], false); !!}
                                                <div class="col-xs-8 col-md-8 form-group">
                                                    {!! Form::text('quotation[1][amount]', null, ['class' => 'form-control amount_input']) !!}
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row">
                                                {!! Form::label('taxable', 'Taxable?: <span class="required-field"><span>', ['class' => 'col-xs-4 col-md-4'], false); !!}
                                                <div class="col-xs-8 col-md-8 form-group">
                                                    {{Form::radio('quotation[1][taxable]', 'Yes',null, ['class' => 'taxable_input', 'id' => 'taxable_id'])}}Yes
                                                    {{Form::radio('quotation[1][taxable]', 'No', null, ['class' => ' taxable_input', 'id' => 'taxable_id'])}}No
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row">
                                                {!! Form::label('notes', 'Notes: <span class="required-field"></span>', ['class' => 'col-xs-4 col-md-4'], false); !!}
                                                <div class="col-xs-8 col-md-8 form-group">
                                                    {!! Form::text('quotation[1][notes]', null, ['class' => 'form-control notes_input']) !!}
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row">
                                                {!! Form::label('date', 'Date: <span class="required-field"></span>', ['class' => 'col-xs-4 col-md-4'], false); !!}
                                                <div class="col-xs-8 col-md-8 form-group">
                                                    {!! Form::date('quotation[1][date]', null, ['class' => 'form-control flat date_input', 'id' => 'date_id', 'placeholder' => 'Pick a Date']) !!}
                                                </div>
                                            </div>   
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row">
                                                {!! Form::label('recurring', 'Recurring?: <span class="required-field"></span>', ['class' => 'col-xs-4 col-md-4'], false); !!}
                                                <div class="col-xs-8 col-md-8 form-group">
                                                    {{Form::radio('quotation[1][recurring]', 'Yes', null, ['class' => 'recurring_input', 'id' => 'recurring_id'])}}Yes
                                                    {{Form::radio('quotation[1][recurring]', 'No', null, ['class' => 'recurring_input', 'id' => 'recurring_id'])}}No
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="col-lg-4 recurring-type-div" id="type">
                                            <div class="row">
                                                {!! Form::label('recurring_type', 'Recurring Type: <span class="required-field"></span>', ['class' => 'col-xs-4 col-md-4'], false); !!}
                                                <div class="col-xs-8 col-md-8 form-group">
                                                        {{Form::select('quotation[1][type]', array('1' => '1 Year', '2' => '2 Years'), null, ['id' => 'data', 'class' => 'col-xs-12 col-md-12 form-control type_input', 'placeholder' => 'Pick a type'])}}
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                        <p class="text-left"> 
                                            <a href="javascript:void(0);" class="btn custom-btn btn-success" id="add" type="submit">Add More</a>
                                            <a href="javascript:void(0);" class="btn custom-btn btn-success remove" id="remove" type="submit">Remove</a>
                                        </p>                
                                    <p class="text-right">
                                        <button class="btn custom-btn btn-success" type="submit">Create</button>
                                        <a href="{{route('quotation.index')}}" class="btn custom-btn btn-clear" type="submit">Cancel</a>
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
    $('.flat').flatpickr();
    var count = 1; // Create a count
    $(document).ready(function(){
        $("body").on("click","#add",function(){
            count++; // increase the count
            var html = $(".to-be-clone").first().clone();
            html.find('.client_id_input').attr('name', "quotation["+count+"][client_id]");//use the count to update this clone field
            html.find('.servicetype_id_input').attr('name', "quotation["+count+"][servicetype_id]").val('');
            html.find('.amount_input').attr('name', "quotation["+count+"][amount]").val('');
            // var id_taxable = 'ok-'+count;
            html.find('.taxable_input').attr('name', "quotation["+count+"][taxable]");
            html.find('.notes_input').attr('name', "quotation["+count+"][notes]").val('');
            // var id_recurring = 'ok-'+count;
            html.find('.recurring_input').attr('name', "quotation["+count+"][recurring]");
            html.find('.type_input').attr('name', "quotation["+count+"][type]").val('');
            var date_en = 'flat-'+count;
            html.find('.date_input').attr('name', "quotation["+count+"][date]").prop('id', date_en).flatpickr();
        // you can update all the attributes here before the clone is added
            $(".to-be-clone").parent().find('.to-be-clone').last().after(html);//add the clone
            // $("#myDiv").append("Remove");
        });
        
    })

    $('.remove').click(function() {
      if($(".to-be-clone").length>1){
          $(".contact-form").find(".to-be-clone").last().remove();
      }
        return false;
    });

    $().ready(function(){
    $(document).on('change', '.recurring_input' ,function(e) {
        $_recurring_type_div = $(this).parent().parent().parent().parent().find('.recurring-type-div')
        if($(this).val() === 'Yes') {
        // alert('Clicked');
            $_recurring_type_div.show();
        } else {
            $_recurring_type_div.hide();
            $_recurring_type_div.find('.type_input').val('');
        }
    });
  $('#type').hide();
})
</script>

<script>
    $('#date').flatpickr({
        
    });

    $select = $('#client').selectize({
        plugins: ['remove_button'],
        
    });
    $selectize = $select[0].selectize;
    $selectize.setValue("{{$_GET['quotation_id']}}");

    $('#servicetype').selectize({
        plugins: ['remove_button'],
        
    });
</script>

@endsection