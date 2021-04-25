<div class="pl-10 w-5/6">
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
            <div class="text-sm">{{$vendor->experience}}/{{max($vendor->nextLevelXp()-$vendor->experience,0)}} point{{$vendor->experience > 1 || $vendor->experience == 0 ? 's' : ''}}</div>
        </div>
    </div>
</div>
