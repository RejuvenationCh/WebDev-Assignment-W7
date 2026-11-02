@extends('layouts.public')

@section('title', 'Chris Brilianto Chandra')

@section('content')
    <section class="mx-auto max-w-7xl px-4 mt-12 md:mt-16 md:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid lg:grid-cols-2 justify-center items-center gap-x-12 gap-y-16">
                <div>
                    <div class="max-w-3xl mx-auto text-center lg:mx-0 lg:text-left">
                        <h1 class="text-4xl text-slate-900 font-bold !leading-tight mb-6 md:text-5xl dark:text-slate-50">Hello, Im Chris</h1>
                        <p class="text-slate-600 text-lg leading-relaxed dark:text-slate-400">I enjoy turning ideas into useful applications and telling stories through photography and video. Here’s a collection of what I’ve been working on.</p>
                        <div class="mt-8 flex flex-wrap justify-center gap-4 lg:justify-start">
                            <a href="{{ route('blog') }}" class="py-2.5 px-4 text-sm rounded-md font-semibold text-white border border-blue-600 bg-blue-600 hover:bg-blue-700 transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500">See my work</a>
                            <a href="{{ route('contact') }}" class="py-2.5 px-4 text-slate-900 text-sm font-semibold rounded-md bg-white border border-slate-300 transition-colors hover:bg-gray-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-slate-50 dark:hover:bg-neutral-700">Contact me</a>
                        </div>
                    </div>
                </div>
                <div class="w-full aspect-[42/33]">
                    <img src="{{ asset('img/portfolio/portrait-cutout.webp') }}" alt="Chris Brilianto Chandra holding a camera" class="w-full h-full object-contain" />
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto mt-12 mb-12 max-w-7xl px-4 md:px-8" aria-labelledby="selected-work-heading">
        <h2 id="selected-work-heading" class="mb-6 text-2xl font-bold">Selected Work</h2>
        <div class="grid gap-6 md:grid-cols-3">
            @if (count($selectedPosts) > 0)
                @foreach ($selectedPosts as $post)
                <article class="bg-white border border-slate-200 shadow-sm w-full rounded-lg overflow-hidden dark:bg-neutral-800 dark:border-neutral-700">
                    <div class="aspect-[3/2] w-full bg-slate-100 dark:bg-neutral-700">
                        @if ($post->image_path)
                            <img src="{{ route('blog.cover', $post) }}" alt="{{ $post->title }}" loading="lazy" class="w-full h-full object-cover" />
                        @endif
                    </div>
                    <div class="p-4 sm:p-6">
                        <h3 class="text-slate-900 text-base font-semibold break-words dark:text-slate-50">{{ $post->title }}</h3>
                        <p class="mt-2 text-sm text-slate-600 leading-relaxed dark:text-slate-400">{{ $post->excerpt }}</p>
                        <a href="{{ route('blog.show', $post) }}" class="inline-block mt-6 py-2 px-3.5 text-sm rounded-md font-semibold text-white border border-blue-600 bg-blue-600 hover:bg-blue-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500">Read more<span class="sr-only"> about {{ $post->title }}</span></a>
                    </div>
                </article>
                @endforeach
            @else
                <p class="col-span-full py-8 text-slate-600 dark:text-slate-400">No selected work yet.</p>
            @endif
        </div>
    </section>
@endsection
