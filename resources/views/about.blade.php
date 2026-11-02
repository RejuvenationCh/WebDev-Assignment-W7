@extends('layouts.public')

@section('title', 'About')

@section('content')
    <section class="my-10 px-4 md:my-16 md:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="mb-12 grid items-center gap-8 md:mb-16 md:grid-cols-[minmax(0,320px)_minmax(0,1fr)] md:gap-12">
                <div class="mx-auto flex w-full max-w-xs items-end justify-center overflow-hidden rounded-2xl bg-slate-100 px-6 pt-6 dark:bg-neutral-800 md:mx-0">
                    <img src="{{ asset('img/portfolio/portrait-cutout.webp') }}" alt="Chris Brilianto Chandra" width="800" height="1295" class="h-[360px] w-auto max-w-full object-contain object-bottom sm:h-[420px]">
                </div>
                <div class="text-center md:text-left">
                <h1 class="text-3xl font-bold mb-6 text-slate-900 md:text-4xl dark:text-slate-50">Chris Brilianto Chandra</h1>
                <p class="text-base text-slate-600 leading-relaxed dark:text-slate-400">I’m a student who enjoys coding, photography, and videography. I like building useful apps and capturing moments that become stories worth remembering. I’m drawn to small details, whether it’s how an app feels to use, an expression in a photograph, or the way music brings an edit together..</p>
                </div>
            </div>
            <div class="grid gap-y-8 gap-x-8 lg:gap-x-0 md:grid-cols-2 lg:grid-cols-3 lg:divide-x lg:divide-slate-300 dark:lg:divide-neutral-700">
                <div class="lg:px-8">
                    <h3 class="text-slate-900 text-lg font-semibold mb-3 dark:text-slate-50">Reliable &amp; Easy to Use</h3>
                    <p class="text-base text-slate-600 leading-relaxed dark:text-slate-400">Our templates are crafted with usability in mind. Whether you're a developer or a business owner, you’ll find our layouts intuitive and quick to set up. With clean code, and thoughtful structure.</p>
                </div>
                <div class="lg:px-8">
                    <h3 class="text-slate-900 text-lg font-semibold mb-3 dark:text-slate-50">Modern &amp; Clean Designs</h3>
                    <p class="text-base text-slate-600 leading-relaxed dark:text-slate-400">Stand out with fresh, contemporary designs built to impress. Every template follows the latest UI/UX principles to ensure your content is easy to read, visually appealing, and accessible across all devices.</p>
                </div>
                <div class="lg:px-8">
                    <h3 class="text-slate-900 text-lg font-semibold mb-3 dark:text-slate-50">Built for Speed &amp; Flexibility</h3>
                    <p class="text-base text-slate-600 leading-relaxed dark:text-slate-400">Speed matters—for both users and search engines. Our templates are optimized for fast loading and seamless performance. Easily customize every section to fit your branding and project goals.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
