@extends('admin.layouts.app')

@section('page_title')
    Show Partner
@endsection
@section('small_title')
    Show Partner
@endsection
@section('content')

    <section class="content">
        <div class="box">
           <div class="box-body">
           <div class="row">
                <div class="col-lg-12">
                    <!-- small box -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Partner Name</th>
                                <td scope="col">{{$model->first_name}} {{$model->last_name}}</td>
                                <th scope="col">User Contact</th>
                                <td scope="col">{{$model->mobile}}</td>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="col">User Email</th>
                            <td scope="col">{{$model->email}}</td>
                            <th scope="col">Company's Name</th>
                            <td scope="col">{{$companyName}}</td>
                        </tr>
                         <tr>
                            <th scope="col">Total Umrah Sales </th>
                            <td scope="col">$  {{$umrahprice}}</td>
                            <th scope="col">Total Hajj Sales</th>
                            <td scope="col">$  {{$hajjprice}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Total sales Hajj & Umrah</th>
                            <td scope="col">$ {{$total_sales}}</td>
                            <th scope="col"> Partner commission</th>
                            <td scope="col">{{$brokercommition}}  % </td>
                        </tr>
                        
                          <tr>
                             <th scope="col"> Total commission</th>
                            <td scope="col">$  {{$tootalCom }}  </td>
                            <th scope="col">Outstanding Payments To Baraka Travel </th>
                            <td scope="col">$  {{$totalshodpaid}}</td>
                           
                        </tr>
                          <tr>
                               <th scope="col">Partner Paid</th>
                            <td scope="col">$  {{$total_paid}}</td>
                            <th scope="col">Outstanding Final Payment To Baraka Travel  </th>
                            <td scope="col">$  {{$remaining}}</td>
                          
                        </tr>
                       
                       
                            
                    
                       
                      

                       
                        

                        </tbody>
                    </table>
                </div>
                
                 <div class="row">
                    <div class="col-lg-8">
                        <h3></h3>
                    </div>
                     <div class="col-lg-4">
                      <a href="{{ url('admin/brokers/'. $id .'/add' ) }}" class="btn btn-info"><i class="fa fa-plus"></i> Add Financial Operation</a>
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
                        <h3>Hajj Orders</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">


                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th style="width:30px!important">User Name</th>
                                <th>User Contact</th>
                                <th style="width:30px!important">User Email</th>
                                <th style="width:30px!important">Package Name</th>
                                <th>Room Type</th>
                                <th>Departure Date</th>
                                <th>Return Date</th>
                                <th>Package Price</th>
                                <th>Paid</th>
                                <th>Outstanding</th>
                                <th>Status</th>
                                <th>Payment Method</th>

                                <th class="text-center">Show</th>
                            </tr>
                            </thead>
                            <tbody>
                                
                            @foreach($ordersHajj as $record)

                                <tr>
                                   
                                 
                                                        <td style="width:30px!important">{{$record->person_first_name}} {{$record->person_last_name}}</td>
                                                        <td>{{$record->contact_number}}</td>
                                                        <td style="width:30px!important">{{$record->email}}</td>
                                                         <td style="width:30px!important">{{$record->package_name}}</td>
                                                         <td>{{$record->room_name}}</td>
                                                         <td>{{$record->departure_date}}</td>
                                                        <td>{{$record->return_date}}</td>
                                                         
                                                        <td> $ {{$record->price}}</td>
                                                        <td>
                                                            @if( $record->paid >= 0)
                                                             $ {{$record->paid}}
                                                             @else
                                                             0
                                                             @endif
                                                             
                                                        </td>
                                                        <td> 
                                                         @if( $record->remaining >= 0)
                                                             $ {{$record->remaining}}
                                                              @else
                                                              $ {{$record->price}}
                                                             @endif
                                                     
                                                        
                                                        </td>
                                                        
                                                       
                                                        <td>{{$record->status}}</td>
                                                         @if($record->payment_type === 'Cashe')
                                                            <td class=" text-center">
                                                               Cash
                                                            </td>
                                                         @else
                                                          <td>{{$record->payment_type}}</td>
                                                        @endif
                                                       

                                                        <td class=" text-center">
                                                            <a class="btn btn-primary" href="{{ route('hajj_orders.show',$record->id) }}" role="button"><i class="fa fa-eye"></i></a>
                                                        </td>
                                                      
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
                
                
                
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Umrah Orders</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">


                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th style="width:30px!important">User Name</th>
                                <th>User Contact</th>
                                <th style="width:30px!important">User Email</th>
                                <th style="width:30px!important">Package Name</th>
                                <th>Room Type</th>
                                <th>Departure Date</th>
                                <th>Return Date</th>
                                <th>Package Price</th>
                                <th>Paid</th>
                                <th>Outstanding</th>
                                <th>Status</th>
                                <th>Payment Method</th>

                                <th class="text-center">Show</th>
                            </tr>
                            </thead>
                            <tbody>
                                
                            @foreach($ordersUmrh as $record)

                                <tr>
                                   
                                 
                                                        <td style="width:30px!important">{{$record->person_first_name}} {{$record->person_last_name}}</td>
                                                        <td>{{$record->contact_number}}</td>
                                                        <td style="width:30px!important">{{$record->email}}</td>
                                                         <td style="width:30px!important">{{$record->package_name}}</td>
                                                         <td>{{$record->room_name}}</td>
                                                         <td>{{$record->departure_date}}</td>
                                                        <td>{{$record->return_date}}</td>
                                                         
                                                        <td> $ {{$record->price}}</td>
                                                        <td>
                                                            @if( $record->paid >= 0)
                                                             $ {{$record->paid}}
                                                             @else
                                                             0
                                                             @endif
                                                             
                                                        </td>
                                                        <td> 
                                                         @if( $record->remaining >= 0)
                                                             $ {{$record->remaining}}
                                                              @else
                                                              $ {{$record->price}}
                                                             @endif
                                                     
                                                        
                                                        </td>
                                                        
                                                       
                                                        <td>{{$record->status}}</td>
                                                         @if($record->payment_type === 'Cashe')
                                                            <td class=" text-center">
                                                               Cash
                                                            </td>
                                                         @else
                                                          <td>{{$record->payment_type}}</td>
                                                        @endif
                                                       

                                                        <td class=" text-center">
                                                            <a class="btn btn-primary" href="{{ route('packages_orders.show',$record->id) }}" role="button"><i class="fa fa-eye"></i></a>
                                                        </td>
                                                      
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
             
                 
                
                <!-- ./col -->
            </div>
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
                    var uurl='/admin/deleteFinancialoperationsadmin/'+id+'/order';
                   
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
