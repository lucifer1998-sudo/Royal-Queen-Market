<div class="relative bg-rqm-dark flex flex-wrap justify-center rounded shadow w-full h-full">
    <div class="absolute inset-0 bg-repeat h-full opacity-10 w-full" style="background-image: url({{URL::asset('/media/bg.cleaned.png')}})">
        <span></span>
    </div>
    <div class="z-20 p-10 w-full">
        <form action="{{ route('admin.messages.send') }}" method="POST" class="text-white">
            {{ csrf_field() }}
            <div class="">
                <div class="">
                    <label class="text-rqm-yellow" for="message">
                        Message:
                    </label>
                    <textarea name="message" placeholder="Paste your message here." id="message" class="bg-rqm-dark border border-rqm-yellow-darkest p-3 text-rqm-yellow w-full" rows="7"></textarea>
                </div>
                <div class="text-rqm-yellow">
                    <label>Groups:</label>
                    <div class="">
                        <input class="" type="checkbox" value="admins" id="admins" name="groups[]">
                        <label class="-label" for="admins">
                            Admins
                        </label>
                    </div>
                    <div class="">
                        <input class="" type="checkbox" value="vendors" id="vendors" name="groups[]">
                        <label class="-label" for="vendors">
                            Vendors
                        </label>
                    </div>
                    <div class="">
                        <input class="" type="checkbox" value="buyers" id="buyers" name="groups[]">
                        <label class="" for="buyers">
                            Buyers
                        </label>
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-rqm-yellow-dark font-extrabold px-5 py-2 rounded-sm text-rqm-dark text-sm">
                        Send messages
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
