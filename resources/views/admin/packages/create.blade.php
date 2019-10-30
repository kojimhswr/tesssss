@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
=@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i> {{ $pageTitle }} - {{ $subTitle }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row user">
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    <div class="tile">
                        <form action="{{ route('admin.packages.store') }}" method="POST" role="form">
                            @csrf
                            <h3 class="tile-title">Package Information</h3>
                            <hr>
                            <div class="tile-body">
                                <div class="form-group">
                                    <label class="control-label" for="name">Package Name</label>
                                    <input
                                        class="form-control @error('name') is-invalid @enderror"
                                        type="text"
                                        placeholder="Enter package name"
                                        id="name"
                                        name="name"
                                        value="{{ old('name') }}"
                                    />
                                    <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('name') <span>{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="duration">Duration (days) </label>
                                            <input
                                                class="form-control @error('duration') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter package Duration"
                                                id="duration"
                                                name="duration"
                                                value="{{ old('duration') }}"
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('duration') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="ship_id">Ship</label>
                                            <select name="ship_id" id="ship_id" class="form-control @error('ship_id') is-invalid @enderror">
                                                <option value="0">Select a ship</option>
                                                @foreach($ships as $ship)
                                                    <option value="{{ $ship->id }}">{{ $ship->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('ship_id') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="start">Start</label>
                                            <input
                                                class="form-control mdate @error('start') is-invalid @enderror"
                                                type="date"
                                                placeholder="Enter starting date"
                                                id="start"
                                                name="start"
                                                value="{{ old('start') }}"
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('start') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="end">End</label>
                                            <input
                                            class="form-control mdate @error('end') is-invalid @enderror"
                                            type="date"
                                            placeholder="Enter finish date"
                                            id="end"
                                            name="end"
                                            value="{{ old('end') }}"
                                        />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('end') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="regions">Regions</label>
                                            <select name="regions[]" id="regions" class="form-control" multiple>
                                                @foreach($regions as $region)
                                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="destination">Destination </label>
                                                <input
                                                    class="form-control @error('destination') is-invalid @enderror"
                                                    type="text"
                                                    placeholder="Enter package destination"
                                                    id="destination"
                                                    name="destination"
                                                    value="{{ old('destination') }}"
                                                />
                                                <div class="invalid-feedback active">
                                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('destination') <span>{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <legend class="text-bold">Cruise Plan
                                    <button type="button" class="btn btn-primary" id="add_option1" style="float:right" data-action="add">Add Itinary(+)</button>
                                   </legend>
                                    <table class="table table-bordered">
                                        <tbody id="itinerary">
                                            <tr>
                                                  <td>
                                                  <input type="date" name="time1[]" id="time1" class="form-control" placeholder="Itinary Time">  
                                                  </td>
                                                  <td >
                                                       <input type="text" name="itinary_name1[]" id="itinary_name1" class="form-control" placeholder="Itinary Name">  
                                                  </td>
                                                  <td>
                                                      <button type="button" class="btn btn-danger btn-xs " >-</button>
                                                  </td> 
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="price">Price</label>
                                            <input
                                                class="form-control @error('price') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter package price"
                                                id="price"
                                                name="price"
                                                value="{{ old('price') }}"
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('price') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="special_price">Sale Price</label>
                                            <input
                                                class="form-control"
                                                type="text"
                                                placeholder="Enter package sale price"
                                                id="sale_price"
                                                name="sale_price"
                                                value="{{ old('sale_price') }}"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="description">Description</label>
                                    <textarea name="description" id="description" rows="8" class="form-control summernote"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="indluced">Included :</label>
                                    <textarea name="included" id="included" rows="8" class="form-control summernote"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="not_indluced">Not Included :</label>
                                    <textarea name="not_included" id="not_included" rows="8" class="form-control summernote"></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input"
                                                   type="checkbox"
                                                   id="status"
                                                   name="status"
                                                />Status
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input"
                                                   type="checkbox"
                                                   id="featured"
                                                   name="featured"
                                                />Featured
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="tile-footer">
                                <div class="row d-print-none mt-2">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Package</button>
                                        <a class="btn btn-danger" href="{{ route('admin.packages.index') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/package.js') }}"></script>
    <script>
        $( document ).ready(function() {
            $('#regions').select2();
        });

    </script>
@endpush
