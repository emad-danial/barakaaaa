@extends('admin.layouts.app')

@section('page_title')
    Show Order
@endsection
@section('small_title')
    Show Order
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
                            @if($model->User->type == 'broker')
                            <th scope="col">Partner Name</th>
                            @else
                            <th scope="col">User Name</th>
                            @endif
                            <td scope="col">{{$model->User->first_name}} {{$model->User->last_name}}</td>
                            <th scope="col">User Contact</th>
                            <td scope="col">{{$model->User->mobile}}</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="col">User Email</th>
                            <td scope="col">{{$model->User->email}}</td>
                            @if($model->User->type == 'broker')
                            <th scope="col">Company's Name</th>
                            <td scope="col">{{$companyName}}</td>
                            @else
                             <th scope="col"></th>
                            <td scope="col"></td>
                            @endif
                           
                            
                        </tr>
                        <tr>

                            <th scope="col">Departure Date</th>
                            <td scope="col">{{$model->departure_date}}</td>
                            <th scope="col">Return Date</th>
                            <td scope="col">{{$model->return_date}}</td>
                        </tr>
                      
                        <tr>
                            <th scope="col">Any Comments</th>
                            <td scope="col">{{$model->prief_travel}}</td>
                            <th scope="col">Address</th>
                            <td scope="col">{{$model->address}}</td>
                        </tr>
                       
                        <tr>
                            <th scope="col">Status</th>
                            <td scope="col">{{$model->status}}</td>
                             <th scope="col">Payment Method</th>
                            <td scope="col">{{$model->payment_type}}</td>
                            
                        </tr>
                         <tr>
                            <th scope="col">Package's Name </th>
                            <td scope="col">{{$package->name}}</td>
                            <th scope="col">Room type</th>
                            <td scope="col">{{$price->name}}</td>
                           
                        </tr>
                        <tr>
                            
                            <th scope="col">Travel Alone</th>
                            <td scope="col">{{$model->travel_alone}}</td>
                             <th scope="col">Package Link</th>
                            <td scope="col"><a href="/umrah-package-details/{{$price->umarh_id}}/package">Show Package</a></td>
                            
                            
                        </tr>
                       
                          <tr>
                            <th scope="col">Package Pricing</th>
                            <td scope="col">$  {{$price->price}}</td>
                            <th scope="col">Traveling From</th>
                            <td scope="col">{{$model->city_code}}</td>
                        </tr>
                           <tr>
                            <th scope="col">Paid</th>
                            <td scope="col">
                                
                                 @if( $model->paid > 0)
                                     $ {{$model->paid}}
                                     @else
                                     0
                                     @endif
                              
                                
                            </td>
                            <th scope="col">Outstanding</th>
                            <td scope="col">
                                
                                 @if( $model->remaining >= 0)
                                         $ {{$model->remaining}}
                                          @else
                                          $ {{$price->price}}
                                         @endif
                                
                               
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                
                
                    <br>
                  <div class="row">
                    <div class="col-lg-8">
                        <h3> Financial operations</h3>
                    </div>
                     <div class="col-lg-4">
                      
                    </div>
                    
                    

                </div>
                  <div class="row">
                    <div class="col-lg-12">


                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th>Check Number</th>
                                <th> Value</th>
                                <th>Date Added</th>
                              
                            </tr>
                            </thead>
                            <tbody>
                                
                            @foreach($Financialoperations as $record)

                                <tr>
                                    <td>{{$record->check_number}}</td>
                                     <td>$  {{$record->value}} </td>
                                      <td>{{$record->created_at}}</td>
                                                 
                                                      
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    
         
                </div>
                
                   <br>
                
                
                
                
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Order Persons</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">


                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Full Name</th>
                                <th scope="col">Contact Number</th>
                                <th scope="col">Email</th>
                                <th scope="col">Zip Code</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Passport</th>
                                <th scope="col">Passport Image</th>
                                <th scope="col">Personal Image</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($persons as $person)

                                <tr>
                                    <td>{{$person->first_name}}  {{$person->last_name}} </td>
                                   <td>{{$model->contact_number}}</td>
                                    <td>{{$model->email}}</td>
                                    <td>{{$person->zip_code}}</td>
                                    <td>{{$person->gender}}</td>
                                    <td>{{$person->passport}}</td>
                                    <td><a href="../../{{$person->passport_image}}" target="_blank"> 
                                       <img class="card-img-top " style="width: 100px;height: 100px;"
                                         src="../../{{$person->passport_image}}" alt="Passport image">
                                       </a>
                                    </td>
                                    <td><a href="../../{{$person->personal_image}}" target="_blank"> 
                                       <img class="card-img-top " style="width: 100px;height: 100px;"
                                         src="../../{{$person->personal_image}}" alt="Personal Image">
                                       </a>
                                    </td>
                                    
                                    
                                      

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- ./col -->
            </div>

        </div><!-- /.container-fluid -->
    </section>

@endsection
