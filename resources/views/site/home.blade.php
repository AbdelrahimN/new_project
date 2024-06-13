@extends('site.layout.main')
@section('title')    Home Page  @endsection
@section('section')
    <section>
        <div id="carousel-1" class="carousel" role="region" aria-labelledby="carousel-1-title">

            <div class="slide" role="tabpanel" aria-labelledby="carousel-1-slide-3-title">
                <div class="slide-content">
                    <img src="https://www.eelu.edu.eg/images/slider/002.jpg" alt="Aotearoa" />
                </div>
            </div>

        </div>
        @include('site.layout.footer')
    </section>

    {{-- <section>
        <div class="container my-3">
            <div class="row ">
                <div class="col-12  m-auto mt-2">
                    <div class="card ">
                        <div class="card-body">
                            <div class="border rounded p-2 my-2">
                                <h5 class="card-title  fw-bold"><i class="fa fa-file-archive-o p-2 bg-info"></i>know
                                    about your university</h5>
                            </div>

                            <div class="">
                                <div class="video-wrapper border rounded w-75 m-auto">
                                    <iframe class="responsive-iframe"
                                        src= "assets/images/فيلم تسجيلي عن الجامعة المصرية للتعلم الإلكتروني الأهلية( EELU  ).mp4"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        </div>
    </section> --}}

@endsection
