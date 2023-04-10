<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">

    {{--    @if(auth()->user()->hasRole('admin'))--}}

    <li class="treeview {{ active_menu('dashboard')[0] }}">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
<i class="fa fa-angle-right pull-right"></i>
</span>
        </a>
        <ul class="treeview-menu" style="{{ active_menu('dashboard')[1] }}">
            <li><a href="{{url('/admin')}}"><i class="fa fa-circle-o"></i>Dashboard</a></li>
            <li><a href="{{url('/admin/settings')}}"><i class="fa fa-circle-o"></i>Settings</a></li>
             <li><a href="{{ url('admin/contact_us') }}"><i
                            class="fa fa-circle-o"></i>Contact Us</a>
            </li>
             <li><a href="{{ url('admin/rates') }}"><i
                            class="fa fa-circle-o"></i>Rates</a>
            </li>

        </ul>
    </li>
    
    <li class="treeview {{ active_menu('faqs')[0] }}">
        <a href="#">
            <i class="fa fa-question"></i> <span>FAQ Page</span>
            <span class="pull-right-container">
<i class="fa fa-angle-right pull-right"></i>
</span>
        </a>
        <ul class="treeview-menu" style="{{ active_menu('faqs')[1] }}">
            <li><a href="{{ url('admin/faqs') }}"><i
                            class="fa fa-circle-o"></i>FAQ Page</a>
            </li>
            <li><a href="{{ url(route('faqs.create')) }}"><i
                            class="fa fa-circle-o"></i> Add FAQ
                </a></li>
        </ul>
    </li>
   
    
      <li class="treeview {{ active_menu('app_gallery')[0] }}">
        <a href="#">
            <i class="fa fa-photo"></i> <span>Slider & Logos </span>
            <span class="pull-right-container">
<i class="fa fa-angle-right pull-right"></i>
</span>
        </a>
        <ul class="treeview-menu" style="{{ active_menu('app_gallery')[1] }}">
            <li ><a href="{{ url('admin/app_gallery') }}"><i
                            class="fa fa-circle-o">&nbsp; &nbsp; &nbsp; &nbsp;</i>Slider & Logos </a>
            </li>
            <li><a href="{{ url(route('app_gallery.create')) }}"><i
                            class="fa fa-circle-o"></i> Add Slider & Logos 
                </a></li>
        </ul>
    </li>

 <li class="treeview {{ active_menu('event')[0] }}">
        <a href="#">
            <i class="fa fa-calendar"></i> <span>Event Gallery</span>

            <span class="pull-right-container">
<i class="fa fa-angle-right pull-right"></i>
</span>
        </a>
        <ul class="treeview-menu" style="{{ active_menu('event')[1] }}">
            <li><a href="{{ url('admin/events') }}"><i
                            class="fa fa-circle-o">&nbsp; &nbsp; &nbsp; &nbsp;</i>Events </a>
            </li>
            <li><a href="{{ url(route('events.create')) }}"><i
                            class="fa fa-circle-o"></i> Add Event
                </a></li>
        </ul>
    </li>



    <li class="treeview {{ active_menu('umrahs')[0] }}">
        <a href="#">
            <i class="fa fa-moon-o"></i> <span>Umrah Packages</span>
            <span class="pull-right-container">
<i class="fa fa-angle-right pull-right"></i>
</span>
        </a>
        <ul class="treeview-menu" style="{{ active_menu('umrahs')[1] }}">
            <li><a href="{{ url('admin/umrahs') }}"><i
                            class="fa fa-circle-o"></i>Umrah Packages</a>
            </li>
            <li><a href="{{ url('admin/umrahs/create') }}"><i
                            class="fa fa-circle-o"></i> Add Umrah Package
                </a></li>
                 

        </ul>
    </li>
    <li class="treeview {{ active_menu('hajjs')[0] }}">
        <a href="#">
            <i class="fa fa-file"></i> <span>Hajj Packages</span>
            <span class="pull-right-container">
<i class="fa fa-angle-right pull-right"></i>
</span>
        </a>
        <ul class="treeview-menu" style="{{ active_menu('hajjs')[1] }}">
            <li><a href="{{ url('admin/hajjs') }}"><i
                            class="fa fa-circle-o"></i>Hajj Packages</a>
            </li>
            <li><a href="{{ url('admin/hajjs/create') }}"><i
                            class="fa fa-circle-o"></i> Add Hajj Package
                </a></li>
        </ul>
    </li>

    <li class="treeview {{ active_menu('hotels')[0] }}">
        <a href="#">
            <i class="fa fa-building"></i> <span>Hotel Packages</span>
            <span class="pull-right-container">
<i class="fa fa-angle-right pull-right"></i>
</span>
        </a>
        <ul class="treeview-menu" style="{{ active_menu('hotels')[1] }}">
            <li><a href="{{ url('admin/hotels') }}"><i
                            class="fa fa-circle-o"></i>Hotels</a>
            </li>
            <li><a href="{{ url('admin/hotels/create') }}"><i
                            class="fa fa-circle-o"></i> Add Hotel
                </a>
            </li>
            

        </ul>
    </li>

    <li class="treeview {{ active_menu('flights')[0] }}">
        <a href="#">
            <i class="fa fa-plane"></i> <span>Flight Packages</span>
            <span class="pull-right-container">
<i class="fa fa-angle-right pull-right"></i>
</span>
        </a>
        <ul class="treeview-menu" style="{{ active_menu('flights')[1] }}">
            <li><a href="{{ url('admin/flights') }}"><i
                            class="fa fa-circle-o"></i>Flights</a>
            </li>

            <li><a href="{{ url('admin/flights/create') }}"><i
                            class="fa fa-circle-o"></i> Add Flight
                </a></li>
             
        </ul>
    </li>


   

    <li class="treeview {{ active_menu('packages_orders')[0] }}">
        <a href="#">
            <i class="fa fa-first-order"></i> <span>Umrah Orders </span>
            <span class="pull-right-container">
<i class="fa fa-angle-right pull-right"></i>
</span>
        </a>
        <ul class="treeview-menu" style="{{ active_menu('packages_orders')[1] }}">
            <li>
                <a href="{{ url('admin/packages_orders/pendingOrderUmrah') }}"><i
                            class="fa fa-circle-o"></i>Umrah New Orders
                </a>
                <a href="{{ url('admin/packages_orders/inProcessOrderUmrah') }}"><i
                            class="fa fa-circle-o"></i>Umrah In Process Orders
                </a>
                <a href="{{ url('admin/packages_orders/completeOrderUmrah') }}"><i
                            class="fa fa-circle-o"></i>Umrah Complete Orders
                </a>
                <a href="{{ url('admin/packages_orders/cancelOrderUmrah') }}"><i
                            class="fa fa-circle-o"></i>Umrah Cancel Orders
                </a>
                
                 <a href="{{ url('admin/packages_orders/brokersOrdersrUmrah') }}"><i
                            class="fa fa-circle-o"></i>Umrah Partner Orders
                </a>

            </li>

        </ul>
    </li>
    <li class="treeview {{ active_menu('hajj_orders')[0] }}">
        <a href="#">
            <i class="fa fa-first-order"></i> <span>Hajj Orders </span>
            <span class="pull-right-container">
<i class="fa fa-angle-right pull-right"></i>
</span>
        </a>
        <ul class="treeview-menu" style="{{ active_menu('hajj_orders')[1] }}">
            <li>
                <a href="{{ url('admin/hajj_orders/pendingOrderHajj') }}"><i
                            class="fa fa-circle-o"></i>Hajj New Orders
                </a>
                <a href="{{ url('admin/hajj_orders/inProcessOrderHajj') }}"><i
                            class="fa fa-circle-o"></i>Hajj In Process Orders
                </a>
                <a href="{{ url('admin/hajj_orders/completeOrderHajj') }}"><i
                            class="fa fa-circle-o"></i>Hajj Complete Orders
                </a>
                <a href="{{ url('admin/hajj_orders/cancelOrderHajj') }}"><i
                            class="fa fa-circle-o"></i>Hajj Cancel Orders
                </a>
                
                 <a href="{{ url('admin/hajj_orders/brokersOrdersrHajj') }}"><i
                            class="fa fa-circle-o"></i>Hajj Partner Orders
                </a>

            </li>

        </ul>
    </li>
    
    
     <li class="treeview {{ active_menu('order_h')[0] }}">
        <a href="#">
            <i class="fa fa-first-order"></i> <span>Hotels Orders </span>
            <span class="pull-right-container">
<i class="fa fa-angle-right pull-right"></i>
</span>
        </a>
        <ul class="treeview-menu" style="{{ active_menu('order_h')[1] }}">
            <li>
               <a href="{{ url('admin/order_h/pending') }}"><i
                            class="fa fa-circle-o"></i>Hotel New Orders</a>
           <a href="{{ url('admin/order_h/in_process') }}"><i
                            class="fa fa-circle-o"></i>Hotel In Process Orders</a>
            <a href="{{ url('admin/order_h/complete') }}"><i
                            class="fa fa-circle-o"></i>Hotel Complete Orders</a>
            <a href="{{ url('admin/order_h/cancel') }}"><i
                            class="fa fa-circle-o"></i>Hotel Cancel Orders</a>
          

            </li>

        </ul>
    </li>
    
      <li class="treeview {{ active_menu('f_orders')[0] }}">
        <a href="#">
            <i class="fa fa-first-order"></i> <span>Flights Orders </span>
            <span class="pull-right-container">
<i class="fa fa-angle-right pull-right"></i>
</span>
        </a>
        <ul class="treeview-menu" style="{{ active_menu('f_orders')[1] }}">
            <li>
             <a href="{{ url('admin/f_orders/pending') }}"><i
                            class="fa fa-circle-o"></i>Flight New Orders</a>
          <a href="{{ url('admin/f_orders/in_process') }}"><i
                            class="fa fa-circle-o"></i>Flight In Process Orders</a>
           <a href="{{ url('admin/f_orders/complete') }}"><i
                            class="fa fa-circle-o"></i>Flight Complete Orders</a>
            <a href="{{ url('admin/f_orders/cancel') }}"><i
                            class="fa fa-circle-o"></i>Flight Cancel Orders</a>
           
            </li>

        </ul>
    </li>
    
     <li class="treeview {{ active_menu('packages_views')[0] }}">
        <a href="#">
            <i class="fa fa-eye"></i> <span>Pages Views</span>
            <span class="pull-right-container">
<i class="fa fa-angle-right pull-right"></i>
</span>
        </a>
        <ul class="treeview-menu" style="{{ active_menu('packages_views')[1] }}">
            <li>
                <a href="{{ url('admin/packages_views/umrah') }}"><i
                            class="fa fa-circle-o"></i>Umrah Views</a>
                <a href="{{ url('admin/packages_views/hajj') }}"><i
                            class="fa fa-circle-o"></i>Hajj Views</a>
                <a href="{{ url('admin/packages_views/flight') }}"><i
                            class="fa fa-circle-o"></i>Flight Views</a>
                <a href="{{ url('admin/packages_views/hotel') }}"><i
                            class="fa fa-circle-o"></i>Hotel Views</a>


            </li>

        </ul>
    </li>

  <li class="treeview {{ active_menu('evisa')[0] }}">
        <a href="#">
            <i class="fa fa-money"></i> <span>E-Visa</span>
            <span class="pull-right-container">
<i class="fa fa-angle-right pull-right"></i>
</span>
        </a>
        <ul class="treeview-menu" style="{{ active_menu('evisa')[1] }}">
            <li>
                <a href="{{ url('admin/evisa/pending') }}"><i
                            class="fa fa-circle-o"></i>E-Visa Pending Orders</a>
            </li>
            <li>
                <a href="{{ url('admin/evisa/delivered') }}"><i
                            class="fa fa-circle-o"></i>E-Visa Delivered Orders</a>
            </li>

        </ul>
    </li>
    
    <li class="treeview {{ active_menu('includes')[0] }}">
        <a href="#">
            <i class="fa fa-paperclip"></i> <span>Package Includes</span>
            <span class="pull-right-container">
<i class="fa fa-angle-right pull-right"></i>
</span>
        </a>
        <ul class="treeview-menu" style="{{ active_menu('includes')[1] }}">
            <li><a href="{{ url('admin/includes') }}"><i
                            class="fa fa-circle-o"></i>Includes</a>
            </li>
            <li><a href="{{ url(route('includes.create')) }}"><i
                            class="fa fa-circle-o"></i> Add Include
                </a></li>
        </ul>
    </li>

    <li class="treeview {{ active_menu('amenities')[0] }}">
        <a href="#">
            <i class="fa fa-paperclip"></i> <span>Hotel Amenities</span>
            <span class="pull-right-container">
<i class="fa fa-angle-right pull-right"></i>
</span>
        </a>
        <ul class="treeview-menu" style="{{ active_menu('amenities')[1] }}">
            <li><a href="{{ url('admin/amenities') }}"><i
                            class="fa fa-circle-o"></i>Amenities</a>
            </li>
            <li><a href="{{ url(route('amenities.create')) }}"><i
                            class="fa fa-circle-o"></i> Add Amenitie
                </a></li>
        </ul>
    </li>
    <li class="treeview {{ active_menu('brokers')[0] }}">
        <a href="#">
            <i class="fa fa-user-circle"></i> <span>Partners</span>
            <span class="pull-right-container">
<i class="fa fa-angle-right pull-right"></i>
</span>
        </a>
        <ul class="treeview-menu" style="{{ active_menu('brokers')[1] }}">
            <li><a href="{{ url('admin/brokers') }}"><i
                            class="fa fa-circle-o"></i>Partners </a>
            </li>

            <li><a href="{{ url(route('brokers.create')) }}"><i
                            class="fa fa-circle-o"></i> Add Partner
                </a></li>
        </ul>
    </li>
     <li class="treeview {{ active_menu('broker_withdrawal_requests')[0] }}">
        <a href="#">
            <i class="fa fa-money"></i> <span>Partner Withdraw Requests</span>
            <!-- <span class="pull-right-container">
<i class="fa fa-angle-right pull-right"></i>
</span> -->
        </a>
        <ul class="treeview-menu" style="{{ active_menu('broker_withdrawal_requests')[1] }}">
            <li><a href="{{ url('admin/broker_withdrawal_requests') }}"><i
                            class="fa fa-circle-o"></i>Partner Withdraw Requests</a>
            </li>



        </ul>
    </li>
    <li class="treeview {{ active_menu('users')[0] }}">
        <a href="#">
            <i class="fa fa-users"></i> <span>Users</span>
            <span class="pull-right-container">
<i class="fa fa-angle-right pull-right"></i>
</span>
        </a>
        <ul class="treeview-menu" style="{{ active_menu('users')[1] }}">
            <li><a href="{{ url('admin/users') }}"><i
                            class="fa fa-circle-o"></i>Users</a>
            </li>

            <li><a href="{{ url(route('users.create')) }}"><i
                            class="fa fa-circle-o"></i> Add User
                </a></li>
        </ul>
    </li>
    
<li class="treeview {{ active_menu('admins')[0] }}">
        <a href="#">
            <i class="fa fa-user-secret"></i> <span>Admins</span>
            <span class="pull-right-container">
<i class="fa fa-angle-right pull-right"></i>
</span>
        </a>
        <ul class="treeview-menu" style="{{ active_menu('admins')[1] }}">
            <li><a href="{{ url('admin/admins') }}"><i
                            class="fa fa-circle-o"></i>Admins</a>
            </li>

            <li><a href="{{ url(route('admins.create')) }}"><i
                            class="fa fa-circle-o"></i> Add Admin
                </a></li>
        </ul>
    </li>
    
    



   

</ul>
