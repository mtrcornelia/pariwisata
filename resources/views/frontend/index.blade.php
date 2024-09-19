@extends('frontend.layout.main')
@include('frontend.layout.slide')

<div class="container">
  
  <div class="row">
    <div class="col-sm-8">
      <h3 class="">About</h3>
    <p style="text-align: justify; line-height: 24px"><span><b>Kabupaten Tanah Datar</b></span> atau <b>Luhak Nan Tuo</b>  merupakan salah satu kabupaten di provinsi Sumatera Barat, Indonesia, yang beribu kota Batusangkar. Kabupaten ini memiliki luas wilayah 133.600 Ha (1.336 km2) dengan jumlah penduduk 374.431 jiwa pada tahun 2021. Tanah Datar memiliki 14 kecamatan, 75 nagari, dan 395 jorong. Kabupaten ini merupakan daerah agraris, lebih 70% penduduknya bekerja pada sektor pertanian, baik pertanian tanaman pangan, perkebunan, perikanan, maupun peternakan.
      Kabupaten Tanah Datar menjadi Tujuh Kabupaten Terbaik di Indonesia dari 400 kabupaten yang ada, pada tahun 2003 menurut Lembaga International Partnership dan Kedutaan Inggris. Lembaga Ilmu Pengetahuan Indonesia (LIPI) menobatkan Kabupaten Tanah Datar sebagai satu dari empat daerah paling berprestasi dan berhasil melaksanakan otonomi daerah. Saat ini, Tanah Datar masih memelihara adat istiadatnya serta peninggalan sejarah, terutama dari masa Adityawarman, seperti prasasti dan batu bersurat. </p>
    </div>
    <div class="col-sm-4">
      @include('frontend.event_terbaru')
    </div>
  </div>
</div><!-- End Content -->