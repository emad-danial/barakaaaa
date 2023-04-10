@extends('admin.layouts.app')
@section('page_title')
Edit
@endsection
@section('small_title')
Edit
@endsection

@section('content')
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit</h3>
        </div>
        <div class="box-body">
                @include('flash::message')
                @include('partials.validations_errors')
                <div>
                    {!! Form::model($model, [
                    'action' => ['admin\FlightsController@update',$model->id],
                    'method' =>'put',
                    'files' =>true,
                    ]) !!}




                    <div class="form-group col-lg-6">
                        <label for="flight_name">Flight Name </label>
                        {!! Form::text('flight_name', null , ['class' => 'form-control','placeholder'=>'Enter Flight
                        Name']) !!}
                    </div>


                    <div class="form-group col-lg-6">
                        <label for="flight_company">Flight Company</label>
                        {!! Form::text('flight_company', null , ['class' => 'form-control','placeholder'=>'Enter Flight
                        Company']) !!}
                    </div>


                    <div class="form-group col-lg-6">
                        <label for="from_city">From City</label>
                        {!! Form::text('from_city', null , ['class' => 'form-control','placeholder'=>'Enter Flight From
                        City']) !!}
                    </div>


                    <div class="form-group col-lg-6">
                        <label for="to_city">To City</label>
                        {!! Form::text('to_city', null , ['class' => 'form-control','placeholder'=>'Enter Flight To
                        City']) !!}
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="reservation_from">Reservation From Date</label>
                        {!! Form::date('reservation_from', null , ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="reservation_to">Reservation End Date</label>
                        {!! Form::date('reservation_to', null , ['class' => 'form-control']) !!}
                    </div>


                    <div class="form-group col-lg-6">
                        <label for="is_offer">Offer Percentage (%) (optional)</label>
                        <input type="number" value="{{$model->is_offer}}" name="is_offer" min="0" max="100"
                            class="form-control" placeholder="Enter Flight Offer If Exist">
                        {{--{!! Form::number('is_offer', null , ['class' => 'form-control','placeholder'=>'Enter Flight Offer If Exist']) !!}--}}
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="is_offer">Flight Image</label>
                        <h4 style="color: red"> Image Size (width 420 * height 345 )</h4>

                        <input type="file" class="form-control-file form-control" name="image">

                        <label>
                            <img src="{{asset($model->image)}}" alt="000000" class="img-thumbnail"
                                style="width: 50px;height: 50px;margin: 10px 0 20px 10px">
                        </label>

                    </div>

                    <div class="form-group col-lg-6">
                        <label for="price">Price Idot</label>
                        <input type="number" value="{{$model->price}}" name="price" class="form-control"
                            placeholder="Enter Price Idot">

                    </div>

                    <div class="form-group col-lg-6">
                        <label for="price_ch">Price Child</label>
                        <input type="number" value="{{$model->price_ch}}" name="price_ch" class="form-control"
                            placeholder="Enter Price  Child">

                    </div>

                    @push('scripts')
                    <script>
                        CKEDITOR.replace('editor1');

                    </script>
                    @endpush
                    <div class="form-group col-lg-12">
                        <label for="description"> Description </label>
                        <textarea id="editor1" name="description">{{$model->description}}</textarea>
                    </div>

                    <hr>
                    
                    
                            <div class="form-group col-lg-6">
                        <label for="meta_title">Meta Title</label>
                        {!! Form::text('meta_title', null , ['class' => 'form-control','placeholder'=>'Enter Meta Title SEO Meta Title']) !!}
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="meta_keywords">Meta Keywords  <span style="opacity: .8 ;color: #888888">(EX: baraka , Travel , Umra  ) -> all words separated with ',' </span></label>
                        {!! Form::text('meta_keywords', null , ['class' => 'form-control','placeholder'=>'Enter Meta Keywords SEO Meta Title']) !!}
                    </div>
                    <div class="form-group col-lg-12">
                        <label for="meta_description">Meta Description</label>
                        {!! Form::text('meta_description', null , ['class' => 'form-control','placeholder'=>'Enter Meta Description SEO Meta Title']) !!}
                    </div>
                    
                    
                        <button class="btn btn-primary" type="submit">Update</button>


                    {!! Form::close() !!}
                </div>
                <!-- /.box-body -->

        </div>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection
