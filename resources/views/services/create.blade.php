@extends('layouts.app')
@section('styles')

@endsection

@section('content')
<section class="padding-block">
    <div class="container-fluid">
        {{ Form::open(['route' => 'service.store']) }}
            <div class="row">
                    <div class="col-lg-12"><!-- first column -->
                        <div class="card custom-card create-wrapper">
                            <div class="card-header">
                                <h3>Subscribe to a service</h3>
                            </div>
                            <div class="card-body">
                                <div class="contact-form">
                                    <div class="row"><!-- main row open-->
                                        <!-- opening of one field -->
                                        <div class="col-lg-6">
                                            <div class="row">
                                                {!! Form::label('client', 'Client: <span class="required-field"> *</span>', ['class' => 'col-xs-2 col-md-2'], false); !!}
                                                <div class="col-xs-10 col-md-10 form-group">
                                                    {!! Form::select('client_id', $client, null, ['id' => 'client', 'class' => 'form-control', 'data-validation' => 'required', 'placeholder' => 'Choose Client']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                {{Form::label('main_taxable', 'Taxable?', ['class' => 'col-xs-2 col-md-2'])}}
                                                <div class="col-xs-10 col-md-10 form-group">
                                                    {{Form::radio('main_taxable', 'Yes')}}Yes
                                                    {{Form::radio('main_taxable', 'No')}}No
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row to-be-clone" data-increment-id="1" style="border: 1px solid #000;padding: 10px;margin-bottom:5px"><!-- main row open-->
                                        <!-- opening of one field -->
                                        <div class="col-lg-4">
                                            <div class="row">
                                                {!! Form::label('servicetype', 'Service Type: <span class="required-field"> *</span>', ['class' => 'col-xs-4 col-md-4'], false); !!}
                                                <div class="col-xs-8 col-md-8 form-group">
                                                    {!! Form::select('service[1][servicetype_id]', $servicetype, null, ['class' => 'form-control servicetype_id_input', 'data-validation' => 'required']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row">
                                                {!! Form::label('amount', 'Amount: <span class="required-field"></span>', ['class' => 'col-xs-4 col-md-4'], false); !!}
                                                <div class="col-xs-8 col-md-8 form-group">
                                                    {!! Form::text('service[1][amount]', null, ['class' => 'form-control amount_input']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row">
                                                {!! Form::label('taxable', 'Taxable?: <span class="required-field"><span>', ['class' => 'col-xs-4 col-md-4'], false); !!}
                                                <div class="col-xs-8 col-md-8 form-group">
                                                    {{Form::radio('service[1][taxable]', 'Yes',null, ['class' => 'taxable_input', 'id' => 'taxable_id'])}}Yes
                                                    {{Form::radio('service[1][taxable]', 'No', null, ['class' => ' taxable_input', 'id' => 'taxable_id'])}}No
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row">
                                                {!! Form::label('notes', 'Notes: <span class="required-field"></span>', ['class' => 'col-xs-4 col-md-4'], false); !!}
                                                <div class="col-xs-8 col-md-8 form-group">
                                                    {!! Form::textarea('service[1][notes]', null, ['class' => 'form-control notes_input', 'rows' => 2]) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 date_en">
                                            <div class="row">
                                                {!! Form::label('date', 'Date: <span class="required-field"></span>', ['class' => 'col-xs-4 col-md-4'], false); !!}
                                                <div class="col-xs-8 col-md-8 form-group">
                                                    {!! Form::date('service[1][date]', null, ['class' => 'form-control flat date_input', 'id' => 'date_id', 'placeholder' => 'Pick a Date']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 date_np">
                                            <div class="row">
                                                {!! Form::label('date_np', 'Date (NP): <span class="required-field"></span>', ['class' => 'col-xs-4 col-md-4'], false); !!}
                                                <div class="col-xs-8 col-md-8 form-group">
                                                    {!! Form::text('service[1][date_np]', null, ['class' => 'form-control flat_np date_np_input', 'id' => 'date_np_id', 'placeholder' => 'Pick a Date']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row">
                                                {!! Form::label('recurring', 'Recurring?: <span class="required-field"></span>', ['class' => 'col-xs-4 col-md-4'], false); !!}
                                                <div class="col-xs-8 col-md-8 form-group">
                                                    {{Form::radio('service[1][recurring]', 'Yes', null, ['class' => 'recurring_input', 'id' => 'recurring_id'])}}Yes
                                                    {{Form::radio('service[1][recurring]', 'No', null, ['class' => 'recurring_input', 'id' => 'recurring_id'])}}No
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 recurring-type-div" id="type">
                                            <div class="row">
                                                {!! Form::label('recurring_type', 'Recurring Type: <span class="required-field"></span>', ['class' => 'col-xs-4 col-md-4'], false); !!}
                                                <div class="col-xs-8 col-md-8 form-group">
                                                        {{Form::select('service[1][type]', array('1' => 'Every Month', '12' => '1 Year', '24' => '2 Years'), null, ['id' => 'data', 'class' => 'col-xs-12 col-md-12 form-control type_input', 'placeholder' => 'Pick a type'])}}
                                                </div>
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
                                    <a href="{{route('service.index')}}" class="btn custom-btn btn-clear" type="submit">Cancel</a>
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
    $('#date_id').flatpickr();
    $('#date_id').change(function () {
        $('#date_np_id').val(AD2BS($('#date_id').val()));

    });

    $(document).on('change', '.date_input', function () {
        let $this = $(this);

        let date_np = $this.closest('.date_en').siblings('.date_np').find('.date_np_input');
        date_np.val(AD2BS($this.val()));
    });

    $('#date_np_id').nepaliDatePicker({
        npdMonth: true,
        npdYear: true,
        npdYearCount: 10,
        onFocus: false,
        ndpTriggerButton: true,
        ndpTriggerButtonText: 'Date',
        ndpTriggerButtonClass: 'btn btn-primary btn-sm',
        onChange: function (e) {
            $('#date_id').val(BS2AD($('#date_np_id').val()));
        }
    });

    $(document).on('click', '.date_np_input', function () {
        let $this = $(this);

        let date_en = $this.closest('.date_np').siblings('.date_en').find('.date_input');

        // console.log(date_en, $this.val());
        date_en.val(BS2AD($this.val()));
    });

var count = 1; // Create a count
    $(document).ready(function(){
        $("body").on("click","#add",function(){
            count++; // increase the count
            var html = $(".to-be-clone").first().clone();
            html.find('.client_id_input').attr('name', "service["+count+"][client_id]");//use the count to update this clone field
            html.find('.servicetype_id_input').attr('name', "service["+count+"][servicetype_id]").val('');
            html.find('.amount_input').attr('name', "service["+count+"][amount]").val('');
            // var id_taxable = 'ok-'+count;
            html.find('.taxable_input').attr('name', "service["+count+"][taxable]");
            html.find('.notes_input').attr('name', "service["+count+"][notes]").val('');
            // var id_recurring = 'ok-'+count;
            html.find('.recurring_input').attr('name', "service["+count+"][recurring]");
            html.find('.type_input').attr('name', "service["+count+"][type]").val('');
            var date_en = 'flat-'+count;
            html.find('.date_input').attr('name', "service["+count+"][date]").prop('id', date_en).flatpickr();
            var date_np = 'date_np_id-'+count;
            html.find('.ndp-click-trigger').remove();
            html.find('.date_np_input').attr('name', "quotation["+count+"][date_np]").prop('id', date_np).nepaliDatePicker({
                onFocus: false,
                ndpTriggerButton: true,
                ndpTriggerButtonText: 'Date',
                ndpTriggerButtonClass: 'btn btn-primary btn-sm',
                onChange: function (e) {
                    // console.log('#' + date_np);
                    let date_en = $('#' + date_np).closest('.date_np').siblings('.date_en').find('.date_input');

                    // console.log(date_en, $this.val());
                    date_en.val(BS2AD($('#' + date_np).val()));
                }
            });
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

    $('.drop').selectize();

    // $('.flat').flatpickr({
    //
    // });

    $('#client').selectize({
        plugins: ['remove_button'],

    });

    $('#servicetype').selectize({
        plugins: ['remove_button'],

    });

</script>

@endsection
