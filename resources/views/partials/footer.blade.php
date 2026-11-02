<footer class="border-t border-slate-200 bg-white px-4 pt-12 pb-8 text-slate-900 dark:border-neutral-700 dark:bg-neutral-900 dark:text-slate-50 md:px-8">
   <div class="mx-auto max-w-7xl">
      <div class="grid gap-10 md:grid-cols-3">
         <div>
            <a href="{{ route('home') }}"
               class="text-xl font-semibold rounded focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-blue-500">
               Chris Brilianto Chandra
            </a>
            <p class="mt-3 text-sm text-slate-600 dark:text-neutral-400">We do projects for fun</p>
         </div>

         <nav aria-label="Footer navigation">
            <h2 class="text-sm font-semibold">Explore</h2>
            <ul class="mt-4 space-y-3 text-sm text-slate-600 dark:text-neutral-400">
               <li><a href="{{ route('home') }}" class="rounded hover:text-blue-600 dark:hover:text-blue-400 focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-blue-500">Home</a></li>
               <li><a href="{{ route('about') }}" class="rounded hover:text-blue-600 dark:hover:text-blue-400 focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-blue-500">About</a></li>
               <li><a href="{{ route('blog') }}" class="rounded hover:text-blue-600 dark:hover:text-blue-400 focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-blue-500">Blog</a></li>
               <li><a href="{{ route('contact') }}" class="rounded hover:text-blue-600 dark:hover:text-blue-400 focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-blue-500">Contact</a></li>
            </ul>
         </nav>

         <div>
            <h2 class="text-sm font-semibold">Connect</h2>
            <ul class="mt-4 space-y-3 text-sm text-slate-600 dark:text-neutral-400">
               <li><a href="https://www.instagram.com/chris.brilianto/" target="_blank" rel="noopener noreferrer" class="rounded hover:text-blue-600 dark:hover:text-blue-400 focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-blue-500">Instagram</a></li>
               <li><a href="https://github.com/RejuvenationCh" target="_blank" rel="noopener noreferrer" class="rounded hover:text-blue-600 dark:hover:text-blue-400 focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-blue-500">GitHub</a></li>
               <li><a href="https://www.linkedin.com/in/chrisbrilianto/" target="_blank" rel="noopener noreferrer" class="rounded hover:text-blue-600 dark:hover:text-blue-400 focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-blue-500">LinkedIn</a></li>
            </ul>
         </div>
      </div>

      <p class="mt-10 border-t border-slate-200 pt-6 dark:border-neutral-700 text-sm text-slate-600 dark:text-neutral-400">
         2026 Chris Brilianto Chandra. All rights reserved.
      </p>
   </div>
</footer>
