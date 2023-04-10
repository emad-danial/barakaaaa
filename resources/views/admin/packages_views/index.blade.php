@extends('admin.layouts.app')
@section('page_title')
{{$package}} Views
@endsection
@section('small_title')
{{$package}} Views
@endsection
@section('content')

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Order Hotels</h3>
            @if($package == 'umrah')
            <div style="float: right;" class="btn btn-primary"><i class="fa fa-eye"></i>&nbsp; &nbsp; Total Views &nbsp;
                &nbsp;{{$umrahviews}} &nbsp;</div>
            @endif @if($package == 'hajj')
            <div style="float: right;" class="btn btn-primary"><i class="fa fa-eye"></i>&nbsp; &nbsp; Total Views &nbsp;
                &nbsp;{{$hajjviews}} &nbsp;</div>
            @endif @if($package == 'flight')
            <div style="float: right;" class="btn btn-primary"><i class="fa fa-eye"></i>&nbsp; &nbsp; Total Views &nbsp;
                &nbsp;{{$flightviews}} &nbsp;</div>
            @endif @if($package == 'hotel')
            <div style="float: right;" class="btn btn-primary"><i class="fa fa-eye"></i>&nbsp; &nbsp; Total Views &nbsp;
                &nbsp;{{$hotelviews}} &nbsp;</div>
            @endif
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
                                                <th>Package Name</th>
                                                <th>Page Views</th>



                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($records as $record)
                                            <tr id="removable{{$record->id}}">
                                                <td>{{$loop->iteration}}</td>
                                                <td>

                                                    @if($package == 'umrah')
                                                    <a
                                                        href="/umrah-package-details/{{$record->id}}/{{$record->name}}">{{$record->name}}</a>
                                                    @endif
                                                    @if($package == 'hajj')
                                                    <a
                                                        href="/umrah-package-details/{{$record->id}}/{{$record->name}}">{{$record->name}}</a>
                                                    @endif

                                                    @if($package == 'hotel')
                                                    <a href="/hotels/{{$record->id}}/{{$record->name}}">
                                                        {{$record->name}}</a>
                                                    @endif

                                                    @if($package == 'flight')
                                                    <a href="/flights/{{$record->id}}/{{$record->flight_name}}">
                                                        {{$record->flight_name}}</a>
                                                    @endif
                                                </td>
                                                <td>{{$record->view_count}}</td>

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
