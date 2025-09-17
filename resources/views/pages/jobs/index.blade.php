<x-guest-layout>
    <div class="justify-center my-10">
        <x-filterSearch/>
    </div>

    <div class="flex flex-col gap-6 md:grid md:grid-cols-2 lg:grid-cols-4">
       @foreach($posts as $post)
            <x-job-card :post="$post"/>
       @endforeach
    </div>

    <div class="mt-6">
        {{ $posts->withQueryString()->links() }}
    </div>
</x-guest-layout>
