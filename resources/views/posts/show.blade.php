@extends('layouts.public')
@section('title', $post->title)
@section('content')
    <main class="mx-auto max-w-3xl px-4 py-12 md:px-8">
        <a href="{{ route('blog') }}" class="text-sm text-blue-600 dark:text-blue-400">&larr;  Back to Blog</a>
        <article class="mt-8">
            <h1 class="break-words text-3xl font-bold md:text-4xl">{{ $post->title }}</h1>
            <p class="mt-3 text-sm text-slate-600 dark:text-slate-400">{{ $post->created_at->format('d M Y') }}</p>
            <p class="mt-6 text-lg leading-relaxed text-slate-600 dark:text-slate-300">{{ $post->excerpt }}</p>
            @if ($post->image_path)
                <img src="{{ route('blog.cover', $post) }}" alt="{{ $post->title }}" class="mt-8 h-auto w-full rounded-lg" />
            @endif
            <div class="mt-8 break-words text-base leading-relaxed [&_a]:text-blue-600 [&_a]:underline dark:[&_a]:text-blue-400 [&_p]:mb-4 [&_ul]:mb-4 [&_ul]:list-disc [&_ul]:pl-6 [&_ol]:mb-4 [&_ol]:list-decimal [&_ol]:pl-6 [&_h2]:mt-8 [&_h2]:mb-3 [&_h2]:text-2xl [&_h2]:font-bold [&_h3]:mt-6 [&_h3]:mb-2 [&_h3]:text-xl [&_h3]:font-semibold [&_blockquote]:border-l-4 [&_blockquote]:border-slate-300 [&_blockquote]:pl-4 [&_blockquote]:italic [&_code]:rounded [&_code]:bg-slate-100 [&_code]:px-1 [&_code]:py-0.5 [&_code]:text-sm dark:[&_code]:bg-neutral-800 [&_pre]:overflow-x-auto [&_pre]:rounded-lg [&_pre]:bg-slate-100 [&_pre]:p-4 dark:[&_pre]:bg-neutral-800">
                {!! $post->bodyHtml() !!}
            </div>
        </article>
    </main>
@endsection
