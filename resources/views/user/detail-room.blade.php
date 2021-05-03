@extends('user.layouts.main')

@section('title', $room->name)

@section('content')

  <!-- Breadcrumb -->
  <section class="my-4">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <nav aria-label="breadcrumb" data-aos="fade-right">
            <ol class="breadcrumb bg-transparent m-0">
              <li class="breadcrumb-item"><a href="{{ route('home.index')}}"><i class="fa fa-home"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('home.rooms')}}">Rooms</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $room->name}}</li>
            </ol>
          </nav>
          <hr class="m-0" data-aos="fade-left">
        </div>
      </div>
    </div>
    </div>
  </section>
  <!-- End Breadcrumb -->

          <!-- Detail Room -->
        <section class="my-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card rounded" data-aos="zoom-in">
                            <img class="card-img-top" src="{{ asset('room/'. $room->image)}}" alt="">
                        </div>
                        <div class="row my-4" >
                            <div class="col-md-8">
                                <h5 class="card-title mb-1" data-aos="fade-right">{{$room->name}}</h5>
                                <small class="badge bg-danger text-white" data-aos="fade-right">{{$room->room_type->name}}</small>
                            </div>
                            <div class="col-md-4 text-right">
                                <h5 class="m-0 font-weight-bold text-primary" data-aos="fade-left">Rp. {{$room->price}}
                                    <sub class="font-weight-normal">/a night</sub>
                                </h5>
                            </div>
                        </div>
                        <hr>
                        <div class="overview mb-4">
                            <h5 class="card-title text-primary" data-aos="fade-right">Overview</h5>
                            <p class="card-text" data-aos="fade-up">{{$room->description}}</p>
                        </div>
                        <div class="facilites mb-4">
                            <h5 class="card-title text-primary" data-aos="fade-right">Facilites</h5>
                            <div class="row">
                                @if ($room->room_has_facility->isEmpty())
                                    <div class="alert alert-danger">
                                        Data not found.
                                    </div>
                                @else
                                <div class="col-md-6 mb-3" data-aos="fade-up"><p class="card-text"><i class="fa fa-check text-success"></i> Lorem, ipsum dolor.</p></div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Form Reservation -->
                    <div class="col-md-4" data-aos="fade-up">
                        <div class="card rounded">
                            <div class="card-header text-center">
                                <h5 class="card-title m-0">Reservation</h5>
                            </div>
                            <div class="card-body">
                                <div class="card mb-3">
                                    <div class="card-body text-center">
                                        <h5 class="card-title mb-1">{{$room->name}}</h5>
                                        <h5 class="m-0 font-weight-bold text-primary">Rp. {{$room->price}}
                                            <sub class="font-weight-normal">/a night</sub>
                                        </h5>
                                    </div>
                                </div>
                                <form>
                                    <div class="form-group">
                                        <label for="checkin">Check-in</label>
                                        <input type="date" class="form-control" id="checkin" name="checkin"
                                            placeholder="Check-in">
                                    </div>
                                    <div class="form-group">
                                        <label for="checkout">Check-out</label>
                                        <input type="date" class="form-control" id="checkout" name="checkout"
                                            placeholder="Check-out">
                                    </div>
                                    <div class="form-group">
                                        <label for="guest">Guest</label>
                                        <input type="number" class="form-control" id="guest" name="guest"
                                            placeholder="Guest">
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-body text-center">
                                            <h5 class="card-title mb-1 font-weight-bold">TOTAL PRICE</h5>
                                            <h5 class="m-0 font-weight-bold text-danger">Rp. {{$room->price}}
                                                <sub class="font-weight-normal">/a night</sub>
                                            </h5>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Book Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Form Reservation -->
                </div>
            </div>
        </section>
        <!-- End Detail Room -->


@endsection
