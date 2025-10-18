@forelse($posts as $post)
    <x-job-card :post="$post"/>
@empty
    <div class="col-span-full text-center py-16 text-slate-500 dark:text-slate-400 text-2xl font-semibold">
        No jobs found!
    </div>
@endforelse