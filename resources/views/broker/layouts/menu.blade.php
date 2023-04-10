

<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">

{{--        @if(auth()->user()->hasRole('broker'))--}}

    <li class="treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{url('/broker')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>

        </ul>
    </li>
    <li class="treeview {{ active_menu('broker_umrahs')[0] }}">
        <a href="#">
            <i class="fa fa-moon-o"></i> <span>Umrah Packages</span>
            <span class="pull-right-container">
            </span>
        </a>
        <ul class="treeview-menu" style="{{ active_menu('broker_umrahs')[1] }}">
            <li style="padding-left: 15px;"><a href="{{ url('broker/broker_umrahs') }}"><i
                            class="fa fa-flag"></i>Umrah Packages</a>
            </li>



        </ul>
    </li>
    <li class="treeview {{ active_menu('broker_hajjs')[0] }}">
        <a href="#">
            <i class="fa fa-file"></i> <span>Hajj Packages</span>
            <span class="pull-right-container">
            </span>
        </a>
        <ul class="treeview-menu" style="{{ active_menu('broker_hajjs')[1] }}">
            <li style="padding-left: 15px;"><a href="{{ url('broker/broker_hajjs') }}"><i
                            class="fa fa-flag"></i>Hajj Packages</a>
            </li>

        </ul>
    </li>

    <li class="treeview {{ active_menu('broker_hotels')[0] }}">
        <a href="#">
            <i class="fa fa-building"></i> <span>Hotel Packages</span>
            <span class="pull-right-container">
             </span>
        </a>
        <ul class="treeview-menu" style="{{ active_menu('broker_hotels')[1] }}">
            <li style="padding-left: 15px;"><a href="{{ url('broker/broker_hotels') }}"><i
                            class="fa fa-building"></i>Hotels</a>
            </li>

        </ul>
    </li>

    <li class="treeview {{ active_menu('broker_flights')[0] }}">
        <a href="#">
            <i class="fa fa-plane"></i> <span>Flight Packages</span>
            <span class="pull-right-container">
            </span>
        </a>
        <ul class="treeview-menu" style="{{ active_menu('broker_flights')[1] }}">
            <li style="padding-left: 15px;"><a href="{{ url('broker/broker_flights') }}"><i
                            class="fa fa-plane"></i>Flights</a>
            </li>


        </ul>
    </li>




    <li class="treeview {{ active_menu('my_package_orders')[0] }}">
        <a href="#">
            <i class="fa fa-first-order"></i> <span>Umrah Orders </span>
            <span class="pull-right-container">
            </span>
        </a>
        <ul class="treeview-menu" style="{{ active_menu('my_package_orders')[1] }}">
            <li style="padding-left: 15px;">
                <a href="{{ url('broker/my_package_orders') }}"><i
                            class="fa fa-first-order"></i>My Umrah  Orders
                </a>
            </li>

        </ul>
    </li>
    <li class="treeview {{ active_menu('my_hajj_orders')[0] }}">
        <a href="#">
            <i class="fa fa-first-order"></i> <span>Hajj Orders </span>
            <span class="pull-right-container">
            </span>
        </a>
        <ul class="treeview-menu" style="{{ active_menu('my_hajj_orders')[1] }}">
            <li style="padding-left: 15px;">
                <a href="{{ url('broker/my_hajj_orders') }}"><i
                            class="fa fa-first-order"></i>My Hajj Orders
                </a>
               

            </li>

        </ul>
    </li>


    <li class="treeview {{ active_menu('my_order_hotel')[0] }}">
        <a href="#">
            <i class="fa fa-first-order"></i> <span>My Hotel Orders </span>
            <span class="pull-right-container">
            </span>
        </a>
        <ul class="treeview-menu" style="{{ active_menu('my_order_hotel')[1] }}">
            <li style="padding-left: 15px;">
                <a href="{{ url('broker/my_order_hotel') }}"><i
                            class="fa fa-first-order"></i>My Hotel Complete Orders</a>
                

            </li>

        </ul>
    </li>

    <li class="treeview {{ active_menu('my_flight_orders')[0] }}">
        <a href="#">
            <i class="fa fa-first-order"></i> <span>My Flight Orders </span>
            <span class="pull-right-container">
            </span>
        </a>
        <ul class="treeview-menu" style="{{ active_menu('my_flight_orders')[1] }}">
            <li style="padding-left: 15px;">
                <a href="{{ url('broker/my_flight_orders') }}"><i
                            class="fa fa-first-order"></i>My Flight Complete Orders</a>
               

            </li>

        </ul>
    </li>
    


    <li class="treeview {{ active_menu('broker_balance')[0] }}">
        <a href="#">
            <i class="fa fa-money"></i> <span>My Balance </span>
            <span class="pull-right-container">
            </span>
        </a>
        <ul class="treeview-menu" style="{{ active_menu('broker_balance')[1] }}">
            <li style="padding-left: 15px;">
                <a href="{{ url('broker/broker_balance') }}"><i
                            class="fa fa-money"></i>My Balance</a>
               

            </li>

        </ul>
    </li>
    

    
    <!--<li class="treeview {{ active_menu('broker_withdraw')[0] }}">-->
    <!--    <a href="#">-->
    <!--        <i class="fa fa-money"></i> <span>Withdraw Requests </span>-->
    <!--        <span class="pull-right-container">-->
    <!--        </span>-->
    <!--    </a>-->
    <!--    <ul class="treeview-menu" style="{{ active_menu('broker_withdraw')[1] }}">-->
    <!--        <li style="padding-left: 15px;"><a href="{{ url('broker/broker_withdraw') }}"><i-->
    <!--                        class="fa fa-money"></i>Withdraw Requests</a>-->
    <!--        </li>-->
    <!--        <li style="padding-left: 15px;"><a href="{{ url('broker/broker_withdraw/create') }}"><i-->
    <!--                        class="fa fa-plus"></i> Add Withdraw Request-->
    <!--            </a>-->
    <!--        </li>-->


    <!--    </ul>-->
    <!--</li>-->









</ul>
