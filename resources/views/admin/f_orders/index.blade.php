@extends('admin.layouts.app')
@section('page_title')
    Flights Orders {{$status}}
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
                 @if($totalSales > 0)
                    <div class="btn btn-primary" ><i class="fa fa-money"></i>&nbsp; &nbsp; Total Sales  &nbsp; &nbsp;{{$totalSales}}  &nbsp;&dollar;</div>
                @endif
            </div>
            <div class="box-body">
                @if(count($records))
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
                                                   
                                                    <th>Num Of Adults</th>
                                                    <th>Num Of Child</th>
                                                    <th>Status</th>
                                                     <th class="text-center">Show Flight</th>
                                                       <th class="text-center">Show Order</th>
                                                    <th class="text-center">Edit</th>
                                                    <th class="text-center">Delete</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($records as $record)
                                                    <tr id="removable{{$record->id}}">
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$record->first_name}} {{$record->last_name}}</td>
                                                        <td>{{$record->mobile}}</td>
                                                        <td>{{$record->email}}</td>
                                                       
                                                        <td>{{$record->num_of_adults}}</td>
                                                        <td>{{$record->num_of_child}}</td>

                                                        <td>{{$record->status}}</td>
                                                       
                                                        <td class=" text-center">
                                                             <a href="/flights/{{$record->flight_id}}/{{$record->flight_name}}"> <i class="fa fa-eye"></i></a> 
                                                          
                                                        </td>
                                                         <td class=" text-center">
                                                            <a class="btn btn-primary" href="{{ route('f_orders.show',$record->id) }}/show" role="button"><i class="fa fa-eye"></i></a>
                                                        </td>
                                                        <td class=" text-center">
                                                            <a class="btn btn-primary" href="{{ route('f_orders.edit',$record->id) }}" role="button"><i class="fa fa-edit"></i></a>
                                                        </td>
                                                        
                                                        <td class="text-center">
                                                            <!-- Trigger the modal with a button -->
                                                            <button type="button" class="btn btn-danger" data-toggle="modal"   data-target="#del_rates{{ $record->id }}"><i class="fa fa-trash"></i></button>
                                                        </td>

                                                        <!-- Modal -->
                                                        <div id="del_rates{{ $record->id }}" class="modal fade" role="dialog">
                                                            <div class="modal-dialog">

                                                                <!-- Modal content-->
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        <h4 class="modal-title">Delete</h4>
                                                                    </div>

                                                                    <form action="{{route('f_orders.destroy',$record->id)  }}" method="POST">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <h4>{{$record->id }}</h4>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
                                                                            <button type="submit" class="btn btn-danger">Yes</button>

                                                                        </div>
                                                                    </form>
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

