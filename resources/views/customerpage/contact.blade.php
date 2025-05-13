@extends('layouts/component')
@section('title', 'Contact Us')
@section('contents')

  <script>
    var isLoggedIn = {{ Auth::check() ? 'true' : 'false' }};
  </script>

<script>
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
            confirmButtonColor: '#3085d6'
        });
    @endif

    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{ session('error') }}',
            confirmButtonColor: '#d33'
        });
    @endif

</script>



  <!-- https://jsfiddle.net/wrappixel/s817jand/ -->
  <div class="contact3 py-5 bg-light">
    <div class="container">

    <div class=" align-items-center">
      <div class="bg-white p-4 p-md-5 rounded shadow">
      <h2 class="mb-4 text-primary">Quick Contact Us</h2>
      <form action="{{ url('contact_submit') }}" method="POST">
        @csrf
        <div class="mb-3">
        <input class="form-control modern-input" name="fullname" type="text" placeholder="Full Name" required>
        </div>
        <div class="mb-3">
        <input class="form-control modern-input" name="email" type="email" placeholder="Email Address" required>
        </div>
        <div class="mb-3">
        <input class="form-control modern-input" name="phone" type="text" placeholder="Phone" required>
        </div>
        <div class="mb-3">
        <input class="form-control modern-input" name="address" type="text" placeholder="Address" required>
        </div>
        <div class="mb-4">
        <textarea class="form-control modern-input" name="messages" rows="4" placeholder="Your Message"
          required></textarea>
        </div>
        <div class="text-center">
        <button type="submit" class="modern-btn">Submit</button>
        </div>
      </form>
      </div>
    </div>

    <div class="row mt-5 justify-content-center align-items-center content-center place-items-center">
      <div class="col-md-4 mb-4">
      <div class="card border-0 h-100 shadow-sm p-3 text-center">
        <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/contact/icon1.png" class="mb-3"
        width="40">
        <h6 class="font-weight-medium">Address</h6>
        <p class="text-muted mb-0">Phnom Penh<br>Cambodia</p>
      </div>
      </div>
      {{-- <div class="col-md-4 mb-4">
      <div class="card border-0 h-100 shadow-sm p-3 text-center">
        <!-- Smart logo -->
        <img src="https://allvectorlogo.com/img/2017/06/smart-axiata-logo.png" class="" width="40" alt="Smart Logo">
        <p class="text-success font-weight-bold mb-1">090 207 392</p>

        <!-- Metfone logo -->
        <img src="https://cdn.bitrefill.com/primg/w360h216/metfone-cambodia.webp" class="" width="40"
        alt="Metfone Logo">
        <p class="text-danger font-weight-bold mb-0">090 207 392</p>
      </div>
      </div> --}}

      <div class="col-md-4 mb-4">
      <div class="card border-0 h-100 shadow-sm p-3 text-center">
        <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/contact/icon2.png" class="mb-3"
        width="40">
        <h6 class="font-weight-medium">Phone</h6>
        <div class="d-flex justify-content-center align-content-center gap-2">
        <img src="https://allvectorlogo.com/img/2017/06/smart-axiata-logo.png" class="" style="margin-bottom: 20px"
          width="40" alt="Smart Logo">
        <p class="text-muted mb-0">090207392</p>
        </div>
        <div class="d-flex justify-content-center align-content-center gap-2">
        <img src="https://cdn.bitrefill.com/primg/w360h216/metfone-cambodia.webp" class=""
          style="margin-bottom: 20px" width="40" alt="Smart Logo">
        <p class="text-muted mb-0">090207392</p>
        </div>
      </div>
      </div>

      <div class="col-md-4 mb-4">
      <div class="card border-0 h-100 shadow-sm p-3 text-center">
        <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/contact/icon3.png" class="mb-3"
        width="40">
        <h6 class="font-weight-medium">Email</h6>
        <p class="text-muted mb-0">khemsopheanan09@gmail.com<br>sopheanankhem00@gmail.com</p>
      </div>
      </div>
    </div>



    </div>
  </div>

  <script>
    document.querySelector('form').addEventListener('submit', function (event) {
    if (!isLoggedIn) {
      event.preventDefault();
      alert('You need to log in first to submit the form.');
    }
    });
  </script>




  <style>
    .modern-input {
    border-radius: 8px;
    border: 1px solid #ccc;
    padding: 12px 15px;
    font-size: 16px;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .modern-input:focus {
    border-color: #6C63FF;
    box-shadow: 0 0 0 3px rgba(108, 99, 255, 0.2);
    outline: none;
    }

    .modern-btn {
    background: linear-gradient(135deg, #6C63FF, #42A5F5);
    color: white;
    border: none;
    border-radius: 8px;
    padding: 12px 30px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    }

    .modern-btn::before {
    content: "";
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.15);
    transition: all 0.5s ease;
    transform: skewX(-20deg);
    }

    .modern-btn:hover::before {
    left: 100%;
    }

    .modern-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    .modern-btn:active {
    transform: translateY(0);
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
    }
  </style>



@endsection