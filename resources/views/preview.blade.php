<!DOCTYPE html>
<!-- saved from url=(0059)http://jigsaw-blog-staging.tighten.co/blog/getting-started/ -->
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


        <link rel="home" href="http://jigsaw-blog-staging.tighten.co/">
        <link rel="icon" href="http://jigsaw-blog-staging.tighten.co/favicon.ico">

        <link rel="stylesheet" href="{{asset('preview/main.css')}}">
            <style type="text/css">input[name='search'] {
        background-image: url({{asset('preview/magnifying-glass.svg')}});
        background-position: .8em;
        background-repeat: no-repeat;
        border-radius: 25px;
        text-indent: 1.2em;
        }
        input[name='search'].transition-border {
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
        border-top-left-radius: .5rem;
        border-top-right-radius: .5rem;
        }
        .fade-enter-active {
        transition: opacity .5s;
        }
        .fade-leave-active {
        transition: opacity 0s;
        }
        .fade-enter,
        .fade-leave-to {
        opacity: 0;
        }
        </style>
    </head>

    <body class="flex flex-col justify-between min-h-screen bg-grey-lightest text-grey-darkest leading-normal font-sans">
        <header class="flex items-center shadow bg-white border-b h-24 py-4" role="banner">
            <div class="container flex items-center max-w-4xl mx-auto px-4 lg:px-8">
                <div class="flex items-center">
                    <a href="http://jigsaw-blog-staging.tighten.co/" title="Blog Starter Template home" class="inline-flex items-center">
                        <img class="h-8 md:h-10 mr-3" src="{{asset('preview/logo.svg')}}" alt="Blog Starter Template logo">

                        <h1 class="text-lg md:text-2xl text-blue-darkest font-semibold hover:text-blue-dark my-0">Blog Starter Template</h1>
                    </a>
                </div>

                <div id="vue-search" class="flex flex-1 justify-end items-center"><div class="flex flex-1 justify-end items-center text-right px-4">
                    <div class="absolute md:relative w-full justify-end bg-white pin-l pin-t z-10 mt-7 md:mt-0 px-4 md:px-0 hidden md:flex">
                        <label for="search" class="hidden">Search</label> <input id="search" autocomplete="off" name="search" placeholder="Search" type="text" class="transition-fast relative block h-10 w-full lg:w-1/2 lg:focus:w-3/4 bg-grey-lightest border border-grey focus:border-blue-light outline-none cursor-pointer text-grey-darker px-4 pb-0"> <!----> <!----></div> <button title="Start searching" type="button" class="flex md:hidden bg-grey-lightest hover:bg-blue-lightest justify-center items-center border border-grey rounded-full focus:outline-none h-10 px-3"><img src="{{asset('preview/magnifying-glass.svg')}}" alt="search icon" class="h-4 w-4 max-w-none"></button></div> <nav class="hidden lg:flex items-center justify-end text-lg"><a title="Blog Starter Template Blog" href="#" class="ml-6 text-grey-darker hover:text-blue-dark ">
        Blog
    </a> <a title="Blog Starter Template About" href="#" class="ml-6 text-grey-darker hover:text-blue-dark ">
        About
    </a> <a title="Blog Starter Template Contact" href="#" class="ml-6 text-grey-darker hover:text-blue-dark ">
        Contact
    </a></nav> <button onclick="navMenu.toggle()" class="flex justify-center items-center bg-blue border border-blue h-10 px-5 rounded-full lg:hidden focus:outline-none"><svg id="js-nav-menu-show" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="fill-current text-white h-9 w-4"><path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"></path></svg> <svg id="js-nav-menu-hide" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 30" class="hidden fill-current text-white h-9 w-4"><polygon points="32.8,4.4 28.6,0.2 18,10.8 7.4,0.2 3.2,4.4 13.8,15 3.2,25.6 7.4,29.8 18,19.2 28.6,29.8 32.8,25.6 22.2,15 "></polygon></svg></button></div>
            </div>
        </header>

        <nav id="js-nav-menu" class="nav-menu hidden lg:hidden">
            <ul class="list-reset my-0">
                <li class="pl-4">
                    <a title="Blog Starter Template Blog" href="#" class="nav-menu__item hover:text-blue ">Blog</a>
                </li>
                <li class="pl-4">
                    <a title="Blog Starter Template About" href="#" class="nav-menu__item hover:text-blue ">About</a>
                </li>
                <li class="pl-4">
                    <a title="Blog Starter Template Contact" href="#" class="nav-menu__item hover:text-blue ">Contact</a>
                </li>
            </ul>
        </nav>

        <main role="main" class="flex-auto w-full container max-w-xl mx-auto py-16 px-6">
            <img src="{{Storage::url($post->image)}}" alt="Getting Started cover image" class="mb-2">
            <h1 class="leading-none mb-2">{{$post->title}}</h1>
            <p class="text-grey-darker text-xl md:mt-0">{{ $post->user->name }}  •  {{$post->created_at->format('d M, Y')}}</p>

            {!! Illuminate\Mail\Markdown::parse($post->content) !!}
        </main>

        <footer class="bg-white text-center text-sm mt-12 py-4" role="contentinfo">
            <ul class="flex flex-col md:flex-row justify-center list-reset">
                <li class="md:mr-2">
                    © <a href="https://tighten.co/" title="Tighten website">Tighten</a> 2019.
                </li>

                <li>
                    Built with <a href="http://jigsaw.tighten.co/" title="Jigsaw by Tighten">Jigsaw</a>
                    and <a href="https://tailwindcss.com/" title="Tailwind CSS, a utility-first CSS framework">Tailwind CSS</a>.
                </li>
            </ul>
        </footer>

        <script src="{{asset('preview/main.js')}}"></script>

        <script>
    const navMenu = {
        toggle() {
            const menu = document.getElementById('js-nav-menu');
            menu.classList.toggle('hidden');
            menu.classList.toggle('lg:block');
            document.getElementById('js-nav-menu-hide').classList.toggle('hidden');
            document.getElementById('js-nav-menu-show').classList.toggle('hidden');
        },
    }
</script>


</body></html>
