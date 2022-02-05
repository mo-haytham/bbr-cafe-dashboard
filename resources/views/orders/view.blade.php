@extends('layouts.main')

@section('title', 'Order Details')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                {{ $order->customer_name }} Order |
                @if ($order->status == 0)
                    <a href="{{ route('accept.order.details', ['order_id' => $order->id]) }}"
                        class="btn btn-sm btn-primary">Accept</a>
                    <a href="{{ route('cancel.order.details', ['order_id' => $order->id]) }}"
                        class="btn btn-sm btn-danger">Cancel</a>
                @elseif ($order->status == 1)
                    <a href="{{ route('cancel.order.details', ['order_id' => $order->id]) }}"
                        class="btn btn-sm btn-danger">Cancel</a>
                @elseif ($order->status == 9)
                    <a href="{{ route('accept.order.details', ['order_id' => $order->id]) }}"
                        class="btn btn-sm btn-primary">Accept</a>
                @endif
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('d.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('get.orders.list', ['status' => 'pending']) }}"><i class="fa fa-dashboard"></i>
                        Orders</a></li>
                <li class="active">Order # {{ $order->id }}</li>
            </ol>
        </section>
        <section class="content">
            @include('components.notify_box')
            @if ($order->status == 1)
                <div class="callout callout-info">
                    <h4 class="text-center">Accepted</h4>
                </div>
            @endif
            @if ($order->status == 9)
                <div class="callout callout-info">
                    <h4 class="text-center">Canceled</h4>
                </div>
            @endif
            <div>
                {!! $order->order_body !!}
            </div>
        </section>
    </div>
@endsection

@section('style_links')
    <link href="{{ asset('assets/css/order.css') }}" rel="stylesheet" type="text/css" />
@endsection
