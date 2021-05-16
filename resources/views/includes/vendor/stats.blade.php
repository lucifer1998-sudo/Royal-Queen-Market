<div class="row mt-3">
    <div class="col text-center">
        <p><span class="text-white">Member since:  <span class="font-weight-semibold">{{$vendor->memberSince()}}</span></span> |
            <span class="text-white">Vendor since: <span class="font-weight-semibold">{{$vendor->vendor->vendorSince()}}</span></span> |
            <span class="text-white">Disputes in last 12 months (<span class="text-success">won</span>/<span class="text-danger">lost</span>): <span class="text-success font-weight-semibold">{{$vendor->vendor->disputesLastYear(true)}}</span>/<span class="text-danger font-weight-semibold">{{$vendor->vendor->disputesLastYear(false)}}</span>  </span> |
            <span class="text-white">Completed orders: <span class="font-weight-semibold">{{$vendor->vendor->completedOrders()}}</span></span> |
            <span class="text-white">Rated Orders: <span class="font-weight-semibold">{{$vendor->vendor->countFeedback()}}</span></span>
        </p>
    </div>
</div>