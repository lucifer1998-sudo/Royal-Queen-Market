<div class="relative bg-rqm-dark flex flex-wrap justify-center rounded shadow w-full h-full">
    <div class="absolute inset-0 bg-repeat h-full opacity-10 w-full" style="background-image: url({{URL::asset('/media/bg.cleaned.png')}})">
        <span></span>
    </div>
    <div class="z-20 p-10 w-full">
        <div class="pb-10 w-full">
            <form action="{{ route('admin.categories.new') }}"  method="POST" class="flex w-full">
                {{ csrf_field() }}
                <input name="name" id="name" class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow w-1/4" placeholder="Name" />
                <select name="parent_id" id="parent_id" class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow w-2/4 mx-2">
                    <option value="" selected>No parent category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category -> id }}">{{ $category -> name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="bg-rqm-yellow-dark font-extrabold px-2 py-1 rounded-sm text-rqm-dark text-sm w-1/4">
                    Add
                </button>
            </form>
        </div>
        <table class="table-auto w-full">
            <thead class="border-b border-rqm-yellow-dark">
            <tr>
                <th class="px-2 text-center text-left text-rqm-yellow">Category</th>
                <th class="px-2 text-center text-left text-rqm-yellow">Parent</th>
                <th class="px-2 text-center text-left text-rqm-yellow">Action</th>
            </tr>
            </thead>
            <tbody>
            @php
                $counter = 0;
            @endphp
            @if($rootCategories -> isNotEmpty())
                @include('tailwind-ui.includes.listcategories', ['categories' => $rootCategories])
            @else
                <div class="alert alert-warning text-center">There are no categories!</div>
            @endif
            </tbody>
        </table>
    </div>
</div>
