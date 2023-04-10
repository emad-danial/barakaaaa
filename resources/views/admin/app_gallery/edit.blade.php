@extends('admin.layouts.app')
@section('page_title')
    Edit App Gallery
@endsection
@section('small_title')
    App Gallery
@endsection
@section('content')

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


                        <form method="post" action="{{ route('app_gallery.update', $model->id) }}"   enctype="multipart/form-data">
                            @csrf
                            @method('put')


                            <div class="form-group">

                                <select name="type" class="form-control" id="sel1">
                                    <option value="logo" @if($model->type == 'logo') selected @else @endif >Logo</option>
                                    <option value="background" @if($model->type == 'background') selected @else @endif > Background</option>

                                </select>

                            </div>


                            <div class="form-group">
                               <label>Imaeg  &nbsp; &nbsp;</label>   &nbsp; &nbsp;<span style="color: red"> Background Size (width 1275 *  height 675 )</span> &nbsp; &nbsp;  &nbsp; &nbsp;<span style="color: red"> Logo Size (width auto *  height 69 )</span>
                               
                                <input type="file" name="image" class="form-control image">
                            </div>

                            @if($model->image != null)
                                <img src="{{asset($model->image)}}" alt="000000" class="img-thumbnail" width="100px" height="100px">
                            @endif
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

