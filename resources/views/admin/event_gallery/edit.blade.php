@extends('admin.layouts.app')
@section('page_title')
    Edit Event
@endsection
@section('small_title')
    Events
@endsection
@section('style')

    <style>
        .card {
            border: 1px solid #e7e7e7;
            border-radius: 5px;
            text-align: center;
            padding: 5px;
        }
        .card-img-top{
            margin:auto;
        }

        #addImage {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }
        #addVideo {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }
    </style>
@endsection
@section('content')
 <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit App Gallery</h3>
            </div>
            <div class="box-body">
                    @include('flash::message')
                    <div>


                        <form method="post" action="{{ route('events.update', $model->id) }}"   enctype="multipart/form-data">
                            @csrf
                            @method('put')


                        <div class="form-group col-lg-12">
                            <label for="title">Title <span style="color:red"> ( * ) </span></label>
                            {!! Form::text('title', $model->title , ['class' => 'form-control','placeholder'=>'Enter Title','required' => 'required']) !!}
                        </div>

                        @push('scripts')
                            <script>
                                CKEDITOR.replace('editor1');
                            </script>
                        @endpush
                        <div class="form-group col-lg-12">
                            <label for="description"> Description <span style="color:red"> ( * ) </span></label>
                            <textarea id="editor1" name="description">{{$model->description}}</textarea>
                        </div>
<h2>Images & Videos</h2>

  <div class="form-group col-lg-12">
                            <div class="row" id="imagesContainer">
                             @if(isset($files) && count($files) > 0)
                                @foreach($files as $file)
                                @if($file->type == 'image')
                                <div class="col-lg-2 card">
                                    <img src="{{url('/').'/'.$file->file}}" width="230" height="150" class="card-img-top" alt="..."><div class="card-body">
                                    <br>
                                    <button type="button" class="btn btn-danger"  onclick="deleteFile(this)"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </div>
                                    <input type="hidden" name="images[]" value="{{$file->file}}">
                                    </div>
                                @else
                                <div class="col-lg-2 card">
<video width="230" height="150" controls=""><source src="{{url('/').'/'.$file->file}}" type="video/mp4"><source src="{{url('/').'/'.$file->file}}" type="video/ogg">Your browser does not support the video tag.</video><div class="card-body">
<br>
<button type="button" class="btn btn-danger"  onclick="deleteFile(this)"><i class="fa fa-trash" aria-hidden="true"></i></button>
</div>
<input type="hidden" name="videos[]" value="{{$file->file}}">
</div>
                                @endif
                                @endforeach
                            @endif
                            </div>
                        </div>

                           <hr>
                        <div class="col-lg-2 card">
                            <div class="cardimgtopadd show">
                            <br>    
                            <i class="fa fa-image fa-2x"></i></div>
                            <img src="{{Request::root()}}/uploads/Loading_icon.gif" width="80" height="50" class="card-img-top  cardimgtopload hide"
                                 alt="...">
                            <div class="card-body">
                                <h3 class="card-title">Add Image</h3>
                            </div>
                            <input type="file" name="image" id="addImage" accept="image/*">
                        </div>
                        <div class="col-lg-2 card">
                            <div class="cardvidtopadd show">
                            <br>    
                            <i class="fa fa-film fa-2x"></i></div>
                            <img src="{{Request::root()}}/uploads/Loading_icon.gif" width="80" height="50" class="card-img-top  cardvidtopload hide"
                                 alt="...">
                            <div class="card-body">
                                <h3 class="card-title">Add Video</h3>
                            </div>
                            <input type="file" name="video" id="addVideo" accept="video/*">
                        </div>
                        
                        <br>
                        <hr>

                                <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>

                        </form><!-- end of form -->

                    </div>
                    <!-- /.box-body -->

            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
@push('js')
    <script>
          var base_url = window.location.origin;
        $(document).ready(function () {
           
            $("#addImage").change(function () {
                $(".cardimgtopadd").removeClass('show');
                $(".cardimgtopadd").addClass('hide');
                $(".cardimgtopload").removeClass('hide');
                $(".cardimgtopload").addClass('show');
                
                let formData = new FormData();
                formData.append('file', $('#addImage')[0].files[0]);
                $.ajax({
                    url: "{{url('/admin/event/addImage')}}",
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    processData: false,
                    success: function (response) {

                        if (response.status == 'success') {
                             $("#imagesContainer").append(
                                '<div class="col-lg-2 card">\n' +
                                '<img src="'+base_url+'/'+response.file_name+'" width="230" height="150" class="card-img-top" alt="...">'+
                                '<div class="card-body">\n' +
                                '<br>\n' +
                                '<button type="button" class="btn btn-danger" onclick="deleteFile(this)"><i class="fa fa-trash" aria-hidden="true"></i></button>\n' +
                                '</div>\n' +
                                '<input type="hidden" name="images[]" value="'+response.file_name+'">\n' +
                                '</div>\n' 
                              );
                        $(".cardimgtopload").removeClass('show');
                        $(".cardimgtopload").addClass('hide');
                        $(".cardimgtopadd").removeClass('hide');
                        $(".cardimgtopadd").addClass('show');
                
                        }
                        else {
                            alert("error ", response.status)
                        }
                    },
                    error: function (response) {
                        $(".cardimgtopload").removeClass('show');
                        $(".cardimgtopload").addClass('hide');
                        $(".cardimgtopadd").removeClass('hide');
                        $(".cardimgtopadd").addClass('show');
                        alert('error in choose');
                    }
                });

            });
          
            $("#addVideo").change(function () {
                $(".cardvidtopadd").removeClass('show');
                $(".cardvidtopadd").addClass('hide');
                $(".cardvidtopload").removeClass('hide');
                $(".cardvidtopload").addClass('show');
              
                let formData = new FormData();
                formData.append('file', $('#addVideo')[0].files[0]);
                $.ajax({
                    url: "{{url('/admin/event/addVideo')}}",
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    processData: false,
                    success: function (response) {
                        if (response.status == 'success') {
                          $("#imagesContainer").append(
                                '<div class="col-lg-2 card">\n' +
                               '<video width="230" height="150" controls>'+
                               '<source src="'+base_url+'/'+response.file_name+'" type="video/mp4">'+
                               '<source src="'+base_url+'/'+response.file_name+'" type="video/ogg">'+
                               'Your browser does not support the video tag.'+
                               '</video>'+
                                '<div class="card-body">\n' +
                                '<br>\n' +
                                '<button type="button" class="btn btn-danger" onclick="deleteFile(this)"><i class="fa fa-trash" aria-hidden="true"></i></button>\n' +
                                '</div>\n' +
                                '<input type="hidden" name="videos[]" value="'+response.file_name+'">\n' +
                                '</div>\n' 
                         );
                        $(".cardvidtopload").removeClass('show');
                        $(".cardvidtopload").addClass('hide');
                        $(".cardvidtopadd").removeClass('hide');
                        $(".cardvidtopadd").addClass('show');
                
                        }
                        else {
                            alert("error ", response.status)
                        }
                    },
                    error: function (response) {
                        $(".cardvidtopload").removeClass('show');
                        $(".cardvidtopload").addClass('hide');
                        $(".cardvidtopadd").removeClass('hide');
                        $(".cardvidtopadd").addClass('show');
                        alert('error in choose');
                    }
                });

            });
          
        });
        function deleteFile(el){
            console.log("ddds",el)
            el.parentNode.parentNode.remove();
           }
    </script>
@endpush

