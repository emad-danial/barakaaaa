@extends('admin.layouts.app')
@section('page_title')
    E-Visa {{$status}} Orders
@endsection
@section('small_title')

@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">E-Visa {{$status}} Orders</h3>
            </div>
            <div class="box-body">
                @if(count($records))
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                @include('flash::message')
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                <tr role="row">
                                                    <th>#</th>
                                                    <th>User First Name</th>
                                                    <th>User Last Name</th>
                                                    <th>User Contact Number</th>
                                                    <th>User Email</th>
                                                    <th>Number Of persons</th>


                                                    <th class="text-center">View</th>
                                                    <th class="text-center">Delete</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($records as $record)
                                                    <tr id="removable{{$record->id}}">
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$record->first_name}}</td>
                                                        <td> {{$record->last_name}}</td>
                                                        <td>{{$record->contact_number}}</td>
                                                        <td>{{$record->email}}</td>
                                                        <td>{{$record->num_of_persons}}</td>
                                                        <td class=" text-center">
                                                            <a class="btn btn-primary" href="{{ route('evisa.show',$record->id) }}" role="button"><i class="fa fa-eye"></i></a>
                                                        </td>
                                                        <td class="text-center">
                                                            <!-- Trigger the modal with a button -->
                                                            <button type="button" class="btn btn-danger" data-toggle="modal"   data-target="#del-evisa{{ $record->id }}"><i class="fa fa-trash"></i></button>
                                                        </td>

                                                        <!-- Modal -->
                                                        <div id="del-evisa{{ $record->id }}" class="modal fade" role="dialog">
                                                            <div class="modal-dialog">

                                                                <!-- Modal content-->
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        <h4 class="modal-title">Delate</h4>
                                                                    </div>

                                                                    <form action="{{route('evisa.destroy',$record->id)  }}" method="POST">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <h4>{{$record->first_name }}</h4>
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
                    <div class="text-center"></div>
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

