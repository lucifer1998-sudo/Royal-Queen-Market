<div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
    <div class="bg-rqm-lighter p-5 rounded shadow w-full">
        <label class="text-2xl text-gray-400 block text-rqm-yellow">
            Message for Vendor
        </label>
        <p class="text-white text-sm">Encrypted with vendor's PGP key.</p>
        <textarea name="description" id="description" class=" mt-3 resize-xappearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight bg-rqm-dark border-rqm-yellow-darkest p-3 text-rqm-white " rows="8" placeholder="" spellcheck="false">
            {{ $purchase -> message }}
        </textarea>
    </div>
</div>
