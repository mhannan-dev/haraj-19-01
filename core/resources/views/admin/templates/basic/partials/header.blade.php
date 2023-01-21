
 @php
 $header = getContent('header.content', true);
 $socialMedias = getContent('social_icon.element');
@endphp
 {{-- <nav class="mt-6">
     <div class="navbar bg-base-100">
       <div class="navbar-start">
         <div class="dropdown">
           <label tabindex="0" class="btn btn-ghost lg:hidden">
             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
               stroke="currentColor">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
             </svg>
           </label>
           <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">

             @foreach($pages as $k => $data)
                 <li class="nav-item">
                     <a href="{{route('pages',[$data->slug])}}">
                         {{__($data->name)}}
                     </a>
                 </li>
             @endforeach

             <li>
                 <a href="{{ route('home') }}">@lang('Home')</a>
             </li>
             @auth
             <li tabindex="0">
                 <a>
                   Details
                   <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                     <path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                   </svg>
                 </a>
                 <ul class="p-2 bg-base-200">
                   <li><a>Submenu 1</a></li>
                   <li><a>Submenu 2</a></li>
                 </ul>
               </li>
               <li><a href="{{ route('user.home') }}">Dashboard</a></li>
               <li><a href="{{ route('user.logout') }}">Logout</a></li>

             @else
             <li><a href="{{ route('user.login') }}">Log In</a></li>
             <li><a href="/Signup.html">Sign Up</a></li>
             @endauth

           </ul>

         </div>
         <a class="btn btn-ghost normal-case"><img src="{{asset($activeTemplateTrue.'images')}}/logo.png" alt="company-logo" height="40"
             width="50" /></a>
       </div>
       <div class="navbar-center hidden lg:flex">
         <ul class="menu menu-horizontal p-0">

             <li>
                 <a href="{{ route('home') }}">@lang('Home')</a>
             </li>
             @foreach($pages as $k => $data)
             <li class="nav-item">
                 <a href="{{route('pages',[$data->slug])}}">
                     {{__($data->name)}}
                 </a>
             </li>
         @endforeach
            @auth
            <li tabindex="0">
             <a>
               Details
               <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                 <path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
               </svg>
             </a>
             <ul class="p-2 bg-base-200">
               <li><a>Submenu 1</a></li>
               <li><a>Submenu 2</a></li>
             </ul>
           </li>
           <li><a href="{{ route('user.home') }}">Dashboard</a></li>
           <li><a href="{{ route('user.logout') }}">Logout</a></li>

             @else
             <li><a href="{{ route('user.login') }}">Log In</a></li>
             <li><a href="/Signup.html">Sign Up</a></li>
             @endauth
         </ul>
       </div>
       <div class="navbar-end">
         <div tabindex="0" class="btn btn-ghost btn-circle avatar">
           <div class="w-10 rounded-full">
           @auth
           <img src="{{asset($activeTemplateTrue.'images')}}/avataaars.svg" alt="avatar" />
           @endauth
           </div>
         </div>
       </div>
     </div>
   </nav> --}}


   <header class="header-section ">
     <div class="header">
         <div class="header-bottom-area">
             <div class="container">
                 <div class="header-menu-content">
                     <nav class="navbar navbar-expand-lg p-0">
                         <a class="site-logo" href="{{ route('home') }}">
                             <img src="{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}" alt="logo">
                         </a>
                         <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                             aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                             <span class="fas fa-bars"></span>
                         </button>
                         <div class="collapse navbar-collapse" id="navbarSupportedContent">
                             <ul class="navbar-nav main-menu ms-auto">
                                 <li><a href="{{ route('home') }}"  class="{{menuActive('home')}}">@lang('Home')</a></li>
                                 @auth
                                 <li><a href="{{ route('user.home') }}"  class="{{menuActive('user.home')}}">Dashboard</a></li>
                                 <li><a href="{{ route('user.logout') }}">Logout</a></li>
                                 @else
                                 <li><a href="{{ route('user.register') }}"  class="{{menuActive('user.register')}}">Create Account</a></li>
                                 <li><a href="{{ route('user.login') }}"  class="{{menuActive('user.login')}}">Login</a></li>
                                 @endauth

                             </ul>
                         </div>
                     </nav>
                 </div>
             </div>
         </div>
     </div>
 </header>
