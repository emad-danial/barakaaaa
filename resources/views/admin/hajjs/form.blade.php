<div class="form-group col-lg-6">
    <label for="name">Hajj Name </label>
    {!! Form::text('name', null , ['class' => 'form-control','placeholder'=>'Enter Hajj Name']) !!}
</div>


<div class="form-group col-lg-6">
    <label for="location">Hajj Location</label>
    {!! Form::text('location', null , ['class' => 'form-control','placeholder'=>'Enter Map From Google Map']) !!}
</div>


@push('scripts')
    <script>
        CKEDITOR.replace('from_city');
    </script>
@endpush
<div class="form-group col-lg-6">
    <label for="from_city">From City</label>
    <textarea id="from_city" name="from_city" ></textarea>
</div>

@push('scripts')
    <script>
        CKEDITOR.replace('to_city');
    </script>
@endpush
<div class="form-group col-lg-6">
    <label for="to_city">To City</label>
    <textarea id="to_city" name="to_city"></textarea>
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
    <input type="number"  name="is_offer" class="form-control" placeholder="Enter Hajj Offer If Exist">
    {{--{!! Form::number('is_offer', null , ['class' => 'form-control','placeholder'=>'Enter Hajj Offer If Exist']) !!}--}}
</div>

@push('scripts')
    <script>
        CKEDITOR.replace('editor1');
    </script>
@endpush
<div class="form-group col-lg-6">
    <label for="makkah_desciption">Land One<span style="color: red"></span></label>
    <textarea id="editor1" name="makkah_desciption"></textarea>
</div>


@push('scripts')
    <script>
        CKEDITOR.replace('editor2');
    </script>
@endpush
<div class="form-group col-lg-6">
    <label for="madina_desciption">Land Two<span style="color: red"></span></label>
    <textarea id="editor2" name="madina_desciption"></textarea>
</div>




@push('scripts')
    <script>
        CKEDITOR.replace('editorrituals');
    </script>
@endpush
<div class="form-group col-lg-6">
    <label for="rituals">MANSIK MUNA & ARFAT</label>
    <textarea id="editorrituals" name="rituals"></textarea>
</div>


@push('scripts')
    <script>
        CKEDITOR.replace('editorflighting');
    </script>
@endpush
<div class="form-group col-lg-6">
    <label for="flighting">Airlines</label>
    <textarea id="editorflighting" name="flighting"></textarea>
</div>




<div class=" col-lg-6">
    <label for="is_active" style="margin-top: 20px"
           class="">Activation</label>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5" style="display: inline">
                {!! Form::radio('is_active', 'active', true) !!} active
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5" style="display: inline">
                {!! Form::radio('is_active', 'dsiactive') !!} dsiactive
            </div>
        </div>
    </div>
</div>

<div class=" col-lg-6">
    <label for="gender" style="margin-top: 20px"
           class="">Hajj Type</label>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5" style="display: inline">
                <input type="radio"  name="type" value="regular" checked onclick="changeDisplayCityTransetNone();"> Regular
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5" style="display: inline">
                <input type="radio"  name="type" value="stop_over" onclick="changeDisplayCityTransetblock();"> Stop Over
            </div>
        </div>
    </div>
</div>
<div class="row" id="city_transit_div">
    <div class="form-group col-lg-4">
        <label for="city_transit">Stop Over City</label>
        {!! Form::text('city_transit', null , ['class' => 'form-control','placeholder'=>'Enter Stop Over City']) !!}
    </div>
    <div class="form-group col-lg-4">
        <label for="start_date_transit">Stop Over Start Date</label>
        {!! Form::date('start_date_transit', null , ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-lg-4">
        <label for="end_date_transit">Stop Over End Date</label>
        {!! Form::date('end_date_transit', null , ['class' => 'form-control']) !!}
    </div>

    @push('scripts')
        <script>
            CKEDITOR.replace('editorcity');
        </script>
    @endpush
    <div class="form-group col-lg-12">
        <label for="description_transit">Stop Over Description</label>
        <textarea id="editorcity" name="description_transit" ></textarea>
    </div>

</div>

<label for="files"><h3> Hajj Gallery</h3></label>

<div class="banner_content row" style="margin-top: 10px">
    <div class="col-lg-12">
        <div class="mt-12">
   <h4 style="color: red"> Image Size (width 1110 *  height 440 )</h4>
            <input type="file" class="form-control-file form-control"
                   name="files[]" multiple="multiple">
            {{--@foreach($model->umarhGalleries as $file)--}}
                {{--<label>--}}
                    {{--<img src="{{Storage::url($file->file)}}" alt="000000"--}}
                         {{--class="img-thumbnail"--}}
                         {{--style="width: 50px;height: 50px;margin: 10px 0 20px 10px">--}}
                {{--</label>--}}
            {{--@endforeach--}}
        </div>
    </div>
</div>
<br>

<label><h3>Hajj Days Description</h3></label>

<div id="container22">
    <div class="row">
        <div class="form-group col-lg-4">
            <label for="day_name_1">Day Name </label>
            {!! Form::text("day_name_1", null , ["class" => "form-control"]) !!}
        </div>
        <div class="form-group col-lg-4">
            <label for="day_desciption_1">Day Description </label>
            {!! Form::text("day_desciption_1", null , ["class" => "form-control"]) !!}
        </div>
        <div class="form-group col-lg-4">
            <label for="day_number_1">Day number </label>
            {!! Form::number("day_number_1", null , ["class" => "form-control"]) !!}
        </div>
    </div>
</div>
{!! Form::hidden('dayes_count', null , ['class' => 'form-control', 'id' => 'dayes_count']) !!}
<br>

<a class="btn btn-info" id="somebutton">Click To Add New Day</a>
<br>

@push('js')

    <script>
 $("#dayes_count").attr('value',1);
        $('#city_transit_div').css('display', 'none');
        function changeDisplayCityTransetNone(){
            $('#city_transit_div').css('display', 'none');
        }
        function changeDisplayCityTransetblock(){
            $('#city_transit_div').css('display', 'block');
        }

        $("#package_type").attr('value','hajj');
        var i=1;
        $("#somebutton").click(function () {
            i++;
            $("#dayes_count").attr('value',i);

            $("#container22").append('\n' +
                '<div class="row">\n' +
                '<div class="form-group col-lg-4">\n' +
                '    <label for="day_name_'+i+'">Day Name </label>\n' +
                '    <input type="text" name="day_name_'+i+'" class="form-control">\n' +
                '</div>\n' +
                '\n' +
                '<div class="form-group col-lg-4">\n' +
                '    <label for="day_desciption_'+i+'">Day Description </label>\n' +
                '    <input type="text" name="day_desciption_'+i+'" class="form-control">\n' +
                '</div>\n' +
                '\n' +
                '<div class="form-group col-lg-4">\n' +
                '    <label for="day_number_'+i+'">Day Number </label>\n' +
                '    <input type="number" name="day_number_'+i+'" class="form-control">\n' +
                '</div>\n' +
                '</div>');
        });
    </script>

@endpush


<label><h3>Hajj Pricing</h3></label>

<div id="containerprice">
    <div class="row">
        <div class="form-group col-lg-4">
            <label for="price_name_1">Number Name </label>
            {!! Form::text("price_name_1", null , ["class" => "form-control"]) !!}
        </div>
        <div class="form-group col-lg-4">
            <label for="number_per_room_1">Number Per Room </label>
            {!! Form::number("number_per_room_1", null , ["class" => "form-control"]) !!}
        </div>
        <div class="form-group col-lg-4">
            <label for="price_1">Price</label>
            {!! Form::number("price_1", null , ["class" => "form-control"]) !!}
        </div>
    </div>
</div>
{!! Form::hidden('price_count', null , ['class' => 'form-control', 'id' => 'price_count']) !!}
<br>

<a class="btn btn-info" id="somebuttonprice">Click To Add New Price</a>
<br>

@push('js')

    <script>
     $("#price_count").attr('value',1);
        var p=1;
        $("#somebuttonprice").click(function () {
            p++;
            $("#price_count").attr('value',p);

            $("#containerprice").append('\n' +
                '<div class="row">\n' +
                '<div class="form-group col-lg-4">\n' +
                '    <label for="price_name_'+p+'">Number Name </label>\n' +
                '    <input type="text" name="price_name_'+p+'" class="form-control">\n' +
                '</div>\n' +
                '\n' +
                '<div class="form-group col-lg-4">\n' +
                '    <label for="number_per_room_'+p+'">Number Per Room</label>\n' +
                '    <input type="number" name="number_per_room_'+p+'" class="form-control">\n' +
                '</div>\n' +
                '\n' +
                '<div class="form-group col-lg-4">\n' +
                '    <label for="price_'+p+'">Price</label>\n' +
                '    <input type="number" name="price_'+p+'" class="form-control">\n' +
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
    <textarea id="included" name="included"></textarea>
</div>


@push('scripts')
    <script>
        CKEDITOR.replace('not_selected');
    </script>
@endpush
<div class="form-group col-lg-6">
    <label for="not_selected">Not Included</label>
    <textarea id="not_selected" name="not_selected"></textarea>
</div>


@push('scripts')
    <script>
        CKEDITOR.replace('important_notes');
    </script>
@endpush
<div class="form-group col-lg-6">
    <label for="important_notes">Important Notes</label>
    <textarea id="important_notes" name="important_notes"></textarea>
</div>


@push('scripts')
    <script>
        CKEDITOR.replace('how_to_book');
    </script>
@endpush
<div class="form-group col-lg-6">
    <label for="how_to_book">How To Book</label>
    <textarea id="how_to_book" name="how_to_book"></textarea>
</div>


<label><h3>Hajj Includes</h3></label>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
       <br>
        <input id="select-all" type="checkbox"><label for='select-all'> &nbsp; Select All</label>
        <br>
        <div class="row">
            @foreach($include as $includes)
                <div class="col-sm-3">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="include[]" value="{{$includes->id}}">
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
                        <label for="meta_keywords">Meta Keywords <span style="opacity: .8 ;color: #888888">(EX: baraka , Travel , Umra  ) -> all words separated with ',' </span></label>
                        {!! Form::text('meta_keywords', null , ['class' => 'form-control','placeholder'=>'Enter Meta Keywords SEO Meta Title']) !!}
                    </div>
                    <div class="form-group col-lg-12">
                        <label for="meta_description">Meta Description</label>
                        {!! Form::text('meta_description', null , ['class' => 'form-control','placeholder'=>'Enter Meta Description SEO Meta Title']) !!}
                    </div>

    <button class="btn btn-primary" type="submit">Add</button>
