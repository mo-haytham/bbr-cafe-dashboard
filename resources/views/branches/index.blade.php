@extends('layouts.main')

@section('title', 'Locations & Branches')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Locations & Branches Control</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('d.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Locations & Branches</li>
            </ol>
        </section>
        <section class="content">
            @include('components.notify_box')

            {{-- locations start --}}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Available Locations</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <div class="row">
                        {{-- countries form --}}
                        <div class="col-xs-12 col-md-4">
                            <form action="{{ route('d.country.save') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name_en">Country Name - EN</label>
                                    <input type="text" name="name_en" id="name_en" value="{{ old('name_en') }}"
                                        placeholder="Country Name - EN" class="form-control">
                                    @error('name_en')
                                        <small class="alert alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name_ar">Country Name - AR</label>
                                    <input type="text" name="name_ar" id="name_ar" value="{{ old('name_ar') }}"
                                        placeholder="Country Name - AR" class="form-control">
                                    @error('name_ar')
                                        <small class="alert alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="country_iso_code">Country ISO Code</label>
                                    <input type="text" name="country_iso_code" id="country_iso_code"
                                        value="{{ old('country_iso_code') }}" placeholder="Country ISO Code"
                                        class="form-control">
                                    @error('country_iso_code')
                                        <small class="alert alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="currency">Country Currency</label>
                                    <input type="text" name="currency" id="currency" value="{{ old('currency') }}"
                                        placeholder="Country Currency" class="form-control">
                                    @error('currency')
                                        <small class="alert alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Save" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                        {{-- countries table --}}
                        <div class="col-xs-12 col-md-8">
                            @if (isset($countries) && count($countries) > 0)
                                <table class="table table-hover table-responsive">
                                    <tr>
                                        <th>Name - EN</th>
                                        <th>Name - AR</th>
                                        <th>ISO Code</th>
                                        <th>Currency</th>
                                        <th></th>
                                    </tr>
                                    @foreach ($countries as $country)
                                        <tr>
                                            <td>{{ $country->name_en }}</td>
                                            <td>{{ $country->name_ar }}</td>
                                            <td>{{ $country->country_iso_code }}</td>
                                            <td>{{ $country->currency }}</td>
                                            <td>
                                                <a href="{{ route('d.country.delete', ['country_id' => $country->id]) }}"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            @else
                                <p class="alert alert-danger">No countries added.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            {{-- locations end --}}

            {{-- branches start --}}
            @if (isset($countries) && count($countries) > 0)
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Available Branches</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        <div class="row">
                            {{-- branches form start --}}
                            <div class="col-xs-12 col-md-4">
                                @error('mobile')
                                    <small class="alert alert-danger">{{ $message }}</small>
                                @enderror
                                @error('mobile.*')
                                    <small class="alert alert-danger">{{ $message }}</small>
                                @enderror
                                <form action="{{ route('d.branch.save') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name_en">Branch Name - EN</label>
                                        <input type="text" name="name_en" id="name_en" value="{{ old('name_en') }}"
                                            placeholder="Branch Name - EN" class="form-control">
                                        @error('name_en')
                                            <small class="alert alert-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name_ar">Branch Name - AR</label>
                                        <input type="text" name="name_ar" id="name_ar" value="{{ old('name_ar') }}"
                                            placeholder="Branch Name - AR" class="form-control">
                                        @error('name_ar')
                                            <small class="alert alert-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="country_iso_code">Branch Country</label>
                                        <select name="country_iso_code" id="country_iso_code" class="form-control">
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->country_iso_code }}">
                                                    {{ $country->name_en }}</option>
                                            @endforeach
                                        </select>
                                        @error('country_iso_code')
                                            <small class="alert alert-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="is_default">Is Default</label>
                                        <input type="checkbox" name="is_default" id="is_default">
                                    </div>
                                    <div class="form-group">
                                        <label for="address_en">Branch Address - EN</label>
                                        <input type="text" name="address_en" id="address_en"
                                            value="{{ old('address_en') }}" placeholder="Branch Address"
                                            class="form-control">
                                        @error('address_en')
                                            <small class="alert alert-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="address_ar">Branch Address - AR</label>
                                        <input type="text" name="address_ar" id="address_ar"
                                            value="{{ old('address_ar') }}" placeholder="Branch Address"
                                            class="form-control">
                                        @error('address_ar')
                                            <small class="alert alert-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="mobile">Mobile</label><small id="new_mobile"
                                            class="btn text-danger btn-xs">Add New Number</small>
                                        <div id="mobile_container">
                                            <input type="tel" name="mobile[]" id="mobile" class="form-control"
                                                placeholder="Mobile">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="facebook">Facebook Link</label>
                                        <input type="url" name="facebook" id="facebook" value="{{ old('facebook') }}"
                                            placeholder="Facebook Link" class="form-control">
                                        @error('facebook')
                                            <small class="alert alert-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="twitter">Twitter Link</label>
                                        <input type="url" name="twitter" id="twitter" value="{{ old('twitter') }}"
                                            placeholder="Twitter Link" class="form-control">
                                        @error('twitter')
                                            <small class="alert alert-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="instagram">Instagram Link</label>
                                        <input type="url" name="instagram" id="instagram" value="{{ old('instagram') }}"
                                            placeholder="Instagram Link" class="form-control">
                                        @error('instagram')
                                            <small class="alert alert-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Save" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                            {{-- branches form end --}}

                            {{-- branches info start --}}
                            <div class="col-xs-12 col-md-8">
                                <div class="form-inline">
                                    <div class="form-group">
                                        <label for="select_default_branch">Default Branch</label>
                                        <select name="select_default_branch" id="select_default_branch"
                                            class="form-control" style="margin: 0 5px 0 5px;">
                                            @foreach ($branches as $branch)
                                                <option value="{{ $branch->id }}"
                                                    {{ $branch->is_default == 1 ? 'selected' : '' }}>
                                                    {{ $branch->name_en }}</option>
                                            @endforeach
                                        </select>
                                        <small class="" id="select_default_branch_message"></small>
                                    </div>
                                </div>
                                <hr>
                                {{-- branches table start --}}
                                @if (isset($branches) && count($branches) > 0)
                                    <table class="table table-hover table-responsive">
                                        <tr>
                                            <th>Name - EN</th>
                                            <th>Name - AR</th>
                                            <th>ISO Code</th>
                                            <th></th>
                                        </tr>
                                        @foreach ($branches as $branch)
                                            <tr>
                                                <td>{{ $branch->name_en }}</td>
                                                <td>{{ $branch->name_ar }}</td>
                                                <td>{{ $branch->country_iso_code }}</td>
                                                <td>
                                                    <a href="{{ route('d.branch.delete', ['branch_id' => $branch->id]) }}"
                                                        class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @else
                                    <p class="alert alert-danger">No branches added.</p>
                                @endif
                                {{-- branches table end --}}
                            </div>
                            {{-- branches info end --}}
                        </div>
                    </div>
                </div>
            @endif
            {{-- branches end --}}

        </section>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $("#select_default_branch_message").hide();

            // add new mobile number to branch form
            let element =
                `<input type="tel" name="mobile[]" id="mobile" class="form-control" placeholder="Mobile">`;
            $('#new_mobile').click(function(e) {
                e.preventDefault();
                $('#mobile_container').append(element);
            });

            // set default branch
            $("#select_default_branch").change(function() {
                let branch_id = this.value;
                $.ajax({
                    url: "{{ route('d.branch.set.default') }}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "branch_id": branch_id
                    },
                    success: function() {
                        $("#select_default_branch_message").addClass("text-success");
                        $("#select_default_branch_message").text(
                            "Branch set default successfully..");
                        $("#select_default_branch_message").show();
                        setTimeout(() => {
                            $("#select_default_branch_message").removeClass(
                                "text-success");
                            $("#select_default_branch_message").text("");
                            $("#select_default_branch_message").hide();
                        }, 5000);

                    }
                });
            });
        });
    </script>
@endsection
