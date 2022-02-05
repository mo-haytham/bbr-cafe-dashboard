@extends('layouts.main')
@section('title', 'Dishes')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Dishes</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('d.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dishes</li>
            </ol>
        </section>
        <section class="content">
            @include('components.notify_box')

            {{-- dishes start --}}
            <div class="box box-success ">
                <div class="box-header with-border">
                    <h3 class="box-title">Available Dishes</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <div class="row">
                        {{-- dishes form --}}
                        <div class="col-xs-12 col-md-4">
                            <form action="{{ route('d.dishes.type.save', ['type' => 'dish']) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name_en">Dish Name -EN</label>
                                    <input type="text" name="name_en" id="name_en" value="{{ old('name_en') }}"
                                        placeholder="Dish Name - EN" class="form-control">
                                    @error('name_en')
                                        <small class="alert alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name_ar">Dish Name - AR</label>
                                    <input type="text" name="name_ar" id="name_ar" value="{{ old('name_ar') }}"
                                        placeholder="Dish Name - AR" class="form-control">
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
                                    <label for="calories">Calories</label>
                                    <input type="text" name="calories" id="calories" value="{{ old('calories') }}"
                                        placeholder="Calories" class="form-control">
                                    @error('calories')
                                        <small class="alert alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="dish_country_iso_code">Country ISO Code</label>
                                    <select name="country_iso_code" id="dish_country_iso_code" class="form-control">
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
                                    <label for="price">Dish Price</label>
                                    <div class="input-group">
                                        <input type="text" name="price" id="price" value="{{ old('price') }}"
                                            placeholder="Dish Price" class="form-control">
                                        <span class="input-group-addon" id="dish_country_currency"></span>
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
                        {{-- dishes table --}}
                        <div class="col-xs-12 col-md-8">
                            @if (isset($dishes) && count($dishes) > 0)
                                <table class="table table-hover table-responsive">
                                    <tr>
                                        <th>Name - EN</th>
                                        <th>Name - AR</th>
                                        <th>Country</th>
                                        <th>Price</th>
                                        <th></th>
                                    </tr>
                                    @foreach ($dishes as $dish)
                                        <tr>
                                            <td>{{ $dish->name_en }}</td>
                                            <td>{{ $dish->name_ar }}</td>
                                            <td>{{ $dish->country_iso_code }}</td>
                                            <td>{{ $dish->price }}</td>
                                            <td>
                                                <a href="{{ route('d.dishes.type.delete', ['type' => 'dish', 'type_id' => $dish->id]) }}"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            @else
                                <p class="alert alert-danger">No Dishes added.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            {{-- dishes end --}}




            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}





            {{-- dishes addons start --}}
            <div class="box box-success collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Available Addons</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <div class="row">
                        {{-- dishes addons form --}}
                        <div class="col-xs-12 col-md-4">
                            <form action="{{ route('d.dishes.type.save', ['type' => 'addon']) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name_en">Addon Name -EN</label>
                                    <input type="text" name="name_en" id="name_en" value="{{ old('name_en') }}"
                                        placeholder="Addon Name - EN" class="form-control">
                                    @error('name_en')
                                        <small class="alert alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name_ar">Addon Name - AR</label>
                                    <input type="text" name="name_ar" id="name_ar" value="{{ old('name_ar') }}"
                                        placeholder="Addon Name - AR" class="form-control">
                                    @error('name_ar')
                                        <small class="alert alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="calories">Calories</label>
                                    <input type="text" name="calories" id="calories" value="{{ old('calories') }}"
                                        placeholder="Calories" class="form-control">
                                    @error('calories')
                                        <small class="alert alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="addon_country_iso_code">Country ISO Code</label>
                                    <select name="country_iso_code" id="addon_country_iso_code" class="form-control">
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
                                    <label for="price">Dish Price</label>
                                    <div class="input-group">
                                        <input type="text" name="price" id="price" value="{{ old('price') }}"
                                            placeholder="Country Currency" class="form-control">
                                        <span class="input-group-addon" id="addon_country_currency"></span>
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
                        {{-- dishes addons table --}}
                        <div class="col-xs-12 col-md-8">
                            @if (isset($addons) && count($addons) > 0)
                                <table class="table table-hover table-responsive">
                                    <tr>
                                        <th>Name - EN</th>
                                        <th>Name - AR</th>
                                        <th>Country</th>
                                        <th>Price</th>
                                        <th></th>
                                    </tr>
                                    @foreach ($addons as $addon)
                                        <tr>
                                            <td>{{ $addon->name_en }}</td>
                                            <td>{{ $addon->name_ar }}</td>
                                            <td>{{ $addon->country_iso_code }}</td>
                                            <td>{{ $addon->price }}</td>
                                            <td>
                                                <a href="{{ route('d.dishes.type.delete', ['type' => 'addon', 'type_id' => $addon->id]) }}"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            @else
                                <p class="alert alert-danger">No Addons added.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            {{-- dishes addons end --}}





            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}





            {{-- dishes addons start --}}
            <div class="box box-success collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Available Tags</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <div class="row">
                        {{-- dishes addons form --}}
                        <div class="col-xs-12 col-md-4">
                            <form action="{{ route('d.dishes.type.save', ['type' => 'tag']) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name_en">Tag Name -EN</label>
                                    <input type="text" name="name_en" id="name_en" value="{{ old('name_en') }}"
                                        placeholder="Tag Name - EN" class="form-control">
                                    @error('name_en')
                                        <small class="alert alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name_ar">Tag Name - AR</label>
                                    <input type="text" name="name_ar" id="name_ar" value="{{ old('name_ar') }}"
                                        placeholder="Tag Name - AR" class="form-control">
                                    @error('name_ar')
                                        <small class="alert alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Save" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                        {{-- dishes addons table --}}
                        <div class="col-xs-12 col-md-8">
                            @if (isset($tags) && count($tags) > 0)
                                <table class="table table-hover table-responsive">
                                    <tr>
                                        <th>Name - EN</th>
                                        <th>Name - AR</th>
                                        <th></th>
                                    </tr>
                                    @foreach ($tags as $tag)
                                        <tr>
                                            <td>{{ $tag->name_en }}</td>
                                            <td>{{ $tag->name_ar }}</td>
                                            <td>
                                                <a href="{{ route('d.dishes.type.delete', ['type' => 'tag', 'type_id' => $tag->id]) }}"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            @else
                                <p class="alert alert-danger">No Tags added.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            {{-- dishes addons end --}}



            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}


            <div class="box box-success collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Dishes & Addons</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <div class="row">
                        {{-- dishes addons form --}}
                        <div class="col-xs-12 col-md-4">
                            <form action="{{ route('d.dishes.link', ['type' => 'addons']) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="dish_id">Select Dish</label>
                                    <select name="dish_id" id="dish_id" class="form-control">
                                        @foreach ($dishes as $dish)
                                            <option value="{{ $dish->id }}">{{ $dish->name_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="addon_ids">Select Addons</label>
                                    <select name="addon_ids[]" id="addon_ids" class="form-control" multiple>
                                        @foreach ($addons as $addon)
                                            <option value="{{ $addon->id }}">{{ $addon->name_en }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Save" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                        {{-- dishes addons table --}}
                        <div class="col-xs-12 col-md-8">
                            @if (isset($dishes_with_addons) && count($dishes_with_addons) > 0)
                                <table class="table table-hover table-responsive">
                                    <tr>
                                        <th>Dish</th>
                                        <th>Addon</th>
                                        <th></th>
                                    </tr>
                                    @foreach ($dishes_with_addons as $dish)
                                        @foreach ($dish->dishes_addons as $addon)
                                            <tr>
                                                <td>{{ $dish->name_en }}</td>
                                                <td>{{ $addon->name_en }}</td>
                                                <td><a href="{{ route('d.dishes.remove', ['type' => 'addons', 'dish_id' => $dish->id, 'type_id' => $addon->id]) }}">Remove</a></td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </table>
                            @else
                                <p class="alert alert-danger">No addons added to dishes</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>


            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}


            <div class="box box-success collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Dishes & Tags</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <div class="row">
                        {{-- dishes addons form --}}
                        <div class="col-xs-12 col-md-4">
                            <form action="{{ route('d.dishes.link', ['type' => 'tag']) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="dish_id">Select Dish</label>
                                    <select name="dish_id" id="dish_id" class="form-control">
                                        @foreach ($dishes as $dish)
                                            <option value="{{ $dish->id }}">{{ $dish->name_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tag_ids">Select Tags</label>
                                    <select name="tag_ids[]" id="tag_ids" class="form-control" multiple>
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->name_en }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Save" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                        {{-- dishes addons table --}}
                        <div class="col-xs-12 col-md-8">
                            @if (isset($dishes_with_tags) && count($dishes_with_tags) > 0)
                                <table class="table table-hover table-responsive">
                                    <tr>
                                        <th>Dish</th>
                                        <th>Tags</th>
                                        <th></th>
                                    </tr>
                                    @foreach ($dishes_with_tags as $dish)
                                        @foreach ($dish->dishes_tags as $tag)
                                            <tr>
                                                <td>{{ $dish->name_en }}</td>
                                                <td>{{ $tag->name_en }}</td>
                                                <td><a href="{{ route('d.dishes.remove', ['type' => 'tag', 'dish_id' => $dish->id, 'type_id' => $tag->id]) }}">Remove</a></td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </table>
                            @else
                                <p class="alert alert-danger">No tags added to dishes</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script>
        function dish_update_currency() {
            $('#dish_country_currency').text($('#dish_country_iso_code option:selected').attr('data_currency'));
        }

        function addon_update_currency() {
            $('#addon_country_currency').text($('#addon_country_iso_code option:selected').attr('data_currency'));
        }

        $(document).ready(function() {
            dish_update_currency();
            addon_update_currency();
        });

        $('#dish_country_iso_code').change(function() {
            dish_update_currency();
        });
        $('#addon_country_iso_code').change(function() {
            addon_update_currency();
        });
    </script>
@endsection
