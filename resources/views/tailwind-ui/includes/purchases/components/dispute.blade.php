<div class="w-full">
    <div class="h-full">
        <div class="bg-rqm-lighter p-5 rounded shadow w-full">
            @if($purchase -> isDisputed())
                <label class="text-2xl text-gray-400 block text-rqm-yellow">
                    Dispute
                </label>
                <hr>
                @if(!$purchase -> dispute -> isResolved() && auth() -> user() -> isAdmin())
                    <h5 class="mb-1 text-white">Resolve dispute</h5>
                    <form action="{{ route('profile.purchases.disputes.resolve', $purchase) }}" class="form-inline"
                          method="POST">
                        {{ csrf_field() }}
                        <label for="winner" class="mr-2 text-white">Dispute winner:</label>
                        <select name="winner" id="winner" class="appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight bg-rqm-dark border-rqm-yellow-darkest p-3 text-rqm-white ">
                            <option value="{{ $purchase -> buyer -> id }}">{{ $purchase -> buyer -> username }} -
                                buyer
                            </option>
                            <option value="{{ $purchase -> vendor -> id }}">{{ $purchase -> vendor -> user -> username }}
                                - vendor
                            </option>
                        </select>
                        <button type="submit" class="items-center justify-center px-2 py-1 text-xs font-bold text-indigo-100 bg-indigo-700 rounded">Resolve dispute</button>
                    </form>
                @elseif($purchase -> dispute -> isResolved())
                    <h5 class="mb-1 text-white">Dispute resolved</h5>
                    <p class="bg-green-500 text-white">Winner:
                        <strong class="">{{ $purchase -> dispute -> winner -> username }}</strong></p>
                @endif


                @foreach($purchase -> dispute -> messages as $message)
                    <div class="card my-2">
                        <div class="card-body">
                            {{ $message -> message }}
                        </div>
                        <div class="card-footer text-muted" style="color: black;">
                            {{ $message -> time_ago }} by <a
                                href="{{ route('vendor.show', $message -> author) }}">{{ $message -> author -> username }} {{ $purchase -> userRole($message -> author) }}</a>
                        </div>
                    </div>
                @endforeach

                @if(!$purchase -> dispute -> isResolved())
                    <form action="{{ route('profile.purchases.disputes.message', $purchase -> dispute) }}"
                          method="POST">
                        <div class="card my-2">
                            <div class="card-header">
                                <h5><label for="newmessage" class="text-white">New message:</label></h5>
                            </div>
                            <div class="card-body">
                                <textarea name="message" id="newmessage" class="appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight bg-rqm-dark border-rqm-yellow-darkest p-3 text-rqm-white " id="message"
                                          rows="5"></textarea>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="bg-rqm-yellow-dark font-extrabold px-5 py-1 rounded-3xl text-rqm-dark text-center mb-4">Send message</button>
                            </div>
                        </div>
                        {{ csrf_field() }}
                    </form>
                @endif

            @else
                <label class="text-2xl text-gray-400 block text-rqm-yellow">
                    Problem with your Order?
                </label>
                <hr>
                <p class="text-white mt-2">If you there something wrong with your order, such as you did not get what you paid for.. You can raise a dispute and Royal Queen Market Moderator will help you solve it</p>
                <form method="POST" action="{{ route('profile.purchases.dispute', $purchase) }}">
                    {{ csrf_field() }}
                    <label class="block uppercase tracking-wide text-white font-bold mt-2">What is your concern about your order?</label>
                    <textarea name="message" id="message" class=" mt-3 resize-xappearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight bg-rqm-dark border-rqm-yellow-darkest p-3 text-rqm-white " rows="5"
                              placeholder="Please explain your concern here"></textarea>
                    <button type="submit" class="bg-rqm-yellow-dark font-extrabold px-5 py-1 rounded-3xl text-rqm-dark text-center mb-4">Raise Dispute for this Order</button>
                </form>
            @endif
        </div>
    </div>
</div>


