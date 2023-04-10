@extends('admin.layouts.app')
@section('page_title')
    Order Hotels {{$status}}
@endsection
@section('small_title')
    Order Hotels
@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Order Hotels</h3>
 @if($totalSales > 0)
                    <div style="float: right;" class="btn btn-primary" ><i class="fa fa-money"></i>&nbsp; &nbsp; Total Sales  &nbsp; &nbsp;{{$totalSales}}  &nbsp;&dollar;</div>
                @endif
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
                                                    <th>User Contact</th>
                                                    <th>User Email</th>
                                                    <th>Room name</th>
                                                    <th>Room Max person</th>
                                                    <th>Room Price</th>
                                                    <th>Hotel Name</th>
                                                    <th>Status</th>
                                                     <th class="text-center">Show</th>
                                                     


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
                                                        <td>{{$record->name}}</td>
                                                        <td>{{$record->maxinum}}</td>
                                                        <td>{{$record->price}}</td>
                                                        <td>

                                             <a href="/hotels/{{$record->hotel_id}}/{{$record->hotelsname}}">{{$record->hotelsname}}</a>


                                                        </td>
                                                        <td>{{$record->status}}</td>
                                                      
                                                        <td class=" text-center">
                                                            <a class="btn btn-primary" href="{{ route('order_h.show',$record->id) }}/show" role="button"><i class="fa fa-eye"></i></a>
                                                        </td>

                                                        <td class=" text-center">
                                                            <a class="btn btn-primary" href="{{ route('order_h.edit',$record->id) }}" role="button"><i class="fa fa-edit"></i></a>
                                                        </td>
                                                        <td class="text-center">
                                                            <!-- Trigger the modal with a button -->
                                                            <button type="button" class="btn btn-danger" data-toggle="modal"   data-target="#del_order_h{{ $record->id }}"><i class="fa fa-trash"></i></button>
                                                        </td>

                                                        <!-- Modal -->
                                                        <div id="del_order_h{{ $record->id }}" class="modal fade" role="dialog">
                                                            <div class="modal-dialog">

                                                                <!-- Modal content-->
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        <h4 class="modal-title">Delate</h4>
                                                                    </div>

                                                                    <form action="{{route('order_h.destroy',$record->id)  }}" method="POST">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <h4>{{$record->name }}</h4>
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

