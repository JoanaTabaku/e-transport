<style>
.payPal {
  width:15%;
  height:42px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
  background-color:#ffc439;
}

.responsivePayPal {
  height: 36px;
  width: 200px;
  overflow: hidden;
  margin: auto;
  padding-top: 2px;
}

.responsivePayPal img {
  position: relative;
  top: -4px;
  left: -14px;
}

.payPalWhite {
  width:15%;
  height:42px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
  background-color:#fff;
}

.responsivePayPalWhite {
  height: 36px;
  width: 100px;
  overflow: hidden;
  margin: auto;
  padding-top: 2px;
}

.responsivePayPalWhite img {
  position: relative;
  top: 5px;
}
</style>

<div class="card shadow mb-4 pl-0 border  {{$subscription->id == $lastBoughtSubscriptionId ? 'border-success' : ''}} " style="">
    @if($subscription->id == $lastBoughtSubscriptionId)
        <span class="btn btn-success mt-3 position-absolute" style="width: 20%; right: 15px">
            Current Plan
        </span>
    @endif
    <div class="card-body d-flex flex-column" style="gap: 20px; padding: 90px 10px">
        <div class="d-flex justify-content-between pb-4" style="border-bottom: 1px solid lightgray">
            <h6 class="mb-0">Subscription Name:</h6>
            <h6 class="mb-0" style="font-weight: bold">{{$subscription->name}}</h6>
        </div>
        <div class="d-flex justify-content-between pb-4" style="border-bottom: 1px solid lightgray">
            <h6 class="mb-0">Price:</h6>
            <h6 class="mb-0">{{$subscription->price}}</h6>
        </div>
        <div class="d-flex justify-content-between pb-4" style="border-bottom: 1px solid lightgray">
            <h6 class="mb-0">Description:</h6>
            <h6 class="mb-0">{{$subscription->description}}</h6>
        </div>
        <div class="d-flex justify-content-between pb-4" style="border-bottom: 1px solid lightgray">
            <h6 class="mb-0">Expires in (days):</h6>
            <h6 class="mb-0">{{$subscription->duration_in_days}}</h6>
        </div>
        <div class="d-flex justify-content-between pb-4" style="border-bottom: 1px solid lightgray">
            <h6 class="mb-0">Role:</h6>
            <h6 class="mb-0">{{$subscription->role->name}}</h6>
        </div>
    </div>
    <div class="card-footer" style="padding: 20px 50px">
        <div class="actions">
            <div class="d-flex justify-content-center align-center" style="gap:10px">
                @if($lastBoughtSubscriptionId == $subscription->id)
                <a href="{{ route('user.view.card', $subscription->id) }}" class="btn btn-info my-2 py-2">
                    <span class="icon text-white-50">
                        <i class="fas fa-shopping-cart"></i>
                    </span>
                    <span class="text">View Your Virtual Card</span>
                </a>
                @else
                <a href="{{ route('subscription.purchase', $subscription->id) }}" class="btn">
                    {{-- <span class="icon text-white-50">
                        <i class="fas fa-shopping-cart"></i>
                    </span>
                    <span class="text">Pay with PayPal</span> --}}
                    <img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png" alt="Check out with PayPal" />
                </a>
                @endif
            </div>
        </div>
    </div>
</div>
