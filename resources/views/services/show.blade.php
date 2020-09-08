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
                                    <h3 class="d-md-none text-center btn custom-filter-button">Toggle Filter <i class="custom-filter-caret fas fa-caret-down"></i></h3>
                                    <div class="filter custom-filter-bar do-not-display-filter-bar-for-small-device col-md-12">
                                        {!! Form::open(['route' => 'service.index', 'method' => 'GET', 'id' => 'department-form']) !!}
                                        <div class="row">
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
                                        <th scope="col">Service Subscribed</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Expiry Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($services as $service)
                                        <tr>
                                            <th scope="row">{{ ($services->currentpage()-1) * $services->perpage() + $loop->index + 1 }}</th>
                                            <td>{{$service->servicetype->title}}</td>
                                            <td>{{$service->date}}</td>
                                            <td>
                                                @if($difference->diffInDays($service->expiry_date, false) < 0)
                                                    <p>Expired</p>
                                                @elseif($service->expiry_date == null)
                                                    <p style="text-align:center">---</p>
                                                @else
                                                    <p>Active</p>
                                                @endif
                                            </td>
                                            {{-- <td>{{$difference->diffInDays($service->expiry_date, false)}} days</td> --}}
                                            <td>
                                                @if($service->expiry_date == null)
                                                    <p style="text-align:center">---</p>
                                                @else
                                                    {{$service->expiry_date}}
                                                @endif
                                            </td>
                                            <td>
                                                {{-- <a href="{{route('service.edit', $service->id)}}"
                                                   class="btn btn-sm btn-primary">
                                                    <i class="far fa-edit" data-toggle="tooltip" data-placement="top"
                                                       title="Edit"></i>
                                                </a> --}}
                                                <a href="{{route('service.invoice', $service->id)}}"
                                                    class="btn btn-sm btn-warning">
                                                    <i class="fas fa-file-invoice" data-toggle="tooltip" data-placement="top"
                                                    title="Invoice"></i>
                                                 </a>
                                                <a href="{{route('service.destroy', $service->id)}}" data-uuid="{{$service->id}}"
                                                    data-name="{{$service->name}}"
                                                    class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash" data-toggle="tooltip"
                                                    data-placement="top" title="Delete"></i>
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
