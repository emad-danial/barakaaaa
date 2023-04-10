@extends('broker.layouts.app')
@section('page_title')
    Create Withdraw
@endsection
@section('small_title')
    Broker Withdraw
@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Create Broker Withdraw</h3>

                {{--<div class="box-tools pull-right">--}}
                    {{--<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"--}}
                            {{--title="Collapse">--}}
                        {{--<i class="fa fa-minus"></i></button>--}}
                    {{--<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"--}}
                            {{--title="Remove">--}}
                        {{--<i class="fa fa-times"></i></button>--}}
                {{--</div>--}}
            </div>
            <div class="box-body">
                <div class="box">
                    @include('partials.validations_errors')
                    @include('flash::message')
                    <div class="box-body">


                        <form method="post" action="{{ route('broker_withdraw.store') }}" >
                            @csrf

                            <div class="form-group">
                                <label>Value</label>
                                <input type="number" name="value" class="form-control">
                                <input type="hidden" name="user_id" value="{{$user_id}}" >
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Create</button>
                            </div>

                        </form><!-- end of form -->

                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection

