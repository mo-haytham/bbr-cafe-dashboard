<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{{ route('d.index') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>


            <li>
                <a href="{{ route('d.branches') }}">
                    <i class="fa fa-dashboard"></i> <span>Locations & Branches</span></a>
            </li>



            <li>
                <a href="{{ route('d.products.list') }}">
                    <i class="fa fa-dashboard"></i> <span>Products</span></a>
            </li>

            <li>
                <a href="{{ route('get.orders.list', ['status' => 'pending']) }}">
                    <i class="fa fa-dashboard"></i>
                    <span>Orders</span>
                    <span
                        class="label label-primary pull-right">{{ App\Models\Order::where('status', 0)->count() }}</span>
                </a>
            </li>

            <li>
                <a href="{{ route('get.reservations.list', ['status' => 'pending']) }}">
                    <i class="fa fa-dashboard"></i>
                    <span>Reservations</span>
                    <span
                        class="label label-primary pull-right">{{ App\Models\Reservation::where('status', 0)->count() }}</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Menu</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('d.dishes') }}"><i class="fa fa-circle-o"></i>Dishes</a></li>
                    <li><a href="{{ route('d.desserts') }}"><i class="fa fa-circle-o"></i>Dessert</a></li>
                    <li><a href="{{ route('d.drinks') }}"><i class="fa fa-circle-o"></i>Drinks</a></li>
                    <li><a href="{{ route('d.custom') }}"><i class="fa fa-circle-o"></i>Custom Choice</a></li>
                </ul>
            </li>
        </ul>
    </section>
</aside>
