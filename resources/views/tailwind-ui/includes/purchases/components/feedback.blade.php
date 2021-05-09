<div class="w-full">
    <div class="h-full">
        <div class="bg-rqm-lighter p-5 rounded shadow w-full">
            @if($purchase -> isDelivered() && $purchase -> isBuyer() && !$purchase -> hasFeedback())
                <label class="text-2xl text-gray-400 block text-rqm-yellow">
                    Leave Feedback
                </label>
                <hr>
                <form action="{{ route('profile.purchases.feedback.new', $purchase) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="flex">
                        <div class="w-full  m-2">
                            <div class="h-full">
                                <label class="block uppercase tracking-wide text-white font-bold mb-2">Quality:</label>
                                <select name="quality_rate" id="quality_rate"
                                        class=" appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight bg-rqm-dark border-rqm-yellow-darkest p-3 text-rqm-white ">
                                    @for($i=1; $i<=5; $i++)
                                        <option value="{{ $i }}">
                                            {{ $i }} {{ str_plural('star', $i) }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="w-full  m-2">
                            <div class="h-full">
                                <label
                                    class="block uppercase tracking-wide text-white font-bold mb-2">Communication:</label>
                                <select name="communication_rate" id="communication_rate"
                                        class="form-control appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight bg-rqm-dark border-rqm-yellow-darkest p-3 text-rqm-white ">
                                    @for($i=1; $i<=5; $i++)
                                        <option value="{{ $i }}">
                                            {{ $i }} {{ str_plural('star', $i) }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="w-full  m-2">
                            <div class="h-full">
                                <label class="block uppercase tracking-wide text-white font-bold mb-2">Shipping:</label>
                                <select name="shipping_rate" id="shipping_rate"
                                        class="form-control appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight bg-rqm-dark border-rqm-yellow-darkest p-3 text-rqm-white ">
                                    @for($i=1; $i<=5; $i++)
                                        <option value="{{ $i }}">
                                            {{ $i }} {{ str_plural('star', $i) }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="w-full  m-2">
                            <div class="h-full">
                                <label class="block uppercase tracking-wide text-white font-bold mb-2">Type:</label>
                                <select name="type" id="type"
                                        class="form-control appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight bg-rqm-dark border-rqm-yellow-darkest p-3 text-rqm-white ">
                                    <option value="positive">Positive</option>
                                    <option value="neutral" selected>Neutral</option>
                                    <option value="negative">Negative</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="w-full">
                            <div class="h-full">
                                <label class="block uppercase tracking-wide text-white font-bold mb-2">Comment:</label>
                                <textarea name="comment" id="comment" rows="5"
                                          class="appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight bg-rqm-dark border-rqm-yellow-darkest p-3 text-rqm-white "
                                          placeholder="Place your comment here"></textarea>
                                <button type="submit"
                                        class="bg-rqm-yellow-dark font-extrabold px-5 py-1 rounded-3xl text-rqm-dark text-center mb-4">
                                    Leave
                                    feedback
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

            @elseif($purchase -> isDelivered() && $purchase -> hasFeedback())

                <label class="text-2xl text-gray-400 block text-rqm-yellow">
                    <h4>Feedback by Buyer's</h4>
                </label>
                <hr>
                <table class="table-auto w-full mt-4">
                    <tbody>
                    <tr class="bg-rqm-light">
                        <td class="border-gray-600 px-2 py-2 text-white text-center">
                            Quality:
                        </td>
                        <td class="px-2 py-2 text-white">
                            @include('tailwind-ui.includes.purchases.stars', ['stars' => $purchase -> feedback -> quality_rate])
                        </td>
                    </tr>
                    <tr class="bg-rqm-light">
                        <td class="border-gray-600 px-2 py-2 text-white text-center">
                            Shipping:
                        </td>
                        <td class="px-2 py-2 text-white">
                            @include('tailwind-ui.includes.purchases.stars', ['stars' => $purchase -> feedback -> shipping_rate])
                        </td>
                    </tr>
                    <tr class="bg-rqm-light">
                        <td class="border-gray-600 px-2 py-2 text-white text-center">
                            Communication:
                        </td>
                        <td class="px-2 py-2 text-white">
                            @include('tailwind-ui.includes.purchases.stars', ['stars' => $purchase -> feedback -> communication_rate])                        </td>
                    </tr>
                    <tr class="bg-rqm-light">
                        <td class="border-gray-600 px-2 py-2 text-white text-center">
                            Type:
                        </td>
                        <td class="px-2 py-2 text-white">
                            {{ $purchase->feedback->getType() }}
                        </td>
                    </tr>

                    </tbody>
                </table>
            <div class="text-center text-white mt-5">
                {{ $purchase -> feedback -> comment }}
            </div>

            @endif

        </div>
    </div>
</div>

{{--<div class="col-md-12">--}}
{{--    --}}{{-- Feedback --}}
{{--    @if($purchase -> isDelivered() && $purchase -> isBuyer() && !$purchase -> hasFeedback())--}}
{{--        <tr class="text-white">--}}
{{--            <td colspan="2" class="">--}}
{{--                <h4>Leave feedback</h4>--}}
{{--                <form action="{{ route('profile.purchases.feedback.new', $purchase) }}" method="POST">--}}
{{--                    {{ csrf_field() }}--}}
{{--                    <div class="form-row">--}}
{{--                        <div class="col-md-3 text-left">--}}
{{--                            <label for="quality_rate">Quality:</label>--}}
{{--                            <select name="quality_rate" id="quality_rate" class="form-control">--}}
{{--                                @for($i=1; $i<=5; $i++)--}}
{{--                                    <option value="{{ $i }}">--}}
{{--                                        {{ $i }} {{ str_plural('star', $i) }}--}}
{{--                                    </option>--}}
{{--                                @endfor--}}
{{--                            </select>--}}

{{--                            <label for="communication_rate">Communication:</label>--}}
{{--                            <select name="communication_rate" id="communication_rate" class="form-control">--}}
{{--                                @for($i=1; $i<=5; $i++)--}}
{{--                                    <option value="{{ $i }}">--}}
{{--                                        {{ $i }} {{ str_plural('star', $i) }}--}}
{{--                                    </option>--}}
{{--                                @endfor--}}
{{--                            </select>--}}
{{--                            <label for="shipping_rate">Shipping:</label>--}}
{{--                            <select name="shipping_rate" id="shipping_rate" class="form-control">--}}
{{--                                @for($i=1; $i<=5; $i++)--}}
{{--                                    <option value="{{ $i }}">--}}
{{--                                        {{ $i }} {{ str_plural('star', $i) }}--}}
{{--                                    </option>--}}
{{--                                @endfor--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-3">--}}
{{--                            <label for="type">Type:</label>--}}
{{--                            <select name="type" id="type" class="form-control">--}}
{{--                                <option value="positive">Positive</option>--}}
{{--                                <option value="neutral" selected>Neutral</option>--}}
{{--                                <option value="negative">Negative</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <label for="comment">Comment:</label>--}}
{{--                            <textarea name="comment" id="comment" rows="5" class="form-control"--}}
{{--                                      placeholder="Place your comment here"></textarea>--}}
{{--                            <button type="submit" class="btn btn-block btn-outline-primary mt-2">Leave--}}
{{--                                feedback--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}


{{--                </form>--}}
{{--            </td>--}}
{{--        </tr>--}}

{{--    @elseif($purchase -> isDelivered() && $purchase -> hasFeedback())--}}
{{--        <tr class="text-white">--}}
{{--            <td colspan="2">--}}
{{--                <h4>Feedback by buyer</h4>--}}
{{--                <ul class="list-group">--}}
{{--                    <li class="list-group-item">--}}
{{--                        Qualtiy:--}}
{{--                        @include('includes.purchases.stars', ['stars' => $purchase -> feedback -> quality_rate])--}}
{{--                    </li>--}}
{{--                    <li class="list-group-item">--}}
{{--                        Shipping:--}}
{{--                        @include('includes.purchases.stars', ['stars' => $purchase -> feedback -> shipping_rate])--}}
{{--                    </li>--}}
{{--                    <li class="list-group-item">--}}
{{--                        Communication:--}}
{{--                        @include('includes.purchases.stars', ['stars' => $purchase -> feedback -> communication_rate])--}}
{{--                    </li>--}}
{{--                    <li class="list-group-item">--}}
{{--                        Type:--}}
{{--                        {{ $purchase->feedback->getType() }}--}}
{{--                    </li>--}}
{{--                    <li class="list-group-item text-center">--}}
{{--                        {{ $purchase -> feedback -> comment }}--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </td>--}}
{{--        </tr>--}}
{{--    @endif--}}
{{--</div>--}}
