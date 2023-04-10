@extends('admin.layouts.app')
@section('page_title')
Rates
@endsection
@section('small_title')
Rates
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Rates</h3>
                {{--<a style="float: right;" class="btn btn-primary" href="{{url(route('rates.create'))}}"><i class="fa fa-plus"></i> New Hotels Amenitie</a>--}}
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
                                                    <th>Name</th>
                                                    <th>Mobile</th>
                                                    <th>Message</th>
                                                    <th>Rate</th>
                                                    <th>Package Name</th>
                                                    <th>Type</th>
                                                    <th>Active</th>

                                                    <th class="text-center">Edit</th>
                                                    <th class="text-center">Delate</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($records as $record)
                                                    <tr id="removable{{$record->id}}">
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$record->name}}</td>
                                                        <td>{{$record->mobile}}</td>
                                                        <td>{{$record->message}}</td>
                                                        <td>{{$record->rate}}</td>
                                                        <td>
                                                            @if($record->uamr_id !=null)
                                                                 <a href="/umrah-package-details/{{$record->uamr_id}}/{{$record->umarh->name}}">Show Page</a> 
                                                                @else
                                                                
                                                         <a href="/hotels/{{$record->hotel_id}}/{{$record->hotel->name}}">Show Page</a>
                                                                @endif


                                                        </td>
                                                        <td>

                                                            @if($record->uamr_id !=null)
                                                               Umrah/Hajj
                                                            @else
                                                               hotel
                                                            @endif

                                                        </td>
                                                        <td>{{$record->is_approve}}</td>

                                                        <td class=" text-center">
                                                            <a class="btn btn-primary" href="{{ route('rates.edit',$record->id) }}" role="button"><i class="fa fa-edit"></i></a>
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
                                                                        <h4 class="modal-title">Delate</h4>
                                                                    </div>

                            <form action="{{route('rates.destroy',$record->id)  }}" method="POST">
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

