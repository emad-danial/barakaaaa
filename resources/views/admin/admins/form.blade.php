<div class="form-group col-lg-6">
    <label for="first_name">First Name </label>
    {!! Form::text('first_name', null , ['class' => 'form-control','placeholder'=>'Enter First Name']) !!}
</div>


<div class="form-group col-lg-6">
    <label for="last_name">Last Name</label>
    {!! Form::text('last_name', null , ['class' => 'form-control','placeholder'=>'Enter Last Name']) !!}
</div>


<div class="form-group col-lg-6">
    <label for="mobile">Mobile</label>
    {!! Form::text('mobile', null , ['class' => 'form-control','placeholder'=>'Enter Mobile']) !!}
</div>
<div class="form-group col-lg-6">
    <label for="email">Email</label>
    {!! Form::text('email', null , ['class' => 'form-control','placeholder'=>'Enter Email']) !!}
</div>

<div class="form-group col-lg-6">
    <label for="password">Password <span style="color: red"> (min 6 char) </span></label>
    <input type="password"  name="password" class="form-control" placeholder="Enter Password">

</div>
<div class="form-group col-lg-6">

        <label>Image* </label>   &nbsp;
        <input type="file" name="image" class="form-control image" required>

</div>



<div class="form-group col-lg-12">
    {!! Form::hidden('type', null , ['class' => 'form-control','id'=>'type']) !!}
</div>



@push('js')

    <script>
        $("#type").attr('value','admin');
    </script>

@endpush


<hr>
    <button class="btn btn-primary" type="submit">Add Admin</button>
