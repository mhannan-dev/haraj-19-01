@extends($activeTemplate.'layouts.frontend')
@push('style')

<style>
    .card-custom {
        width: 430px;
        height: 270px;
    }
    @media only screen and (max-width: 991px) {
        .card-custom {
            width: 430px;
            height: 270px;
        }
        .card-custom-area{
            padding-bottom: 30px;
        }
    }
    @media only screen and (max-width: 576px) {
        .dashboard-area .title {
            font-weight: 600;
            font-size: 25px;
            padding-bottom: 10px;
        }
        .dashboard-btn{
            position: absolute;
            top: -10px;
            right: 0;
        }
        .card-custom {
            width: 100%;
        }
    }
    .flip {
    width: inherit;
    height: inherit;
    transition: 0.7s;
    transform-style: preserve-3d;
    animation: flip 2.5s ease;
    }
    .front,
    .back {
    position: absolute;
    width: inherit;
    height: inherit;
    border-radius: 15px;
    color: #fff;
    text-shadow: 0 1px 1px rgba(0,0,0,0.3);
    box-shadow: 0 1px 10px 1px rgba(0,0,0,0.3);
    backface-visibility: hidden;
    background-image: linear-gradient(to right, #111, #555);
    overflow: hidden;
    }
    .front {
    transform: translateZ(0);
    }
    .strip-bottom,
    .strip-top {
    position: absolute;
    right: 0;
    height: inherit;
    background-image: linear-gradient(to bottom, #d4981d, #2b586d);
    box-shadow: 0 0 10px 0px rgba(0,0,0,0.5);
    }
    .strip-bottom {
    width: 200px;
    transform: skewX(-15deg) translateX(50px);
    }
    .strip-top {
    width: 180px;
    transform: skewX(20deg) translateX(50px);
    }
    .logo {
    position: absolute;
    top: 19px;
    right: 25px;
    width: 99px;
    height: 40px;
    }


    .investor {
    position: relative;
    top: 30px;
    left: 25px;
    text-transform: uppercase;
    }
    .chip {
    position: relative;
    top: 60px;
    left: 25px;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 50px;
    height: 40px;
    border-radius: 5px;
    background-image: linear-gradient(to bottom left, #ffecc7, #d0b978);
    overflow: hidden;
    }
    .chip .chip-line {
    position: absolute;
    width: 100%;
    height: 1px;
    background-color: #333;
    }
    .chip .chip-line:nth-child(1) {
    top: 13px;
    }
    .chip .chip-line:nth-child(2) {
    top: 20px;
    }
    .chip .chip-line:nth-child(3) {
    top: 28px;
    }
    .chip .chip-line:nth-child(4) {
    left: 25px;
    width: 1px;
    height: 50px;
    }
    .chip .chip-main {
    width: 20px;
    height: 25px;
    border: 1px solid #333;
    border-radius: 3px;
    background-image: linear-gradient(to bottom left, #efdbab, #e1cb94);
    z-index: 1;
    }
    .wave {
    position: relative;
    top: 20px;
    left: 100px;
    }
    .card-number {
    position: relative;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 40px 25px 10px;
    font-size: 23px;
    font-family: 'cc font', monospace;
    }
    .end {
    margin-left: 25px;
    text-transform: uppercase;
    font-family: 'cc font', monospace;
    }
    .end .end-text {
    font-size: 9px;
    color: rgba(255,255,255,0.8);
    }
    .card-holder {
    margin: 10px 25px;
    text-transform: uppercase;
    font-family: 'cc font', monospace;
    }
    .master {
    position: absolute;
    right: 20px;
    bottom: 20px;
    display: flex;
    }
    .master .circle {
    width: 25px;
    height: 25px;
    border-radius: 50%;
    }
    .master .master-red {
    background-color: #eb001b;
    }
    .master .master-yellow {
    margin-left: -10px;
    background-color: rgba(255,209,0,0.7);
    }
    .card-custom {
    perspective: 1000;
    }
    .card-custom:hover .flip {
    transform: rotateY(180deg);
    }
    .back {
    transform: rotateY(180deg) translateZ(0);
    background: #9e9e9e;
    }
    .back .strip-black {
    position: absolute;
    top: 30px;
    left: 0;
    width: 100%;
    height: 50px;
    background: #000;
    }
    .back .ccv {
    position: absolute;
    top: 110px;
    left: 0;
    right: 0;
    height: 36px;
    width: 90%;
    padding: 10px;
    margin: 0 auto;
    border-radius: 5px;
    text-align: right;
    letter-spacing: 1px;
    color: #000;
    background: #fff;
    }
    .back .ccv label {
    display: block;
    margin: -40px 0 15px;
    font-size: 10px;
    text-transform: uppercase;
    color: #fff;
    }
    .back .terms {
    position: absolute;
    top: 150px;
    padding: 20px;
    font-size: 10px;
    text-align: justify;
    }
    @-moz-keyframes flip {
    0%, 100% {
        transform: rotateY(0deg);
    }
    50% {
        transform: rotateY(180deg);
    }
    }
    @-webkit-keyframes flip {
    0%, 100% {
        transform: rotateY(0deg);
    }
    50% {
        transform: rotateY(180deg);
    }
    }
    @-o-keyframes flip {
    0%, 100% {
        transform: rotateY(0deg);
    }
    50% {
        transform: rotateY(180deg);
    }
    }
    @keyframes flip {
    0%, 100% {
        transform: rotateY(0deg);
    }
    50% {
        transform: rotateY(180deg);
    }
    }
</style>

@endpush
@section('content')

@php
 $card2 = App\Models\VirtualCard::where('user_id',auth()->user()->id)->first();
  if(!empty($card2->card_id)){
  $card = App\Models\VirtualCard::where('user_id',$card2->user_id)->where('card_id', $card2->card_id)->first();
  }
  $gln = App\Models\GeneralSetting::first();
@endphp


<div class="dashboard-tab pb-5">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="card-tab" data-bs-toggle="tab" data-bs-target="#card" type="button" role="tab" aria-controls="card" aria-selected="true">Card</button>
            <button class="nav-link" id="activity-tab" data-bs-toggle="tab" data-bs-target="#activity" type="button" role="tab" aria-controls="activity" aria-selected="false">All Activity</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="card" role="tabpanel" aria-labelledby="card-tab">
            <div class="dashboard-area">
                <div class="container">
                    <div class="dashboard-wrapper">
                        @if(empty($card))
                        <div class="dashboard-btn pb-60">
                            <button type="submit" class="btn--base" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="las la-plus"></i> CREATE A NEW CARD</button>
                        </div>
                        @endif
                        <div class="row justify-content-center mb-30-none">
                            <div class="col-xl-4 mb-30">
                                <h1 class="title pb-30">Card</h1>
                                <div class="card-custom-area">
                                    <div class="backgound">
                                        <div class="left"></div>
                                        <div class="right">
                                            <div class="strip-bottom"></div>
                                            <div class="strip-top"></div>
                                        </div>
                                    </div>
                                    <div class="card-custom two">
                                        @if(isset($card))
                                        <div class="flip">
                                            <div class="front">
                                                <div class="strip-bottom"></div>
                                                <div class="strip-top"></div>
                                               <div>
                                                <img src="{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}" class="logo img-fluid" alt="logo">
                                               </div>
                                                <div class="investor">KITOCARD PREPAID </div>
                                                <div class="chip">
                                                    <div class="chip-line"></div>
                                                    <div class="chip-line"></div>
                                                    <div class="chip-line"></div>
                                                    <div class="chip-line"></div>
                                                    <div class="chip-main"></div>
                                                </div>
                                                <svg class="wave" viewBox="0 3.71 26.959 38.787" width="26.959" height="38.787" fill="white">
                                                    <path d="M19.709 3.719c.266.043.5.187.656.406 4.125 5.207 6.594 11.781 6.594 18.938 0 7.156-2.469 13.73-6.594 18.937-.195.336-.57.531-.957.492a.9946.9946 0 0 1-.851-.66c-.129-.367-.035-.777.246-1.051 3.855-4.867 6.156-11.023 6.156-17.718 0-6.696-2.301-12.852-6.156-17.719-.262-.317-.301-.762-.102-1.121.204-.36.602-.559 1.008-.504z"></path>
                                                    <path d="M13.74 7.563c.231.039.442.164.594.343 3.508 4.059 5.625 9.371 5.625 15.157 0 5.785-2.113 11.097-5.625 15.156-.363.422-1 .472-1.422.109-.422-.363-.472-1-.109-1.422 3.211-3.711 5.156-8.551 5.156-13.843 0-5.293-1.949-10.133-5.156-13.844-.27-.309-.324-.75-.141-1.114.188-.367.578-.582.985-.542h.093z"></path>
                                                    <path d="M7.584 11.438c.227.031.438.144.594.312 2.953 2.863 4.781 6.875 4.781 11.313 0 4.433-1.828 8.449-4.781 11.312-.398.387-1.035.383-1.422-.016-.387-.398-.383-1.035.016-1.421 2.582-2.504 4.187-5.993 4.187-9.875 0-3.883-1.605-7.372-4.187-9.875-.321-.282-.426-.739-.266-1.133.164-.395.559-.641.984-.617h.094zM1.178 15.531c.121.02.238.063.344.125 2.633 1.414 4.437 4.215 4.437 7.407 0 3.195-1.797 5.996-4.437 7.406-.492.258-1.102.07-1.36-.422-.257-.492-.07-1.102.422-1.359 2.012-1.075 3.375-3.176 3.375-5.625 0-2.446-1.371-4.551-3.375-5.625-.441-.204-.676-.692-.551-1.165.122-.468.567-.785 1.051-.742h.094z"></path>
                                                </svg>
                                                @php
                                                    $card_pan = str_split($card->card_pan, 4);
                                                @endphp

                                                <div class="card-number">
                                                    @foreach($card_pan as $key => $value)
                                                    <div class="section">{{ $value }}</div>
                                                    @endforeach
                                                </div>
                                                <div class="end"><span class="end-text">exp. end:</span><span class="end-date"> {{ date("m/Y",strtotime($card->expiration)) }}</span>
                                                </div>
                                                <div class="card-holder">mr {{ Ucfirst( $card->name) }}</div>
                                                <div class="master">
                                                    <div class="circle master-red"></div>
                                                    <div class="circle master-yellow"></div>
                                                </div>
                                            </div>
                                            <div class="back">
                                                <div class="strip-black"></div>
                                                <div class="ccv">
                                                    <label>ccv</label>
                                                    <div>{{ $card->cvv }}</div>
                                                </div>
                                                <div class="terms">
                                                    <p>This card is property of Monzo Bank, Wonderland. Misuse is criminal offence. If found, please return to Monzo Bank or to the nearest bank with MasterCard logo.</p>
                                                    <p>Use of this card is subject to the credit card agreement.</p>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class=" mt-0 pt-0  round">
                                            <div class=" " style="background: #365C68;padding: 90px;   border-radius: 25px" >
                                                <div class="text-center">

                                                    <a data-bs-toggle="modal" data-bs-target="#exampleModal">   <label for="my-modal-1" class=" fa-5x text-light">+</label></a>
                                                  </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1 mb-30"></div>
                            <div class="col-xl-7 mb-30">
                                <div class="content-area content-area-responsive">
                                    <div class="title-custom-area pb-10">
                                        <h1 class="title">All Activity</h1>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="custom-table">
                                            <thead>
                                            <tr>
                                                <th>TRX ID</th>
                                                <th>Payment Details</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @if(isset($card_truns))
                                                @if(array_key_exists('data', $card_truns))
                                                {{-- <td>{{}}</td> --}}
                                                @foreach(array_slice($card_truns['data'], 0, 5) as $key => $value)
                                                   <tr>
                                                    <td>{{ $value['id'] }}</td>
                                                    <td>{{ $value['product'] }}</td>
                                                    <td>{{ $value['amount'] }}</td>
                                                    <td>{{ date("M-d-Y",strtotime($value['created_at'])) }}</td>
                                                   </tr>
                                                @endforeach( $card_truns['data'])
                                                 @endif
                                            @else
                                            <tr>
                                                <td class="text-muted text-center" colspan="100%">No Data Found!</td>
                                            </tr>
                                            @endif


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="tab-pane fade" id="activity" role="tabpanel" aria-labelledby="activity-tab">
            <div class="dashboard-area">
                <div class="container">
                    <div class="dashboard-wrapper">

                        <div class="row justify-content-center mb-30-none">
                            <div class="col-xl-4 mb-30">
                                <div class="card-wrapper card-wrapper-responsive">
                                    <h1 class="title pb-30">Card</h1>
                                    <div class="card-custom-area">
                                        <div class="backgound">
                                            <div class="left"></div>
                                            <div class="right">
                                                <div class="strip-bottom"></div>
                                                <div class="strip-top"></div>
                                            </div>
                                        </div>
                                        <div class="card-custom two">
                                            @if(isset($card))
                                        <div class="flip">
                                            <div class="front">
                                                <div class="strip-bottom"></div>
                                                <div class="strip-top"></div>
                                               <div>
                                                <img src="{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}" class="logo img-fluid" alt="logo">
                                               </div>
                                                <div class="investor">KITOCARD PREPAID </div>
                                                <div class="chip">
                                                    <div class="chip-line"></div>
                                                    <div class="chip-line"></div>
                                                    <div class="chip-line"></div>
                                                    <div class="chip-line"></div>
                                                    <div class="chip-main"></div>
                                                </div>
                                                <svg class="wave" viewBox="0 3.71 26.959 38.787" width="26.959" height="38.787" fill="white">
                                                    <path d="M19.709 3.719c.266.043.5.187.656.406 4.125 5.207 6.594 11.781 6.594 18.938 0 7.156-2.469 13.73-6.594 18.937-.195.336-.57.531-.957.492a.9946.9946 0 0 1-.851-.66c-.129-.367-.035-.777.246-1.051 3.855-4.867 6.156-11.023 6.156-17.718 0-6.696-2.301-12.852-6.156-17.719-.262-.317-.301-.762-.102-1.121.204-.36.602-.559 1.008-.504z"></path>
                                                    <path d="M13.74 7.563c.231.039.442.164.594.343 3.508 4.059 5.625 9.371 5.625 15.157 0 5.785-2.113 11.097-5.625 15.156-.363.422-1 .472-1.422.109-.422-.363-.472-1-.109-1.422 3.211-3.711 5.156-8.551 5.156-13.843 0-5.293-1.949-10.133-5.156-13.844-.27-.309-.324-.75-.141-1.114.188-.367.578-.582.985-.542h.093z"></path>
                                                    <path d="M7.584 11.438c.227.031.438.144.594.312 2.953 2.863 4.781 6.875 4.781 11.313 0 4.433-1.828 8.449-4.781 11.312-.398.387-1.035.383-1.422-.016-.387-.398-.383-1.035.016-1.421 2.582-2.504 4.187-5.993 4.187-9.875 0-3.883-1.605-7.372-4.187-9.875-.321-.282-.426-.739-.266-1.133.164-.395.559-.641.984-.617h.094zM1.178 15.531c.121.02.238.063.344.125 2.633 1.414 4.437 4.215 4.437 7.407 0 3.195-1.797 5.996-4.437 7.406-.492.258-1.102.07-1.36-.422-.257-.492-.07-1.102.422-1.359 2.012-1.075 3.375-3.176 3.375-5.625 0-2.446-1.371-4.551-3.375-5.625-.441-.204-.676-.692-.551-1.165.122-.468.567-.785 1.051-.742h.094z"></path>
                                                </svg>
                                                @php
                                                    $card_pan = str_split($card->card_pan, 4);
                                                @endphp

                                                <div class="card-number">
                                                    @foreach($card_pan as $key => $value)
                                                    <div class="section">{{ $value }}</div>
                                                    @endforeach
                                                </div>
                                                <div class="end"><span class="end-text">exp. end:</span><span class="end-date"> {{ date("m/Y",strtotime($card->expiration)) }}</span>
                                                </div>
                                                <div class="card-holder">mr {{ Ucfirst( $card->name) }}</div>
                                                <div class="master">
                                                    <div class="circle master-red"></div>
                                                    <div class="circle master-yellow"></div>
                                                </div>
                                            </div>
                                            <div class="back">
                                                <div class="strip-black"></div>
                                                <div class="ccv">
                                                    <label>ccv</label>
                                                    <div>{{ $card->cvv }}</div>
                                                </div>
                                                <div class="terms">
                                                    <p>This card is property of Monzo Bank, Wonderland. Misuse is criminal offence. If found, please return to Monzo Bank or to the nearest bank with MasterCard logo.</p>
                                                    <p>Use of this card is subject to the credit card agreement.</p>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class=" mt-0 pt-0  round">
                                            <div class=" " style="background: #365C68;padding: 90px;   border-radius: 25px" >
                                                <div class="text-center">
                                                    <a data-bs-toggle="modal" data-bs-target="#exampleModal">   <label for="my-modal-1" class=" fa-5x text-light">+</label></a>
                                                  </div>
                                            </div>
                                        </div>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1 mb-30"></div>
                            <div class="col-xl-7 mb-30">
                                <div class="content-area">
                                    <div class="title-custom-area pb-10">
                                        <h1 class="title">All Activity</h1>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="custom-table">
                                            <thead>
                                            <tr>
                                                <th>TRX ID</th>
                                                <th>Payment Details</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @if(isset($card_truns))
                                                @if(array_key_exists('data', $card_truns))
                                                {{-- <td>{{}}</td> --}}
                                                @foreach(array_slice($card_truns['data'], 0, 5) as $key => $value)
                                                   <tr>
                                                    <td>{{ $value['id'] }}</td>
                                                    <td>{{ $value['product'] }}</td>
                                                    <td>{{ $value['amount'] }}</td>
                                                    <td>{{ date("M-d-Y",strtotime($value['created_at'])) }}</td>
                                                   </tr>
                                                @endforeach( $card_truns['data'])
                                                 @endif
                                            @else
                                            <tr>
                                                <td class="text-muted text-center" colspan="100%">No Data Found!</td>
                                            </tr>
                                            @endif


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>



<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Modal
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create a New Card</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="modal-card-custom d-flex justify-content-center">
                <div class="card-custom">
                    <div class="flip">
                        <div class="front">
                            <div class="strip-bottom"></div>
                            <div class="strip-top"></div>
                            <img src="{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}" class="logo" alt="logo">
                            <div class="investor">KITOCARD PREPAID</div>
                            <div class="chip">
                                <div class="chip-line"></div>
                                <div class="chip-line"></div>
                                <div class="chip-line"></div>
                                <div class="chip-line"></div>
                                <div class="chip-main"></div>
                            </div>
                            <svg class="wave" viewBox="0 3.71 26.959 38.787" width="26.959" height="38.787" fill="white">
                                <path d="M19.709 3.719c.266.043.5.187.656.406 4.125 5.207 6.594 11.781 6.594 18.938 0 7.156-2.469 13.73-6.594 18.937-.195.336-.57.531-.957.492a.9946.9946 0 0 1-.851-.66c-.129-.367-.035-.777.246-1.051 3.855-4.867 6.156-11.023 6.156-17.718 0-6.696-2.301-12.852-6.156-17.719-.262-.317-.301-.762-.102-1.121.204-.36.602-.559 1.008-.504z"></path>
                                <path d="M13.74 7.563c.231.039.442.164.594.343 3.508 4.059 5.625 9.371 5.625 15.157 0 5.785-2.113 11.097-5.625 15.156-.363.422-1 .472-1.422.109-.422-.363-.472-1-.109-1.422 3.211-3.711 5.156-8.551 5.156-13.843 0-5.293-1.949-10.133-5.156-13.844-.27-.309-.324-.75-.141-1.114.188-.367.578-.582.985-.542h.093z"></path>
                                <path d="M7.584 11.438c.227.031.438.144.594.312 2.953 2.863 4.781 6.875 4.781 11.313 0 4.433-1.828 8.449-4.781 11.312-.398.387-1.035.383-1.422-.016-.387-.398-.383-1.035.016-1.421 2.582-2.504 4.187-5.993 4.187-9.875 0-3.883-1.605-7.372-4.187-9.875-.321-.282-.426-.739-.266-1.133.164-.395.559-.641.984-.617h.094zM1.178 15.531c.121.02.238.063.344.125 2.633 1.414 4.437 4.215 4.437 7.407 0 3.195-1.797 5.996-4.437 7.406-.492.258-1.102.07-1.36-.422-.257-.492-.07-1.102.422-1.359 2.012-1.075 3.375-3.176 3.375-5.625 0-2.446-1.371-4.551-3.375-5.625-.441-.204-.676-.692-.551-1.165.122-.468.567-.785 1.051-.742h.094z"></path>
                            </svg>
                            <div class="card-number">
                                <div class="section">0000</div>
                                <div class="section">0000</div>
                                <div class="section">0000</div>
                                <div class="section">0000</div>
                            </div>
                            <div class="end"><span class="end-text">exp. end:</span><span class="end-date"> .....</span>
                            </div>
                            <div class="card-holder">mr {{ auth()->user()->name }}</div>
                            <div class="master">
                                <div class="circle master-red"></div>
                                <div class="circle master-yellow"></div>
                            </div>
                        </div>
                        <div class="back">
                            <div class="strip-black"></div>
                            <div class="ccv">
                                <label>ccv</label>
                                <div>000</div>
                            </div>
                            <div class="terms">
                                <p>This card is property of Monzo Bank, Wonderland. Misuse is criminal offence. If found, please return to Monzo Bank or to the nearest bank with MasterCard logo.</p>
                                <p>Use of this card is subject to the credit card agreement.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form class="modal-form"  action="{{ route('card.insert') }}" method="POST">
            @csrf
            <div class="row justify-content-center text-center">
                <h2 class="title ptb-30">Card Amount</h2>
                <div class="col-lg-10 form-group">
                 @if(empty($card))
                 <input type="hidden" name="card_issue_fee" class="card_issue" value="{{ round($gln->card_issue_fee,2) }}">

                 @endif
                    <input type="hidden" name="currency" class="edit-currency">
                    <input type="hidden" name="method_code" class="edit-method-code">
                    <input type="hidden" name="method_code" class="edit-method-code">
                    <input type="number" name="amount" placeholder="Enter Amount" class="amount">
                </div>
                <div class="col-lg-10 form-group">
                    <select class="method deposit form--control">
                        <option value="">Select Payment Gateway</option>
                        @foreach($gatewayCurrency as $data)
                            <option
                                value="{{$loop->index + 1}}"
                                data-name="{{$data->name}}"
                                data-currency="{{$data->currency}}"
                                data-method_code="{{$data->method_code}}"
                                data-min_amount="{{showAmount($data->min_amount)}}"
                                data-max_amount="{{showAmount($data->max_amount)}}"
                                data-base_symbol="{{$data->baseSymbol()}}"
                                data-fix_charge="{{showAmount($data->fixed_charge)}}"
                                data-percent_charge="{{showAmount($data->percent_charge)}}"
                            >
                                {{__($data->name)}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

        <div class="tnasform">
            <ul class="transfer-info">
                <li>
                    <i class="las la-minus"></i>
                    <span class="text--base ">Conversion  <span class="depositCharge"></span></span>
                </li>
                @if(empty( $card))
                <li>
                    <i class="las la-minus"></i>
                    <span class="text--base ">Card Issue Fees : </span><span>{{ round($gln->card_issue_fee,2) }} USD</span>
                </li>
                @endif

                <li>
                    <i class="las la-equals"></i>
                    <span>Total Pay : <span class="test"></span></span>
                </li>
            </ul>
        </div>
        <div class="modal-footer">
            <button type="submit"  class="btn btn--base" >Confirm</button>
        </div>
    </form>
      </div>
    </div>
  </div>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End modal
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->




<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Modal
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
{{-- <div class="modal fade" id="exampleModalnext" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create a New Card</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="modal-card-custom d-flex justify-content-center">
                <div class="card-custom">
                    <div class="flip">
                        <div class="front">
                            <div class="strip-bottom"></div>
                            <div class="strip-top"></div>
                            <img src="assets/images/favicon.png" class="logo" alt="logo">
                            <div class="investor">KITOCARD PREPAID</div>
                            <div class="chip">
                                <div class="chip-line"></div>
                                <div class="chip-line"></div>
                                <div class="chip-line"></div>
                                <div class="chip-line"></div>
                                <div class="chip-main"></div>
                            </div>
                            <svg class="wave" viewBox="0 3.71 26.959 38.787" width="26.959" height="38.787" fill="white">
                                <path d="M19.709 3.719c.266.043.5.187.656.406 4.125 5.207 6.594 11.781 6.594 18.938 0 7.156-2.469 13.73-6.594 18.937-.195.336-.57.531-.957.492a.9946.9946 0 0 1-.851-.66c-.129-.367-.035-.777.246-1.051 3.855-4.867 6.156-11.023 6.156-17.718 0-6.696-2.301-12.852-6.156-17.719-.262-.317-.301-.762-.102-1.121.204-.36.602-.559 1.008-.504z"></path>
                                <path d="M13.74 7.563c.231.039.442.164.594.343 3.508 4.059 5.625 9.371 5.625 15.157 0 5.785-2.113 11.097-5.625 15.156-.363.422-1 .472-1.422.109-.422-.363-.472-1-.109-1.422 3.211-3.711 5.156-8.551 5.156-13.843 0-5.293-1.949-10.133-5.156-13.844-.27-.309-.324-.75-.141-1.114.188-.367.578-.582.985-.542h.093z"></path>
                                <path d="M7.584 11.438c.227.031.438.144.594.312 2.953 2.863 4.781 6.875 4.781 11.313 0 4.433-1.828 8.449-4.781 11.312-.398.387-1.035.383-1.422-.016-.387-.398-.383-1.035.016-1.421 2.582-2.504 4.187-5.993 4.187-9.875 0-3.883-1.605-7.372-4.187-9.875-.321-.282-.426-.739-.266-1.133.164-.395.559-.641.984-.617h.094zM1.178 15.531c.121.02.238.063.344.125 2.633 1.414 4.437 4.215 4.437 7.407 0 3.195-1.797 5.996-4.437 7.406-.492.258-1.102.07-1.36-.422-.257-.492-.07-1.102.422-1.359 2.012-1.075 3.375-3.176 3.375-5.625 0-2.446-1.371-4.551-3.375-5.625-.441-.204-.676-.692-.551-1.165.122-.468.567-.785 1.051-.742h.094z"></path>
                            </svg>
                            <div class="card-number">
                                <div class="section">1234</div>
                                <div class="section">5678</div>
                                <div class="section">9012</div>
                                <div class="section">3456</div>
                            </div>
                            <div class="end"><span class="end-text">exp. end:</span><span class="end-date"> 01/80</span>
                            </div>
                            <div class="card-holder">mr Filip Vitas</div>
                            <div class="master">
                                <div class="circle master-red"></div>
                                <div class="circle master-yellow"></div>
                            </div>
                        </div>
                        <div class="back">
                            <div class="strip-black"></div>
                            <div class="ccv">
                                <label>ccv</label>
                                <div>555</div>
                            </div>
                            <div class="terms">
                                <p>This card is property of Monzo Bank, Wonderland. Misuse is criminal offence. If found, please return to Monzo Bank or to the nearest bank with MasterCard logo.</p>
                                <p>Use of this card is subject to the credit card agreement.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="ptb-30 text-center">Is this the correct amount?</h2>
        <span class="pb-30 text-center ps-4 pe-4">This card will expire in 60days.
            This card will only work at U.S merchants.</span>
        <div class="tnasform">
            <ul class="transfer-info">
                <li>
                    <i class="las la-minus"></i>
                    <span>Conversion Charge: 1.00 USD + 0.03 %</span>
                </li>
                <li>
                    <i class="las la-equals"></i>
                    <span>Total Pay 501.15 USD</span>
                </li>
            </ul>
        </div>
        <div class="modal-footer two">
            <a href="#" class="btn btn--base">Create Card</a>
        </div>
      </div>
    </div>
  </div> --}}
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End modal
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

@endsection
@push('script')
<script>

    (function ($) {
        "use strict";

        $('.deposit').on('change', function () {

            var selected =  $(".method option:selected");
            var amount =  $(".amount").val();
            var card_issue_fee =  $(".card_issue").val();


            if(!selected.val()){
                return false;
            }

            var name = selected.data('name');
            var currency = selected.data('currency');
            var method_code = selected.data('method_code');
            var minAmount = selected.data('min_amount');
            var maxAmount = selected.data('max_amount');
            var baseSymbol = "{{$general->cur_text}}";
            var fixCharge = selected.data('fix_charge');

            var percentCharge = selected.data('percent_charge');

            var depositLimit = `@lang('Deposit Limit'): ${minAmount} - ${maxAmount}  ${baseSymbol}`;
            $('.depositLimit').text(depositLimit);
            var depositCharge = `@lang(' '): ${fixCharge} ${baseSymbol}  ${(0 < percentCharge) ? ' + ' +percentCharge + ' % ' : ''}`;
            $('.depositCharge').text(depositCharge);
            $('.method-name').text(`@lang('Payment By ') ${name}`);
            $('.currency-addon').text(baseSymbol);
            $('.edit-currency').val(currency);
            $('.edit-method-code').val(method_code);
            var pay_charge =( +fixCharge + +card_issue_fee) + (+amount * +percentCharge /100);

            if(card_issue_fee){
                var pay_charge =( +fixCharge + +card_issue_fee) + (+amount * +percentCharge /100);
                var grand_total_amount = +amount + +pay_charge;
                 $('.test').text(grand_total_amount);
            }else{
                var pay_charge = +fixCharge + (+amount * +percentCharge /100);
                var grand_total_amount = +amount + +pay_charge;
                 $('.test').text(grand_total_amount);
            }

            // $('#depositModal').modal('show');

        });

    })(jQuery);

</script>


@endpush
