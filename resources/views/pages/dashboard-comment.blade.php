@extends('layouts.dashboard')

@section('title')
    Swa Mobile Dashboard
@endsection

@section('content')
<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
>
    <div class="container-fluid">
        <div class="dashboard-heading">
        <h2 class="dashboard-title">Komentar</h2>
        <p class="dashboard-subtitle">
            Cerita Pengalaman Pelanggan, Terhadap Produk Mu!
        </p>
        </div>
        <div class="dashboard-content">
       
        <div class="row mt-3">
            <div class="col-12 mt-2">
            <h5 class="mb-3">Beberapa Komentar Yang Masuk</h5>
            
            @foreach($comments as $comment)
                <a href="" class="card card-list d-block">
                    <div class="card-body ">
                        <div class="row">
                            
                            <div class="col-md-5">
                            {{ $comment->message }}
                            </div>
                            <div class="col-md-5">
                                <div class="rating-user">
                                    @if($comment->rating == 5)
                                        <div class="star-icon">
                                            <input type="radio" name="rating1" id="rating1">
                                            <label for="rating1" class="fa fa-star"></label>
                                            <input type="radio" name="rating2" id="rating2">
                                            <label for="rating2" class="fa fa-star"></label>
                                            <input type="radio" name="rating3" id="rating3">
                                            <label for="rating3" class="fa fa-star"></label>
                                            <input type="radio" name="rating4" id="rating4">
                                            <label for="rating4" class="fa fa-star"></label>
                                            <input type="radio" name="rating5" id="rating5">
                                            <label for="rating5" class="fa fa-star"></label>
                                        </div>
                                    @elseif($comment->rating == 4)
                                        <div class="star-icon">
                                            <input type="radio" name="rating1" id="rating1">
                                            <label for="rating1" class="fa fa-star"></label>
                                            <input type="radio" name="rating2" id="rating2">
                                            <label for="rating2" class="fa fa-star"></label>
                                            <input type="radio" name="rating3" id="rating3">
                                            <label for="rating3" class="fa fa-star"></label>
                                            <input type="radio" name="rating4" id="rating4">
                                            <label for="rating4" class="fa fa-star"></label>
                                            
                                        </div>
                                    @elseif($comment->rating == 3)
                                        <div class="star-icon">
                                            <input type="radio" name="rating1" id="rating1">
                                            <label for="rating1" class="fa fa-star"></label>
                                            <input type="radio" name="rating2" id="rating2">
                                            <label for="rating2" class="fa fa-star"></label>
                                            <input type="radio" name="rating3" id="rating3">
                                            <label for="rating3" class="fa fa-star"></label>
                                            
                                        </div>
                                    @elseif($comment->rating == 2)
                                        <div class="star-icon">
                                            <input type="radio" name="rating1" id="rating1">
                                            <label for="rating1" class="fa fa-star"></label>
                                            <input type="radio" name="rating2" id="rating2">
                                            <label for="rating2" class="fa fa-star"></label>
                                            
                                        </div>
                                    @elseif($comment->rating == 1)
                                        <div class="star-icon">
                                            <input type="radio" name="rating1" id="rating1">
                                            <label for="rating1" class="fa fa-star"></label>
                                        
                                        </div>
                                    @endif

                                </div>
                            </div>
                            
                            <div class="col-md-2 d-none d-md-block">
                                <img
                                    src="/images/dashboard-arrow-right.svg"
                                    alt=""
                                />
                            </div> 
                            
                            
                        </div>

                    </div>
                </a>
            @endforeach
            
            
            </div>
        </div>
        </div>
    </div>
</div>
@endsection

