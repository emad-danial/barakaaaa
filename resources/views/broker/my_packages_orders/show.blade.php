@extends('broker.layouts.app')

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

                            <th scope="col">Departure Date</th>
                            <td scope="col">{{$model->departure_date}}</td>
                            <th scope="col">Return Date</th>
                            <td scope="col">{{$model->return_date}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Package Pricing</th>
                            <td scope="col">$  {{$price->price}}</td>
                            <th scope="col">City Code</th>
                            <td scope="col">{{$model->city_code}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Any Comments</th>
                            <td scope="col">{{$model->prief_travel}}</td>
                            <th scope="col">Address</th>
                            <td scope="col">{{$model->address}}</td>
                        </tr>
                          <tr>
                            
                           <th scope="col">Traveling From</th>
                            <td scope="col">{{$model->city_code}}</td>
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
                        @if($model->paid != null && $model->remaining !=null)
                         <tr>
                            
                            <th scope="col"> Paid</th>
                            <td scope="col">$  {{$model->paid}}</td>
                             <th scope="col">Outstanding</th>
                            <td scope="col">$  {{$model->remaining}}</td>
                        </tr>
                        @endif
                       
                        

                        </tbody>
                    </table>
                </div>
                
                
                
                
                       <div class="row">
                    <div class="col-lg-8">
                        <h3></h3>
                    </div>
                     <div class="col-lg-4">
                       <a class="btn btn-primary" href="{{ url('broker/my_package_orders/add/'.$id) }}" role="button"><i class="fa fa-plus"></i>Add Financial operations</a>
                    </div>
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
                                 <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                                
                            @foreach($Financialoperations as $record)

                                <tr>
                                    <td>{{$record->check_number}}</td>
                                     <td>$  {{$record->value}} </td>
                                      <td>{{$record->created_at}}</td>
                                       <td>  <div  id="{{ $record->id }}"   class="btn btn-danger deleteimg" >Delete</div></td>                
                                                      
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                     <div class="col-md-12">
                                                    <div id="success" class="alert alert-success" role="alert">
                                                        Deleting Success
                                                    </div>

                                                    <div id="error" class="alert alert-danger" role="alert">
                                                        Error On Deleting
                                                    </div>
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
                                         src="../../{{$person->passport_image}}" alt="Passport Image">
                                    </a></td>
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
        
        
        
          <script
                src="https://code.jquery.com/jquery-1.12.4.js"
                integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
                crossorigin="anonymous"></script>

        <script type="text/javascript" >
            $(document).ready(function() {
                $('#success').hide();
                $('#error').hide();
                $('.deleteimg').on('click',function(){
                    $(this).parents("tr:first").hide(300);
                    var id=$(this).attr("id");
                    var uurl='/broker/deleteFinancialoperations/'+id+'/order';
                   
                    var data = new FormData();
                    data.append('id',id);
                    $.ajax({
                        url: uurl,
                        data: data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        type: 'GET',
                        success: function(data){
                            if(data['data'] == "success" ){
                                $('#success').show(300);
                                $('#error').hide(300);
                            }else {
                                $('#error').show(300);
                                $('#success').hide(300);
                            }
                        }});

                });

            });
        </script>

        
        
        
    </section>

@endsection
