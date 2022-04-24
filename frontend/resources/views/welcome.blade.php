<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    @livewireStyles
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css"
    />
    <title>Moolahgo</title>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="text-gray-800 antialiased">
<nav
    class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 "
>
    <div
        class="container px-4 mx-auto flex flex-wrap items-center justify-between"
    >
        <div
            class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start"
        >
            <a
                class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white"
                href="#"
            >Moolahgo</a
            ><button
                class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                type="button"
                onclick="toggleNavbar('example-collapse-navbar')"
            >
                <i class="text-white fas fa-bars"></i>
            </button>
        </div>
        <div
            class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none hidden"
            id="example-collapse-navbar"
        >
            <ul class="flex flex-col lg:flex-row list-none mr-auto">
            </ul>
            <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
            </ul>
        </div>
    </div>
</nav>
<main>
    <section class="absolute w-full h-full">
        <div
            class="absolute top-0 w-full h-full bg-gray-900"
            style="background-image: url({{asset('/assets/img/register_bg_2.png')}}); background-size: 100%; background-repeat: no-repeat;"
        ></div>
        @livewire('referral-form')
        <footer class="absolute w-full bottom-0 bg-gray-900 pb-6">
            <div class="container mx-auto px-4">
                <hr class="mb-6 border-b-1 border-gray-700" />
                <div
                    class="flex flex-wrap items-center md:justify-between justify-center"
                >

                </div>
            </div>
        </footer>
    </section>
</main>
</body>
<script>
    function toggleNavbar(collapseID) {
        document.getElementById(collapseID).classList.toggle("hidden");
        document.getElementById(collapseID).classList.toggle("block");
    }
</script>
@livewireScripts
</html>
