<div class="sell-add-info-price-wrapper">
    <h3 class="sell-add-info-price-title">REVİEW YOUR İNFORMATİON</h3>
    <div class="row mb-30-none">
        <div class="col-xl-8 mb-30">
            <div class="form-group">
                <label>First name</label>
                <input type="text" name="first_name" class="form--control"
                    value="{{ Auth::guard('advertiser')->user()->first_name }}">
                <div class="text-limit-area">
                    <span>text limite</span>
                    <span>5 / 30</span>
                </div>
            </div>
            @if (isset(Auth::guard('advertiser')->user()->last_name))
                <div class="form-group">
                    <label>Last name</label>
                    <input type="text" name="last_name" class="form--control"
                        value="{{ Auth::guard('advertiser')->user()->last_name }}">
                    <div class="text-limit-area">
                        <span>text limite</span>
                        <span>5 / 30</span>
                    </div>
                </div>
            @endif
            <div class="form-group price-input-badge two">
                <label>phone number</label>
                <input type="number" name="mobile_no" class="form--control"
                    value="{{ Auth::guard('advertiser')->user()->mobile_no }}">
                <span>+90</span>
            </div>
            
        </div>
    </div>
</div>
