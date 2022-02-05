@extends('layouts.main')

@section('title', 'New Product')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Add New Product</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('d.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('d.products.list') }}"><i class="fa fa-dashboard"></i> Products List</a></li>
                <li class="active">New Product</li>
            </ol>
        </section>
        <section class="content">
            <form action="{{ route('d.products.new.save') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-xs-12 col-md-6">
                        <label for="name_en">Product Name - EN</label>
                        <input type="text" name="name_en" id="name_en" class="form-control" placeholder="Product Name - EN"
                            value="{{ old('name_en') }}">
                        @error('name_en')
                            <small class="alert alert-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-md-6">
                        <label for="name_ar">Product Name - AR</label>
                        <input type="text" name="name_ar" id="name_ar" class="form-control"
                            placeholder="Product Name - EN" value="{{ old('name_ar') }}">
                        @error('name_ar')
                            <small class="alert alert-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-md-6">
                        <label for="country">Country</label>
                        <select name="country" id="country" class="form-control">
                            @foreach (App\Models\Country::get() as $country)
                                <option value="{{ $country->country_iso_code }}"
                                    data_currency="{{ $country->currency }}">{{ $country->name_en }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-xs-12 col-md-6">
                        <label for="price">Price</label>
                        <div class="input-group">
                            <input type="text" name="price" id="price" class="form-control" placeholder="Price"
                                value="{{ old('price') }}">
                            <span class="input-group-addon" id="display_currency"></span>
                        </div>
                        @error('price')
                            <small class="alert alert-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12 col-md-6">
                        <label for="image">Product Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @error('image')
                            <small class="alert alert-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="form-group col-xs-12">
                        <label for="description_en">Description - EN</label>
                        <textarea class="textarea form-control" rows="5"
                            name="description_en">{{ old('description_en') }}</textarea>
                        @error('description_en')
                            <small class="alert alert-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-xs-12">
                        <label for="description_ar">Description - AR</label>
                        <textarea class="textarea form-control" rows="5"
                            name="description_ar">{{ old('description_ar') }}</textarea>
                        @error('description_ar')
                            <small class="alert alert-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="form-group col-xs-12">
                        <input type="submit" class="btn btn-primary" value="Save">
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection

@section('style_links')
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
@endsection

@section('script_links')
    <script src="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
@endsection

@section('script')
    <script>
        function update_currency() {
            $('#display_currency').text($('#country option:selected').attr('data_currency'));
        }

        $(document).ready(function() {
            update_currency();

            $(".textarea").wysihtml5();
        });

        $('#country').change(function() {
            update_currency();
        });
    </script>
@endsection
