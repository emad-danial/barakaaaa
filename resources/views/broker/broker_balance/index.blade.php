@extends('broker.layouts.app')
@section('page_title')
    Statement Finance
@endsection
@section('small_title')
    Statement Finance
@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border row">
                <div class="col-md-2">
                    
                    <h3 class="box-title">Total Sales : $ {{$total_sales}}</h3>

                </div>
                
                 <div class="col-lg-2">
                   
                    <h3 class="box-title">Deal Agreement  :  {{$brokercommition}}  % </h3>
                    

                </div>
                 
                  <div class="col-lg-2">
                   
                   
                    <h3 class="box-title">Commission : $ {{$total_brokercommition}}</h3>

                </div>
                 
                 <div class="col-md-2">
                    
                    <h3 class="box-title">Pay To Baraka : $ {{$totalshodpaid}}</h3>

                </div>
                <div class="col-md-2">
                    
                    <h3 class="box-title">Total Paid : $ {{$total_paid}}</h3>

                </div>
                
                 <div class="col-lg-2">
                   
                    <h3 class="box-title">Final pay Baraka:${{$remaining}}</h3>

                </div>
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
                                                     <th>Check Number</th>
                                                    
                                                    <th>Value</th>
                                                    <th> Created at</th>
                                                   
                                                
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($records as $record)
                                                    <tr id="removable{{$record->id}}">
                                                        <td>{{$loop->iteration}}</td>
                                                         <td>{{$record->check_number}}</td>
                                                        <td>{{$record->value}}</td>
                                                        <td>{{$record->created_at}}</td>
                                                       



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

