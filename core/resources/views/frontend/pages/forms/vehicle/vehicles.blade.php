@extends('frontend.layout.main')
@section('content')
    <section class="sell-car-section pt-30">
        <div class="container">
            <h1 class="sell-header-title pb-10">POST AN AD</h1>
            <div class="row justify-content-center mb-30">
                <div class="col-xl-8 mb-30">
                    <div class="sell-add-info-area">
                        <div class="sell-add-info-header">
                            <h3 class="sell-add-info-title">SELECTED CATEGORY</h3>
                            <div class="change-cetagory-wrapper">
                                @include('frontend.pages.forms.breadcrumb')
                            </div>
                            <form class="sell-add-info-form">
                                <div class="row mb-30-none">
                                    <div class="col-xl-8 mb-30">
                                        <div class="sell-add-info-body-wrapper">
                                            <h3 class="sell-add-info-body-title">ADD SOME INFO</h3>
                                            <div class="form-group">
                                                <label>Advert title <span class="text--danger">*</span></label>
                                                <input type="text" name="ttle" class="form--control"
                                                    autocomplete="off">
                                                <div class="text-limit-area">
                                                    <span>Mention key features of your product (e.g. make, model, age,
                                                        type)</span>
                                                    <span>0 / 70</span>
                                                </div>
                                            </div>
                                            <div class="form-group2">
                                                <label>Explanation <span class="text--danger">*</span></label>
                                                <textarea class="form--control"></textarea>
                                                <div class="text-limit-area">
                                                    <span>Add information such as status, feature and reason for sale</span>
                                                    <span>0 / 1450</span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Condition <span class="text--danger">*</span></label>
                                                <select class="form--control">
                                                    <option value="">Select</option>
                                                    <option value="new">New</option>
                                                    <option value="used">Used</option>
                                                    <option value="Re-Condition">Re Condition</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Authenticity <span class="text--danger">*</span></label>
                                                <select class="form--control">
                                                    <option value="">Select</option>
                                                    <option value="Original">Original</option>
                                                    <option value="Refurbished">Refurbished</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Vehicle type <span class="text--danger">*</span></label>
                                                <input type="text" value="" name="vehicle_type" placeholder="@lang('Vehicle Type')" class="form--control">
                                            </div>
                                            <div class="form-group">
                                                <label>Brand <span class="text--danger">*</span></label>
                                                <select class="form--control">
                                                    <option value="d">Select Brand</option>
                                                    <option value="abarth">abarth</option>
                                                    <option value="aiways">AIWAYS</option>
                                                    <option value="aixam">aixam</option>
                                                    <option value="alfa-romeo">Alfa Romeo</option>
                                                    <option value="alpina">alpine</option>
                                                    <option value="anadol">anadol</option>
                                                    <option value="aston-martin">Aston Martin</option>
                                                    <option value="audi">Audi</option>
                                                    <option value="bentley">Bentley</option>
                                                    <option value="bmw">BMW</option>
                                                    <option value="borgward">Borgward</option>
                                                    <option value="bugatti">Bugatti</option>
                                                    <option value="buick">Buick</option>
                                                    <option value="cadillac">Cadillac</option>
                                                    <option value="caterham">Caterham</option>
                                                    <option value="chery">Chery</option>
                                                    <option value="chevrolet">Chevrolet</option>
                                                    <option value="chrysler">Chrysler</option>
                                                    <option value="citroën">Citroen</option>
                                                    <option value="dacia">Dacia</option>
                                                    <option value="daewoo">daewoo</option>
                                                    <option value="daf">DAF</option>
                                                    <option value="daihatsu">Daihatsu</option>
                                                    <option value="dfsk">DFSK</option>
                                                    <option value="dodge">dodge</option>
                                                    <option value="dr-automobiles">DR Automobiles</option>
                                                    <option value="ds">ds</option>
                                                    <option value="ds-automobiles">DS Automobiles</option>
                                                    <option value="ferrari">Ferrari</option>
                                                    <option value="fiat">Fiat</option>
                                                    <option value="ford">Ford</option>
                                                    <option value="geely">geely</option>
                                                    <option value="gmc">GMC</option>
                                                    <option value="honda">Honda</option>
                                                    <option value="hummer">Hummer</option>
                                                    <option value="hyundai">Hyundai</option>
                                                    <option value="infiniti">Infiniti</option>
                                                    <option value="isuzu">Isuzu</option>
                                                    <option value="italdesign">italdesign</option>
                                                    <option value="iveco">Iveco</option>
                                                    <option value="jaguar">Jaguar</option>
                                                    <option value="jeep">jeep</option>
                                                    <option value="kia">Kia</option>
                                                    <option value="ktm">KTM</option>
                                                    <option value="lada">Lada</option>
                                                    <option value="lamborghini">Lamborghini</option>
                                                    <option value="lancia">Lancia</option>
                                                    <option value="land-rover">Land Rover</option>
                                                    <option value="lexus">Lexus</option>
                                                    <option value="lincoln">Lincoln</option>
                                                    <option value="lotus">Lotus</option>
                                                    <option value="lynk-&amp;-co">Lynk &amp; Co.</option>
                                                    <option value="man">MAN</option>
                                                    <option value="maserati">Maserati</option>
                                                    <option value="maxus">Maxus-</option>
                                                    <option value="mazda">Mazda</option>
                                                    <option value="mclaren">McLaren</option>
                                                    <option value="mercedes-benz">Mercedes-Benz</option>
                                                    <option value="mercury">Mercury</option>
                                                    <option value="mg">MG</option>
                                                    <option value="mini">MINI</option>
                                                    <option value="mitsubishi">Mitsubishi</option>
                                                    <option value="moskwitch">Moskwitch</option>
                                                    <option value="nio">NIO</option>
                                                    <option value="nissan">Nissan</option>
                                                    <option value="oldsmobile">oldsmobile</option>
                                                    <option value="opel">Opel</option>
                                                    <option value="pagani">pagan</option>
                                                    <option value="peugeot">Peugeot</option>
                                                    <option value="piaggio">Piaggio</option>
                                                    <option value="plymouth">Plymouth</option>
                                                    <option value="polestar">polestar</option>
                                                    <option value="pontiac">pontiac</option>
                                                    <option value="porsche">Porsche</option>
                                                    <option value="proton">Proton</option>
                                                    <option value="renault">Renault</option>
                                                    <option value="rolls-royce">Rolls Royce</option>
                                                    <option value="rolls-royce-1">Rolls-Royce</option>
                                                    <option value="rover">rover</option>
                                                    <option value="saab">saab</option>
                                                    <option value="samand">straw</option>
                                                    <option value="scion">scion</option>
                                                    <option value="seat">seat</option>
                                                    <option value="škoda">Škoda</option>
                                                    <option value="skyworth">skyworth</option>
                                                    <option value="smart">smart</option>
                                                    <option value="ssangyong">SsangYong</option>
                                                    <option value="subaru">Subaru</option>
                                                    <option value="suzuki">Suzuki</option>
                                                    <option value="swm">SWM</option>
                                                    <option value="tata">Tata</option>
                                                    <option value="tesla">Tesla</option>
                                                    <option value="tofas">Tofas</option>
                                                    <option value="toyota">Toyota</option>
                                                    <option value="tropos">tropos</option>
                                                    <option value="vauxhall">vauxhall</option>
                                                    <option value="volvo">Volvo</option>
                                                    <option value="vw">VW</option>
                                                    <option value="wey">WEY</option>
                                                    <option value="zhidou">Zhidou</option>
                                                    <option value="diğer">Other</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Edition (Optional)</label>
                                                <input type="text" value="" name="edition"
                                                    class="form--control" placeholder="@lang('Edition')">
                                            </div>
                                            <div class="form-group">
                                                <label>Year of Manufacture</label>
                                                <input type="number" value="" name="year_of_manufacture"
                                                    class="form--control" placeholder="@lang('Year of Manufacture')">
                                            </div>
                                            <div class="form-group">
                                                <label>Case Type </label>
                                                <select class="form--control" name="case_type">
                                                    <option value="">@lang('Select')</option>
                                                    <option value="3-kabinli-şasi">3-cab chassis</option>
                                                    <option value="cabriolet">Cabriolet</option>
                                                    <option value="camlı-window-van">Glazed Window van</option>
                                                    <option value="çift-kabin-pick-up">Double Cab Pick-up</option>
                                                    <option value="çift-kabin-şasi">Double cabin chassis</option>
                                                    <option value="çift-kabin-yük-taşıyıcı">double cabin load carrier
                                                    </option>
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
                                                    <option value="tek-kabin-yük-taşıyıcı">Single cabin load carrier
                                                    </option>
                                                    <option value="diğer">Other</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>New safe/old safe (Optional)</label>
                                                <select class="form--control">
                                                    <option value="">@lang('Select')</option>
                                                    <option value="1">1981 - 1991</option>
                                                    <option value="2">1992 - 2002</option>
                                                    <option value="3">2003 - 2013</option>
                                                    <option value="4">2014 - 2024</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Gear (Optional)</label>
                                                <div class="sell-add-info-radio-wrapper">
                                                    <div class="radio-item">
                                                        <input type="radio" id="level-1" name="radio-group"
                                                            autocomplete="off">
                                                        <label for="level-1">direct drive</label>
                                                    </div>
                                                    <div class="radio-item">
                                                        <input type="radio" id="level-2" name="radio-group"
                                                            autocomplete="off">
                                                        <label for="level-2">Straight</label>
                                                    </div>
                                                    <div class="radio-item">
                                                        <input type="radio" id="level-3" name="radio-group"
                                                            autocomplete="off">
                                                        <label for="level-3">Automatic</label>
                                                    </div>
                                                    <div class="radio-item">
                                                        <input type="radio" id="level-4" name="radio-group"
                                                            autocomplete="off">
                                                        <label for="level-4">Semiautomatic</label>
                                                    </div>
                                                    <div class="radio-item">
                                                        <input type="radio" id="level-5" name="radio-group"
                                                            autocomplete="off">
                                                        <label for="level-5">Other</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Number of seats</label>
                                                <input type="text" value="1" name="seat_qty" min="1"
                                                    placeholder="@lang('Number of seat')" class="form--control">
                                            </div>
                                            <div class="form-group">
                                                <label>ENGINE</label>
                                                <select class="form--control">
                                                    <option value="">@lang('Select')</option>
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
                                                        <input type="radio" id="wheel1" name="radio-group1"
                                                            autocomplete="off">
                                                        <label for="wheel1">4 wheel drive</label>
                                                    </div>
                                                    <div class="radio-item">
                                                        <input type="radio" id="wheel2" name="radio-group1"
                                                            autocomplete="off">
                                                        <label for="wheel2">rear wheel drive</label>
                                                    </div>
                                                    <div class="radio-item">
                                                        <input type="radio" id="wheel3" name="radio-group1"
                                                            autocomplete="off">
                                                        <label for="wheel3">front wheel drive</label>
                                                    </div>
                                                    <div class="radio-item">
                                                        <input type="radio" id="wheel4" name="radio-group1"
                                                            autocomplete="off">
                                                        <label for="wheel4">Other</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Kilometer</label>
                                                <input type="number" name="kilometer" class="form--control">
                                            </div>
                                            <div class="form-group">
                                                <label>Number plate</label>
                                                <input type="text" name="number_plate" class="form--control">
                                            </div>
                                            <div class="form-group">
                                                <label>Fuel</label>
                                                <select class="form--control">
                                                    <option value="">@lang('Select')</option>
                                                    <option value="benzin">Gasoline</option>
                                                    <option value="benzin-lpg">Gasoline/LPG</option>
                                                    <option value="diesel">Diesel</option>
                                                    <option value="electric">Electric</option>
                                                    <option value="hybrid-benzin-electric">Hybrid (Gasoline/Electric)
                                                    </option>
                                                    <option value="hybrid-diesel-electric">Hybrid (Diesel/Electric)
                                                    </option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Color</label>
                                                <select class="form--control" name="color">
                                                    <option value="">@lang('Select')</option>
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
                                </div>
                                <div class="sell-add-info-price-wrapper">
                                    <h3 class="sell-add-info-price-title">SET PRICE</h3>
                                    <div class="row mb-30-none">
                                        <div class="col-xl-8 mb-30">
                                            <div class="form-group price-input-badge">
                                                <label>Price <span class="text--danger">*</span></label>
                                                <input type="number" name="price" class="form--control"
                                                    autocomplete="off">
                                                <span>₺</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @include('frontend.pages.forms._basic')
                                <div class="sell-add-info-price-wrapper">
                                    <div class="row mb-30-none">
                                        <div class="col-xl-8 mb-30">
                                            <div class="sell-add-btn-area">
                                                <a href="sell-faster.html" class="btn--base">Advertise now=====</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
@endsection
