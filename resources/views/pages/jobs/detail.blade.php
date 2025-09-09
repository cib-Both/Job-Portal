@extends('layouts.formation')

@section('content')
<section class="pt-6 bg-white dark:bg-gray-900 mb-32 ">
    <div class="container px-4">
        <!-- Back btn -->
        <nav class="flex" aria-label="Breadcrumb">
          <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
              <a href="{{ route('home') }}"
                 class="inline-flex items-center text-sm font-medium text-gray-800 hover:text-blue-600 dark:text-white dark:hover:text-blue-400">
                <svg class="w-3 h-3 me-2.5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
                Home
              </a>
            </li>

            <li>
              <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a href="{{ $previousUrl }}"
                   class="ms-1 text-sm font-medium text-gray-800 hover:text-blue-600 dark:text-white dark:hover:text-blue-400">
                  Jobs
                </a>
              </div>
            </li>

            <li aria-current="page">
              <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">
                  {{ $post->job->title ?? 'Job Detail' }}
                </span>
              </div>
            </li>
          </ol>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 bg-white dark:bg-gray-900 p-8">
            <div class="lg:col-span-1 space-y-6">
                <!-- Company Info -->
                <div class="text-center">
                    <img src="{{ $post->job?->company?->logo ? asset('storage/'.$post->job->company->logo) : asset('images/default-logo.png') }}"
                         alt="Company Logo"
                         class="h-24 w-24 object-cover rounded-full mx-auto shadow-lg dark:shadow-gray-800"/>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-2">
                        {{ $post->job->company->name ?? 'Unknown Company' }}
                    </h2>
                    @if($post->job->company?->website)
                        <a href="{{ $post->job->company->website }}" target="_blank"
                           class="text-blue-600 dark:text-blue-400 hover:underline mt-1 block">
                            {{ parse_url($post->job->company->website, PHP_URL_HOST) }}
                        </a>
                    @endif
                    @if($post->job->company?->description)
                        <p class="text-gray-600 dark:text-gray-400 mt-3 text-sm leading-relaxed">
                            {{ $post->job->company->description }}
                        </p>
                    @endif
                </div>

                <!-- Job Title -->
                <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white text-center">
                    {{ $post->job->title ?? 'No Title' }}
                </h1>

                <!-- Job Meta Info -->
                <div class="flex flex-wrap justify-center gap-3 mt-4">
                    <span class="px-4 py-2 rounded-full text-sm font-medium bg-blue-50 dark:bg-blue-900/40 text-blue-700 dark:text-blue-200 border border-blue-100 dark:border-blue-800">
                        {{ ucfirst($post->type ?? '') }}
                    </span>

                    @if($post->location)
                        <span class="flex items-center gap-2 px-4 py-2 rounded-full text-sm bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:text-blue-700 dark:hover:text-blue-200 border border-gray-200 dark:border-gray-600 hover:bg-blue-50 dark:hover:bg-blue-900/40 hover:border-blue-100 dark:hover:border-blue-800 transition">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            {{ $post->location }}
                        </span>
                    @endif

                    @if($post->salary_option || $post->salary)
                        <span class="flex items-center gap-2 px-4 py-2 rounded-full text-sm bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:text-blue-700 dark:hover:text-blue-200 border border-gray-200 dark:border-gray-600 hover:bg-blue-50 dark:hover:bg-blue-900/40 hover:border-blue-100 dark:hover:border-blue-800 transition">
                           <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                            {{ ucfirst($post->salary_option ?? '') }} 
                            @if($post->salary) {{ $post->salary }} $ @endif
                        </span>
                    @endif

                    @if($post->deadline_option)
                        <span class="flex items-center gap-2 px-4 py-2 rounded-full text-sm bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:text-blue-700 dark:hover:text-blue-200 border border-gray-200 dark:border-gray-600 hover:bg-blue-50 dark:hover:bg-blue-900/40 hover:border-blue-100 dark:hover:border-blue-800 transition">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>

                            @if($post->deadline_option === 'until-full')
                                Until Full
                            @else
                                Deadline: {{ \Carbon\Carbon::parse($post->deadline)->format('M d, Y') }}
                            @endif
                        </span>
                    @endif
                </div>
            </div>

            <div class="lg:col-span-2 space-y-6">
                <!-- Skills -->
                @if($post->skill)
                <div class="bg-gray-50 dark:bg-gray-700/40 p-6 rounded-xl border border-gray-200 dark:border-gray-600">
                    <h2 class="text-xl font-bold mb-4 text-gray-900 dark:text-white flex items-center gap-2">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        Skills
                    </h2>
                    <div class="flex flex-wrap gap-3">
                        @foreach(explode(',', $post->skill) as $req)
                            <span class="px-4 py-1.5 bg-blue-50 dark:bg-blue-900/40 text-blue-700 dark:text-blue-200 text-sm font-medium rounded-lg border border-blue-200 dark:border-blue-800 shadow-sm hover:bg-blue-100 dark:hover:bg-blue-800 transition">
                                {{ trim($req) }}
                            </span>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Job Description -->
                <div class="bg-gray-50 dark:bg-gray-700/40 p-6 rounded-xl border border-gray-200 dark:border-gray-600">
                    <h2 class="text-xl font-bold mb-4 text-gray-900 dark:text-white flex items-center gap-2">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" /></svg>
                        Job Description
                    </h2>
                    <div class="text-gray-700 dark:text-gray-300 leading-relaxed prose prose-sm dark:prose-invert max-w-none">
                        {!! nl2br(e($post->job->description ?? '')) !!}
                    </div>
                </div>

                <!-- Job Requirements -->
                <div class="bg-gray-50 dark:bg-gray-700/40 p-6 rounded-xl border border-gray-200 dark:border-gray-600">
                    <h2 class="text-xl font-bold mb-4 text-gray-900 dark:text-white flex items-center gap-2">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        Jobs Requirements
                    </h2>
                    <div class="text-gray-700 dark:text-gray-300 leading-relaxed prose prose-sm dark:prose-invert max-w-none">
                        {!! nl2br(e($post->reqirement ?? '')) !!}
                    </div>
                </div>

                <!-- Apply Button -->
                <div class="text-center">
                    <button type="sumit"
                        class="group text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-4 py-2 text-center 
                               inline-flex items-center gap-2 dark:bg-blue-600 dark:hover:bg-blue-700 transition-all duration-300">
                        <span class="text-base">Apply Now</span>
                        <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" 
                             aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </button>
                    <p class="text-gray-500 dark:text-gray-400 text-sm mt-3">
                        You'll be redirected to the company's application portal
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection