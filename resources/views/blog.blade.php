@extends('layouts.public')

@section('title', 'Blog')

@section('content')
    <section class="mt-6 px-4 md:px-8">
       <div class="max-w-md mx-auto sm:max-w-3xl lg:max-w-6xl">
          <div class="mb-12 max-w-3xl mx-auto text-center md:mb-16">
             <h2 class="text-3xl font-bold mb-6 text-slate-900 md:text-4xl dark:text-slate-50">Latest Blog Posts</h2>
             <p class="text-base text-slate-600 leading-relaxed dark:text-slate-400">Explore our latest articles,
                insights,
                and practical tips designed to help you stay updated, improve your workflow, and build better products
                with
                confidence.</p>
          </div>

          <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3 sm:gap-6">
             @if (count($posts) > 0)
                 @foreach ($posts as $post)

                <a href="{{ route('blog.show', $post) }}" class="block rounded-lg overflow-hidden relative group before:absolute before:inset-0 before:z-10 before:bg-black/20 focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-blue-600">
                   <div class="w-full aspect-[119/128] bg-slate-200 dark:bg-neutral-800">
                      @if ($post->image_path)
                         <img src="{{ route('blog.cover', $post) }}" alt="{{ $post->title }}" loading="lazy" class="w-full h-full object-cover" />
                      @endif
                   </div>
                   <div class="px-6 py-4 absolute bottom-0 left-0 right-0 bg-white/95 z-10 dark:bg-neutral-800/95">
                      <span class="text-xs block text-slate-600 font-medium mb-2 dark:text-slate-400">{{ $post->created_at->format('d M Y') }}</span>
                      <h3 class="text-lg font-semibold text-slate-900 break-words dark:text-slate-50">{{ $post->title }}</h3>
                      <p class="mt-3 text-sm leading-relaxed text-slate-600 line-clamp-3 dark:text-slate-300">{{ $post->excerpt }}</p>
                   </div>
                </a>
                 @endforeach
             @else
                <p class="col-span-full py-12 text-center text-slate-600 dark:text-slate-400">No posts published yet.</p>
             @endif
          </div>
          <div class="my-8">{{ $posts->links() }}</div>
       </div>
    </section>
@endsection
