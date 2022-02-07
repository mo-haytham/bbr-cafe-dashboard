@extends('layouts.main')
@section('title', 'Dessert')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Desserts</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('d.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"> Dessert</li>
            </ol>
        </section>
        <section class="content">
            @include('components.notify_box')

            {{-- desserts start --}}
            <div class="box box-success ">
                <div class="box-header with-border">
                    <h3 class="box-title">Available Desserts</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <div class="row">
                        {{-- desserts form --}}
                        <div class="col-xs-12 col-md-4">
                            <form action="{{ route('d.desserts.type.save', ['type' => 'dessert']) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name_en">Dessert Name -EN</label>
                                    <input type="text" name="name_en" id="name_en" value="{{ old('name_en') }}"
                                        placeholder="Dessert Name - EN" class="form-control">
                                    @error('name_en')
                                        <small class="alert alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name_ar">Dessert Name - AR</label>
                                    <input type="text" name="name_ar" id="name_ar" value="{{ old('name_ar') }}"
                                        placeholder="Dessert Name - AR" class="form-control">
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
                                    <label for="dessert_country_iso_code">Country ISO Code</label>
                                    <select name="country_iso_code" id="dessert_country_iso_code" class="form-control">
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
                                    <label for="price">Dessert Price</label>
                                    <div class="input-group">
                                        <input type="text" name="price" id="price" value="{{ old('price') }}"
                                            placeholder="Dessert Price" class="form-control">
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
                        {{-- desserts table --}}
                        <div class="col-xs-12 col-md-8">
                            @if (isset($desserts) && count($desserts) > 0)
                                <table class="table table-hover table-responsive">
                                    <tr>
                                        <th>Name - EN</th>
                                        <th>Name - AR</th>
                                        <th>Country</th>
                                        <th>Price</th>
                                        <th></th>
                                    </tr>
                                    @foreach ($desserts as $dessert)
                                        <tr>
                                            <td>{{ $dessert->name_en }}</td>
                                            <td>{{ $dessert->name_ar }}</td>
                                            <td>{{ $dessert->country_iso_code }}</td>
                                            <td>
                                                <input type="text" id="input_dessert_{{ $dessert->id }}"
                                                    value="{{ $dessert->price }}" class="form-control">
                                            </td>
                                            <td>
                                                <button data-type="dessert" data-id="{{ $dessert->id }}"
                                                    class="btn btn-primary btn-sm update" style="width: 75%; margin:1px"
                                                    type="button">
                                                    Update
                                                </button>
                                                <a href="{{ route('d.desserts.type.delete', ['type' => 'dessert', 'type_id' => $dessert->id]) }}"
                                                    class="btn btn-danger" style="width: 75%; margin:1px">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            @else
                                <p class="alert alert-danger">No Desserts added.</p>
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





            {{-- desserts addons start --}}
            <div class="box box-success collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Available Addons</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <div class="row">
                        {{-- desserts addons form --}}
                        <div class="col-xs-12 col-md-4">
                            <form action="{{ route('d.desserts.type.save', ['type' => 'addon']) }}" method="POST">
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
                                    <label for="price">Dessert Price</label>
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
                        {{-- desserts addons table --}}
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
                                            <td>
                                                <input type="text" id="input_dessert_addon_{{ $addon->id }}"
                                                    value="{{ $addon->price }}" class="form-control">
                                            </td>
                                            <td>
                                                <button data-type="dessert_addon" data-id="{{ $addon->id }}"
                                                    class="btn btn-primary btn-sm update" style="width: 75%; margin:1px"
                                                    type="button">
                                                    Update
                                                </button>
                                                <a href="{{ route('d.desserts.type.delete', ['type' => 'addon', 'type_id' => $addon->id]) }}"
                                                    class="btn btn-danger" style="width: 75%; margin:1px">Delete</a>
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
            {{-- desserts addons end --}}





            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}





            {{-- dessert tags start --}}
            <div class="box box-success collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Available Tags</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <div class="row">
                        {{-- desserts tags form --}}
                        <div class="col-xs-12 col-md-4">
                            <form action="{{ route('d.desserts.type.save', ['type' => 'tag']) }}" method="POST">
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
                        {{-- desserts addons table --}}
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
                                                <a href="{{ route('d.desserts.type.delete', ['type' => 'tag', 'type_id' => $tag->id]) }}"
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
            {{-- desserts addons end --}}


            <div class="box box-success collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Desserts & Addons</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <div class="row">
                        {{-- desserts addons form --}}
                        <div class="col-xs-12 col-md-4">
                            <form action="{{ route('d.desserts.link', ['type' => 'addons']) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="dessert_id">Select Dessert</label>
                                    <select name="dessert_id" id="dessert_id" class="form-control">
                                        @foreach ($desserts as $dessert)
                                            <option value="{{ $dessert->id }}">{{ $dessert->name_en }}</option>
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
                        {{-- desserts addons table --}}
                        <div class="col-xs-12 col-md-8">
                            @if (isset($desserts_with_addons) && count($desserts_with_addons) > 0)
                                <table class="table table-hover table-responsive">
                                    <tr>
                                        <th>Desserts</th>
                                        <th>Addon</th>
                                        <th></th>
                                    </tr>
                                    @foreach ($desserts_with_addons as $dessert)
                                        @foreach ($dessert->desserts_addons as $addon)
                                            <tr>
                                                <td>{{ $dessert->name_en }}</td>
                                                <td>{{ $addon->name_en }}</td>
                                                <td><a
                                                        href="{{ route('d.desserts.remove', ['type' => 'addons', 'dessert_id' => $dessert->id, 'type_id' => $addon->id]) }}">Remove</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </table>
                            @else
                                <p class="alert alert-danger">No addons added to desserts</p>
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
                    <h3 class="box-title">Desserts & Tags</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <div class="row">
                        {{-- desserts addons form --}}
                        <div class="col-xs-12 col-md-4">
                            <form action="{{ route('d.desserts.link', ['type' => 'tag']) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="dessert_id">Select Dessert</label>
                                    <select name="dessert_id" id="dessert_id" class="form-control">
                                        @foreach ($desserts as $dessert)
                                            <option value="{{ $dessert->id }}">{{ $dessert->name_en }}</option>
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
                        {{-- desserts addons table --}}
                        <div class="col-xs-12 col-md-8">
                            @if (isset($desserts_with_tags) && count($desserts_with_tags) > 0)
                                <table class="table table-hover table-responsive">
                                    <tr>
                                        <th>Desserts</th>
                                        <th>Tags</th>
                                        <th></th>
                                    </tr>
                                    @foreach ($desserts_with_tags as $dessert)
                                        @foreach ($dessert->desserts_tags as $tag)
                                            <tr>
                                                <td>{{ $dessert->name_en }}</td>
                                                <td>{{ $tag->name_en }}</td>
                                                <td><a
                                                        href="{{ route('d.desserts.remove', ['type' => 'tag', 'dessert_id' => $dessert->id, 'type_id' => $tag->id]) }}">Remove</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </table>
                            @else
                                <p class="alert alert-danger">No tags added to desserts</p>
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
        function dessert_update_currency() {
            $('#dessert_country_currency').text($('#dessert_country_iso_code option:selected').attr('data_currency'));
        }

        function addon_update_currency() {
            $('#addon_country_currency').text($('#addon_country_iso_code option:selected').attr('data_currency'));
        }

        $(document).ready(function() {
            dessert_update_currency();
            addon_update_currency();
        });

        $('#dessert_country_iso_code').change(function() {
            dessert_update_currency();
        });
        $('#addon_country_iso_code').change(function() {
            addon_update_currency();
        });

        $(".update").click(function(event) {
            event.preventDefault()
            let type = $(this).attr('data-type')
            let id = $(this).attr('data-id')
            let input_id = 'input_' + type + '_' + id
            let new_price = $('#' + input_id).val()
            $.post("{{ route('update.price') }}", {
                id: id,
                type: type,
                new_price: new_price
            }, function(data, status) {
                if (data == true) {
                    alert('Price updated successfully..')
                }
            })
        })
    </script>
@endsection
