@extends('layouts.main')
@section('title', 'Drinks')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Drinks</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('d.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"> Drinks</li>
            </ol>
        </section>
        <section class="content">
            @include('components.notify_box')

            {{-- drinks start --}}
            <div class="box box-success ">
                <div class="box-header with-border">
                    <h3 class="box-title">Available Drinks</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <div class="row">
                        {{-- drinks form --}}
                        <div class="col-xs-12 col-md-4">
                            <form action="{{ route('d.save.drink.type', ['type' => 'drink']) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name_en">Drink Name -EN</label>
                                    <input type="text" name="name_en" id="name_en" value="{{ old('name_en') }}"
                                        placeholder="Drink Name - EN" class="form-control">
                                    @error('name_en')
                                        <small class="alert alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name_ar">Drink Name - AR</label>
                                    <input type="text" name="name_ar" id="name_ar" value="{{ old('name_ar') }}"
                                        placeholder="Drink Name - AR" class="form-control">
                                    @error('name_ar')
                                        <small class="alert alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="ingredients">Ingredients</label>
                                    <input type="text" name="ingredients" id="ingredients"
                                        value="{{ old('ingredients') }}" placeholder="Ingredients" class="form-control">
                                    @error('ingredients')
                                        <small class="alert alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="country_iso_code">Country ISO Code</label>
                                    <select name="country_iso_code" id="country_iso_code" class="form-control">
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->country_iso_code }}"
                                                data_currency="{{ $country->currency }}">{{ $country->name_en }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('country_iso_code')
                                        <small class="alert alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="price">Drink Price</label>
                                    <div class="input-group">
                                        <input type="text" name="price" id="price" value="{{ old('price') }}"
                                            placeholder="Drink Price" class="form-control">
                                        <span class="input-group-addon" id="dessert_country_currency"></span>
                                    </div>
                                    @error('price')
                                        <small class="alert alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Save" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                        {{-- drinks table --}}
                        <div class="col-xs-12 col-md-8">
                            @if (isset($drinks) && count($drinks) > 0)
                                <table class="table table-hover table-responsive">
                                    <tr>
                                        <th>Name - EN</th>
                                        <th>Name - AR</th>
                                        <th>Country</th>
                                        <th>Price</th>
                                        <th></th>
                                    </tr>
                                    @foreach ($drinks as $drink)
                                        <tr>
                                            <td>{{ $drink->name_en }}</td>
                                            <td>{{ $drink->name_ar }}</td>
                                            <td>{{ $drink->country_iso_code }}</td>
                                            <td>{{ $drink->price }}</td>
                                            <td>
                                                <a href="{{ route('d.drinks.type.delete', ['type' => 'drink', 'type_id' => $drink->id]) }}"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            @else
                                <p class="alert alert-danger">No Drinks added.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            {{-- desserts end --}}


            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}


            {{-- drink options start --}}
            <div class="box box-success collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Available Drink Options</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <div class="row">
                        {{-- drinks option form --}}
                        <div class="col-xs-12 col-md-4">
                            <form action="{{ route('d.save.drink.type', ['type' => 'option']) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="drink_id">Select Drink</label>
                                    <select name="drink_id" id="drink_id" class="form-control">
                                        <option value="0">Select Drink</option>
                                        @foreach ($drinks as $drink)
                                            <option value="{{ $drink->id }}">{{ $drink->name_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name_en">Option Name - EN</label>
                                    <input type="text" name="name_en" id="name_en" value="{{ old('name_en') }}"
                                        placeholder="Option Name - EN" class="form-control">
                                    @error('name_en')
                                        <small class="alert alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name_ar">Option Name - AR</label>
                                    <input type="text" name="name_ar" id="name_ar" value="{{ old('name_ar') }}"
                                        placeholder="Option Name - AR" class="form-control">
                                    @error('name_ar')
                                        <small class="alert alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" name="price" id="price" value="{{ old('price') }}"
                                        placeholder="Price" class="form-control">
                                    @error('price')
                                        <small class="alert alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Save" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                        {{-- desserts addons table --}}
                        <div class="col-xs-12 col-md-8">
                            @if (isset($options) && count($options) > 0)
                                <table class="table table-hover table-responsive">
                                    <tr>
                                        <th>Name - EN</th>
                                        <th>Name - AR</th>
                                        <th></th>
                                    </tr>
                                    @foreach ($options as $option)
                                        <tr>
                                            <td>{{ $option->name_en }}</td>
                                            <td>{{ $option->name_ar }}</td>
                                            <td>
                                                <a href="{{ route('d.drinks.type.delete', ['type' => 'option', 'type_id' => $option->id]) }}"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            @else
                                <p class="alert alert-danger">No options added.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            {{-- desserts addons end --}}

        </section>
    </div>
@endsection
@section('script')
    <script>
        function dessert_update_currency() {
            $('#dessert_country_currency').text($('#country_iso_code option:selected').attr('data_currency'));
        }

        $(document).ready(function() {
            dessert_update_currency();
        });

        $('#country_iso_code').change(function() {
            dessert_update_currency();
        });
    </script>
@endsection
