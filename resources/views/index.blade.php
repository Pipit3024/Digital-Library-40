@extends('layouts.main')

@section('style')
<style>
  /* General Section Spacing */
  section {
    margin: 4rem 0;
    padding: 2rem 0;
  }

  .table img {
  display: block;
  margin: 0 auto;
  width: 90%; /* Lebar gambar lebih besar */
  max-width: 800px; /* Ukuran maksimal gambar */
  height: auto;
}

  /* CTA Section */
  .cta-wrapper {
    background: linear-gradient(135deg, #d1c4e9, #b39ddb);
    border-radius: 15px;
    padding: 4rem 2rem;
    text-align: center;
  }
  .cta h1 {
    font-size: 3rem;
    font-weight: bold;
    color: #4527a0;
    margin-bottom: 1rem;
  }
  .cta p {
    font-size: 1.2rem;
    color: #6a1b9a;
    margin-bottom: 2rem;
  }
  .cta a {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.8rem 1.5rem;
    background: #7e57c2;
    color: #fff;
    font-weight: bold;
    border-radius: 10px;
    text-decoration: none;
    transition: all 0.3s ease-in-out;
  }
  .cta a:hover {
    background: #5e35b1;
    transform: translateY(-3px);
  }

  /* Categories Section */
  .categories ul {
    list-style: none;
    display: flex;
    gap: 1rem;
    justify-content: center;
    margin-bottom: 2rem;
  }
  .categories ul li button {
    all: unset;
    padding: 0.5rem 1.5rem;
    background: #26c6da;
    color: white;
    border-radius: 20px;
    cursor: pointer;
    border: 2px solid transparent;
    font-weight: bold;
    transition: all 0.3s ease-in-out;
  }
  .categories ul li button:hover {
    background: #00acc1;
    border-color: #00838f;
  }
  .categories ul li button.active {
    background: #00838f;
    border-color: #004d40;
  }

  /* Card Section */
  .card {
    border: none;
    border-radius: 10px;
    overflow: hidden;
    transition: transform 0.3s ease-in-out;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
  }
  .card:hover {
    transform: translateY(-10px);
    box-shadow: 0px 8px 12px rgba(0, 0, 0, 0.2);
  }
  .card .card-img-block {
    position: relative;
    top: 0;
    transition: top 0.3s ease-in-out;
  }
  .card:hover .card-img-block {
    top: -10px;
  }
  .card h5 {
    font-weight: bold;
    color: #01579b;
  }
  .card p {
    font-size: 0.9rem;
    color: #455a64;
  }

  /* Panduan Section */
  .panduan-section .wrapper {
    background: linear-gradient(120deg, #ffecb3, #ffd54f);
    border-radius: 10px;
    padding: 2rem;
    box-shadow: 0px 6px 8px rgba(0, 0, 0, 0.1);
  }
  .panduan-section .stamp-icon {
    fill: #f57c00;
  }

  /* Media Queries */
  @media screen and (max-width: 768px) {
    .cta h1 {
      font-size: 2rem;
    }
    .cta p {
      font-size: 1rem;
    }
    .categories ul {
      flex-wrap: wrap;
    }
    .card {
      margin-bottom: 1.5rem;
    }
    .panduan-section .wrapper {
      padding: 1.5rem;
    }
  }

  @media screen and (max-width: 480px) {
    .cta h1 {
      font-size: 1.5rem;
    }
    .cta p {
      font-size: 0.9rem;
    }
  }
</style>


@endsection

@section('main-content')
    <section class="cta-wrapper mx-3 mx-sm-4 mx-lg-5" data-aos="fade-up" data-aos-duration="800" data-aos-anchor-placement="center-bottom">
      <div class="cta">
        <h1>Jelajahi Dunia Ilmu di PERPUSONE!</h1>
        <p>Temukan buku terkini untuk memperluas wawasan. Jelajahi topik favorit dan buka pintu menuju dunia pengetahuan yang lebih menarik!</p>
        <a href="/login">Start Explore!<i class="bi bi-arrow-right-square-fill fs-2"></i></a>
      </div>

      <div class="table">
        <img src="{{ asset('img/table.png') }}" alt="">
      </div>
    </section>

    <section class="categories mb-5">
      <div class="container-fluid pb-4">
          <div class="header mb-4" data-aos="fade-up">
              <p class="fw-light text-center mb-1">CATEGORIES</p>
              <h1 class="fw-bold text-center">Ragam Kategori Buku</h1>
          </div>
            <div class="categories-btn" data-aos="fade-up">
              <ul>
                @foreach ($categories as $category)
                <form action="/" method="post">
                  @csrf
                  <input type="hidden" name="selectedCategory" value="{{ $category->id }}">
                  @if ($_POST)
                  <li><button type="submit" id="btn-{{ $category->name }}" class="btn-category {{ ($category->id == $_POST['selectedCategory']) ? 'active' : '' }}" onclick="activateBtn(this)">{{ $category->name }}</button></li>
                  @else
                  <li><button type="submit" id="btn-{{ $category->name }}" class="btn-category" onclick="activateBtn(this)">{{ $category->name }}</button></li>
                  @endif
                </form>
                @endforeach
              </ul>
            </div>

            <div class="content-wrapper" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
              <div id="content-fiksi" class="content row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 justify-content-center">
                @if ($selectedCategory->count() > 0)
                @foreach ($selectedCategory as $book)
                    
                <a href="/books/{{ $book->id }}" class="col-md-4 mt-4 text-decoration-none">
                  <div class="card">
                    <div class="card-img-block">
                      @if($book->cover)
                      <img class="card-img-top" src="/storage/{{ $book->cover }}" alt="Card image cap">
                      @else
                      <img class="card-img-top" src="{{ asset('img/bookCoverDefault.png') }}" alt="Card image cap">
                      @endif
                      </div>
                      <div class="card-body pt-0">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <p class="card-text">{{ $book->description }}</p>
                      </div>
                    </div>
                </a>
                @endforeach
                @else
                <p style="text-align: center; padding: 1rem; color: red">Buku dengan kategori ini sedang kosong</p>
                @endif
              </div>

              <div class="more">
                <a href="/books" class="text-decoration-none">See more</a>
              </div>
            </div>
      </div>
    </section>

    <section class="panduan-section mt-5 mb-5">
  <div class="header mb-4" data-aos="fade-up">
    <p class="text-muted text-center mb-1">INFORMASI</p>
    <h1 class="fw-bold text-center text-primary">Panduan Peminjaman</h1>
  </div>
  <div class="content container mt-3">
    <div class="row justify-content-center">
      <div class="col-md-8" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
        <div class="wrapper bg-light rounded p-4 shadow-sm">
          <div class="d-flex justify-content-center mb-3">
            <svg class="stamp-icon" xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#f57c00" viewBox="0 0 256 256">
              <path d="M224,224a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,224Zm0-80v40a16,16,0,0,1-16,16H48a16,16,0,0,1-16-16V144a16,16,0,0,1,16-16h56.43L88.72,54.71A32,32,0,0,1,120,16h16a32,32,0,0,1,31.29,38.71L151.57,128H208A16,16,0,0,1,224,144ZM120.79,128h14.42l16.43-76.65A16,16,0,0,0,136,32H120a16,16,0,0,0-15.65,19.35ZM208,184V144H48v40H208Z"></path>
            </svg>
          </div>
          <ol class="list-group list-group-numbered">
            <li class="list-group-item bg-light">
              <p>Daftar dengan data pribadi dan login untuk <strong>autentikasi</strong></p>
            </li>
            <li class="list-group-item bg-light">
              <p>Cari dan pilih buku, pastikan <strong>ketersediaan</strong> stok buku</p>
            </li>
            <li class="list-group-item bg-light">
              <p>Setelah menyetujui <span class="fw-semibold">Syarat dan Ketentuan</span>, Anda akan mendapatkan kode peminjaman 
                <span class="badge bg-dark text-white">XX-XXXXXX</span> berjumlah 8 digit</p>
            </li>
            <li class="list-group-item bg-light">
              <p>Datang ke Perpustakaan SMKN 21 Jakarta lalu berikan kode peminjaman kepada pustakawan</p>
            </li>
            <li class="list-group-item bg-light">
              <p>Lakukan pengembalian buku jika sudah selesai membaca. <br>
                <span class="text-danger">*</span>
                <small>Note: Pengembalian yang lewat dari tenggat waktu yang ditentukan akan dikenakan denda</small>
              </p>
            </li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection