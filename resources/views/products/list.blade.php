@extends('layouts.main')

@section('title', 'Products List')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Products List</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('d.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Products List</li>
            </ol>
        </section>
        <section class="content">
            <div class="x-margin-bottom">
                <a href="{{ route('d.products.new') }}" class="btn btn-success btn-sm">Add New Product</a>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    @include('components.notify_box')
                </div>
                <div class="col-xs-12">
                    @if (isset($products) && count($products) > 0)
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Products List</h3>
                                <div class="box-tools">
                                    <div class="input-group">
                                        <select name="" id="" class="form-control">
                                            <option value="all">All</option>
                                            @foreach (App\Models\Country::get() as $country)
                                                <option value="{{ $country->country_iso_code }}">{{ $country->name_en }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Country</th>
                                        <th>Price</th>
                                        <th></th>
                                    </tr>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td><img src="{{ asset('images/thumbnail/' . $product->image) }}"
                                                    alt="{{ $product->name }} image"></td>
                                            <td>{{ $product->name_en }}</td>
                                            <td>{{ $product->country_iso_code }}</td>
                                            <td><span
                                                    class="label label-success">{{ $product->price . ' ' . $product->country->currency }}</span>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-primary">Details</a>
                                                <a href="{{ route('d.product.delete', ['product_id' => $product->id]) }}"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                {{ $products->links() }}
                            </div>
                        </div>
                    @else
                        <p class="alert alert-danger">No products found, add some first..</p>
                    @endif
                </div>
            </div>
        </section>
    </div>
@endsection
