    <style>
        span.typed-text {
            color: #000;
        }

        span.cursor {
            display: inline-block;
            margin-left: 3px;
            width: 4px;
            height: 2.4rem;
            background-color: #20C2C2;
            animation: cursorBlink 1s infinite;
        }

        span.cursor.typing {
            animation: none;
        }

        @keyframes cursorBlink {
            49% {
                background-color: #20C2C2;
            }

            50% {
                background-color: transparent;
            }

            99% {
                background-color: transparent;
            }
        }

        .carousel {
            overflow: hidden;
        }

        .carousel-track {
            display: flex;
            animation: slide 10s infinite alternate;
            /* Adjust duration and timing as needed */
        }

        .carousel-item {
            flex: 0 0 100%;
            /* Ensure each item takes up the full width */
        }

        @keyframes slide {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-200%);
            }
        }
    </style>

    <section class="flex bg-kuning-difest py-[5rem] items-center justify-center" id="tentang-difest"
        aria-label="Sambutan Direktur">
        <div class="hero-content flex-col lg:flex-row gap-[2rem]">
            <div class="max-w-sm carousel rounded-box shadow-2xl bg-neutral-50 object-cover overflow-hidden relative">
                <div class="carousel-track">
                    <div class="carousel-item">
                        <img src="{{ asset('image/maskot/maskot-3.png') }}" class="w-full" alt="Carousel Image" />
                        <img src="{{ asset('image/maskot/maskot-5.png') }}" class="w-full" alt="Carousel Image" />
                        <img src="{{ asset('image/maskot/maskot-2.png') }}" class="w-full" alt="Carousel Image" />
                    </div>
                </div>
            </div>
            <div>
                <h1 class="text-5xl font-bold">
                    <span class="text-5xl font-bold font-mono text-hijau-difest-hover" id="typeValue">DIGITAL FESTIVAL
                        5.0</span>
                </h1>
                <p class="py-6 text-neutral-950 text-justify">Nama kegiatan ini yaitu Digital Festival Nasional (DIFEST)
                    merupakan
                    sebuah kegiatan yang diselenggarakan oleh Himpunan Mahasiswa Teknologi Informasi dan Komputer
                    Politeknik Negeri Subang (HIMATIKOM POLSUB) dimana di dalamnya berisi lomba-lomba bidang IT, webinar
                    nasional dan showcase.</p>
            </div>
        </div>
    </section>
