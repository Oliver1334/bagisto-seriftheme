<x-shop::layouts>
    <x-slot:title>
        Serif Theme Home
        </x-slot>

        <section style="background-color: #1e1b4b; min-height: 700px;" class="flex items-center w-full">
            <div class="mx-auto w-full max-w-7xl px-4 py-16 sm:px-6 lg:px-8 text-center">
                <h1 class="text-5xl font-bold text-white sm:text-6xl lg:text-7xl">
                    Discover the Latest Collections
                </h1>

                <p class="mt-6 text-lg text-white mx-auto max-w-2xl" style="opacity: 0.75;">
                    Shop the newest arrivals across all categories. Free shipping on orders over $50.
                </p>

                <div class="mt-8 flex justify-center gap-4">
                    <a style="background-color: #ffffff; color: #1e1b4b;" class="inline-block rounded px-8 py-3 font-semibold shadow-sm transition-colors" href="{{ route('shop.search.index') }}">
                        Shop Now
                    </a>
                </div>
            </div>
        </section>

        <x-shop::products.carousel
            title="Featured Products"
            :src="route('shop.api.products.index', ['sort' => 'created_at-desc', 'limit' => 8])"
            :navigation-link="route('shop.search.index')"
        />
</x-shop::layouts>