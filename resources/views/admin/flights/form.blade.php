<div class="form-group col-lg-6">
    <label for="flight_name">Flight Name  <span style="color:red"> ( * ) </span></label>
    {!! Form::text('flight_name', null , ['class' => 'form-control','placeholder'=>'Enter Flight Name','required' => 'required']) !!}
</div>


<div class="form-group col-lg-6">
    <label for="flight_company">Flight Company <span style="color:red"> ( * ) </span></label>
    {!! Form::text('flight_company', null , ['class' => 'form-control','placeholder'=>'Enter Flight Company','required' => 'required']) !!}
</div>


<div class="form-group col-lg-6">
    <label for="from_city">From City <span style="color:red"> ( * ) </span></label>
    {!! Form::text('from_city', null , ['class' => 'form-control','placeholder'=>'Enter Flight From City' ,'required' => 'required']) !!}
</div>


<div class="form-group col-lg-6">
    <label for="to_city">To City <span style="color:red"> ( * ) </span></label>
    {!! Form::text('to_city', null , ['class' => 'form-control','placeholder'=>'Enter Flight To City' ,'required' => 'required']) !!}
</div>

<div class="form-group col-lg-6">
    <label for="reservation_from">Reservation From Date <span style="color:red"> ( * ) </span></label>
    {!! Form::date('reservation_from', null , ['class' => 'form-control' ,'required' => 'required']) !!}
</div>

<div class="form-group col-lg-6">
    <label for="reservation_to">Reservation End Date <span style="color:red"> ( * ) </span></label>
    {!! Form::date('reservation_to', null , ['class' => 'form-control','required' => 'required']) !!}
</div>


<div class="form-group col-lg-6">
    <label for="is_offer">Offer Percentage (%) (optional)</label>
    <input type="number"  name="is_offer" min="0" max="100" class="form-control" placeholder="Enter Flight Offer If Exist">
    {{--{!! Form::number('is_offer', null , ['class' => 'form-control','placeholder'=>'Enter Flight Offer If Exist']) !!}--}}
</div>

<div class="form-group col-lg-6">
    <label for="is_offer">Flight Image  <span style="color: red"> Image Size (width 420 *  height 345 )</span></label>
  
    <input type="file" class="form-control-file form-control"
           name="image" required>

</div>

<div class="form-group col-lg-6">
    <label for="price">Price  Adults <span style="color:red"> ( * ) </span></label>
    <input type="number"  name="price" class="form-control" placeholder="Enter Price Adult" required>

</div>

<div class="form-group col-lg-6">
    <label for="price_ch">Price  Child <span style="color:red"> ( * ) </span></label>
    <input type="number"  name="price_ch" class="form-control" placeholder="Enter Price  Child" required>

</div>

@push('scripts')
    <script>
        CKEDITOR.replace('editor1');
    </script>
@endpush
<div class="form-group col-lg-12">
    <label for="description">  Description  <span style="color:red"> ( * ) </span></label>
    <textarea id="editor1" name="description"></textarea>
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


    <button class="btn btn-primary" type="submit">Add Flight</button>
