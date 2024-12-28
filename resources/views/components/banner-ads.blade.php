@props(['bannerads'])

<div class="flex flex-col gap-3 shrink-0 w-fit">
  <a href="{{ $bannerads->link }}">
    <div class="w-[900px] h-[120px] flex shrink-0 border border-[#EEF0F7] rounded-2xl overflow-hidden">
      <img src="{{ Storage::url($bannerads->thumbnail) }}" class="object-cover w-full h-full" alt="ads" />
    </div>
  </a>
  <p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1">
    Our Advertisement <a href="#" class="w-[18px] h-[18px]"><img
        src="{{asset('assets/images/icons/message-question.svg')}}" alt="icon" /></a>
  </p>
</div>