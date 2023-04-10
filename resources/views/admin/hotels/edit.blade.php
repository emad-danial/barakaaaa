@extends('admin.layouts.app')
@section('page_title')
Edit Hotel
@endsection
@section('small_title')
Edit Hotel
@endsection

@section('content')
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Hotel</h3>
        </div>
        <div class="box-body">
                @include('flash::message')
                @include('partials.validations_errors')
                <div>
                    {!! Form::model($model, [
                    'action' => ['admin\HotelsController@update',$model->id],
                    'method' =>'put',
                    'files' =>true,
                    ]) !!}

                    <div class="form-group col-lg-6">
                        <label for="name">Hotel Name </label>
                        {!! Form::text('name', null , ['class' => 'form-control','placeholder'=>'Enter Hotel Name']) !!}
                    </div>


                    <div class="form-group col-lg-6">
                        <label for="location">Hotel Location</label>
                        {!! Form::text('location', null , ['class' => 'form-control','placeholder'=>'Enter Map From
                        Google Map']) !!}
                    </div>


                    <div class="form-group col-lg-6">
                        <label for="city">City</label>
                        {!! Form::text('city', null , ['class' => 'form-control','placeholder'=>'Enter Hotel City']) !!}
                    </div>


                    <div class="form-group col-lg-6">
                        <label for="duration">Duration</label>
                        {!! Form::text('duration', null , ['class' => 'form-control','placeholder'=>'Enter Hotel
                        Duration']) !!}
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="mobile">Mobile</label>
                        {!! Form::text('mobile', null , ['class' => 'form-control','placeholder'=>'Enter Hotel Mobile'])
                        !!}
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="address">Address</label>
                        {!! Form::text('address', null , ['class' => 'form-control','placeholder'=>'Enter Hotel
                        Address']) !!}
                    </div>

                    <div class="form-group col-lg-12">
                        <label for="availble_tickets">Available Rooms</label>
                        <input type="number" name="availble_tickets" class="form-control"
                            placeholder="Enter Hotel Available Tickets" value="{{$model->availble_tickets}}">

                    </div>




                    @push('scripts')
                    <script>
                        CKEDITOR.replace('editor1');

                    </script>
                    @endpush
                    <div class="form-group col-lg-12">
                        <label for="description"> Hotel Description </label>
                        <textarea id="editor1" name="description">{{$model->description}}</textarea>
                    </div>



                    <label for="files">
                        <h3> Hotel Gallery</h3>
                    </label>

                    <div class="banner_content row" style="margin-top: 10px">
                        <div class="col-lg-12">
                            <div class="mt-12">
                                <h4 style="color: red"> Image Size (width 825 * height 445 )</h4>
                                <input type="file" class="form-control-file form-control" name="files[]"
                                    multiple="multiple">


                                <div class="row">

                                    @foreach($hotelGallary as $file)
                                    <div class="col-md-1">
                                        <label>
                                            <img src="{{asset($file->image)}}" alt="000000" class="img-thumbnail"
                                                style="width: 100px;height: 70px;margin: 10px 0 10px 10px">
                                        </label>
                                        <label style="margin-left: 10px">

                                            <div id="{{ $file->id }}" class="btn btn-danger deleteimg">Delete</div>

                                        </label>
                                    </div>

                                    @endforeach

                                    <div class="col-md-12">
                                        <div id="success" class="alert alert-success" role="alert">
                                            Deleting Success
                                        </div>

                                        <div id="error" class="alert alert-danger" role="alert">
                                            Error On Deleting
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <br>


                    <label for="files">
                        <h3> Hotel Book Now Img</h3>
                    </label>

                    <div class="banner_content row" style="margin-top: 10px">
                        <div class="col-lg-12">
                            <div class="mt-12">
                                <h4 style="color: red"> Image Size (width 420 * height 345 )</h4>
                                <input type="file" class="form-control-file form-control" name="book_now_img">
                                <label>
                                    <img src="{{asset($model->book_now_img)}}" alt="000000" class="img-thumbnail"
                                        style="width: 50px;height: 50px;margin: 10px 0 20px 10px">
                                </label>
                            </div>
                        </div>
                    </div>
                    <br>


                    <label>
                        <h3>Hotel Rooms</h3>
                    </label>

                    <div id="container22">
                        @for($i=1;$i<=$hotelRooms->count();$i++)

                            <div class="row">
                                 <div class="form-group col-lg-12">
                                    <label style="margin-left: 5px">
                                    <div id="{{$hotelRooms[$i-1]['id'] }}" class="btn btn-danger deleteroom">Delete Room {{$i}}</div>
                                 </label>
                                 
                               </div>
                                <label for="room_id_{{$i}}"></label>
                                <input type="hidden" name="room_id_{{$i}}" class="form-control"
                                    value="{{$hotelRooms[$i-1]['id']}}">

                                <div class="form-group col-lg-4">
                                    <label for="room_name_{{$i}}">Room Name </label>
                                    <input type="text" name="room_name_{{$i}}" class="form-control"
                                        value="{{$hotelRooms[$i-1]['name']}}">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="room_includes_{{$i}}">Room Includes </label>
                                    <input type="text" name="room_includes_{{$i}}" class="form-control"
                                        value="{{$hotelRooms[$i-1]['includes']}}">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="room_maxinum_{{$i}}">Room Maximum Persons </label>
                                    <input type="number" name="room_maxinum_{{$i}}" class="form-control"
                                        value="{{$hotelRooms[$i-1]['maxinum']}}">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="room_price_{{$i}}">Room Price </label>
                                    <input type="number" name="room_price_{{$i}}" class="form-control"
                                        value="{{$hotelRooms[$i-1]['price']}}">
                                </div>
                                <div class="form-group col-lg-2">
                                    <label for="from_date_{{$i}}">From Date</label>
                                    <input type="date" name="from_date_{{$i}}" class="form-control"
                                        value="{{$hotelRooms[$i-1]['from_date']}}">

                                </div>
                                <div class="form-group col-lg-2">
                                    <label for="to_date_{{$i}}">To Date</label>
                                    <input type="date" name="to_date_{{$i}}" class="form-control"
                                        value="{{$hotelRooms[$i-1]['to_date']}}">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="room_image_{{$i}}">Room Image </label>
                                    <input type="file" name="room_image_{{$i}}" class="form-control">
                                    <label>
                                        <img src="{{asset($hotelRooms[$i-1]['room_image'])}}" alt="000000"
                                            class="img-thumbnail"
                                            style="width: 50px;height: 50px;margin: 10px 0 20px 10px">
                                    </label>
                                </div>

                           

                            </div>

                            @endfor
                    </div>
                    <input type="hidden" name="rooms_count" id="rooms_count" value="{{$hotelRooms->count()}}">
                    <br>

                    <a class="btn btn-info" id="somebutton">Click To Add New Room</a>
                    <br>

                    @push('js')

                    <script>
                        var i = $("#rooms_count").attr('value');
                        $("#somebutton").click(function () {
                            i++;
                            $("#rooms_count").attr('value', i);

                            $("#container22").append('\n' +
                                '<div class="row">\n' +
                                '<div class="form-group col-lg-4">\n' +
                                '    <label for="room_name_' + i + '">Room Name </label>\n' +
                                '    <input type="text" name="room_name_' + i +
                                '" class="form-control">\n' +
                                '</div>\n' +
                                '\n' +
                                '<div class="form-group col-lg-4">\n' +
                                '    <label for="room_includes_' + i + '">Room Includes </label>\n' +
                                '    <input type="text" name="room_includes_' + i +
                                '" class="form-control">\n' +
                                '</div>\n' +
                                '\n' +
                                '<div class="form-group col-lg-4">\n' +
                                '    <label for="room_maxinum_' + i + '">Room Maximum Persons </label>\n' +
                                '    <input type="number" name="room_maxinum_' + i +
                                '" class="form-control">\n' +
                                '</div>\n' +
                                '<div class="form-group col-lg-4">\n' +
                                '    <label for="room_price_' + i + '">Room Price  </label>\n' +
                                '    <input type="number" name="room_price_' + i +
                                '" class="form-control">\n' +
                                '</div>\n' +
                                '<div class="form-group col-lg-2">\n' +
                                '    <label for="from_date_' + i + '">From Date  </label>\n' +
                                '    <input type="date" name="from_date_' + i +
                                '" class="form-control">\n' +
                                '</div>\n' +
                                '<div class="form-group col-lg-2">\n' +
                                '    <label for="to_date_' + i + '">To Date  </label>\n' +
                                '    <input type="date" name="to_date_' + i + '" class="form-control">\n' +
                                '</div>\n' +

                                '<div class="form-group col-lg-4">\n' +
                                '    <label for="room_image_' + i + '">Room Image </label>\n' +
                                '    <input type="file" name="room_image_' + i +
                                '" class="form-control">\n' +
                                '</div>\n' +
                                '</div>');
                        });

                    </script>

                    @endpush


                    <br><br><br>




                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <br>
                            <input id="select-all" type="checkbox"><label for='select-all'> &nbsp; Select
                                All</label>
                            <br>
                            <div class="row">
                                @foreach($amenitie as $includes)
                                <div class="col-sm-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="amenitie[]" value="{{$includes->id}}"
                                                @foreach($hotelamenate as $hotelamenates)
                                                @if($hotelamenates->amenities_id == $includes->id)
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
    <script src="https://code.jquery.com/jquery-1.12.4.js"
        integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#success').hide();
            $('#error').hide();
            
            $('.deleteimg').on('click', function () {
                $(this).parents("div:first").hide(300);
                var id = $(this).attr("id");
                var uurl = '/admin/deleteImage/' + id + '/hotel';
                var data = new FormData();
                data.append('id', id);
                $.ajax({
                    url: uurl,
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'GET',
                    success: function (data) {
                        if (data['data'] == "success") {
                            $('#success').show(300);
                            $('#error').hide(300);
                        } else {
                            $('#error').show(300);
                            $('#success').hide(300);
                        }
                    }
                });

            });
            
            
               $('.deleteroom').on('click', function () {
                $(this).parents("div:eq(1)").hide(300);
                var id = $(this).attr("id");
                var uurl = '/admin/deleteroom/' + id + '/hotel';
                var data = new FormData();
                data.append('id', id);
                $.ajax({
                    url: uurl,
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'GET',
                    success: function (data) {
                        if (data['data'] == "success") {
                            $('#success').show(300);
                            $('#error').hide(300);
                              location.reload(true);
                        } else {
                            $('#error').show(300);
                            $('#success').hide(300);
                        }
                    }
                });

            });

        });

    </script>
</section>
<!-- /.content -->
@endsection
