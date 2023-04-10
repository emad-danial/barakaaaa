<div class="form-group col-lg-6">
    <label for="name">Hotel Name </label>
    {!! Form::text('name', null , ['class' => 'form-control','placeholder'=>'Enter Hotel Name']) !!}
</div>


<div class="form-group col-lg-6">
    <label for="location">Hotel Location</label>
    {!! Form::text('location', null , ['class' => 'form-control','placeholder'=>'Enter Map From Google Map']) !!}
</div>


<div class="form-group col-lg-6">
    <label for="city">City</label>
    {!! Form::text('city', null , ['class' => 'form-control','placeholder'=>'Enter Hotel City']) !!}
</div>


<div class="form-group col-lg-6">
    <label for="duration">Duration</label>
    {!! Form::text('duration', null , ['class' => 'form-control','placeholder'=>'Enter Hotel Duration']) !!}
</div>
<div class="form-group col-lg-6">
    <label for="mobile">Mobile</label>
    {!! Form::text('mobile', null , ['class' => 'form-control','placeholder'=>'Enter Hotel Mobile']) !!}
</div>
<div class="form-group col-lg-6">
    <label for="address">Address</label>
    {!! Form::text('address', null , ['class' => 'form-control','placeholder'=>'Enter Hotel Address']) !!}
</div>

<div class="form-group col-lg-12">
    <label for="availble_tickets">Available Rooms</label>
    <input type="number"  name="availble_tickets" class="form-control" placeholder="Enter Hotel Available Tickets">

</div>

@push('scripts')
    <script>
        CKEDITOR.replace('editor1');
    </script>
@endpush
<div class="form-group col-lg-12">
    <label for="description"> Hotel Description </label>
    <textarea id="editor1" name="description"></textarea>
</div>


<label for="files"><h3> Hotel Gallery</h3></label>

<div class="banner_content row" style="margin-top: 10px">
    <div class="col-lg-12">
        <div class="mt-12">
    <h4 style="color: red"> Image Size (width 825 *  height 445 )</h4>
            <input type="file" class="form-control-file form-control"
                   name="files[]" multiple="multiple">
        </div>
    </div>
</div>

<br>
<label for="files"><h3> Hotel Book Now Img</h3></label>

<div class="banner_content row" style="margin-top: 10px">
    <div class="col-lg-12">
        <div class="mt-12">
   <h4 style="color: red"> Image Size (width 255 *  height 170 )</h4>
            <input type="file" class="form-control-file form-control"
                   name="book_now_img">
        </div>
    </div>
</div>
<br>




<label><h3>Hotel Rooms</h3></label>

<div id="container22">
    <div class="row">
        <div class="form-group col-lg-4">
            <label for="room_name_1">Room Name </label>
            {!! Form::text("room_name_1", null , ["class" => "form-control"]) !!}
        </div>
        <div class="form-group col-lg-4">
            <label for="room_includes_1">Room Includes </label>
            {!! Form::text("room_includes_1", null , ["class" => "form-control"]) !!}
        </div>
        <div class="form-group col-lg-4">
            <label for="room_maxinum_1">Room Maximum Persons </label>
            {!! Form::number("room_maxinum_1", null , ["class" => "form-control"]) !!}
        </div>

        <div class="form-group col-lg-4">
            <label for="room_price_1">Room Price </label>
            {!! Form::number("room_price_1", null , ["class" => "form-control"]) !!}
        </div>
            <div class="form-group col-lg-2">
            <label for="from_date">From Date </label>
            {!! Form::date("from_date_1", null , ["class" => "form-control"]) !!}
        </div>
        <div class="form-group col-lg-2">
            <label for="to_date">To Date </label>
            {!! Form::date("to_date_1", null , ["class" => "form-control"]) !!}
        </div>
        <div class="form-group col-lg-4">
            <label for="room_image_1">Room Image     <span style="color: red"> Image Size (width 205 *  height 130 )</span> </label>
            {!! Form::file("room_image_1", null , ["class" => "form-control"]) !!}
        </div>
    </div>
</div>
{{--{!! Form::hidden('rooms_count', null , ['class' => 'form-control', 'id' => 'rooms_count']) !!}--}}
<input type="hidden" class="form-control-file form-control"
       name="rooms_count" id="rooms_count">
<br>

<a class="btn btn-info" id="somebutton">Click To Add New Room</a>
<br>

@push('js')

    <script>
        $("#rooms_count").attr('value',1);
        var i=1;
        $("#somebutton").click(function () {
            i++;
            $("#rooms_count").attr('value',i);

            $("#container22").append('\n' +
                '<div class="row">\n' +
                '<div class="form-group col-lg-4">\n' +
                '    <label for="room_name_'+i+'">Room Name </label>\n' +
                '    <input type="text" name="room_name_'+i+'" class="form-control">\n' +
                '</div>\n' +
                '\n' +
                '<div class="form-group col-lg-4">\n' +
                '    <label for="room_includes_'+i+'">Room Includes </label>\n' +
                '    <input type="text" name="room_includes_'+i+'" class="form-control">\n' +
                '</div>\n' +
                '\n' +
                '<div class="form-group col-lg-4">\n' +
                '    <label for="room_maxinum_'+i+'">Room Maximum Persons </label>\n' +
                '    <input type="number" name="room_maxinum_'+i+'" class="form-control">\n' +
                '</div>\n' +
                '<div class="form-group col-lg-4">\n' +
                '    <label for="room_price_'+i+'">Room Price  </label>\n' +
                '    <input type="number" name="room_price_'+i+'" class="form-control">\n' +
                '</div>\n' +
                '<div class="form-group col-lg-2">\n' +
                '    <label for="from_date_'+i+'">From Date  </label>\n' +
                '    <input type="date" name="from_date_'+i+'" class="form-control">\n' +
                '</div>\n' +
                '<div class="form-group col-lg-2">\n' +
                '    <label for="to_date_'+i+'">To Date  </label>\n' +
                '    <input type="date" name="to_date_'+i+'" class="form-control">\n' +
                '</div>\n' +
                '\n' +
                '<div class="form-group col-lg-4">\n' +
                '    <label for="room_image_'+i+'">Room Image </label>\n' +
                '    <input type="file" name="room_image_'+i+'" class="form-control">\n' +
                '</div>\n' +
                '</div>');
        });
    </script>

@endpush

<br><br><br>


<label><h3>Hotel Amenities</h3></label>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
       <br>
        <input id="select-all" type="checkbox"><label for='select-all'> &nbsp; Select All</label>
        <br>
        <div class="row">
            @foreach($amenitie as $amenities)
                <div class="col-sm-3">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="amenitie[]" value="{{$amenities->id}}">
                            {{$amenities->name}}
                        </label>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
@push('js')
    <script>
        $("#select-all").click(function(){
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


    <button class="btn btn-primary" type="submit">Add</button>
