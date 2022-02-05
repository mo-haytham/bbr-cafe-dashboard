@extends('layouts.main')
@section('title', 'Custom Choices')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Custom Choices</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('d.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Custom Choices</li>
            </ol>
        </section>
        <section class="content">
            @include('components.notify_box')

            <div class="box box-success ">
                <div class="box-header with-border">
                    <h3 class="box-title">Available Custom Choices</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <form action="{{ route('d.custom.type.save', ['type' => 'choice']) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name_en">Custom Choice Name -EN</label>
                                    <input type="text" name="name_en" id="name_en" value="{{ old('name_en') }}"
                                        placeholder="Custom Choice Name - EN" class="form-control">
                                    @error('name_en')
                                        <small class="alert alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name_ar">Custom Choice Name - AR</label>
                                    <input type="text" name="name_ar" id="name_ar" value="{{ old('name_ar') }}"
                                        placeholder="Custom Choice Name - AR" class="form-control">
                                    @error('name_ar')
                                        <small class="alert alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" name="description" id="description"
                                        value="{{ old('description') }}" placeholder="Description" class="form-control">
                                    @error('description')
                                        <small class="alert alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="choice_country_iso_code">Country ISO Code</label>
                                    <select name="country_iso_code" id="choice_country_iso_code" class="form-control">
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
                                    <label for="price">Price</label>
                                    <div class="input-group">
                                        <input type="text" name="price" id="price" value="{{ old('price') }}"
                                            placeholder="Price" class="form-control">
                                        <span class="input-group-addon" id="choice_country_currency"></span>
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
                        <div class="col-xs-12 col-md-8">
                            @if (isset($choices) && count($choices) > 0)
                                <table class="table table-hover table-responsive">
                                    <tr>
                                        <th>Name - EN</th>
                                        <th>Name - AR</th>
                                        <th>Country</th>
                                        <th>Price</th>
                                        <th></th>
                                    </tr>
                                    @foreach ($choices as $choice)
                                        <tr>
                                            <td>{{ $choice->name_en }}</td>
                                            <td>{{ $choice->name_ar }}</td>
                                            <td>{{ $choice->country_iso_code }}</td>
                                            <td>{{ $choice->base_price }}</td>
                                            <td>
                                                <a href="{{ route('d.custom.type.delete', ['type' => 'choice', 'type_id' => $choice->id]) }}"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            @else
                                <p class="alert alert-danger">No Custom Choices added.</p>
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





            @if (isset($choices) && count($choices) > 0)
                <div class="box box-success collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Available Options</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        <div class="row">
                            <div class="col-xs-12 col-md-4">
                                <form action="{{ route('d.custom.type.save', ['type' => 'option']) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name_en">Option Name -EN</label>
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
                                        <label for="choice_id">Related to</label>
                                        <select name="choice_id" id="choice_id" class="form-control">
                                            <option value="0">Select Choice</option>
                                            @foreach ($choices as $choice)
                                                <option value="{{ $choice->id }}">{{ $choice->name_en }}</option>
                                            @endforeach
                                        </select>
                                        @error('choice_id')
                                            <small class="alert alert-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="is_required">Is this option required</label>
                                        <input type="checkbox" name="is_required" id="is_required">
                                    </div>

                                    <div class="form-group">
                                        <label for="max_choices">Max Choices</label>
                                        <input type="text" name="max_choices" id="max_choices" class="form-control"
                                            placeholder="Max Choices" value="{{ old('max_choices') }}">
                                        @error('max_choices')
                                            <small class="alert alert-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" value="Save" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                            <div class="col-xs-12 col-md-8">
                                @if (isset($options) && count($options) > 0)
                                    <table class="table table-hover table-responsive">
                                        <tr>
                                            <th>Name - EN</th>
                                            <th>Name - AR</th>
                                            <th>Related To</th>
                                            <th>Required</th>
                                            <th>Max Choices</th>
                                            <th></th>
                                        </tr>
                                        @foreach ($options as $option)
                                            <tr>
                                                <td>{{ $option->name_en }}</td>
                                                <td>{{ $option->name_ar }}</td>
                                                <td>{{ $option->custom_choice->name_en }}</td>
                                                <td>{{ $option->is_required == true ? 'Yes' : 'No' }}</td>
                                                <td>{{ $option->max_choices }}</td>
                                                <td>
                                                    <a href="{{ route('d.custom.type.delete', ['type' => 'option', 'type_id' => $option->id]) }}"
                                                        class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @else
                                    <p class="alert alert-danger">No Options added.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif




            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}
            {{-- ########################## --}}





            @if (isset($options) && count($options) > 0)
                <div class="box box-success collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Available Option Types</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        <div class="row">
                            <div class="col-xs-12 col-md-4">
                                <form action="{{ route('d.custom.type.save', ['type' => 'type']) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name_en">Type Name -EN</label>
                                        <input type="text" name="name_en" id="name_en" value="{{ old('name_en') }}"
                                            placeholder="Type Name - EN" class="form-control">
                                        @error('name_en')
                                            <small class="alert alert-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name_ar">Type Name - AR</label>
                                        <input type="text" name="name_ar" id="name_ar" value="{{ old('name_ar') }}"
                                            placeholder="Type Name - AR" class="form-control">
                                        @error('name_ar')
                                            <small class="alert alert-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="option_id">Related to</label>
                                        <select name="option_id" id="option_id" class="form-control">
                                            <option value="0">Select Option</option>
                                            @foreach ($options as $option)
                                                <option value="{{ $option->id }}">{{ $option->name_en }}</option>
                                            @endforeach
                                        </select>
                                        @error('option_id')
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
                            <div class="col-xs-12 col-md-8">
                                @if (isset($types) && count($types) > 0)
                                    <table class="table table-hover table-responsive">
                                        <tr>
                                            <th>Name - EN</th>
                                            <th>Name - AR</th>
                                            <th>Related To</th>
                                            <th>Calories</th>
                                            <th>Price</th>
                                            <th></th>
                                        </tr>
                                        @foreach ($types as $type)
                                            <tr>
                                                <td>{{ $type->name_en }}</td>
                                                <td>{{ $type->name_ar }}</td>
                                                <td>{{ $type->custom_choice_option->name_en }}</td>
                                                <td>{{ $type->calories }}</td>
                                                <td>{{ $type->price }}</td>
                                                <td>
                                                    <a href="{{ route('d.custom.type.delete', ['type' => 'type', 'type_id' => $type->id]) }}"
                                                        class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @else
                                    <p class="alert alert-danger">No Types added.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </section>
    </div>
@endsection
@section('script')
    <script>
        function choice_update_currency() {
            $('#choice_country_currency').text($('#choice_country_iso_code option:selected').attr('data_currency'));
        }

        $(document).ready(function() {
            choice_update_currency();
        });

        $('#choice_country_iso_code').change(function() {
            choice_update_currency();
        });
    </script>
@endsection
