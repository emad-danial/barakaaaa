@extends('admin.layouts.app')
@section('content')
@section('page_title')
    Settings
@endsection
@section('small_title')
    Setting
@endsection
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Setting</h3>
        </div>
            @include('flash::message')
            @include('partials.validations_errors')
            <!-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                            title="Remove">
                        <i class="fa fa-times"></i></button> -->
            <div class="box-body">
                <form action="{{route('settings.update')}}" method="POST"  enctype="multipart/form-data">
                    {{ csrf_field()}}
                      <div class="form-group row">
                      <div class="col-md-4">
                        <label for="phone">Phone 1</label>
                        <input type="text" class="form-control" name="phone"  value="{{$settings->phone}}">
                      </div>
                        <div class="col-md-4">
                        <label for="phone1">Phone 2</label>
                        <input type="text" class="form-control" name="phone1"  value="{{$settings->phone1}}">
                      </div>
                        <div class="col-md-4">
                        <label for="phone2">Phone 3</label>
                        <input type="text" class="form-control" name="phone2"  value="{{$settings->phone2}}">
                      </div>
                    </div>
                      <div class="form-group">
                        <label for="emailwebsite">Email Website</label>
                        <input type="emailwebsite" class="form-control" name="emailwebsite"  value="{{$settings->emailwebsite}}">
                    </div>
                     <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email"  value="{{$settings->email}}">
                    </div>


                       @push('scripts')
                        <script>
                            CKEDITOR.replace('description');
                        </script>
                    @endpush
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" rows="3">{{$settings->description}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="facebook_link">Facebook Link</label>
                        <input type="text" class="form-control" name="facebook_link"  value="{{$settings->facebook_link}}">
                    </div>


                    <div class="form-group">
                        <label for="twitter_link">Twitter Link</label>
                        <input type="text" class="form-control" name="twitter_link"  value="{{$settings->twitter_link}}">
                    </div>

                    <div class="form-group">
                        <label for="youtube_link">Youtube Link</label>
                        <input type="text" class="form-control" name="youtube_link"  value="{{$settings->youtube_link}}">
                    </div>

                    <div class="form-group">
                        <label for="google_plus_link">Google Plus Link</label>
                        <input type="text" class="form-control" name="google_plus_link"  value="{{$settings->google_plus_link}}">
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address"  value="{{$settings->address}}">
                    </div>

                    <div class="form-group">
                        <label for="linkedin_link">Linkedin Link</label>
                        <input type="text" class="form-control" name="linkedin_link"  value="{{$settings->linkedin_link}}">
                    </div>
                    
                    
                        <div class="form-group">
                        <label for="UMARH_UPDATE_INFORMATION_TITLE">UMARH UPDATE INFORMATION TITLE</label>
                        <input type="text" class="form-control" name="UMARH_UPDATE_INFORMATION_TITLE"  value="{{$settings->UMARH_UPDATE_INFORMATION_TITLE}}">
                    </div>

                    @push('scripts')
                        <script>
                            CKEDITOR.replace('UMARH_UPDATE_INFORMATION_DESCRIPTION');
                        </script>
                    @endpush

                    <div class="form-group">
                        <label for="UMARH_UPDATE_INFORMATION_DESCRIPTION">UMARH UPDATE INFORMATION DESCRIPTION</label>
                        <textarea name="UMARH_UPDATE_INFORMATION_DESCRIPTION" class="form-control" rows="3">{{$settings->UMARH_UPDATE_INFORMATION_DESCRIPTION}}</textarea>
                    </div>

                    
                    
                    
                     <div class="form-group">
                        <label for="about_us">About Us</label>
                        <input type="text" class="form-control" name="about_us"  value="{{$settings->about_us}}">
                    </div>

                    @push('scripts')
                        <script>
                            CKEDITOR.replace('about_us_description');
                        </script>
                    @endpush

                    <div class="form-group">
                        <label for="about_us_description">About Us Description</label>
                        <textarea name="about_us_description" class="form-control" rows="3">{{$settings->about_us_description}}</textarea>
                    </div>

                    @push('scripts')
                        <script>
                            CKEDITOR.replace('policy_terms');
                        </script>
                    @endpush
                    <div class="form-group">
                        <label for="policy_terms">Policy Terms</label>
                        <textarea name="policy_terms" class="form-control" rows="3">{{$settings->policy_terms}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="home_top_umarh">Home Top Umarh</label>
                        <textarea name="home_top_umarh" class="form-control" rows="3">{{$settings->home_top_umarh}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="home_top_hajj">Home Top Hajj</label>
                        <textarea name="home_top_hajj" class="form-control" rows="3">{{$settings->home_top_hajj}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="home_top_stopOver">Home Top StopOver</label>
                        <textarea name="home_top_stopOver" class="form-control" rows="3">{{$settings->home_top_stopOver}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="home_top_visit">Home Top Visit</label>
                        <textarea name="home_top_visit" class="form-control" rows="3">{{$settings->home_top_visit}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="home_top_hotels">Home Top Hotels</label>
                        <textarea name="home_top_hotels" class="form-control" rows="3">{{$settings->home_top_hotels}}</textarea>
                    </div>
                     <div class="form-group">
                        <label for="home_top_flights">Home Top Flights</label>
                        <textarea name="home_top_flights" class="form-control" rows="3">{{$settings->home_top_flights}}</textarea>
                    </div>
                     <div class="form-group">
                        <label for="cover_title">Cover Title</label>
                        <input type="text" class="form-control" name="cover_title"  value="{{$settings->cover_title}}">
                    </div>
                     <div class="form-group">
                        <label for="cover_description">Cover Description</label>
                        <input type="text" class="form-control" name="cover_description"  value="{{$settings->cover_description}}">
                    </div>
                    
                     <div class="form-group">
                        <label for="location_google_map">Lacation Google Map</label>
                        <textarea name="location_google_map" class="form-control" rows="3">{{$settings->location_google_map}}</textarea>
                    </div>
                    
                    

                    <button type="submit" class="btn btn-primary btn-lg">Update</button>
                </form>
            </div>
            <!-- /.box-body -->
        </div>
    </section>
    <!-- /.content -->
@endsection
