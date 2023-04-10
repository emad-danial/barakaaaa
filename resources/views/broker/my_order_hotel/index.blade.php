@extends('broker.layouts.app')
@section('page_title')
    My Hotel Orders
@endsection
@section('small_title')
    My Hotel Orders
@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> My Hotel Orders</h3>
                {{--<a style="float: right;" class="btn btn-primary" href="{{url(route('hajj_orders.create'))}}"><i class="fa fa-plus"></i> New Hotels Amenitie</a>--}}
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


                                                    <th>Room Name</th>
                                                    <th>Room Includes</th>
                                                    <th>Reserve From Date</th>
                                                    <th>Reserve From Date</th>
                                                    <th>Maxinum Person</th>
                                                    <th>Status</th>
                                                    
                                                    <th>Hotel Name</th>
                                                    

                                                    <th class="text-center">Show</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($records as $record)
                                                    <tr id="removable{{$record->id}}">
                                                        <td>{{$loop->iteration}}</td>

                                                       <td>
                                                           {{$record->name}}
                                                       </td>
                                                        <td>
                                                           {{$record->includes}}
                                                       </td>
                                                        <td>
                                                            {{$record->reserve_from}}
                                                        </td>
                                                        <td>
                                                            {{$record->reserve_to}}
                                                        </td>
                                                        <td>
                                                            {{$record->maxinum}}
                                                        </td>
                                                        <td>
                                                            {{$record->status}}
                                                        </td>
                                                        <td>
                                                            {{$record->hotelsname}}
                                                        </td>
                                                        

                                                       <td class=" text-center">
                                                           <a class="btn btn-primary" href="{{ route('my_order_hotel.show',$record->order_id) }}" role="button"><i class="fa fa-eye"></i></a>
                                                        </td>
                                                        {{--<td class=" text-center">--}}
                                                            {{--<a class="btn btn-primary" href="{{ route('hajj_orders.edit',$record->id) }}" role="button"><i class="fa fa-edit"></i></a>--}}
                                                        {{--</td>--}}
                                                        {{--<td class="text-center">--}}
                                                            {{--<!-- Trigger the modal with a button -->--}}
                                                            {{--<button type="button" class="btn btn-danger" data-toggle="modal"   data-target="#del_hajj_orders{{ $record->id }}"><i class="fa fa-trash"></i></button>--}}
                                                        {{--</td>--}}

                                                        <!-- Modal -->
                                                        <div id="del_hajj_orders{{ $record->id }}" class="modal fade" role="dialog">
                                                            <div class="modal-dialog">

                                                                <!-- Modal content-->
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        <h4 class="modal-title">Delate</h4>
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

