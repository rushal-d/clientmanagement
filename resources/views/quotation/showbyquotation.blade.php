@extends('layouts.app')
@section('styles')

@endsection

@section('content')
<section class="padding-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header level">
                            <a href="{{URL::previous()}}" class="btn custom-btn btn-danger" style="float:left;margin-bottom:5px;">Go Back</a>
                            <h3 class="flex" style="text-align:center">{{$title}}</h3>
                        </div>
                        <div class="card-body">
                            <!-- filter -->
                            <div class="filter">
                                <div class="row form-group">
                                    {{-- <div class="col-lg-12">
                                        <div class="add-new mb-3">
                                        <a href="{{route('quotation.create')}}" class="btn btn-success">
                                                Add New <i class="fas fa-plus"></i>
                                            </a>
                                        </div>
                                    </div> --}}

                                    <h3 class="d-md-none text-center btn custom-filter-button">Toggle Filter <i class="custom-filter-caret fas fa-caret-down"></i></h3>
                                    <div class="filter custom-filter-bar do-not-display-filter-bar-for-small-device col-md-12">
                                        {!! Form::open(['route' => 'quotation.index', 'method' => 'GET', 'id' => 'department-form']) !!}
                                        <div class="row">
                                            <div class="col-lg-3 form-group">
                                                <label>Services Subscribed</label>
                                                {!! Form::select('servicetype_id', $servicetypes, $_GET['servicetype_id'] ?? null, ['id' =>'service', 'class' => 'form-control', 'placeholder' => 'Search by service']) !!}
                                            </div>
                                            {{-- <div class="col-lg-3 form-group">
                                                <label>Orgnatization Name</label>
                                                <select id="client" name="client"
                                                class="form-control "
                                                placeholder="Search By Name"></select>
                                            </div> --}}
                                            <div class="col-lg-2">
                                                <p class="mt-4">
                                                    <button class="btn custom-btn btn-primary" type="submit">Search
                                                    </button>
                                                    <button class="btn custom-btn btn-danger" type="reset" id="reset">
                                                        Reset
                                                    </button>
                                                </p>
                                            </div><!--  -->
                                        </div>
                                        {!! Form::close() !!}
                                    </div>

                                </div>
                            </div>
                        <!-- filter ends -->
                        <div class="table-responsive">
                                <table class="table table-striped table-hover department-table">
                                    <thead>
                                    <tr>
                                        <th scope="col">S.No.</th>
                                        <th scope="col">Service Subscribed</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($quotations as $quotation)
                                        <tr>
                                            <th scope="row">{{ ($quotations->currentpage()-1) * $quotations->perpage() + $loop->index + 1 }}</th>
                                            <td>{{$quotation->servicetype->title}}</td>
                                            <td>{{$quotation->amount}}</td>
                                            <td>{{$quotation->date}}</td>
                                            {{-- <td>{{$difference->diffInDays($service->expiry_date, false)}} days</td> --}}

                                            <td>
                                                <a href="{{route('quotation.invoice', $quotation->id)}}"
                                                   class="btn btn-sm btn-warning">
                                                    <i class="fas fa-file-invoice" data-toggle="tooltip" data-placement="top"
                                                    title="Print Quotation"></i>
                                                </a>
                                                {{-- <a href="{{route('quotation.show', $quotation->client_id)}}"
                                                    class="btn btn-sm btn-outline-info">
                                                    <i class="far fa-eye" data-toggle="tooltip" data-placement="top"
                                                    title="View quotations"></i>
                                                </a> --}}
                                                {{-- <a href="{{route('quotation.update', $quotation->id)}}"
                                                   class="btn btn-sm btn-success">
                                                    <i class="fas fa-check" data-toggle="tooltip" data-placement="top"
                                                       title="Finalized"></i>
                                                </a> --}}
                                                <a href="{{route('quotation.destroy', $quotation->id)}}" data-uuid="{{$quotation->id}}"
                                                   data-name="{{$quotation->name}}"
                                                   class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash" data-toggle="tooltip"
                                                    data-placement="top" title="Delete"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="100%" class="text-center">Currently there is no data.
                                            </td>
                                        </tr>
                                    @endforelse

                                    </tbody>
                                </table>
                                <div class="text-center">{{$quotations->links()}}</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <script>
                $('#reset').click(function () {
                    $('input').val('');
                    $('#department-form').submit();
                });
        </script>
</section>

@endsection

@section('scripts')

    <script>

        $('#client').selectize({

        });

        $('#service').selectize({
            plugins: ['remove_button'],

        });

    </script>

@endsection
