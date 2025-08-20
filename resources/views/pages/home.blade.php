<x-guest-layout>
    <!-- 2️⃣ Hero Section -->
        <section class="px-4 sm:px-6 lg:px-8 ">
          <div class="h-120 md:h-[80dvh] flex flex-col bg-[url('https://images.unsplash.com/photo-1497366811353-6870744d04b2?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fG9mZmljZSUyMHNwYWNlfGVufDB8fDB8fHww')] bg-cover bg-center bg-no-repeat rounded-2xl">
            <div class="mt-auto w-2/3 md:max-w-lg ps-5 pb-5 md:ps-10 md:pb-10">
              <h1 class="text-xl md:text-3xl lg:text-5xl text-white">
                Bringing Art to everything
              </h1>
            </div>
          </div>
        </section>
    <!-- 3️⃣ Popular Job Categories -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Popular Job Categories</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <!-- Category Card -->
                <a href="#" class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow text-center">
                    <div class="bg-blue-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg">IT & Software</h3>
                    <p class="text-gray-600 text-sm">1,200 Jobs</p>
                </a>
                
                <!-- Repeat for other categories -->
                <a href="#" class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow text-center">
                    <div class="bg-green-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg">Marketing</h3>
                    <p class="text-gray-600 text-sm">850 Jobs</p>
                </a>
                
                <a href="#" class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow text-center">
                    <div class="bg-purple-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg">Finance</h3>
                    <p class="text-gray-600 text-sm">700 Jobs</p>
                </a>
                
                <a href="#" class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow text-center">
                    <div class="bg-yellow-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg">Design</h3>
                    <p class="text-gray-600 text-sm">550 Jobs</p>
                </a>
                
                <!-- View All Categories Button -->
                <div class="md:col-span-4 text-center mt-8">
                    <a href="#" class="inline-block px-6 py-3 border border-blue-600 text-blue-600 font-medium rounded hover:bg-blue-50">
                        View All Categories
                    </a>
                </div>
            </div>
        </div>
    </section>

        <!-- Search Bar -->
    <section class="py-8">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-4">Find Your Dream Job</h2>
            <p class="text-gray-600 mb-6">Search through thousands of job listings across various industries.</p>
        </div>
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-4">
            <form action="{{ route('jobs') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <input type="text" name="title" placeholder="Job title or keywords" class="w-full border px-4 py-3 rounded text-gray-800">
                <input type="text" name="location" placeholder="Location" class="w-full border px-4 py-3 rounded text-gray-800">
                <select name="category" class="w-full border px-4 py-3 rounded text-gray-800">
                    <option value="">All Categories</option>
                    <option value="it">IT & Software</option>
                    <option value="marketing">Marketing</option>
                    <option value="finance">Finance</option>
                    <option value="design">Design</option>
                    <option value="healthcare">Healthcare</option>
                    <option value="engineering">Engineering</option>
                </select>
                <button type="submit" class="w-full bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 font-medium">
                    Search Jobs
                </button>
            </form>
        </div>
    </section>

    <!-- 4️⃣ Featured / Latest Jobs -->
    <section class="py-16">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold">Latest Job Openings</h2>
                <a href="#" class="text-blue-600 font-medium hover:underline">View All Jobs</a>
            </div>
            
            <div class="grid md:grid-cols-4 gap-6">
                <!-- Job Card -->
                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow border-l-4 border-blue-600">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-14 w-24 object-contain rounded">
                    <div class="flex items-start justify-between">
                        <div>
                            <h3 class="font-bold text-xl mb-1">Senior Frontend Developer</h3>
                            <p class="text-gray-600 mb-2">TechCorp • San Francisco, CA</p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full">Full-time</span>
                                <span class="bg-green-100 text-green-800 text-xs px-3 py-1 rounded-full">Remote</span>
                                <span class="bg-purple-100 text-purple-800 text-xs px-3 py-1 rounded-full">$90k - $120k</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4 line-clamp-2">We're looking for an experienced frontend developer to join our team and help build amazing user experiences using React and TypeScript.</p>
                    <a href="#" class="text-blue-600 font-medium hover:underline">Apply Now</a>
                </div>
                
                <!-- Repeat for other jobs -->
                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow border-l-4 border-green-600">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-14 w-24 object-contain">
                    <div class="flex items-start justify-between">
                        <div>
                            <h3 class="font-bold text-xl mb-1">Marketing Manager</h3>
                            <p class="text-gray-600 mb-2">Growth Inc • New York, NY</p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full">Full-time</span>
                                <span class="bg-yellow-100 text-yellow-800 text-xs px-3 py-1 rounded-full">$80k - $100k</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4 line-clamp-2">Lead our marketing team to develop and execute strategies that drive customer acquisition and brand awareness.</p>
                    <a href="#" class="text-blue-600 font-medium hover:underline">Apply Now</a>
                </div>
            </div>
        </div>
    </section>

    <!-- 5️⃣ Featured Employers -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold">Featured Employers</h2>
                <a href="#" class="text-blue-600 font-medium hover:underline">View All Companies</a>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-sm text-center">
                    <img src="https://via.placeholder.com/100" alt="Company" class="w-20 h-20 mx-auto mb-4 object-contain">
                    <h3 class="font-semibold">TechCorp</h3>
                    <p class="text-gray-600 text-sm">12 Open Positions</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-sm text-center">
                    <img src="https://via.placeholder.com/100" alt="Company" class="w-20 h-20 mx-auto mb-4 object-contain">
                    <h3 class="font-semibold">Growth Inc</h3>
                    <p class="text-gray-600 text-sm">8 Open Positions</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-sm text-center">
                    <img src="https://via.placeholder.com/100" alt="Company" class="w-20 h-20 mx-auto mb-4 object-contain">
                    <h3 class="font-semibold">DesignHub</h3>
                    <p class="text-gray-600 text-sm">5 Open Positions</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-sm text-center">
                    <img src="https://via.placeholder.com/100" alt="Company" class="w-20 h-20 mx-auto mb-4 object-contain">
                    <h3 class="font-semibold">FinancePro</h3>
                    <p class="text-gray-600 text-sm">7 Open Positions</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 6️⃣ How It Works -->
    <section class="py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">How It Works</h2>
            
            <div class="grid md:grid-cols-4 gap-8">
                <!-- Step 1 -->
                <div class="text-center">
                    <div class="bg-blue-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4 text-blue-600 font-bold text-xl">1</div>
                    <h3 class="font-semibold text-lg mb-2">Create an Account</h3>
                    <p class="text-gray-600">Register as a job seeker or employer in just a few steps.</p>
                </div>
                
                <!-- Step 2 -->
                <div class="text-center">
                    <div class="bg-blue-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4 text-blue-600 font-bold text-xl">2</div>
                    <h3 class="font-semibold text-lg mb-2">Complete Your Profile</h3>
                    <p class="text-gray-600">Add your skills, experience, and preferences.</p>
                </div>
                
                <!-- Step 3 -->
                <div class="text-center">
                    <div class="bg-blue-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4 text-blue-600 font-bold text-xl">3</div>
                    <h3 class="font-semibold text-lg mb-2">Search & Apply</h3>
                    <p class="text-gray-600">Find matching jobs and apply with one click.</p>
                </div>
                
                <!-- Step 4 -->
                <div class="text-center">
                    <div class="bg-blue-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4 text-blue-600 font-bold text-xl">4</div>
                    <h3 class="font-semibold text-lg mb-2">Get Hired</h3>
                    <p class="text-gray-600">Connect with employers and land your dream job.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 7️⃣ Achievements / Stats -->
    <section class="py-16 bg-blue-600 text-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div>
                    <p class="text-4xl font-bold mb-2">5,000+</p>
                    <p>Jobs Available</p>
                </div>
                <div>
                    <p class="text-4xl font-bold mb-2">2,000+</p>
                    <p>Companies Hiring</p>
                </div>
                <div>
                    <p class="text-4xl font-bold mb-2">50,000+</p>
                    <p>Job Seekers</p>
                </div>
                <div>
                    <p class="text-4xl font-bold mb-2">10,000+</p>
                    <p>Successful Hires</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 8️⃣ Testimonials -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Success Stories</h2>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex items-center mb-4">
                        <img src="https://via.placeholder.com/50" alt="User" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold">Sarah Johnson</h4>
                            <p class="text-gray-600 text-sm">UX Designer at TechCorp</p>
                        </div>
                    </div>
                    <p class="text-gray-700">"I found my dream job within two weeks of using this platform. The application process was so simple and the job matches were spot on!"</p>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex items-center mb-4">
                        <img src="https://via.placeholder.com/50" alt="User" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold">Michael Chen</h4>
                            <p class="text-gray-600 text-sm">Marketing Director at Growth Inc</p>
                        </div>
                    </div>
                    <p class="text-gray-700">"As an employer, we've found exceptional talent through this portal. The quality of candidates is consistently high."</p>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex items-center mb-4">
                        <img src="https://via.placeholder.com/50" alt="User" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold">David Wilson</h4>
                            <p class="text-gray-600 text-sm">Senior Developer at DesignHub</p>
                        </div>
                    </div>
                    <p class="text-gray-700">"The job matching algorithm is incredible. It connected me with opportunities I wouldn't have found on my own."</p>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
