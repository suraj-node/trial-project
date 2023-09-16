@extends('base')

@section('content')

<section>
    <div class="page-header min-vh-100">
      <div class="container">
        <div class="row">
          <div class="col-xl-8 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto">
            <div class="card card-plain">
              <div class="card-header mt-5">
                <p class="mb-0">Update Property Details</p>
              </div>
              <div class="card-body">
                <form role="form" method="post" action="{{ route('update-property') }}" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id" value="{{ $data->id }}">
                  <div class="input-group input-group-outline mb-3">
                    <input type="text" class="form-control"
                        name="county" placeholder="County"
                        value="{{ old('county', $data->county) }}">
                  </div>
                  <p class="error">{{ $errors->first('county') }}</p>

                  <div class="input-group input-group-outline mb-3">
                    <input type="text" class="form-control" name="country"
                    placeholder="Country" value="{{ old('country', $data->country) }}">
                  </div>
                  <p class="error">{{ $errors->first('country') }}</p>

                  <div class="input-group input-group-outline mb-3">
                    <input type="text" class="form-control"
                    name="town" placeholder="Town" value="{{ old('town', $data->town) }}">
                  </div>
                  <p class="error">{{ $errors->first('town') }}</p>

                  <div class="input-group input-group-outline mb-3">
                    <input type="text" class="form-control"
                    name="display_address" placeholder="Display Address"
                    value="{{ old('display_address', $data->display_address) }}">
                  </div>
                  <p class="error">{{ $errors->first('display_address') }}</p>

                  <div class="input-group input-group-outline mb-3">
                    <select class="form-control" name="number_of_bedrooms">
                        <option value="{{ $data->number_of_bedrooms }}">{{ $data->number_of_bedrooms }}</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                  </div>
                  <p class="error">{{ $errors->first('number_of_bedrooms') }}</p>

                  <div class="input-group input-group-outline mb-3">
                    <select class="form-control" name="number_of_bathrooms">
                        <option value="{{ $data->number_of_bathrooms }}">{{ $data->number_of_bathrooms }}</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                  </div>
                  <p class="error">{{ $errors->first('number_of_bathrooms') }}</p>

                  <div class="input-group input-group-outline mb-3">
                    <input type="text" class="form-control" name="price"
                    placeholder="Price" value="{{ old('price', $data->price) }}">
                  </div>
                  <p class="error">{{ $errors->first('price') }}</p>

                  <div class="input-group input-group-outline mb-3">
                  <select class="form-control" name="property_type">
                    <option value="{{ $data->property_type  }}">{{ $data->property_type  }}</option>
                    <option value="Terraced">Terraced</option>
                    <option value="Flat">Flat</option>
                    <option value="Semi-detached">Semi-detached</option>
                    <option value="Cottage">Cottage</option>
                    <option value="Bungalow">Bungalow</option>
                    <option value="End of Terrace">End of Terrace</option>
                </select>
                  </div>
                  <p class="error">{{ $errors->first('property_type') }}</p>

                  <div class="input-group input-group-outline mb-3">
                    @if($data->type == 'sale')
                    Sale<input type="radio" class="form-control" name="type" value="sale" checked="checked">
                    Rent<input type="radio" class="form-control" name="type" value="rent">
                    @else
                    Sale<input type="radio" class="form-control" name="type" value="sale">
                    Rent<input type="radio" class="form-control" name="type" value="rent" checked="checked">
                    @endif
                  </div>
                  <p class="error">{{ $errors->first('type') }}</p>

                  <div class="input-group input-group-outline mb-3">
                    <textarea class="form-control" rows="5"
                    name="description">{{ old('description', $data->description) }}</textarea>
                  </div>
                  <p class="error">{{ $errors->first('description') }}</p>

                  <div class="input-group input-group-outline mb-3">
                    <input type="file" class="form-control" name="image">
                  </div>
                  <img src="{{ $data->thumbnail }}" alt="thumbnail">
                  <p class="error">{{ $errors->first('image') }}</p>

                  <div class="text-center">
                    <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Update</button>
                    <a href="{{ route('home') }}" class="btn btn-info mt-1 btn-sm">Go Home</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
