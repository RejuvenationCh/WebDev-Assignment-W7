@extends('layouts.public')
@section('title', 'Contact')
@section('content')
 <section class="px-4 md:px-6 py-6">
   <div class="grid md:grid-cols-2 items-start gap-16 mx-auto max-w-5xl">
      <div>
         <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-6 md:text-4xl dark:text-slate-50">
               Say hello.
            </h2>
            <p class="text-base leading-relaxed text-slate-600 dark:text-slate-400">
               The easiest ways to reach me. I read everything, and I answer.
            </p>
         </div>

         <div class="mt-12">
            <h3 class="text-slate-900 text-base font-semibold dark:text-slate-50">Email</h3>
            <ul class="mt-4">
               <li class="flex items-center">
                  <div class="flex items-center bg-slate-200 dark:bg-neutral-800 w-8 h-8 p-2 rounded-full">
                     <i class="fa-solid fa-envelope text-slate-600 dark:text-slate-50" aria-hidden="true"></i>
                  </div>
                  <a href="mailto:chrisbrilianto88@gmail.com" class="text-sm ml-4">
                     <small class="block text-slate-900 dark:text-slate-50">Mail</small>
                     <span class="font-semibold text-blue-600 dark:text-slate-400">chrisbrilianto88@gmail.com</span>
                  </a>
               </li>
            </ul>
         </div>

         <div class="mt-8">
            <h3 class="text-slate-900 text-base font-semibold dark:text-slate-50">Socials</h3>
            <ul class="flex flex-wrap gap-4 mt-4">
               <li>
                  <a href="https://www.instagram.com/chris.brilianto/" target="_blank" rel="noopener noreferrer"
                     class="inline-flex items-center gap-3 text-sm text-slate-900 hover:text-blue-600 dark:text-slate-50 dark:hover:text-blue-400 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded">
                     <i class="fa-brands fa-instagram text-xl" aria-hidden="true"></i>
                     @chris.brilianto
                  </a>
               </li>
               <li>
                  <a href="https://github.com/RejuvenationCh" target="_blank" rel="noopener noreferrer"
                     class="inline-flex items-center gap-3 text-sm text-slate-900 hover:text-blue-600 dark:text-slate-50 dark:hover:text-blue-400 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded">
                     <i class="fa-brands fa-github text-xl" aria-hidden="true"></i>
                     RejuvenationCh
                  </a>
               </li>
               <li>
                  <a href="https://www.linkedin.com/in/chrisbrilianto/" target="_blank" rel="noopener noreferrer"
                     class="inline-flex items-center gap-3 text-sm text-slate-900 hover:text-blue-600 dark:text-slate-50 dark:hover:text-blue-400 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded">
                     <i class="fa-brands fa-linkedin-in text-xl" aria-hidden="true"></i>
                     Chris Brilianto Chandra
                  </a>
               </li>
            </ul>
         </div>
      </div>

      <form id="inquiry-form" method="POST" action="{{ route('contact.store') }}" class="space-y-4 scroll-mt-6" aria-labelledby="inquiry-heading">
         @csrf
         <h2 id="inquiry-heading" class="text-xl font-semibold">Project inquiry</h2>
         @if (session('inquiry_status'))
            <p role="status" class="rounded-md border border-green-300 bg-green-50 p-4 text-sm text-green-800 dark:border-green-800 dark:bg-green-950 dark:text-green-200">{{ session('inquiry_status') }}</p>
         @endif
         <div>
            <label for="name" class="mb-2 font-medium text-sm inline-block">Name</label>
            <input type="text" id="name" name="name" placeholder="Your name" required maxlength="100" autocomplete="name" value="{{ old('name') }}" @if ($errors->has('name')) aria-invalid="true" aria-describedby="name-error" @endif class="px-3 py-2.5 text-sm text-slate-900 w-full rounded-md bg-white outline-1 -outline-offset-1 outline-slate-300 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600 dark:text-slate-50 dark:bg-neutral-800 dark:outline-neutral-700" />
            <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">Max: 100 characters.</p>
            @if ($errors->has('name')) <p id="name-error" class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $errors->first('name') }}</p> @endif
         </div>
         <div>
            <label for="email" class="mb-2 font-medium text-sm inline-block">Email</label>
            <input type="email" id="email" name="email" placeholder="you@example.com" required maxlength="254" autocomplete="email" value="{{ old('email') }}" @if ($errors->has('email')) aria-invalid="true" aria-describedby="email-error" @endif class="px-3 py-2.5 text-sm text-slate-900 w-full rounded-md bg-white outline-1 -outline-offset-1 outline-slate-300 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600 dark:text-slate-50 dark:bg-neutral-800 dark:outline-neutral-700" />
            <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">Max: 254 characters.</p>
            @if ($errors->has('email')) <p id="email-error" class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $errors->first('email') }}</p> @endif
         </div>
         <div>
            <label for="service" class="mb-2 font-medium text-sm inline-block">What do you need?</label>
            <select id="service" name="service" required @if ($errors->has('service')) aria-invalid="true" aria-describedby="service-error" @endif class="px-3 py-2.5 text-sm text-slate-900 w-full rounded-md bg-white outline-1 -outline-offset-1 outline-slate-300 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600 dark:text-slate-50 dark:bg-neutral-800 dark:outline-neutral-700">
               <option value="">Choose a service</option>
               @foreach (\App\Models\Inquiry::SERVICES as $service)
                  <option value="{{ $service }}" @if (old('service') === $service) selected @endif>{{ $service }}</option>
               @endforeach
            </select>
            @if ($errors->has('service')) <p id="service-error" class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $errors->first('service') }}</p> @endif
         </div>
         <div>
            <label for="message" class="mb-2 font-medium text-sm inline-block">Message</label>
            <textarea placeholder="Tell me a little about your project." rows="6" id="message" name="message" required maxlength="2000" @if ($errors->has('message')) aria-invalid="true" aria-describedby="message-error" @endif class="px-3 py-2.5 text-sm text-slate-900 w-full rounded-md bg-white outline-1 -outline-offset-1 outline-slate-300 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600 dark:text-slate-50 dark:bg-neutral-800 dark:outline-neutral-700">{{ old('message') }}</textarea>
            <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">Max: 2,000 characters.</p>
            @if ($errors->has('message')) <p id="message-error" class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $errors->first('message') }}</p> @endif
         </div>
         <button type="submit" class="py-2.5 px-4 text-sm rounded-md font-semibold cursor-pointer text-white border border-blue-600 bg-blue-600 hover:bg-blue-700 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-500">Send inquiry</button>
      </form>
   </div>
 </section>
@endsection
