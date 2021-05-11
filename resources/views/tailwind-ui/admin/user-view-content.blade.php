<div class="relative bg-rqm-dark flex flex-wrap justify-center rounded shadow w-full h-full">
    <div class="absolute inset-0 bg-repeat h-full opacity-10 w-full"
         style="background-image: url({{URL::asset('/media/bg.cleaned.png')}})">
        <span></span>
    </div>
    <div class="z-20 p-10 w-full">
        <div class="text-3xl text-rqm-yellow-darkest w-full">
            {{$user->username}}
        </div>

        <div class="text-2xl text-rqm-yellow w-full pt-5">Basic Information</div>

        <div class="pb-10 w-full">
            <form action="{{route('admin.user.edit.info',$user->id)}}" method="post">
                {{csrf_field()}}
                <div class="flex w-full pt-2">
                    <div class="pr-5 rounded w-1/2">
                        <div class="font-black text-rqm-yellow">ID</div>
                        <div><input type="text" name="id" id="id"
                                    class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow w-full"
                                    value="{{$user->id}}" readonly></div>
                    </div>
                    <div class="pl-5 rounded w-1/2">
                        <div class="font-black text-rqm-yellow">Referral code</div>
                        <div><input type="text" name="referral_code" id="referral_code"
                                    class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow w-full"
                                    value="{{$user->referral_code}}"></div>
                    </div>
                </div>
                <div class="flex pt-1 w-full">
                    <div class="pr-5 rounded w-1/2">
                        <div class="font-black text-rqm-yellow">Username</div>
                        <div><input type="text" name="username" id="username"
                                    class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow w-full"
                                    value="{{$user->username}}"></div>
                    </div>
                    <div class="pl-5 rounded w-1/2">
                        <div class="font-black text-rqm-yellow">Last login</div>
                        <div><input type="text" name="last_login" id="last_login"
                                    class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow w-full"
                                    value="{{$user->lastSeenForHumans()}}" readonly></div>
                    </div>
                </div>
                <div class="flex justify-end pt-2 w-full">
                    <button type="submit"
                            class="bg-rqm-yellow-dark font-extrabold p-2 rounded-sm text-rqm-dark text-base">
                        Save changes
                    </button>
                </div>
            </form>
        </div>

        <div class="text-2xl text-rqm-yellow w-full pt-5">User Groups</div>
        <div class="pb-10 w-full">
            <form action="{{route('admin.user.edit.group',$user)}}" method="post">
                {{csrf_field()}}
                <div class="w-full flex">
                    <div class=" pt-2 text-rqm-yellow w-1/3">
                        <div class="flex items-center">
                            <input class="" name="administrator" type="checkbox" value="adminChecked"
                                   id="administratorCheck"
                                   @if($user->isAdmin()) checked @endif>
                            <label class="px-3" for="administratorCheck">
                                Administrator
                            </label>
                        </div>
                        <small>Can access Admin Panel without the restrictions. Can change User group.</small>
                    </div>
                    <div class=" pt-2 text-rqm-yellow w-1/3">
                        <span class="px-3" for="administratorCheck">
                            Panel Permissions
                        </span>
                        <div class="">
                            @foreach(\App\User::$permissions as $permission)
                                <div class="flex items-center">
                                    <input class="" name="permissions[]" type="checkbox" value="{{ $permission }}"
                                           id="moderatorCheck"
                                           @if($user -> hasPermission($permission)) checked @endif>
                                    <label class="px-3" for="administratorCheck">
                                        {{ \App\User::$permissionsLong[$permission] }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <small>Limited access to Admin Panel. Mainly resolves disputes.</small>
                    </div>
                    <div class=" pt-2 text-rqm-yellow w-1/3">
                        <div class="flex items-center">
                            <input class="" name="vendor" type="checkbox" value="vendorChecked" id="vendorCheck"
                                   @if($user->isVendor()) checked @endif>
                            <label class="px-3" for="administratorCheck">
                                Vendor
                            </label>
                        </div>
                        <small>Give or take away user's ability to add new products</small>
                        <div class="flex items-center">
                            <input class="" name="canUseFe" type="checkbox" value="feChecked" id="vendorCheck"
                                   @if(!$user->isVendor() || !\App\Marketplace\Payment\FinalizeEarlyPayment::isEnabled()) disabled
                                   @else  @if($user->vendor->canUseFe())checked @endif @endif>
                            <label class="px-3" for="administratorCheck">
                                Finalize Early Access @if(!\App\Marketplace\Payment\FinalizeEarlyPayment::isEnabled())
                                    feature not present @endif
                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end pt-2 w-full">
                    <button type="submit"
                            class="bg-rqm-yellow-dark font-extrabold p-2 rounded-sm text-rqm-dark text-base">
                        Save changes
                    </button>
                </div>

            </form>
        </div>

    </div>
    <div class="w-full">
        <form class="form-inline" method="POST" action="{{ route('admin.user.ban', $user) }}">
            <label class="text-2xl text-rqm-yellow w-full pt-5 ">Ban user for number of days from now:</label>
            <input type="number" name="days" id="days" class=" my-2 bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow w-full" placeholder="Days">
            @csrf
            <div class="flex justify-end pt-2 w-full">
                <input type="submit" class="bg-rqm-yellow-dark font-extrabold p-2 rounded-sm text-rqm-dark text-base my-3" value="Ban">
            </div>
        </form>
    </div>
</div>
