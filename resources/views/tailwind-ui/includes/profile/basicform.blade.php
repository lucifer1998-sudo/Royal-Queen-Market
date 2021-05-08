@extends('includes.profile.addingform')

@section('bg')
    @include('master.navbar')
    @include('includes.jswarning')
@endsection

@section('form-content')
    <form method="POST" action="{{ route('profile.vendor.product.add.post', optional($basicProduct) -> exists ? $basicProduct : null) }}">
        {{ csrf_field() }}
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-white font-bold mb-2">
                    Products Name
                </label>
                <input type="text" class="appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight bg-rqm-dark border-rqm-yellow-darkest p-3 text-rqm-white @error('name', $errors) is-invalid @enderror" id="name"
                       name="name" placeholder="Product name" value="{{ optional($basicProduct) -> name }}"
                       maxlength="100">
                @error('name', $errors)
                <div class="invalid-feedback d-block text-center">
                    {{ $errors -> first('name') }}
                </div>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-white font-bold mb-2">
                    Products Category
                </label>
                <div class="relative" >
                    <select name="category_id" class="appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight bg-rqm-dark border-rqm-yellow-darkest p-3 text-rqm-white">
                        @foreach($allCategories as $category)
                            <option value="{{ $category -> id }}"
                                    @if($category -> id == optional($basicProduct) -> category_id) selected @endif>{{ $category -> name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('category_id', $errors)
                <div class="invalid-feedback d-block text-center">
                    {{ $errors -> first('category_id') }}
                </div>
                @enderror
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-white font-bold mb-2">
                    Products Description
                </label>
                <textarea name="description" id="description"
                          class="bg-rqm-dark border border-rqm-yellow-darkest p-3 text-rqm-white w-full rounded" rows="20"
                          placeholder="Details about the product">{{ optional($basicProduct) -> description }}</textarea>
                <p>
                    <i class="fab fa-markdown"></i> Styling with Markdown is supported
                </p>
                @error('description', $errors)
                <div class="invalid-feedback d-block text-center">
                    {{ $errors -> first('description') }}
                </div>
                @enderror
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 py-10">
                <label class="block uppercase tracking-wide text-white font-bold mb-2">
                    Payment Rules
                </label>
                <textarea name="rules" id="rules" class="bg-rqm-dark border border-rqm-yellow-darkest p-3 text-rqm-white w-full rounded @error('rules', $errors) is-invalid @enderror"
                          rows="10"
                          placeholder="Rules of conducting business">{{ optional($basicProduct) -> rules }}</textarea>
                <p>
                    <i class="fab fa-markdown"></i> Styling with Markdown is supported
                </p>
                @error('rules', $errors)
                <div class="invalid-feedback d-block text-center">
                    {{ $errors -> first('rules') }}
                </div>
                @enderror
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-white font-bold mb-2">
                    Supported types
                </label>
                <div class="relative">
                    <select name="types[]" id="types" multiple multiple class="bg-rqm-dark border-rqm-yellow-darkest p-3 text-rqm-white block appearance-none w-full bg-gray-200 border py-3 px-4 pr-8 rounded leading-tight focus:outline-none ">
                        @foreach(\App\Purchase::$types as $type => $typeLongName)

                            <option value="{{ $type }}" {{ optional($basicProduct) -> supportsType($type) ? 'selected' : '' }}>{{ $typeLongName }}</option>

                        @endforeach
                    </select>
                    @error('types', $errors)
                    <div class="invalid-feedback d-block text-center">
                        {{ $errors -> first('types') }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-white font-bold mb-2">
                    Supported coins
                </label>
                <div class="relative">
                    <select name="coins[]" id="coins" multiple class="bg-rqm-dark border-rqm-yellow-darkest p-3 text-rqm-white block appearance-none w-full bg-gray-200 border py-3 px-4 pr-8 rounded leading-tight focus:outline-none">
                        @foreach(config('coins.coin_list') as $coin => $instance)
                            <option value="{{ $coin }}" {{ optional($basicProduct) -> supportsCoin($coin) ? 'selected' : '' }}>{{ strtoupper(\App\Purchase::coinDisplayName($coin)) }}</option>
                        @endforeach
                    </select>
                    @error('coins', $errors)
                    <div class="invalid-feedback d-block text-center">
                        {{ $errors -> first('coins') }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-white font-bold mb-2">
                    Quantity
                </label>
                <input type="number" class="appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight bg-rqm-dark border-rqm-yellow-darkest p-3 text-rqm-white @error('quantity', $errors) is-invalid @enderror"
                       @if(optional($basicProduct) -> isAutodelivery()) readonly @endif
                       name="quantity" id="quantity" min="1" placeholder="Number of products"
                       value="{{ optional($basicProduct) -> quantity }}">
                @error('quantity', $errors)
                <div class="invalid-feedback d-block text-center">
                    {{ $errors -> first('quantity') }}
                </div>
                @enderror
                @if(optional($basicProduct) -> isAutodelivery())
                    <p class="text-muted">The product is marked as autodelivery, you can't change quantity manually.</p>
                @endif
            </div>
            <div class="w-full md:w-1/2 px-3 ">
                <label class="block uppercase tracking-wide text-white  font-bold mb-2">
                    Measure
                </label>
                <input type="text" maxlength="10" class="appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight bg-rqm-dark border-rqm-yellow-darkest p-3 text-rqm-white @error('mesure', $errors) is-invalid @enderror"
                       id="mesure" name="mesure" placeholder="Unit of mesure(item, gram)"
                       value="{{ optional($basicProduct) -> mesure }}">
                @error('mesure', $errors)
                <div class="invalid-feedback d-block text-center">
                    {{ $errors -> first('mesure') }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-row justify-content-center">
            <div class="form-group col-md-3 text-center">
                @if(request() -> is('profile/vendor/product/edit/*'))
                    <button class="bg-rqm-yellow-dark font-extrabold px-5 py-1 rounded-3xl text-rqm-dark text-center mb-4" type="submit"><i class="far fa-save mr-2"></i> Save</button>
                    <a href="{{ route('profile.vendor.product.edit', [$basicProduct, 'offers']) }}"
                       class="btn btn-outline-primary">Next</a>
                @elseif(request() -> is('admin/product/*'))
                    <button class="bg-rqm-yellow-dark font-extrabold px-5 py-1 rounded-3xl text-rqm-dark text-center mb-4" type="submit"><i class="far fa-save mr-2"></i> Save</button>
                    <a href="{{ route('admin.product.edit', [$basicProduct, 'offers']) }}"
                       class="btn btn-outline-primary">Next</a>
                @else
                    <button class="bg-rqm-yellow-dark font-extrabold px-5 py-1 rounded-3xl text-rqm-dark text-center mb-4" type="submit">Next
                    </button>
                @endif
            </div>
        </div>
    </form>
@stop
