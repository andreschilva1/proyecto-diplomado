@extends('layouts.navbar')
@section('content')
    <div class="carousel">
        <div class="slides">
            <div class="slide" id="slide-1">
                <img src="https://licorhouse.com/cdn/shop/files/DELICOR_ALWAYS-ON_BANNER-WEB_1800X1100_8ce1b4be-f07b-46b8-b015-985dd31e2444_1296x.png?v=1679089150"
                    alt="Imagen 1">
            </div>
            <div class="slide" id="slide-2">
                <img src="https://licorhouse.com/cdn/shop/files/40_two_pack_jager_1296x.png?v=1680617104" alt="Imagen 2">
            </div>
            <div class="slide" id="slide-3">
                <img src="https://licorhouse.com/cdn/shop/files/Pack_Havana_Cuban_Mode_-_1800x1100_px_1_1296x.png?v=1694880145"
                    alt="Imagen 3">
            </div>
        </div>
    </div>
    <script>        
        document.addEventListener("DOMContentLoaded", function() {
            const slides = document.querySelectorAll(".slide");
            let currentIndex = 0;

            function showSlide(index) {
                slides.forEach((slide) => {
                    slide.style.transform = `translateX(-${index * 100}%)`;
                });
            }

            function nextSlide() {
                currentIndex = (currentIndex + 1) % slides.length;
                showSlide(currentIndex);
            }

            showSlide(currentIndex);

            // Agrega esta línea para cambiar de imagen automáticamente cada 3 segundos (ajusta el valor según tus preferencias)
            setInterval(nextSlide, 3000);

            // Agrega un evento de clic para permitir la navegación manual
            document.addEventListener("click", function() {
                nextSlide();
            });
        });
    </script>
@endsection
@section('css')
    <link rel="stylesheet" href="..\css\principal.css">
@endsection
