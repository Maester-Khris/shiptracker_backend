@extends('layout',['title'=>'Formules de prix', 'active_link'=>'pricing'])

@section('content')
@push('styles')
    <style>
        h4{
            font-size: 26px!important;
            text-align: center;
            margin-bottom: 10px;
        }
        ul{
            padding: 10px 0px;
        }
        .pricing-item{
            padding: 30px 40px!important;
        }
        .new-item-size{
            width: 450px;
        }
        span sup, .price-ind{
            color: #0D42FF;
        }
        span sup{
            margin-right: 3px;
        }
        ul li span:last-child{
            font-weight: bold;
        }
    </style>
@endpush


<main id="main" style="margin-top:50px;">
    <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">
        <div class="row gy-4 d-flex justify-content-center" style="">
          <div class="new-item-size" data-aos="fade-up" data-aos-delay="100">
            <div class="pricing-item featured">
              <h4><strong>France<span> / Cameroun</span></strong></h4>
              <ul>
                <li class="position-relative">
                    <i class="bi bi-caret-right-fill"></i>
                    <span>Colis Standard / KG</span>
                    <span class="position-absolute" style="right:10px;"><sup>€</sup>12<span></span>
                </li>
                <li class="position-relative">
                    <i class="bi bi-caret-right-fill"></i>
                    <span>Colis Express / KG</span>
                    <span class="position-absolute" style="right:10px;"><sup>€</sup>13<span></span>
                </li>
                <li class="position-relative">
                    <i class="bi bi-caret-right-fill"></i>
                    <span>Courrier Ordinaire</span>
                    <span class="position-absolute" style="right:10px;"><sup>€</sup>10<span></span>
                </li>
                <li class="position-relative">
                    <i class="bi bi-caret-right-fill"></i>
                    <span>Courrier Spécial</span>
                    <span class="position-absolute" style="right:10px;"><sup>€</sup>20<span></span>
                </li>
                <li class="position-relative">
                    <i class="bi bi-caret-right-fill"></i>
                    <span>Telephone simple Occasion</span>
                    <span class="position-absolute" style="right:10px;"><sup>€</sup>10<span></span>
                </li>
                <li class="position-relative">
                    <i class="bi bi-caret-right-fill"></i>
                    <span>Telephone Haut de gamme Occasion</span>
                    <span class="position-absolute" style="right:10px;"><sup>€</sup>20<span></span>
                </li>
                <li class="position-relative">
                    <i class="bi bi-caret-right-fill"></i>
                    <span>Telephone Neuf < 999€ </span>
                    <span class="position-absolute" style="right:10px;"><sup>€</sup>50<span></span>
                </li>
                <li class="position-relative">
                    <i class="bi bi-caret-right-fill"></i>
                    <span>Telephone Neuf > 999€ </span>
                    <span class="position-absolute" style="right:10px;"><sup>€</sup>100<span></span>
                </li>
                <li class="position-relative">
                    <i class="bi bi-caret-right-fill"></i>
                    <span>Tablette < 300€ </span>
                    <span class="position-absolute" style="right:10px;"><sup>€</sup>20<span></span>
                </li>
                <li class="position-relative">
                    <i class="bi bi-caret-right-fill"></i>
                    <span>Tablette > 300€ </span>
                    <span class="position-absolute" style="right:10px;"><sup>€</sup>130<span></span>
                </li>
                <li class="position-relative">
                    <i class="bi bi-caret-right-fill"></i>
                    <span>Ordinateur portable </span>
                    <span class="position-absolute" style="right:10px;"><sup>€</sup>50<span></span>
                </li>
              </ul>
            </div>
          </div>

          <div class="new-item-size" data-aos="fade-up" data-aos-delay="200">
            <div class="pricing-item featured">
              <h4><strong>Cameroun<span> / France</strong></span></h4>
              <ul>
                <li class="position-relative">
                    <i class="bi bi-caret-right-fill"></i>
                    <span>Courrier Spécial / KG</span>
                    <span class="position-absolute" style="right:10px;">6600 <span class="price-ind">FCFA</span></span>
                </li>
                <li class="position-relative">
                    <i class="bi bi-caret-right-fill"></i>
                    <span>Courrier Standard / KG</span>
                    <span class="position-absolute" style="right:10px;">5250 <span class="price-ind">FCFA</span></span>
                </li>
                <li class="position-relative">
                    <i class="bi bi-caret-right-fill"></i>
                    <span>Courrier Spécial Jusqu'a Paris</span>
                    <span class="position-absolute" style="right:10px;">1320 <span class="price-ind">FCFA</span></span>
                </li>
                <li class="position-relative">
                    <i class="bi bi-caret-right-fill"></i>
                    <span>Courrier Simple Jusqu'a Paris</span>
                    <span class="position-absolute" style="right:10px;">6600 <span class="price-ind">FCFA</span></span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
</main>

@endsection