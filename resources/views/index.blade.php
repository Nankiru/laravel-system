@extends('layouts/master')
@section('contents')
  <style>
    body {
    background: #f8f9fa;
    min-height: 100vh;
    padding: 20px;
    }

    .stat-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer;
    }

    .stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .progress {
    height: 8px;
    }

    .trend-badge {
    position: absolute;
    top: 20px;
    right: 20px;
    }

    .stat-icon {
    width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    }

    .dropdown-toggle::after {
    display: none;

    .profile-card {
      max-width: 350px;
      border-radius: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .profile-img {
      width: 120px;
      height: 120px;
      object-fit: cover;
      border: 4px solid #fff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .social-icons a {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background-color: #f8f9fa;
      color: #6c757d;
      text-decoration: none;
      margin: 0 5px;
      transition: all 0.3s ease;
    }

    .social-icons a:hover {
      background-color: #007bff;
      color: #fff;
    }
    }
  </style>
  <div class="body-wrapper-inner">
    <div class="container-fluid" style="padding-top:20px">
    <!--  Row 1 -->
    <div class="row">
      <div class="container py-4">
      <!-- Header -->
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Dashboard Overview</h4>
        <div class="dropdown">
        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
          <i class="fas fa-calendar-alt me-2"></i>This Month
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Today</a></li>
          <li><a class="dropdown-item" href="#">This Week</a></li>
          <li><a class="dropdown-item" href="#">This Month</a></li>
          <li><a class="dropdown-item" href="#">This Year</a></li>
        </ul>
        </div>
      </div>

      <!-- Statistics Cards -->
      <div class="row g-4">
        <!-- Sales Card -->
        <div class="col-12 col-md-6 col-lg-3">
        <div class="card stat-card border-0 shadow-sm">
          <div class="card-body">
          <div class="d-flex align-items-center mb-3">
            <div class="stat-icon bg-primary bg-opacity-10 text-primary">
            <i class="fas fa-shopping-cart"></i>
            </div>
            <span class="badge trend-badge" style="background-color: #e56ff8">
            <i class="fas fa-arrow-up me-1"></i>12.5%
            </span>
          </div>
          <h6 class="text-muted mb-2">Total Sales</h6>
          <h4 class="mb-3">$999,999,999</h4>
          <div class="progress">
            <div class="progress-bar active-purple" id="progressBarBlue">
            </div>
          </div>

          </div>
        </div>
        </div>
        <style>
        #progressBarBlue,
        #progressBarGreen {
          transition: width 1s ease-in-out;
        }
        </style>
        <script>
        document.addEventListener("DOMContentLoaded", function () {
          const progressBarBlue = document.getElementById("progressBarBlue");
          const progressBarGreen = document.getElementById("progressBarGreen");
          const targetBlue = 75;
          const targetGreen = 50;

          setTimeout(() => {
          progressBarBlue.style.width = targetBlue + "%";
          progressBarGreen.style.width = targetGreen + "%";
          // progressBar.textContent = target + "%";
          }, 500); // slight delay for visual effect
        });
        </script>



        <!-- Users Card -->
        <div class="col-12 col-md-6 col-lg-3">
        <div class="card stat-card border-0 shadow-sm">
          <div class="card-body">
          <div class="d-flex align-items-center mb-3">
            <div class="stat-icon bg-success bg-opacity-10 text-success">
            <i class="fas fa-users"></i>
            </div>
            <span class="badge trend-badge" style="background-color: #f8a36f">
            <i class="fas fa-arrow-down me-1"></i>5.2%
            </span>
          </div>
          @php
        $maxUsers = 100;
        $percentage = ($counts / $maxUsers) * 100;
        @endphp
          <h6 class="text-muted mb-2">Active Users</h6>
          <h4 class="mb-3">{{$counts}}</h4>
          <div class="progress">
            <div class="progress-bar active-orange" style="width:{{$percentage}}% "></div>
          </div>
          </div>
        </div>
        </div>

        <!-- Orders Card -->
        <div class="col-12 col-md-6 col-lg-3">
        <div class="card stat-card border-0 shadow-sm">
          <div class="card-body">
          <div class="d-flex align-items-center mb-3">
            <div class="stat-icon bg-warning bg-opacity-10 text-warning">
            <i class="fas fa-box"></i>
            </div>
            <span class="badge trend-badge" style="background-color: #9bf86f">
            <i class="fas fa-arrow-up me-1"></i>8.4%
            </span>
          </div>
          <h6 class="text-muted mb-2">New Orders</h6>
          <h4 class="mb-3">1,589</h4>
          <div class="progress">
            <div class="progress-bar active-yellow"></div>
          </div>
          </div>
        </div>
        </div>

        <!-- Revenue Card -->
        <div class="col-12 col-md-6 col-lg-3">
        <div class="card stat-card border-0 shadow-sm">
          <div class="card-body">
          <div class="d-flex align-items-center mb-3">
            <div class="stat-icon bg-info bg-opacity-10 text-info">
            <i class="fas fa-dollar-sign"></i>
            </div>
            <span class="badge bg-success trend-badge">
            <i class="fas fa-arrow-up me-1"></i>15.7%
            </span>
          </div>
          <h6 class="text-muted mb-2">Products</h6>
          <h4 class="mb-3">{{$products}}</h4>
          <div class="progress">
            <div class="progress-bar active-blue"></div>
          </div>
          </div>
        </div>
        </div>
      </div>

      <style>
        /* Optional shimmer effect */
        @keyframes shimmer {
        0% {
          background-position: -200px 0;
        }

        100% {
          background-position: 200px 0;
        }
        }

        .active-yellow {
        width: 0;
        height: 100%;
        background: linear-gradient(90deg, #62ff07, #a3ff57);
        background-size: 200% 100%;
        animation: shimmer 2s infinite linear, growProgress 2s forwards;
        border-radius: 10px;
        }

        .active-orange {
        width: 0;
        height: 100%;
        background: linear-gradient(90deg, #feab1c, #f5b469);
        background-size: 200% 100%;
        animation: shimmer 5s infinite linear, active-orange 2s forwards;
        border-radius: 10px;
        }

        .active-blue {
        width: 0;
        height: 100%;
        background: linear-gradient(90deg, #0550f3, #87a6f4);
        background-size: 200% 100%;
        animation: shimmer 5s infinite linear, active-blue 5s forwards;
        border-radius: 10px;
        }

        .active-purple {
        width: 0;
        height: 100%;
        background: linear-gradient(90deg, #f305ef, #f487f4);
        background-size: 200% 100%;
        animation: shimmer 2s infinite linear, growProgress 2s forwards;
        border-radius: 10px;
        }

        /* Width animation */
        @keyframes active-orange {
        from {
          width: 0%;
        }

        to {
          width:
          {{$percentage}}
          %;
        }
        }

        @keyframes active-blue {
        from {
          width: 0%;
        }

        to {
          width:
          {{$products}}
          %;
        }
        }

        @keyframes growProgress {
        from {
          width: 0%;
        }

        to {
          width: 95%;
        }
        }
      </style>

      <!-- Activity Section -->
      </div>
      <div class="col-lg-8 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-body">
        <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
          <div class="mb-3 mb-sm-0">
          <h5 class="card-title fw-semibold">Sales Overview</h5>
          </div>
          <div>
          <select class="form-select">
            <option value="1">March 2025</option>
            <option value="2">April 2025</option>
            <option value="3">May 2025</option>
            <option value="4">June 2025</option>
          </select>
          </div>
        </div>
        <div id="chart"></div>
        </div>
      </div>
      </div>
      <div class="col-lg-4">
      <div class="row">
        <div class="col-lg-12">
        <!-- Yearly Breakup -->
        <div class="card overflow-hidden">
          <div class="card-body p-4">
          <h5 class="card-title mb-9 fw-semibold">Yearly Breakup</h5>
          <div class="row align-items-center">
            <div class="col-7">
            <h4 class="fw-semibold mb-3">$36,358</h4>
            <div class="d-flex align-items-center mb-3">
              <span
              class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
              <i class="ti ti-arrow-up-left text-success"></i>
              </span>
              <p class="text-dark me-1 fs-3 mb-0">+9%</p>
              <p class="fs-3 mb-0">last year</p>
            </div>
            <div class="d-flex align-items-center">
              <div class="me-4">
              <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
              <span class="fs-2">2025</span>
              </div>
              <div>
              <span class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
              <span class="fs-2">2024</span>
              </div>
            </div>
            </div>
            <div class="col-5">
            <div class="d-flex justify-content-center">
              <div id="breakup"></div>
            </div>
            </div>
          </div>
          </div>
        </div>
        </div>
        <div class="col-lg-12">
        <!-- Monthly Earnings -->
        <div class="card">
          <div class="card-body">
          <div class="row alig n-items-start">
            <div class="col-8">
            <h5 class="card-title mb-9 fw-semibold"> Monthly Earnings </h5>
            <h4 class="fw-semibold mb-3">$6,820</h4>
            <div class="d-flex align-items-center pb-1">
              <span
              class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
              <i class="ti ti-arrow-down-right text-danger"></i>
              </span>
              <p class="text-dark me-1 fs-3 mb-0">+9%</p>
              <p class="fs-3 mb-0">last year</p>
            </div>
            </div>
            <div class="col-4">
            <div class="d-flex justify-content-end">
              <div
              class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
              <i class="ti ti-currency-dollar fs-6"></i>
              </div>
            </div>
            </div>
          </div>
          </div>
          <div id="earning"></div>
        </div>
        </div>
      </div>
      </div>


      <div class="row">

      </div>


    </div>
    </div>
  </div>



@endsection