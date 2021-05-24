@extends('user.layouts.main')

@section('title', 'Tentang Kami')

@section('content')
<!-- Breadcrumb -->
<section class="my-4">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <nav aria-label="breadcrumb" data-aos="fade-right">
                    <ol class="breadcrumb bg-transparent m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home.index')}}"><i class="fa fa-home"></i> Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
                    </ol>
                </nav>
                <hr class="m-0" data-aos="fade-left">
            </div>
        </div>
    </div>
    </div>
</section>
<!-- End Breadcrumb -->

<!-- About Us -->
<section class="my-5" style="min-height: 60vh">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section__body">
                    <div class="row">
                        <div class="col-md-6" data-aos="zoom-in">
                            <img src="/hotel-templates/assets/img/room-02.jpg" class="w-100 rounded shadow" alt="">
                        </div>
                        <div class="col-md-6 py-3" data-aos="fade-left">
                            <p>vero doloremque alias perspiciatis suscipit nihil necessitatibus labore quisquam obcaecati,
                                sapiente vel! Nulla id minus labore velit deserunt iusto, nemo cum doloribus tempore modi est rem
                                maiores. Illum cupiditate harum consequuntur eligendi itaque? Quo, enim similique animi cumque at
                                dolorum. Cum minima voluptas quae alias? Iusto, architecto laborum! Excepturi soluta dignissimos
                                placeat quos sapiente debitis rem. Mollitia quis tempore at molestias ad accusamus, quos odio
                                cumque, et sed earum dicta praesentium ab officiis hic voluptatem atque. Inventore animi laudantium
                                praesentium deserunt, quis adipisci cumque molestiae dolorum, perferendis repudiandae laborum odit
                                eius excepturi maiores eaque dolores a dolor nihil. Rem quaerat adipisci quis eaque!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About Us -->

<!-- Our Teams -->
<section class="my-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <div class="section__title" data-aos="fade-left">
                    <h3 class="display-6 text-primary">Team</h3>
                </div>
            </div>
            <div class="col-md-3 col-6 text-center mb-4" data-aos="fade-up">
                <img src="/hotel-templates/assets/img/man1.jpg" alt="" class="rounded-circle" width="150" height="150">
                <p class="my-3">Awang Syukriansyah D.</p>
            </div>
            <div class="col-md-3 col-6 text-center mb-4" data-aos="fade-up">
                <img src="/hotel-templates/assets/img/man1.jpg" alt="" class="rounded-circle" width="150" height="150">
                <p class="my-3">Farel Putra Hidayat</p>
            </div>
            <div class="col-md-3 col-6 text-center mb-4" data-aos="fade-up">
                <img src="/hotel-templates/assets/img/man1.jpg" alt="" class="rounded-circle" width="150" height="150">
                <p class="my-3">Ilham Ibrahim</p>
            </div>
            <div class="col-md-3 col-6 text-center mb-4" data-aos="fade-up">
                <img src="/hotel-templates/assets/img/man1.jpg" alt="" class="rounded-circle" width="150" height="150">
                <p class="my-3">M. Syaifuddin Zuhri</p>
            </div>
        </div>
    </div>
</section>
<!-- End Our Teams -->
@endsection
