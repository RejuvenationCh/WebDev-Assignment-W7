<nav
   class="flex py-2 px-4 md:px-8 bg-white border-b border-slate-300 dark:border-neutral-700 dark:bg-neutral-900 min-h-[68px] relative z-20"
   aria-label="Main navigation">
   <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between gap-4 w-full">
      <a href="{{ route('home') }}"
         class="min-w-9 inline-block focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded">
         <span class="sr-only">Chris Brilianto Chandra</span>
         <img src="{{ asset('img/portfolio/portrait-cutout.webp') }}" alt="Chris Brilianto Chandra" class="h-9 w-9 rounded-full object-cover object-top" />
      </a>

      <div id="collapseMenu" tabindex="-1"
         class="hidden lg:block lg:ml-auto max-lg:bg-white dark:max-lg:bg-neutral-900 max-lg:border-l max-lg:border-slate-300 dark:max-lg:border-neutral-700 max-lg:w-1/2 max-lg:fixed max-lg:top-0 max-lg:right-0 max-lg:h-full max-lg:shadow-md max-lg:overflow-auto max-sm:w-full z-50 outline-none">

         <div
            class="py-2 px-4 flex justify-between items-center border-b border-slate-300 sticky top-0 bg-white dark:border-neutral-700 dark:bg-neutral-900 lg:hidden max-lg:min-h-[68px]">
            <a href="{{ route('home') }}"
               class="inline-block focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded">
               <span class="sr-only">Chris Brilianto Chandra</span>
               <img src="{{ asset('img/portfolio/portrait-cutout.webp') }}" alt="Chris Brilianto Chandra" class="h-9 w-9 rounded-full object-cover object-top" />
            </a>
            <button type="button" id="toggleClose"
               class="cursor-pointer focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded">
               <span class="sr-only">Close main menu</span>
               <i class="fa-solid fa-xmark text-base text-slate-900 dark:text-slate-50" aria-hidden="true"></i>
            </button>
         </div>

         <ul class="flex flex-col gap-8 font-semibold text-sm text-slate-900 dark:text-slate-50 lg:flex-row max-lg:p-6">
            <li>
               <a href="{{ route('home') }}"
                  class="hover:text-blue-700 dark:hover:text-blue-400 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded">Home</a>
            </li>
            <li>
               <a href="{{ route('blog') }}"
                  class="hover:text-blue-700 dark:hover:text-blue-400 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded">Blog</a>
            </li>
            <li>
               <a href="{{ route('about') }}"
                  class="hover:text-blue-700 dark:hover:text-blue-400 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded">About</a>
            </li>
            <li>
               <a href="{{ route('contact') }}"
                  class="hover:text-blue-700 dark:hover:text-blue-400 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded">Contact</a>
            </li>
         </ul>
      </div>

      <div class="flex items-center gap-4">
         @include('partials.theme-toggle')

         <button type="button" id="toggleOpen"
            class="cursor-pointer lg:hidden focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded">
            <span class="sr-only">Open main menu</span>
            <i class="fa-solid fa-bars text-2xl text-slate-900 dark:text-slate-50" aria-hidden="true"></i>
         </button>
      </div>
   </div>
</nav>
