@extends ('layouts.main')
@section('content')
 <!-- Breadcrumb Begin -->
 <div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                    <a href="./categories.html">Categories</a>
                    <a href="#">Romance</a>
                    <span>Fate Stay Night: Unlimited Blade</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Anime Section Begin -->
<section class="anime-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="anime__video__player">
                    <video id="player" playsinline controls data-poster="./videos/anime-watch.jpg">
                        <source src="videos/1.mp4" type="video/mp4" />
                        <!-- Captions are optional -->
                        <track kind="captions" label="English captions" src="#" srclang="en" default />
                    </video>
                </div>
                <div class="anime__details__episodes">
                    <div class="section-title">
                        <h5>List Name</h5>
                    </div>
                    <a href="#">Ep 01</a>
                    <a href="#">Ep 02</a>
                    <a href="#">Ep 03</a>
                    <a href="#">Ep 04</a>
                    <a href="#">Ep 05</a>
                    <a href="#">Ep 06</a>
                    <a href="#">Ep 07</a>
                    <a href="#">Ep 08</a>
                    <a href="#">Ep 09</a>
                    <a href="#">Ep 10</a>
                    <a href="#">Ep 11</a>
                    <a href="#">Ep 12</a>
                    <a href="#">Ep 13</a>
                    <a href="#">Ep 14</a>
                    <a href="#">Ep 15</a>
                    <a href="#">Ep 16</a>
                    <a href="#">Ep 17</a>
                    <a href="#">Ep 18</a>
                    <a href="#">Ep 19</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="anime__details__review">
                    <div class="section-title">
                        <h5>Reviews</h5>
                    </div>
                    <div class="anime__review__item">
                        <div class="anime__review__item__pic">
                            <img src="img/anime/review-1.jpg" alt="">
                        </div>
                        <div class="anime__review__item__text">
                            <h6>Huy Vũ - <span>10 Years ago</span></h6>
                            <p>Hay vãi cức LOL</p>
                        </div>
                    </div>
                    <div class="anime__review__item">
                        <div class="anime__review__item__pic">
                            <img src="img/anime/review-2.jpg" alt="">
                        </div>
                        <div class="anime__review__item__text">
                            <h6>Thùy Lee - <span>5 Hour ago</span></h6>
                            <p>Nhạc thật hoài niệm</p>
                        </div>
                    </div>
                    <div class="anime__review__item">
                        <div class="anime__review__item__pic">
                            <img src="img/anime/review-3.jpg" alt="">
                        </div>
                        <div class="anime__review__item__text">
                            <h6>Sin Ly Lisa- <span>20 Hour ago</span></h6>
                            <p>cảm giác thật Yomost</p>
                        </div>
                    </div>
                    <div class="anime__review__item">
                        <div class="anime__review__item__pic">
                            <img src="img/anime/review-4.jpg" alt="">
                        </div>
                        <div class="anime__review__item__text">
                            <h6>Bùi Vân Anh  <span>1 Hour ago</span></h6>
                            <p>Nghe xong chia tay người yêu</p>
                        </div>
                    </div>
                    <div class="anime__review__item">
                        <div class="anime__review__item__pic">
                            <img src="img/anime/review-5.jpg" alt="">
                        </div>
                        <div class="anime__review__item__text">
                            <h6>Đào Huỳnh Trang <span>5 Hour ago</span></h6>
                            <p>Không có lời nào để nói</p>
                        </div>
                    </div>
                    <div class="anime__review__item">
                        <div class="anime__review__item__pic">
                            <img src="img/anime/review-6.jpg" alt="">
                        </div>
                        <div class="anime__review__item__text">
                            <h6>Huy Ngũ <span>20 Hour ago</span></h6>
                            <p>OMG</p>
                        </div>
                    </div>
                </div>
                <div class="anime__details__form">
                    <div class="section-title">
                        <h5>Your Comment</h5>
                    </div>
                    <form action="#">
                        <textarea placeholder="Your Comment"></textarea>
                        <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Anime Section End -->

@endsection