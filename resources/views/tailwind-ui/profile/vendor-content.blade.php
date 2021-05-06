<div class="h-full">
    <div class="bg-rqm-lighter p-5 rounded shadow w-full">
        <span class="block text-gray-400 text-rqm-yellow text-xl">Stats</span>
        <div class="py-3">
            <span class="text-rqm-white text-sm block">lvl. {{$vendor->getLevel()}}</span>
            <span class="text-rqm-white text-sm">Experience</span>
            <div class="bg-rqm-light h-1 shadow">
                @if($vendor->nextLevelProgress() <= 0)
                    <div class="h-1 bg-rqm-yellow-darkest w-0.5"></div>
                @else
                    <div class="h-1 bg-rqm-yellow-darkest" style="width: {{$vendor->nextLevelProgress()}}%"></div>
                @endif
            </div>
            <div class="text-sm text-rqm-yellow">{{$vendor->experience}}/{{max($vendor->nextLevelXp(),0)}} point{{$vendor->experience > 1 || $vendor->experience == 0 ? 's' : ''}}</div>
        </div>
    </div>
    <div class="bg-rqm-lighter p-5 rounded shadow w-full mt-4">
        <span class="block text-gray-400 text-rqm-yellow text-xl">Profile</span>
        <div class="py-3">
            <div class="h-20 rounded">
                <img src="{{URL::asset('/media/profile-bg-1.jpg')}}" class="object-cover h-full w-24 w-full" alt="Profile background">
            </div>
            <div>
                <form action="{{route('profile.vendor.update.post')}}" method="post">
                    {{csrf_field()}}
                    <div class="mt-3">
                        <label class="mt-3 text-rqm-yellow">Description</label>
                    </div>
                    <textarea name="description" id="" cols="30" rows="6" class="bg-rqm-dark border border-rqm-yellow-darkest p-3 text-rqm-white w-full rounded" placeholder="Type here..">{{$vendor->about}}</textarea>
                    <div class="mt-3">
                        <label class="text-rqm-yellow" for="profilebg">Profile background</label>
                    </div>
                    <select name="profilebg" id="profilebg" class="bg-rqm-dark border border-rqm-yellow-darkest px-3 text-rqm-white w-full rounded h-7">
                        @foreach(config('vendor.profile_bgs') as $key => $class)
                            <option value="{{$key}}" @if($vendor->getProfileBg() == $class) selected @endif><p>{{ucfirst($key)}}</p></option>
                        @endforeach
                    </select>
                    <div class="flex py-1 justify-end">
                        <button type="submit" class="bg-rqm-yellow-dark font-extrabold px-3 py-1 rounded-sm text-rqm-dark">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="bg-rqm-lighter p-5 rounded shadow w-full mt-4">
        <h3 class="text-rqm-yellow">Add product</h3>
        <hr class="border-rqm-yellow-darkest">
   
            <div class="card">
                <div class="card-body text-center">
                    <p class="text-rqm-white my-3">Products includes shipping options.</p>
                    <a href="{{ route('profile.vendor.product.add') }}">

                    <button type="submit" class="bg-rqm-yellow-dark font-extrabold px-3 py-1 rounded-sm text-rqm-dark">
                            Add New Product
                        </button></a>
                </div>
            </div>
       
    </div>

    <div class="bg-rqm-lighter p-5 rounded shadow w-full mt-4">
        <h3 class="text-rqm-yellow">My products</h3>
        <hr class="border-rqm-yellow-darkest">

        @if(auth() -> user() -> products -> isNotEmpty())

            <table class="table-auto w-full">
                <thead class="border-b border-rqm-yellow-dark">
                    <tr >
                        <th class="px-2 text-center text-left text-rqm-yellow">Title</th>
                        <th class="px-2 text-center text-left text-rqm-yellow">Quantity</th>
                        <th class="px-2 text-center text-left text-rqm-yellow">Price from</th>
                        <th class="px-2 text-center text-left text-rqm-yellow">Category</th>
                        <th class="px-2 text-center text-left text-rqm-yellow">Type</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($myProducts as $product)
                        <tr>
                            <td class="border-gray-600 border-r px-2 py-2 text-rqm-white text-center"><a href="{{ route('product.show', $product) }}">{{ $product -> name }}</a></td>
                            <td class="border-gray-600 border-r px-2 py-2 text-rqm-white text-center">{{ $product -> quantity }}</td>
                            <td class="border-gray-600 border-r px-2 py-2 text-rqm-white text-center">@include('includes.currency', ['usdValue' => $product -> price_from ])</td>
                            <td class="border-gray-600 border-r px-2 py-2 text-rqm-white text-center"><a href="{{ route('category.show', $product -> category) }}">{{ $product -> category -> name }}</a></td>
                            <td class="border-gray-600 border-r px-2 py-2 text-rqm-white text-center"><span class="badge badge-primary">{{ $product -> isDigital() ? 'Digital' : 'Physical' }}</span></td>
                            <td class="border-gray-600 border-r px-2 py-2 text-rqm-white">
                                <a href="{{ route('profile.vendor.product.clone.show', $product ) }}" class="btn btn-sm btn-info">
                                    Clone
                                </a>
                                <a href="{{ route('profile.vendor.product.edit', $product ) }}" class="float-left">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </a>
                                <a href="{{ route('profile.vendor.product.remove.confirm', $product ) }}" class="float-left ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                  <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                </a>
                                <a href="{{ route('profile.vendor.product.toggle.confirm', $product ) }}" class="float-left">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

            {{{ $myProducts -> links('tailwind-ui.includes.paginate') }}}

        @else
            <div class="alert alert-warning text-center">
                You don't have any products!
            </div>
        @endif   
    </div>

</div>
