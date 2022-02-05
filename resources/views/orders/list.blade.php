@extends('layouts.main')

@section('title', 'Orders')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>{{ ucfirst($status) }} Orders</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('d.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Orders</li>
            </ol>
        </section>
        <section class="content">
            @include('components.notify_box')

            <div style="margin-bottom: 10px">
                <a href="{{ route('get.orders.list', ['status' => 'pending']) }}" class="btn btn-primary">Pending</a>
                <a href="{{ route('get.orders.list', ['status' => 'accepted']) }}" class="btn btn-success">Accepted</a>
                <a href="{{ route('get.orders.list', ['status' => 'canceled']) }}" class="btn btn-danger">Canceled</a>
            </div>

            {{-- locations start --}}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ ucfirst($status) }} Orders</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body no-padding table-">
                    @if (isset($orders) && count($orders) > 0)
                        <table class="table table2">
                            <thead>
                                <tr>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Customer Phone</th>
                                    <th scope="col">Customer Address</th>
                                    <th scope="col">Order Type</th>
                                    <th scope="col">Receive Date</th>
                                    <th scope="col">Accept Date</th>
                                    <th scope="col">Country</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->customer_name }}</td>
                                        <td>{{ $order->customer_phone }}</td>
                                        <td>{{ $order->customer_address }}</td>
                                        <td>{{ $order->order_type }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td>{{ $order->accepted_at }}</td>
                                        <td>{{ $order->country_iso_code }}</td>
                                        <td>
                                            <a class="btn btn-primary"
                                                href="{{ route('get.order.details', ['order_id' => $order->id]) }}">Details</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-success">No Pending Orders</div>
                    @endif
                </div>
            </div>
            {{-- locations end --}}
        </section>
    </div>
@endsection
@section('style_links')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
@endsection
@section('script_links')
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $(".table2").dataTable({
                ordering: false
            });
        })
    </script>
@endsection
