@extends('broker.layouts.app')
@section('page_title')
    Flights Orders
@endsection
@section('small_title')
    Flights Orders
@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Flights Orders</h3>

            </div>
            <div class="box-body">
                @if(count($records))
                    <div class="box">

                        <div class="box-body">
                            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                @include('flash::message')
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                <tr role="row">
                                                    <th>#</th>
                                                    <th>User Name</th>
                                                    <th>User Mobile</th>
                                                    <th>User Email</th>
                                                    <th>Flight Name</th>
                                                    <th>Num Of Adults</th>
                                                    <th>Num Of Child</th>
                                                    <th>Status</th>
                                                   <th class="text-center">Show</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($records as $record)
                                                    <tr id="removable{{$record->id}}">
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$record->first_name}} {{$record->last_name}}</td>
                                                        <td>{{$record->mobile}}</td>
                                                        <td>{{$record->email}}</td>
                                                        <td>  <a  href="{{ route('broker_flights.show',$record->flight_id) }}" target="_blank" > {{$record->flight_name}}</a></td>
                                                        <td>{{$record->num_of_adults}}</td>
                                                        <td>{{$record->num_of_child}}</td>

                                                        <td>{{$record->status}}</td>
                                                         
                                                       <td class=" text-center">
                                                            <a class="btn btn-primary" href="{{ route('my_flight_orders.show',$record->id) }}" role="button"><i class="fa fa-eye"></i></a>
                                                        </td>
                                                        
                                                        {{--<td class="text-center">--}}
                                                            {{--<!-- Trigger the modal with a button -->--}}
                                                            {{--<button type="button" class="btn btn-danger" data-toggle="modal"   data-target="#del_rates{{ $record->id }}"><i class="fa fa-trash"></i></button>--}}
                                                        {{--</td>--}}

                                                        <!-- Modal -->
                                                        <div id="del_rates{{ $record->id }}" class="modal fade" role="dialog">
                                                            <div class="modal-dialog">

                                                                <!-- Modal content-->
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        <h4 class="modal-title">Delete</h4>
                                                                    </div>

                                                                  
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div class="text-center">{{$records->links()}}</div>
                @else
                    <div class="alert alert-danger">
                        No Data
                    </div>
                @endif
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection

