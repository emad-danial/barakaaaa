@extends('admin.layouts.app')
@section('page_title')
    Withdraw Requests
@endsection
@section('small_title')
    Withdraw Requests
@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Withdraw Requests</h3>

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
                                                    <th>User Name</th>
                                                    <th>User Email </th>
                                                    <th>User Mobile</th>
                                                    <th>Value</th>
                                                    <th>Status</th>
                                                    <th class="text-center">Edit</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($records as $record)
                                                    <tr id="removable{{$record->id}}">
                                                        <td>{{$loop->iteration}} </td>
                                                        <td>{{$record->first_name}}  {{$record->last_name}}</td>
                                                        <td>{{$record->email}}</td>
                                                        <td>{{$record->mobile}}</td>
                                                        <td>{{$record->value}}</td>
                                                        <td>{{$record->status}}</td>

                                                        <td class=" text-center">
                                                            <a class="btn btn-primary" href="{{ route('broker_withdrawal_requests.edit',$record->id) }}" role="button"><i class="fa fa-edit"></i></a>
                                                        </td>


                                                        <!-- Modal -->
                                                        <div id="del_includes{{ $record->id }}" class="modal fade" role="dialog">
                                                            <div class="modal-dialog">

                                                                <!-- Modal content-->
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        <h4 class="modal-title">Delate</h4>
                                                                    </div>

                            <form action="{{route('includes.destroy',$record->id)  }}" method="POST">
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

