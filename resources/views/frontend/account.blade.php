@extends('frontend.layout.master')
@section('title', 'Account')
@section('content')
    <div class="header__container">
      @include('frontend.include.navbar')
    </div>
    <!-- Account Page -->
    <div class="account-page">
      <div class="header__container">
        <div class="main__row">
          <div class="main__col-2">
            <img src="{{asset('frontend/images/image1.png')}}" alt="image1" width="100%" />
          </div>
          <div class="main__col-2">
            <div class="form-container">
              <div class="form-btn">
                <span onclick="login()">Login</span>
                <span onclick="register()">Register</span>
                <hr id="Indicator" />
              </div>

              <form id="LoginForm" action="">
                <input type="text" placeholder="User Name" />
                <input type="password" placeholder="Password" />
                <button type="submit" class="main__btn">Login</button>
                <a href="">Forgot Password</a>
              </form>
              <form id="RegForm" action="">
                <input type="text" placeholder="User Name" />
                <input type="email" placeholder="Email" />
                <input type="password" placeholder="Password" />
                <button type="submit" class="main__btn">Register</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
@section('javascript')
    <script>
      var MenuItems = document.getElementById("MenuItems");
      MenuItems.style.maxHeight = "0px";
      function menutoggle() {
        if (MenuItems.style.maxHeight == "0px") {
          MenuItems.style.maxHeight = "200px";
        } else {
          MenuItems.style.maxHeight = "0px";
        }
      }


      //Js for toggal form
      var LoginForm = document.getElementById("LoginForm");
      var RegForm = document.getElementById("RegForm");
      var Indicator = document.getElementById("Indicator");

      function register() {
        RegForm.style.transform = "translateX(0px)";
        LoginForm.style.transform = "translateX(0px)";
        Indicator.style.transform = "translateX(100px)";
      }

      function login() {
        RegForm.style.transform = "translateX(300px)";
        LoginForm.style.transform = "translateX(300px)";
        Indicator.style.transform = "translateX(0px)";
      }
    </script>
@endsection
