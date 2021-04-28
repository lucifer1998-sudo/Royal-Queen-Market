<div class="h-full">
    <div class="bg-rqm-dark p-5 rounded shadow w-full">
        <span class="block text-gray-400 text-rqm-yellow-darkest text-xl">Stats</span>
        <div class="py-3">
            <span class="text-rqm-yellow text-sm block">lvl. {{$vendor->getLevel()}}</span>
            <span class="text-rqm-yellow text-sm">Experience</span>
            <div class="bg-rqm-light h-1 shadow">
                @if($vendor->nextLevelProgress() <= 0)
                    <div class="h-1 bg-rqm-yellow-darkest w-0.5"></div>
                @else
                    <div class="h-1 bg-rqm-yellow-darkest" style="width: {{$vendor->nextLevelProgress()}}%"></div>
                @endif
            </div>
            <div class="text-sm">{{$vendor->experience}}/{{max($vendor->nextLevelXp(),0)}} point{{$vendor->experience > 1 || $vendor->experience == 0 ? 's' : ''}}</div>
        </div>
    </div>
    <div class="bg-rqm-dark p-5 rounded shadow w-full mt-4">
        <span class="block text-gray-400 text-rqm-yellow-darkest text-xl">Profile</span>
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
                    <textarea name="description" id="" cols="30" rows="6" class="bg-rqm-dark border border-rqm-yellow-darkest p-3 text-rqm-yellow w-full rounded" placeholder="Type here..">{{$vendor->about}}</textarea>
                    <div class="mt-3">
                        <label class="text-rqm-yellow" for="profilebg">Profile background</label>
                    </div>
                    <select name="profilebg" id="profilebg" class="bg-rqm-dark border border-rqm-yellow-darkest px-3 text-rqm-yellow w-full rounded h-7">
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

</div>
