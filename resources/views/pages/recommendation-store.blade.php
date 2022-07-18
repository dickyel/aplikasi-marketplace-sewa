@extends('layouts.app')

@section('title')
    Swa Mobile Store Rentals
@endsection

@section('content')
<!-- Page Content -->
<div class="page-content page-categories">
  <section
    class="store-breadcrumbs"
    data-aos="fade-down"
    data-aos-delay="100"
  >
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Beranda</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                Sistem Rekomendasi Rating
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
    <section class="store-new-products">
      <div class="container">
        <div class="row">
          <div class="col-12" data-aos="fade-up">
            <h5>Semua Toko Sewa</h5>
          </div>
        </div>
        <div class="row">
          <div
            class="col-6 col-md-4 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="100"
          >
            <a class="component-products d-block" href="/detail-store.html">
              <div class="products-thumbnail">
                <div
                  class="products-image"
                  style="
                    background-image: url('/images/products-apple-watch.jpg');
                  "
                ></div>
              </div>
              <div class="products-text">
                Toko Sewa Gadgets
              </div>
              <div class="products-price">
                Gadgets
              </div>
              <div class="rating-user">
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
                <div class="owner">
                  5.0/5.0
                </div>
              </div>
            </a>
          </div>
          <div
            class="col-6 col-md-4 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="200"
          >
            <a class="component-products d-block" href="/details.html">
              <div class="products-thumbnail">
                <div
                  class="products-image"
                  style="
                    background-image: url('/images/products-orange-bogotta.jpg');
                  "
                ></div>
              </div>
              <div class="products-text">
                Toko Sewa Gamed
              </div>
              <div class="products-price">
                Alat - alat
              </div>
              <div class="rating-user">
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
                <div class="owner">
                  5.0/5.0
                </div>
              </div>
            </a>
          </div>
          <div
            class="col-6 col-md-4 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="300"
          >
            <a class="component-products d-block" href="/details.html">
              <div class="products-thumbnail">
                <div
                  class="products-image"
                  style="
                    background-image: url('/images/products-sofa-ternyaman.jpg');
                  "
                ></div>
              </div>
              <div class="products-text">
                Toko Sewa Waemena
              </div>
              <div class="products-price">
                Perabotan Rumah
              </div>
              <div class="rating-user">
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
                <div class="owner">
                  5.0/5.0
                </div>
              </div>
            </a>
          </div>
          <div
            class="col-6 col-md-4 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="400"
          >
            <a class="component-products d-block" href="/details.html">
              <div class="products-thumbnail">
                <div
                  class="products-image"
                  style="
                    background-image: url('/images/products-bubuk-maketti.jpg');
                  "
                ></div>
              </div>
              <div class="products-text">
                Toko Sewa Vbook
              </div>
              <div class="products-price">
                Buku - buku
              </div>
              <div class="rating-user">
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
                <div class="owner">
                  5.0/5.0
                </div>
              </div>
            </a>
          </div>
          <div
            class="col-6 col-md-4 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="500"
          >
            <a class="component-products d-block" href="/details.html">
              <div class="products-thumbnail">
                <div
                  class="products-image"
                  style="
                    background-image: url('/images/products-tatakan-gelas.jpg');
                  "
                ></div>
              </div>
              <div class="products-text">
                Toko Sewa Pakaian
              </div>
              <div class="products-price">
                Baju
              </div>
              <div class="rating-user">
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
                <div class="owner">
                  5.0/5.0
                </div>
              </div>
            </a>
          </div>
          <div
            class="col-6 col-md-4 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="600"
          >
            <a class="component-products d-block" href="/details.html">
              <div class="products-thumbnail">
                <div
                  class="products-image"
                  style="
                    background-image: url('/images/products-mavic-kawe.jpg');
                  "
                ></div>
              </div>
              <div class="products-text">
                Toko Sewa Sepatu
              </div>
              <div class="products-price">
                Sepatu & Sneaker
              </div>
              <div class="rating-user">
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
                <div class="owner">
                  5.0/5.0
                </div>
              </div>
            </a>
          </div>
          <div
            class="col-6 col-md-4 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="700"
          >
            <a class="component-products d-block" href="/details.html">
              <div class="products-thumbnail">
                <div
                  class="products-image"
                  style="
                    background-image: url('/images/products-black-edition-nike.jpg');
                  "
                ></div>
              </div>
              <div class="products-text">
                Toko Sewa Makeup
              </div>
              <div class="products-price">
                Kecantikan
              </div>
              <div class="rating-user">
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
                <div class="owner">
                  5.0/5.0
                </div>
              </div>
            </a>
          </div>
          <div
            class="col-6 col-md-4 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="800"
          >
            <a class="component-products d-block" href="/details.html">
              <div class="products-thumbnail">
                <div
                  class="products-image"
                  style="
                    background-image: url('/images/products-monkey-toys.jpg');
                  "
                ></div>
              </div>
              <div class="products-text">
                Toko Sewa Gradiens
              </div>
              <div class="owner">By Galih Pratama</div>
              <div class="products-price">
                Sepatu & Sneakers
              </div>
              <div class="rating-user">
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
                <div class="owner">
                  5.0/5.0
                </div>
              </div>

            </a>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection