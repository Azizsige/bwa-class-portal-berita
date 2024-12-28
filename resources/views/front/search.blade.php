@extends('front.master')
@section('content')

<body class="font-[Poppins]">
  <x-navbar />
  <x-categories :categories="$categories" />
  <section id="heading" class="max-w-[1130px] mx-auto flex items-center flex-col gap-[30px] mt-[70px]">
    <h1 class="text-4xl leading-[45px] font-bold text-center">
      Explore Hot Trending <br />
      Good News Today
    </h1>
    <form method="GET" action="{{ route('front.search') }}">
      @csrf
      <label for="keyword"
        class="w-[500px] flex p-[12px_20px] transition-all duration-300 gap-[10px] ring-1 ring-[#E8EBF4] focus-within:ring-2 focus-within:ring-[#FF6B18] rounded-[50px] group">
        <div class="w-5 h-5 flex shrink-0">
          <img src="assets/images/icons/search-normal.svg" alt="icon" />
        </div>
        <input autocomplete="off" type="text" id="search-bar" name="keyword"
          placeholder="Search hot trendy news today..."
          class="appearance-none font-semibold placeholder:font-normal placeholder:text-[#A3A6AE] outline-none focus:ring-0 w-full" />
      </label>
    </form>
  </section>
  <section id="search-result" class="max-w-[1130px] mx-auto flex items-start flex-col gap-[30px] mt-[70px] mb-[100px]">
    <h2 class="text-[26px] leading-[39px] font-bold">Search Result: <span>{{ Str::ucfirst($keyword) }}</span></h2>
    <div id="search-cards" class="grid grid-cols-3 gap-[30px]">

      @forelse ($articles as $article)
      <a href="{{ route('front.details', $article->slug) }}" class="card">
        <div
          class="flex flex-col gap-4 p-[26px_20px] transition-all duration-300 ring-1 ring-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18] rounded-[20px] overflow-hidden bg-white">
          <div class="thumbnail-container h-[200px] relative rounded-[20px] overflow-hidden">
            <div class="badge absolute left-5 top-5 bottom-auto right-auto flex p-[8px_18px] bg-white rounded-[50px]">
              <p class="text-xs leading-[18px] font-bold">{{ $article->category->name }}</p>
            </div>
            <img src="{{ Storage::url($article->thumbnail) }}" alt="thumbnail photo"
              class="w-full h-full object-cover" />
          </div>
          <div class="flex flex-col gap-[6px]">
            <h3 class="text-lg leading-[27px] font-bold">{{
              Str::substr($article->name, 0, 70) }}{{ Str::length($article->name) > 70 ? '...' : '' }}</h3>
            <p class="text-sm leading-[21px] text-[#A3A6AE]">{{ $article->created_at->format('M d, Y') }}</p>
          </div>
        </div>
      </a>
      @empty
      <p>Belum ada berita terkait</p>
      @endforelse


    </div>
  </section>
</body>
@endsection