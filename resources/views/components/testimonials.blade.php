<section class="py-24 mb-10 rounded-3xl bg-gradient-to-br from-indigo-50 via-white to-blue-50 dark:from-gray-900 dark:via-gray-950 dark:to-gray-900">
  <div class="container mx-auto px-6 lg:px-12">
    <!-- Header -->
    <div class="text-center max-w-3xl mx-auto mb-20">
      <span class="text-blue-600 dark:text-blue-400 font-semibold tracking-wide uppercase text-sm">Testimonials</span>
      <h2 class="text-4xl font-extrabold text-gray-900 dark:text-white mt-3 mb-5">Success Stories</h2>
      <p class="text-lg text-gray-600 dark:text-gray-300">See how job seekers and employers thrive with our platform</p>
    </div>

    <!-- Testimonials Grid -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10 mb-20">
      <!-- Card -->
      <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-transform transform hover:-translate-y-2">
        <div class="flex items-center gap-4 mb-6">
          <div class="relative">
            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=128&q=80" 
                 alt="Sarah Johnson" 
                 class="w-16 h-16 rounded-full object-cover shadow-md">
            <span class="absolute -bottom-1 -right-1 w-5 h-5 bg-green-500 border-2 border-white dark:border-gray-800 rounded-full"></span>
          </div>
          <div>
            <h4 class="font-semibold text-lg text-gray-900 dark:text-white">Sarah Johnson</h4>
            <p class="text-indigo-600 dark:text-indigo-400 text-sm">UX Designer at TechCorp</p>
          </div>
        </div>
        <div class="flex text-amber-400 mb-4">
          <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
          <i class="fas fa-star"></i><i class="fas fa-star"></i>
        </div>
        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">“I found my dream job within two weeks! The process was smooth and the matches were perfect.”</p>
      </div>

      <!-- Card -->
      <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-transform transform hover:-translate-y-2">
        <div class="flex items-center gap-4 mb-6">
          <div class="relative">
            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=128&q=80" 
                 alt="Michael Chen" 
                 class="w-16 h-16 rounded-full object-cover shadow-md">
            <span class="absolute -bottom-1 -right-1 w-5 h-5 bg-green-500 border-2 border-white dark:border-gray-800 rounded-full"></span>
          </div>
          <div>
            <h4 class="font-semibold text-lg text-gray-900 dark:text-white">Michael Chen</h4>
            <p class="text-indigo-600 dark:text-indigo-400 text-sm">Marketing Director at Growth Inc</p>
          </div>
        </div>
        <div class="flex text-amber-400 mb-4">
          <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
          <i class="fas fa-star"></i><i class="fas fa-star"></i>
        </div>
        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">“As an employer, we’ve found exceptional talent here. The process is fast and reliable.”</p>
      </div>

      <!-- Card -->
      <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-transform transform hover:-translate-y-2">
        <div class="flex items-center gap-4 mb-6">
          <div class="relative">
            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=128&q=80" 
                 alt="David Wilson" 
                 class="w-16 h-16 rounded-full object-cover shadow-md">
            <span class="absolute -bottom-1 -right-1 w-5 h-5 bg-green-500 border-2 border-white dark:border-gray-800 rounded-full"></span>
          </div>
          <div>
            <h4 class="font-semibold text-lg text-gray-900 dark:text-white">David Wilson</h4>
            <p class="text-indigo-600 dark:text-indigo-400 text-sm">Senior Developer at DesignHub</p>
          </div>
        </div>
        <div class="flex text-amber-400 mb-4">
          <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
          <i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
        </div>
        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">“The matching algorithm is amazing. I discovered opportunities I never imagined.”</p>
      </div>
    </div>

    <!-- CTA -->
    <div class="text-center">
      <h3 class="text-3xl font-semibold text-gray-900 dark:text-white mb-6">Ready to create your success story?</h3>
      <div class="flex flex-col sm:flex-row justify-center gap-5">
        <a href="{{ route('jobs') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-8 rounded-xl shadow-md hover:shadow-lg transition">
          Find Your Dream Job
        </a>
      </div>
    </div>
  </div>
</section>
