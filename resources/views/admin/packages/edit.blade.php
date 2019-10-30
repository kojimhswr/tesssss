@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/js/plugins/dropzone/dist/min/dropzone.min.css') }}"/>
@endsection
@section('content')
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
                    <li class="nav-item"><a class="nav-link" href="#images" data-toggle="tab">Images</a></li>
                    <li class="nav-item"><a class="nav-link" href="#attributes" data-toggle="tab">Attributes</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    <div class="tile">
                        <form action="{{ route('admin.packages.update') }}" method="POST" role="form">
                            @csrf
                            <h3 class="tile-title">Package Information</h3>
                            <hr>
                            <div class="tile-body">
                                <div class="form-group">
                                    <label class="control-label" for="name">Name</label>
                                    <input
                                        class="form-control @error('name') is-invalid @enderror"
                                        type="text"
                                        placeholder="Enter attribute name"
                                        id="name"
                                        name="name"
                                        value="{{ old('name', $package->name) }}"
                                    />
                                    <input type="hidden" name="package_id" value="{{ $package->id }}">
                                    <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('name') <span>{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="duration">Duration (days)</label>
                                            <input
                                                class="form-control @error('duration') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter package duration"
                                                id="duration"
                                                name="duration"
                                                value="{{ old('duration', $package->duration) }}"
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
                                                    @if ($package->ship_id == $ship->id)
                                                        <option value="{{ $ship->id }}" selected>{{ $ship->name }}</option>
                                                    @else
                                                        <option value="{{ $ship->id }}">{{ $ship->name }}</option>
                                                    @endif
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
                                                value="{{ $package->start }}"
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
                                            value="{{ $package->end }}"
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
                                                    @php $check = in_array($region->id, $package->regions->pluck('id')->toArray()) ? 'selected' : ''@endphp
                                                    <option value="{{ $region->id }}" {{ $check }}>{{ $region->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="destination">Destination</label>
                                                <input
                                                    class="form-control @error('destination') is-invalid @enderror"
                                                    type="text"
                                                    placeholder="Enter package destination"
                                                    id="destination"
                                                    name="destination"
                                                    value="{{ old('destination', $package->destination) }}"
                                                />
                                                <div class="invalid-feedback active">
                                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('destination') <span>{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="row">
                                    <legend class="text-bold">Cruise Plan        :
                                    <button type="button" class="btn btn-primary" id="add_option1" data-action="add">Add Itinary(+)</button>
                                   </legend>
                                    <table class="table table-bordered">
                                        <tbody id="itinerary">
                                            @if (count($package->itinerary)>0)
                                            @foreach ($package->itinerary as $one)       
                                            <tr>
                                                  <td>
                                                  <input type="date" name="time1[]" id="time1" class="form-control" placeholder="Itinary Time" value="{{$one->time1}}">  
                                                  </td>
                                                  <td >
                                                       <input type="text" name="itinary_name1[]" id="itinary_name1" class="form-control" placeholder="Itinary Name" value="{{$one->itinary_name1}}">  
                                                  </td>
                                                  <td>
                                                      <button type="button" class="btn btn-danger btn-xs " >-</button>
                                                  </td> 
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
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
                                                value="{{ old('price', $package->price) }}"
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('price') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="sale_price">Sale Price</label>
                                            <input
                                                class="form-control"
                                                type="text"
                                                placeholder="Enter package sale_price"
                                                id="sale_pricee"
                                                name="sale_price"
                                                value="{{ old('sale_price', $package->sale_price) }}"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="description">Description</label>
                                    <textarea name="description" id="description" rows="8" class="form-control summernote">{{ old('description', $package->description) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="included">Included :</label>
                                    <textarea name="included" id="included" rows="8" class="form-control summernote">{{ old('included', $package->included) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="not_included">Not Included :</label>
                                    <textarea name="not_included" id="not_included" rows="8" class="form-control summernote">{{ old('not_included', $package->not_included) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input"
                                                   type="checkbox"
                                                   id="status"
                                                   name="status"
                                                   {{ $package->status == 1 ? 'checked' : '' }}
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
                                                   {{ $package->featured == 1 ? 'checked' : '' }}
                                                />Featured
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="tile-footer">
                                <div class="row d-print-none mt-2">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Package</button>
                                        <a class="btn btn-danger" href="{{ route('admin.packages.index') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane" id="images">
                    <div class="tile">
                        <h3 class="tile-title">Upload Image</h3>
                        <hr>
                        <div class="tile-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="" class="dropzone" id="dropzone" style="border: 2px dashed rgba(0,0,0,0.3)">
                                        <input type="hidden" name="package_id" value="{{ $package->id }}">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                            <div class="row d-print-none mt-2">
                                <div class="col-12 text-right">
                                    <button class="btn btn-success" type="button" id="uploadButton">
                                        <i class="fa fa-fw fa-lg fa-upload"></i>Upload Images
                                    </button>
                                </div>
                            </div>
                            @if ($package->images)
                                <hr>
                                <div class="row">
                                    @foreach($package->images as $image)
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <img src="{{ asset('storage/'.$image->full) }}" id="shipLogo" class="img-fluid" alt="img">
                                                    <a class="card-link float-right text-danger" href="{{ route('admin.packages.images.delete', $image->id) }}">
                                                        <i class="fa fa-fw fa-lg fa-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="attributes">
                    <package-attributes :packageid="{{ $package->id }}"></package-attributes>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dropzone.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/bootstrap-notify.min.js') }}"></script>
    <script type="application/x-javascript" src="{{ asset('backend/js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/package.js') }}"></script>

    <script>
        Dropzone.autoDiscover = false;

        $( document ).ready(function() {
            $('#regions').select2();

            let myDropzone = new Dropzone("#dropzone", {
                paramName: "image",
                addRemoveLinks: false,
                maxFilesize: 4,
                parallelUploads: 2,
                uploadMultiple: false,
                url: "{{ route('admin.packages.images.upload') }}",
                autoProcessQueue: false,
            });
            myDropzone.on("queuecomplete", function (file) {
                window.location.reload();
                showNotification('Completed', 'All package images uploaded', 'success', 'fa-check');
            });
            $('#uploadButton').click(function(){
                if (myDropzone.files.length === 0) {
                    showNotification('Error', 'Please select files to upload.', 'danger', 'fa-close');
                } else {
                    myDropzone.processQueue();
                }
            });
            function showNotification(title, message, type, icon)
            {
                $.notify({
                    title: title + ' : ',
                    message: message,
                    icon: 'fa ' + icon
                },{
                    type: type,
                    allow_dismiss: true,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                });
            }
        });
    </script>
@endpush
