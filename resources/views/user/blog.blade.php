@extends('user.layouts.main')

@section('title', 'Blog')

@section('content')

<!-- Breadcrumb -->
<section class="my-4">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <nav aria-label="breadcrumb" data-aos="fade-right">
                    <ol class="breadcrumb bg-transparent m-0">
                        <li class="breadcrumb-item"><a href="{{route('home.index')}}"><i class="fa fa-home"></i> Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
                    </ol>
                </nav>
                <hr class="m-0" data-aos="fade-left">
            </div>
        </div>
    </div>
    </div>
</section>
<!-- End Breadcrumb -->

<!-- List Blog -->
<section class="my-5" style="min-height: 60vh">

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="m-0" data-aos="zoom-in">Cari Blog</h3>
            </div>
            <div class="col-md-8 offset-md-2 my-4">
                <div class="wrap__search" data-aos="zoom-in">
                    <form action="">
                        <div class="form-group m-0 w-100">
                            <input type="text" class="form-control" id="inputAddress" placeholder="Search ...">
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-search"></i>
                            Cari</button>
                    </form>
                </div>
            </div>
            <!-- List -->
            <div class="col-12">
                <div class="row">
                    <div class="col-md-6 my-3" data-aos="fade-up">
                        <div class="card shadow rounded">
                            <div class="img__blog">
                                <img class="card-img-top" src="/hotel-templates/assets/img/room-01.jpg" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <small class="m-0 text-primary"><i class="fa fa-calendar-alt"></i> 25 Maret 2020</small>
                                <p class="card-text text-secondary">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="./detail-blog.html" class="btn btn-sm btn-primary float-right">Continue Reading</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End List -->
        </div>
    </div>
</section>
<!-- End List Blog -->

@endsection
