<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset('assets/vendors/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
        type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset('assets/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{ asset('assets/css/skins/skin-blue.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
    @yield('style_links')
</head>

<body class="skin-blue">
    <!-- site wrapper -->
    <div class="wrapper">

        {{-- main header - components->main_header --}}
        @include('components.main_header')

        {{-- sidebar - components->sidebar --}}
        @include('components.sidebar')

        {{-- content section --}}
        @yield('content')

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0
            </div>
            <strong>Copyright &copy; {{ date('Y') }} <a href="https://web.facebook.com/webicom.solutions"
                    target="blank">Webicom
                    EG</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- site wrapper end -->

    <!-- jQuery 2.1.3 -->
    <script src="{{ asset('assets/plugins/jQuery/jQuery-2.1.3.min.js') }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('assets/plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='{{ asset('assets/plugins/fastclick/fastclick.min.js') }}'></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/js/app.min.js') }}" type="text/javascript"></script>

    @yield('script_links')

    <script>
        /* handle notification in components/main_header blade */
        $(document).ready(function() {
            /* prepare noti alert */
            $("#notification_icon").hide()
            let empty_list = `<li id="empty_list">No notifications..</li>`
            $("#notifications_list").empty().append(empty_list)

            let order_count = parseInt({{ App\Models\Order::where('status', 0)->count() }})
            let reservation_count = parseInt({{ App\Models\Reservation::where('status', 0)->count() }})
            console.log({
                order_count,
                reservation_count
            });

            setInterval(() => {
                $.get("{{ route('sync.data') }}", function(data, status) {
                    console.log({
                        data
                    });
                    if (order_count != data.order_count) {
                        render_orders()
                        order_count = data.order_count
                    }
                    if (reservation_count != data.reservation_count) {
                        render_reservations()
                        reservation_count = data.reservation_count
                    }
                });
            }, 30000);

        })

        function render_reservations() {
            let list_item =
                ` <li><a href="{{ route('get.reservations.list', ['status' => 'pending']) }}"><i class="fa fa-users text-aqua"></i> You have new reservation requests</a></li>`
            $("#notifications_list #empty_list").remove()
            $("#notifications_list").append(list_item)
            $("#notification_icon").show()
        }

        function render_orders() {
            let list_item =
                `<li><a href="{{ route('get.orders.list', ['status' => 'pending']) }}"><i class="fa fa-shopping-cart text-green"></i> You have new order requests</a></li>`
            $("#notifications_list #empty_list").remove()
            $("#notifications_list").append(list_item)
            $("#notification_icon").show()
        }
    </script>

    @yield('script')

</body>

</html>
