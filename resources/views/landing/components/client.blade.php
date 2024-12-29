<div data-aos="fade-up">
    <div
        class="container2-md flex flex-wrap items-center justify-center bg-white dark:bg-whiteColor-dark rounded-md mx-auto md:-translate-y-1/2 w-full shadow-brand">
        @foreach ($klien as $client)
        <div class="basis-1/2 md:basis-1/4 lg:basis-1/5 flex justify-center py-5 lg:py-35px 2xl:py-45px">
            <a href="{{ $client->url }}"><img src="{{ asset('storage/' . $client->image) }}" alt="{{ $client->name }}"></a>
        </div>
        @endforeach
    </div>
</div>
