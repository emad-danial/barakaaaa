@extends('broker.layouts.app')

@section('page_title')
    Show Umrah
@endsection
@section('small_title')
    Show Umrah
@endsection
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <!-- small box -->
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Umrah Name</th>
                            <td scope="col">{{$model->name}}</td>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="col">From City</th>
                            <td scope="col">{!! $model->from_city !!}</td>
                            <th scope="col">To City</th>
                            <td scope="col">{!! $model->to_city !!}</td>
                        </tr>
                        <tr>
                            <th scope="col" >Makkah Desciption</th>
                            <td scope="col" style="width: 515px;">{!! $model->makkah_desciption !!} </td>
                            <th scope="col">Start Date</th>
                            <td scope="col">{{$model->start_date}}</td>

                        </tr>

                        <tr>

                            <th scope="col">Madina Desciption</th>
                            <td scope="col" style="width: 515px;">{!! $model->madina_desciption !!} </td>
                            <th scope="col">End Date</th>
                            <td scope="col">{{$model->end_date}}</td>

                        </tr>
                        <tr>
                            <th scope="col">Offer</th>
                            <td scope="col">
                                @if($model->is_offer > 0)
                                    {{$model->is_offer}} %
                            @else
                                0 %
                            @endif

                            </td>
                            <th scope="col">Package Type</th>
                            <td scope="col">{{$model->type}}</td>
                        </tr>



                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Umrah Pricing</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9">


                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Number Name</th>
                                <th scope="col">Number Per Room</th>
                                <th scope="col">Price</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($umarhPricies as $price)

                                <tr>
                                    <td>{{$price->name}}</td>
                                    <td>{{$price->number_per_room}}</td>
                                    <td>{{$price->price}}</td>


                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Umrah Days Description</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">


                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Day Name </th>
                                <th scope="col">Day Description</th>
                                <th scope="col">Day number</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($umarhDays as $day)

                                <tr>
                                    <td>{{$day->name}}</td>
                                    <td>{{$day->desciption}}</td>
                                    <td>{{$day->day_number}}</td>


                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <h3>Umrah Details</h3>
                    </div>

                        <div class="col-lg-3">
                            <div class="card" >
                                <div class="card-body">
                                    <h4 class="card-title">Included</h4>
                                    <p class="card-text">{!! $umarhDetails->included !!}</p>

                                </div>
                            </div>
                        </div> <div class="col-lg-3">
                            <div class="card" >
                                <div class="card-body">
                                    <h4 class="card-title">Not Included</h4>
                                    <p class="card-text">{!! $umarhDetails->not_selected !!}</p>

                                </div>
                            </div>
                        </div> <div class="col-lg-3">
                            <div class="card" >
                                <div class="card-body">
                                    <h4 class="card-title">Important Notes</h4>
                                    <p class="card-text">{!! $umarhDetails->important_notes !!}</p>

                                </div>
                            </div>
                        </div> <div class="col-lg-3">
                            <div class="card" >
                                <div class="card-body">
                                    <h4 class="card-title">How To Book</h4>
                                    <p class="card-text">{!! $umarhDetails->how_to_book !!}</p>

                                </div>
                            </div>
                        </div>


                </div>

                <div class="row">
                    <div class="col-lg-10">
                        <h3>Umrah Includes</h3>
                    </div>
                    <div class="col-lg-12">


                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th style = "width: 105px;" scope="col">Include Name</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($include as $includes)
                                <tr>
                                @foreach($umrahHaagIncludes as $umrahHaagInclude)
                                    @if($umrahHaagInclude->packages_includes_id == $includes->id)
                                             <td>
                                                <img src="../../{{$includes->icon}}" alt="000000" class="img-thumbnail" width="50px" height="50px" >
                                             </td>
                                             
                                             <td>{{$includes->name}} </td>

                                    @endif
                                @endforeach
                            @endforeach

                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-10"></div>
                        <div class="col-lg-2">
                        <a  href="/umrah-package-details/{{$model->id}}/{{$model->name}}" class="btn btn-primary">Show More Details</a>
                    </div>
                </div>
                <!-- ./col -->
            </div>

        </div><!-- /.container-fluid -->
    </section>

@endsection
