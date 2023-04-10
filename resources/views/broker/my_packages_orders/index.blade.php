@extends('broker.layouts.app')
@section('page_title')
    {{$pagename}}
@endsection
@section('small_title')
    {{$pagename}}
@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> {{$pagename}}</h3>
                {{--<a style="float: right;" class="btn btn-primary" href="{{url(route('packages_orders.create'))}}"><i class="fa fa-plus"></i> New Hotels Amenitie</a>--}}
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
                                                    <th>Package Name</th>
                                                    <th>Room Type</th>
                                                     
                                                    <th>Departure Date</th>
                                                    <th>Return Date</th>
                                                    <th>Package Price</th>
                                                    <th>Paid</th>
                                                    <th>Outstanding</th>
                                                   
                                                    <th>Status</th>

                                                <th class="text-center">Show</th>
                                                 <th class="text-center">Edit</th>
                                                 <th class="text-center">Add</th>
                                                    <th class="text-center">Delete</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($records as $record)
                                                    <tr id="removable{{$record->id}}">
                                                        <td>{{$loop->iteration}}</td>
                                                       <td>{{$record->person_first_name}} {{$record->person_last_name}}</td>
                                                        <td>{{$record->contact_number}}</td>
                                                        <td>{{$record->email}}</td>
                                                         <td>{{$record->package_name}}</td>
                                                         <td>{{$record->room_name}}</td>
                                                       
                                                        <td>{{$record->departure_date}}</td>
                                                        <td>{{$record->return_date}}</td>
                                                      <td> $ {{$record->price}}</td>
                                                        <td>
                                                            @if( $record->paid > 0)
                                                             $ {{$record->paid}}
                                                             @else
                                                             0
                                                             @endif
                                                             
                                                        </td>
                                                        <td> 
                                                         @if( $record->remaining >= 0)
                                                             $ {{$record->remaining}}
                                                              @else
                                                              $ {{$record->price}}
                                                             @endif
                                                     
                                                        
                                                        </td>
                                                        <td>{{$record->status}}</td>

                                                        <td class=" text-center">
                                                            <a class="btn btn-primary" href="{{ route('my_package_orders.show',$record->id) }}" role="button"><i class="fa fa-eye"></i></a>
                                                        </td>
                                                        <td class=" text-center">
                                                           <a class="btn btn-primary" href="{{ route('my_package_orders.edit',$record->id) }}" role="button"><i class="fa fa-edit"></i></a>
                                                       </td>
                                                        <td class=" text-center">
                                                          
                                                           <a class="btn btn-primary" href="{{ url('broker/my_package_orders/add/'.$record->id) }}" role="button"><i class="fa fa-plus"></i></a>
                                                       </td>
                                                        <td class="text-center">
                                                            <!-- Trigger the modal with a button -->
                                                            <button type="button" class="btn btn-danger" data-toggle="modal"   data-target="#del_packages_orders{{ $record->id }}"><i class="fa fa-trash"></i></button>
                                                        </td>

                                                        <!-- Modal -->
                                                        <div id="del_packages_orders{{ $record->id }}" class="modal fade" role="dialog">
                                                            <div class="modal-dialog">

                                                                <!-- Modal content-->
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        <h4 class="modal-title">Delate</h4>
                                                                    </div>

                                                                   <form action="{{route('my_package_orders.destroy',$record->id)  }}" method="POST">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <h4>{{$record->first_name }} {{$record->last_name }}</h4>
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

