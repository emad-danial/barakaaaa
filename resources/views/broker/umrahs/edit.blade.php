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
                <div class="box">
                    @include('flash::message')
                    @include('partials.validations_errors')
                    <div class="box-body">
                        {!! Form::model($model, [
                            'action' => ['Admin\UmrahsController@update',$model->id],
                            'method' =>'put',
                            'files' =>true,
                        ]) !!}

                        <div class="form-group col-lg-6">
                            <label for="name">Umrah Name </label>
                            {!! Form::text('name', null , ['class' => 'form-control','placeholder'=>'Enter Umrah Name']) !!}
                        </div>


                        <div class="form-group col-lg-6">
                            <label for="location">Umrah Location</label>
                            {!! Form::text('location', null , ['class' => 'form-control','placeholder'=>'Enter Map From Google Map']) !!}
                        </div>


                        <div class="form-group col-lg-6">
                            <label for="from_city">From City</label>
                            {!! Form::text('from_city', null , ['class' => 'form-control','placeholder'=>'Enter Umrah From City']) !!}
                        </div>


                        <div class="form-group col-lg-6">
                            <label for="to_city">To City</label>
                            {!! Form::text('to_city', null , ['class' => 'form-control','placeholder'=>'Enter Umrah To City']) !!}
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="start_date">Start Date</label>
                            {!! Form::date('start_date', null , ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="end_date">End Date</label>
                            {!! Form::date('end_date', null , ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-lg-12">
                            {!! Form::hidden('package_type', null , ['class' => 'form-control','id'=>'package_type']) !!}
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="is_offer">Offer Percentage (%) (optional)</label>
                            {{--<input type="number"  name="is_offer" class="form-control" placeholder="Enter Umrah Offer If Exist">--}}
                            {!! Form::number('is_offer', null , ['class' => 'form-control', 'placeholder' => 'Enter Umrah Offer If Exist']) !!}
                            {{--{!! Form::number('is_offer', null , ['class' => 'form-control','placeholder'=>'Enter Umrah Offer If Exist']) !!}--}}
                        </div>

                        @push('scripts')
                            <script>
                                CKEDITOR.replace('editor1');
                            </script>
                        @endpush
                        <div class="form-group col-lg-6">
                            <label for="makkah_desciption"> Makkah Description  <span style="color: red"> ( max length 200 char )</span></label>
                            <textarea id="editor1" name="makkah_desciption">{{$model->makkah_desciption}}</textarea>
                        </div>


                        @push('scripts')
                            <script>
                                CKEDITOR.replace('editor2');
                            </script>
                        @endpush
                        <div class="form-group col-lg-6">
                            <label for="madina_desciption">Madina Description <span style="color: red"> ( max length 200 char )</span></label>
                            <textarea id="editor2" name="madina_desciption">{{$model->madina_desciption}}</textarea>
                        </div>


                        <div class=" col-lg-6">
                            <label for="is_active" style="margin-top: 20px"
                                   class="">Activation</label>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5" style="display: inline">
                                        <input type="radio" name="is_active" value="active" @if($model->is_active == 'active') checked @else @endif> Active
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5" style="display: inline">
                                        <input type="radio" name="is_active" value="dsiactive" @if($model->is_active == 'dsiactive') checked @else @endif> Dis Active
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class=" col-lg-6">
                            <label for="gender" style="margin-top: 20px"
                                   class="">Umrah Type</label>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5" style="display: inline">
                                        <input type="radio" name="type" value="regular" @if($model->type == 'regular') checked @else @endif
                                               onclick="changeDisplayCityTransetNone();"> Regular
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5" style="display: inline">
                                        <input type="radio" name="type" value="stop_over" @if($model->type == 'stop_over') checked @else @endif
                                               onclick="changeDisplayCityTransetblock();"> Stop Over
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="city_transit_div" @if ($model->type == 'stop_over') style="display: block" @else style="display: none" @endif>
                            <div class="form-group col-lg-4">
                                <label for="city_transit">Stop Over City</label>
                                <input type="text" name="city_transit" class="form-control" @if ($model->type == 'stop_over')  value="{{$umarhStopOver->city}}" @else @endif placeholder="Enter Stop Over City">
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="start_date_transit">Stop Over Start Date</label>
                                <input type="date" name="start_date_transit" class="form-control"  @if ($model->type == 'stop_over') value="{{$umarhStopOver->start_date}}" @else @endif>
                            </div>

                            <div class="form-group col-lg-4">
                                <label for="end_date_transit">Stop Over End Date</label>
                                <input type="date" name="end_date_transit" class="form-control"  @if ($model->type == 'stop_over')  value="{{$umarhStopOver->end_date}}" @else @endif>
                            </div>

                            @push('scripts')
                                <script>
                                    CKEDITOR.replace('editorcity');
                                </script>
                            @endpush
                            <div class="form-group col-lg-12">
                                <label for="description_transit">Stop Over Description</label>
                                <textarea id="editorcity" name="description_transit"> @if ($model->type == 'stop_over') {{$umarhStopOver->description}} @else @endif</textarea>
                            </div>

                        </div>


                        <label for="files"><h3> Umrah Gallery</h3></label>

                        <div class="banner_content row" style="margin-top: 10px">
                            <div class="col-lg-12">
                                <div class="mt-12">

                                    <input type="file" class="form-control-file form-control"
                                           name="files[]" multiple="multiple">
                                    @foreach($umarhGallery as $file)
                                    <label>
                                    <img src="{{asset($file->image)}}" alt="000000"
                                    class="img-thumbnail"
                                    style="width: 50px;height: 50px;margin: 10px 0 20px 10px">
                                    </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <br>

                        <label><h3>Umrah Days Description</h3></label>

                        <div id="container22">
                            @for($i=1;$i<=$umarhDays->count();$i++)

                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label for="day_name_{{$i}}">Day Name </label>
                                    <input type="text" name="day_name_{{$i}}" class="form-control" value="{{$umarhDays[$i-1]['name']}}" >
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="day_desciption_{{$i}}">Day Description </label>
                                    <input type="text" name="day_desciption_{{$i}}" class="form-control" value="{{$umarhDays[$i-1]['desciption']}}" >
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="day_number_{{$i}}">Day number </label>
                                    <input type="number" name="day_number_{{$i}}" class="form-control" value="{{$umarhDays[$i-1]['day_number']}}" >
                                </div>
                            </div>

                                @endfor
                        </div>
                        <input type="hidden" name="dayes_count" id="dayes_count" value="{{$umarhDays->count()}}">
                        <br>

                        <a class="btn btn-info" id="somebutton">Click To Add New Day</a>
                        <br>

                        @push('js')

                            <script>



                                function changeDisplayCityTransetNone() {
                                    $('#city_transit_div').css('display', 'none');
                                }

                                function changeDisplayCityTransetblock() {
                                    $('#city_transit_div').css('display', 'block');
                                }

                                $("#package_type").attr('value', 'umar');
                                var i = $("#dayes_count").attr('value');
                                $("#somebutton").click(function () {
                                    i++;
                                    $("#dayes_count").attr('value', i);

                                    $("#container22").append('\n' +
                                        '<div class="row">\n' +
                                        '<div class="form-group col-lg-4">\n' +
                                        '    <label for="day_name_' + i + '">Day Name </label>\n' +
                                        '    <input type="text" name="day_name_' + i + '" class="form-control">\n' +
                                        '</div>\n' +
                                        '\n' +
                                        '<div class="form-group col-lg-4">\n' +
                                        '    <label for="day_desciption_' + i + '">Day Description </label>\n' +
                                        '    <input type="text" name="day_desciption_' + i + '" class="form-control">\n' +
                                        '</div>\n' +
                                        '\n' +
                                        '<div class="form-group col-lg-4">\n' +
                                        '    <label for="day_number_' + i + '">Day Number </label>\n' +
                                        '    <input type="number" name="day_number_' + i + '" class="form-control">\n' +
                                        '</div>\n' +
                                        '</div>');
                                });
                            </script>

                        @endpush


                        <label><h3>Umrah Pricing</h3></label>
{{--                                    {{$umarhDays->count()}}--}}
                        <div id="containerprice">
                            @for($c=1;$c<=$umarhPricies->count();$c++)
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label for="price_name_{{$c}}">Number Name </label>
                                    <input type="text" name="price_name_{{$c}}" class="form-control" value="{{$umarhPricies[$c-1]['name']}}" >
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="number_per_room_{{$c}}">Number Per Room </label>
                                    <input type="number" name="number_per_room_{{$c}}" class="form-control" value="{{$umarhPricies[$c-1]['number_per_room']}}" >
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="price_{{$c}}">Price</label>
                                    <input type="number" name="price_{{$c}}" class="form-control" value="{{$umarhPricies[$c-1]['price']}}" >
                                </div>
                            </div>
                                @endfor
                        </div>
                        <input type="hidden" name="price_count" id="price_count" value="{{$umarhPricies->count()}}">
                        <br>

                        <a class="btn btn-info" id="somebuttonprice">Click To Add New Price</a>
                        <br>

                        @push('js')

                            <script>
                                var p = $("#price_count").attr('value');
                                $("#somebuttonprice").click(function () {
                                    p++;
                                    $("#price_count").attr('value', p);

                                    $("#containerprice").append('\n' +
                                        '<div class="row">\n' +
                                        '<div class="form-group col-lg-4">\n' +
                                        '    <label for="price_name_' + p + '">Number Name </label>\n' +
                                        '    <input type="text" name="price_name_' + p + '" class="form-control">\n' +
                                        '</div>\n' +
                                        '\n' +
                                        '<div class="form-group col-lg-4">\n' +
                                        '    <label for="number_per_room_' + p + '">Number Per Room</label>\n' +
                                        '    <input type="number" name="number_per_room_' + p + '" class="form-control">\n' +
                                        '</div>\n' +
                                        '\n' +
                                        '<div class="form-group col-lg-4">\n' +
                                        '    <label for="price_' + p + '">Price</label>\n' +
                                        '    <input type="number" name="price_' + p + '" class="form-control">\n' +
                                        '</div>\n' +
                                        '</div>');
                                });
                            </script>

                        @endpush

                        <br><br><br>

                        @push('scripts')
                            <script>
                                CKEDITOR.replace('included');
                            </script>
                        @endpush
                        <div class="form-group col-lg-6">
                            <label for="included">Included</label>
                            <textarea id="included" name="included">{{$umarhDetails->included}}</textarea>
                        </div>


                        @push('scripts')
                            <script>
                                CKEDITOR.replace('not_selected');
                            </script>
                        @endpush
                        <div class="form-group col-lg-6">
                            <label for="not_selected">Not Included</label>
                            <textarea id="not_selected" name="not_selected">{{$umarhDetails->not_selected}}</textarea>
                        </div>


                        @push('scripts')
                            <script>
                                CKEDITOR.replace('important_notes');
                            </script>
                        @endpush
                        <div class="form-group col-lg-6">
                            <label for="important_notes">Important Notes</label>
                            <textarea id="important_notes" name="important_notes">{{$umarhDetails->important_notes}}</textarea>
                        </div>


                        @push('scripts')
                            <script>
                                CKEDITOR.replace('how_to_book');
                            </script>
                        @endpush
                        <div class="form-group col-lg-6">
                            <label for="how_to_book">How To Book</label>
                            <textarea id="how_to_book" name="how_to_book">{{$umarhDetails->how_to_book}}</textarea>
                        </div>


                        <label><h3>Umrah Includes</h3></label>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <br>
                                <input id="select-all" type="checkbox"><label for='select-all'> &nbsp; Select
                                    All</label>
                                <br>
                                <div class="row">
                                    @foreach($include as $includes)
                                        <div class="col-sm-3">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="include[]" value="{{$includes->id}}"
                                                           @foreach($umrahHaagIncludes as $umrahHaagInclude)
                                                           @if($umrahHaagInclude->packages_includes_id == $includes->id)
                                                           checked="checked"
                                                            @endif
                                                            @endforeach
                                                    >
                                                    {{$includes->name}}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                        @push('js')
                            <script>
                                $("#select-all").click(function () {
                                    $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
                                });
                            </script>
                        @endpush


                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>


                        {!! Form::close() !!}
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
