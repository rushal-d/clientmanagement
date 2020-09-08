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
                            <h3 class="flex">{{$title}}</h3>
                        </div>
                        <div class="card-body">
                            <!-- filter -->
                            <div class="filter">
                                <div class="row form-group">
                                    <div class="col-lg-12">
                                        <div class="add-new mb-3">
                                        <a href="{{route('service.create')}}" class="btn btn-success">
                                                Add New <i class="fas fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <h3 class="d-md-none text-center btn custom-filter-button">Toggle Filter <i class="custom-filter-caret fas fa-caret-down"></i></h3>
                                    <div class="filter custom-filter-bar do-not-display-filter-bar-for-small-device col-md-12">
                                        {!! Form::open(['route' => 'service.index', 'method' => 'GET', 'id' => 'department-form']) !!}
                                        <div class="row">
                                            <div class="col-lg-3 form-group">
                                                <label>Client Name</label>
                                                {!! Form::select('client_id', $client, $_GET['client_id'] ?? null, ['id' => 'client', 'class' => 'form-control', 'placeholder' => 'Search by name']) !!}
                                            </div>
                                            <div class="col-lg-3 form-group">
                                                <label>Services Subscribed</label>
                                                {!! Form::select('servicetype_id', $servicetypes, $_GET['servicetype_id'] ?? null, ['id' =>'service', 'class' => 'form-control', 'placeholder' => 'Search by service']) !!}
                                            </div>
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
                                        <th scope="col">Service ID</th>
                                        <th scope="col">Organization Name</th>
                                        <th scope="col">Services</th>
                                        <th scope="col">Subscribed Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Expiry Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($services as $service)
                                        <tr>
                                            <th scope="row">{{ ($services->currentpage()-1) * $services->perpage() + $loop->index + 1 }}</th>
                                            <td>#{{$service->service_id}}</td>
                                            <td>{{$service->client->org_name}}</td>
                                            <td>
                                                @foreach($service->service as $service_1)
                                                    <p>{{$service_1->servicetype->title}}</p>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($service->service as $service_1)
                                                    <p>{{$service_1->date}}</p>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($service->service as $service_1)
                                                    @if($difference->diffInDays($service_1->expiry_date, false) < 0)
                                                        <p>Expired</p>
                                                    @elseif($service_1->expiry_date == null)
                                                        <p>---</p>
                                                    @elseif($difference->diffInDays($service_1->expiry_date, false) <= 5)
                                                        <p>Renew Soon</p>
                                                    @else
                                                        <p>Active</p>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($service->service as $service_1)
                                                    @if($service_1->expiry_date != NULL)
                                                        <p>{{$service_1->expiry_date}}</p>
                                                    @else
                                                        <p>---</p>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="{{route('service.show', ['service_id' => $service->service_id])}}"
                                                   class="btn btn-sm btn-outline-info">
                                                    <i class="far fa-eye" data-toggle="tooltip" data-placement="top"
                                                       title="View"></i>
                                                </a>
                                                <a href="{{route('service.bulkedit', ['service_id' => $service->service_id])}}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="far fa-edit" data-toggle="tooltip" data-placement="top"
                                                    title="Edit"></i>
                                                </a>
                                                <a href="{{route('service.bulkinvoice', ['service_id' => $service->service_id])}}"
                                                    class="btn btn-sm btn-warning">
                                                     <i class="fas fa-file-invoice" data-toggle="tooltip" data-placement="top"
                                                        title="Invoice"></i>
                                                 </a>
                                                <a href="{{route('service.bulkdelete', ['service_id' => $service->service_id])}}" data-uuid="{{$service->id}}"
                                                   data-name="{{$service->name}}"
                                                   class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash" data-toggle="tooltip"
                                                    data-placement="top" title="Delete"></i>
                                                </a>
                                                <a href="{{route('service.addservice', ['service_id' => $service->service_id])}}" data-uuid="{{$service->id}}"
                                                    data-name="{{$service->name}}"
                                                    class="btn btn-sm btn-success">
                                                    <i class="fas fa-plus" data-toggle="tooltip"
                                                    data-placement="top" title="Add Service"></i>
                                                </a>
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
                                <div class="text-center">{{$services->links()}}</div>
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
