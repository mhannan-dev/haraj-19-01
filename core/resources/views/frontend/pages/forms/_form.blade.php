<div class="row mb-30-none">
    <div class="col-xl-8 mb-30">
        <div class="sell-add-info-body-wrapper">
            <h3 class="sell-add-info-body-title">@lang('Add Information')</h3>
            <div class="form-group">
                <label>@lang('Year') <span class="text--danger">*</span></label>
                <input type="number" name="year" class="form--control" autocomplete="off" placeholder="@lang('Year')">
            </div>
            <div class="form-group">
                <label>@lang('Brand ')<span class="text--danger">*</span></label>
                <input type="text" name="brand" placeholder="@lang('Brand ')" class="form--control" required>
            </div>
            <div class="form-group">
                <label>@lang('Case Type')</label>
                <select class="form--control">
                    <option value="">@lang('Case Type')</option>
                    <option value="3-kabinli-şasi">3-cab chassis</option>
                    <option value="cabriolet">Cabriolet</option>
                    <option value="camlı-window-van">Glazed Window van</option>
                    <option value="çift-kabin-pick-up">Double Cab Pick-up</option>
                    <option value="çift-kabin-şasi">Double cabin chassis</option>
                    <option value="çift-kabin-yük-taşıyıcı">double cabin load carrier</option>
                    <option value="çok-amaçlı">Multipurpose</option>
                    <option value="coupe">coupe</option>
                    <option value="crew-van">CREW VAN</option>
                    <option value="estate">estate</option>
                    <option value="estate-panel">estate panel</option>
                    <option value="hatchback">hatchback</option>
                    <option value="hatchback-panel">hatchback panel</option>
                    <option value="minibüs">Minibus</option>
                    <option value="mpv-panel">MPV panel</option>
                    <option value="panelvan">panel van</option>
                    <option value="pick-up">pick-up</option>
                    <option value="roadster">roadster</option>
                    <option value="sedan">Sedan</option>
                    <option value="suv">SUV</option>
                    <option value="suv-cabriolet">SUV Cabriolet</option>
                    <option value="tek-kabin-şasi">Single cabin chassis</option>
                    <option value="tek-kabin-yük-taşıyıcı">Single cabin load carrier</option>
                    <option value="diğer">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label>New safe/old safe</label>
                <select class="form--control" name="decade_year">
                    <option value="">--@lang('Select')--</option>
                    <option value="1">1981 - 1991</option>
                    <option value="2">1992 - 2002</option>
                    <option value="3">2003 - 2013</option>
                    <option value="4">2014 - 2024</option>
                </select>
            </div>
            <div class="form-group">
                <label>Gear</label>
                <div class="sell-add-info-radio-wrapper">
                    <div class="radio-item">
                        <input type="radio" id="level-1" name="radio-group" autocomplete="off">
                        <label for="level-1">direct drive</label>
                    </div>
                    <div class="radio-item">
                        <input type="radio" id="level-2" name="radio-group" autocomplete="off">
                        <label for="level-2">Straight</label>
                    </div>
                    <div class="radio-item">
                        <input type="radio" id="level-3" name="radio-group" autocomplete="off">
                        <label for="level-3">Automatic</label>
                    </div>
                    <div class="radio-item">
                        <input type="radio" id="level-4" name="radio-group" autocomplete="off">
                        <label for="level-4">Semi automatic</label>
                    </div>
                    <div class="radio-item">
                        <input type="radio" id="level-5" name="radio-group" autocomplete="off">
                        <label for="level-5">Other</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Number of seats</label>
                <select class="form--control">
                    <option value="">--@lang('Select')--</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11th</option>
                </select>
            </div>
            <div class="form-group">
                <label>ENGINE</label>
                <select class="form--control">
                    <option value="">--@lang('Select')--</option>
                    <option value="0">0</option>
                    <option value="0.5">0.5</option>
                    <option value="0.7">0.7</option>
                    <option value="0.8">0.8</option>
                    <option value="0.8 cdi">0.8 cdi</option>
                    <option value="0.9 8v TwinAir">0.9 8v TwinAir</option>
                </select>
            </div>
            <div class="form-group">
                <label>Traction</label>
                <div class="sell-add-info-radio-wrapper">
                    <div class="radio-item">
                        <input type="radio" value="wheel1" name="radio-group1" autocomplete="off">
                        <label for="wheel1">4 wheel drive</label>
                    </div>
                    <div class="radio-item">
                        <input type="radio" value="wheel2" name="radio-group1" autocomplete="off">
                        <label for="wheel2">rear wheel drive</label>
                    </div>
                    <div class="radio-item">
                        <input type="radio" value="wheel3" name="radio-group1" autocomplete="off">
                        <label for="wheel3">front wheel drive</label>
                    </div>
                    <div class="radio-item">
                        <input type="radio" value="wheel4" name="radio-group1" autocomplete="off">
                        <label for="wheel4">Other</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>@lang('Kilometer')</label>
                <input type="number" name="kilometer" class="form--control" autocomplete="off" placeholder="@lang('Kilometer')">
            </div>
            <div class="form-group">
                <label>@lang('Number plate')</label>
                <input type="text" name="number_plate" class="form--control" autocomplete="off" placeholder="@lang('Number plate')">
            </div>
            <div class="form-group">
                <label>@lang('Fuel')</label>
                <select class="form--control">
                    <option value="">--@lang('Select')--</option>
                    <option value="benzin">Gasoline</option>
                    <option value="benzin-lpg">Gasoline/LPG</option>
                    <option value="diesel">Diesel</option>
                    <option value="electric">Electric</option>
                    <option value="hybrid-benzin-electric">Hybrid (Gasoline/Electric)</option>
                    <option value="hybrid-diesel-electric">Hybrid (Diesel/Electric)</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label>Color</label>
                <select class="form--control" name="color">
                    <option value="">--@lang('Select')--</option>
                    <option value="light-grey">Light grey</option>
                    <option value="light-blue">Light blue</option>
                    <option value="light-green">Light green</option>
                    <option value="beige">Beige</option>
                    <option value="white">White</option>
                    <option value="burgundy">burgundy</option>
                    <option value="brown">Brown</option>
                    <option value="red">Red</option>
                    <option value="dark-grey">Dark grey</option>
                    <option value="dark-blue">Dark blue</option>
                    <option value="dark-green">Dark green</option>
                    <option value="yellow">Yellow</option>
                    <option value="black">Black</option>
                    <option value="other">Other</option>
                </select>
            </div>

        </div>
    </div>
    @include('frontend.pages.forms._basic')
</div>
