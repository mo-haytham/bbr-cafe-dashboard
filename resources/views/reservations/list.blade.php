@extends('layouts.main')

@section('title', 'Reservations')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>{{ ucfirst($status) }} Reservations</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('d.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Reservations</li>
            </ol>
        </section>
        <section class="content">
            @include('components.notify_box')

            <div style="margin-bottom: 10px">
                <a href="{{ route('get.reservations.list', ['status' => 'pending']) }}" class="btn btn-primary">Pending</a>
                <a href="{{ route('get.reservations.list', ['status' => 'accepted']) }}"
                    class="btn btn-success">Accepted</a>
                <a href="{{ route('get.reservations.list', ['status' => 'canceled']) }}"
                    class="btn btn-danger">Canceled</a>
            </div>

            {{-- locations start --}}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ ucfirst($status) }} Reservations</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    @if (isset($reservations) && count($reservations) > 0)
                        <div style="overflow-x: scroll; overflow-y: hidden; white-space:nowrap;">
                            <table class="table table2">
                                <thead>
                                    <tr>
                                        <th scope="col">Branch</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Reservation Date</th>
                                        <th scope="col">Reservation Time</th>
                                        <th scope="col">No. of Guests</th>
                                        <th scope="col">Occasion</th>
                                        <th scope="col">Accepted Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reservations as $reservation)
                                        <tr>
                                            <th>{{ $reservation->branch->name_en }}</th>
                                            <th>{{ $reservation->name }}</th>
                                            <th>{{ $reservation->mobile }}</th>
                                            <th>{{ $reservation->date }}</th>
                                            <th>{{ $reservation->time }}</th>
                                            <th>{{ $reservation->number_of_guests }}</th>
                                            <th>{{ $reservation->occasion }}</th>
                                            <th>
                                                @if ($reservation->status == 1)
                                                    {{ $reservation->accepted_at }}
                                                @else
                                                    {{ ucfirst($status) }}
                                                @endif
                                            </th>
                                            <td>
                                                @if ($reservation->status == 0)
                                                    <a class="btn btn-primary"
                                                        href="{{ route('accept.reservation', ['reservation_id' => $reservation->id]) }}">Confirm</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ route('cancel.reservation', ['reservation_id' => $reservation->id]) }}">Cancel</a>
                                                @elseif ($reservation->status == 1)
                                                    <a class="btn btn-danger"
                                                        href="{{ route('cancel.reservation', ['reservation_id' => $reservation->id]) }}">Cancel</a>
                                                @elseif ($reservation->status == 9)
                                                    <a class="btn btn-primary"
                                                        href="{{ route('accept.reservation', ['reservation_id' => $reservation->id]) }}">Confirm</a>
                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-success">No Reservations</div>
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
