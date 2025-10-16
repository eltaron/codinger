@php
    $socials = getSocials();
    if (!empty($socials) and count($socials)) {
        $socials = collect($socials)->sortBy('order')->toArray();
    }

    $footerColumns = getFooterColumns();
@endphp
@push('styles_top')
<style>

</style>
@endpush
<div class="">
  <style>
    .subscribe-input{
    border-radius: 24px !important;
    margin-top: 20px !important;
  } 
  .subscribe-input button{
    border-radius: 24px !important;
  } 
    .gradient-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(to top, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.8)); /* Dark gradient */
  
  z-index: 1; /* Ensure it sits under the content */
}
</style>
 <section class="container! mt-16! mb-12! px-4! sm:px-6! lg:px-12! mx-auto!">
  <div class="flex flex-col justify-start items-center gap-10!">
    
    <!-- Title -->
    <div class="w-full text-center text-indigo-900 text-3xl! sm:text-4xl! lg:text-5xl! font-normal!">
      {{ trans('footer.join_us_today') }}
    </div>

    <!-- Subscribe Card -->
    <div class="w-full max-w-5xl! relative bg-fuchsia-600 rounded-[40px]! overflow-hidden py-10! px-6! sm:px-10!">
      <div class="w-full max-w-[747px]! mx-auto! flex flex-col items-center gap-6! sm:gap-8!">
        
        <!-- Subtitle -->
        <div class="w-full text-center text-white text-lg! sm:text-xl! lg:text-2xl! font-normal!">
          {{ trans('footer.subscribe_content') }}
        </div>

        <!-- Form -->
        <form action="/newsletters" method="post" class="w-full">
          {{ csrf_field() }}
          <div class="relative w-full h-12! sm:h-14! bg-white/40 rounded-[20px]! outline outline-1! outline-offset-[-1px]! outline-emerald-50! overflow-hidden flex items-center">
            
            <!-- Input -->
            <input 
              type="text"
              name="newsletter_email"
              class="flex-1 h-full bg-transparent pl-4! sm:pl-[52px]! pr-28! text-white text-sm! sm:text-base! font-semibold! placeholder-white focus:outline-none"
              placeholder="{{ trans('footer.enter_email_here') }}"
              @error('newsletter_email') aria-invalid="true" @enderror
            >

            @error('newsletter_email')
              <div class="absolute left-4 sm:left-[52px]! bottom-[-20px]! text-white text-xs!">
                {{ $message }}
              </div>
            @enderror

            <!-- Button -->
            <button 
              type="submit" 
              class="absolute right-[4px]! top-[4px]! h-[calc(100%-8px)]! w-20! sm:w-24! bg-fuchsia-800 rounded-[40px]! flex items-center justify-center">
              <span class="text-white text-sm! sm:text-base! font-bold! font-['Segoe_UI']!">
                {{ trans('footer.join') }}
              </span>
            </button>
          </div>
        </form>

      </div>
    </div>
    
  </div>
</section>

<footer class="footer bg-[#812895]!  position-relative user-select-none pt-12!" style="border-radius: 0px !important;margin-top:0px;padding-left:0px;padding-right:0px;">
  
    
  

    <div class="container">
        <div class="row mb-8!">
    @php
        $columns = ['first_column','second_column','third_column','forth_column'];
    @endphp

    @foreach($columns as $column)
        @if($column === 'forth_column')
          <div class="container d-flex  col-6 col-md-3 align-items-center" style="flex-direction:column;gap:28px;">
            <div class="footer-logo z-999" style="height:auto">
                <a href="/">
                    @if(!empty($generalSettings['footer_logo']))
                        <img src="{{ $generalSettings['footer_logo'] }}" class="img-cover" alt="footer logo">
                    @endif
                </a>
            </div>

            <div class="footer-social z-999 d-flex">
                @if(!empty($socials) and count($socials))
                    @foreach($socials as $social)
                        <a href="{{ $social['link'] }}" target="_blank">
                            <img src="{{ $social['image'] }}" alt="{{ $social['title'] }}" class="mr-15">
                        </a>
                    @endforeach
                @endif
            </div>
    </div>
        @else
            {{-- Normal columns --}}
            <div class="col-6 col-md-3 z-999 mt-3">
                @if(!empty($footerColumns[$column]))
                    @if(!empty($footerColumns[$column]['title']))
                        <span class="z-999 header d-block text-white font-weight-bold">
                            {{ $footerColumns[$column]['title'] }}
                        </span>
                    @endif

                    @if(!empty($footerColumns[$column]['value']))
                        <div class="mt-20 z-999">
                            {!! $footerColumns[$column]['value'] !!}
                        </div>
                    @endif
                @endif
            </div>
        @endif
    @endforeach
</div>


      
    </div>
 {{-- <div class="mt-40 py-25 d-flex align-items-center justify-content-between">
    <div class="container d-flex align-items-center justify-content-between">
            <div class="footer-logo z-999" style="height:auto">
                <a href="/">
                    @if(!empty($generalSettings['footer_logo']))
                        <img src="{{ $generalSettings['footer_logo'] }}" class="img-cover" alt="footer logo">
                    @endif
                </a>
            </div>

            <div class="footer-social z-999 d-flex">
                @if(!empty($socials) and count($socials))
                    @foreach($socials as $social)
                        <a href="{{ $social['link'] }}" target="_blank">
                            <img src="{{ $social['image'] }}" alt="{{ $social['title'] }}" class="mr-15">
                        </a>
                    @endforeach
                @endif
            </div>
    </div>
        </div>--}}
    @if(getOthersPersonalizationSettings('platform_phone_and_email_position') == 'footer')
        <div class="footer-copyright-card">
            <div class="container d-flex align-items-center justify-content-between py-15">
                <div class="font-14 text-white">{{ trans('update.platform_copyright_hint') }}</div>

                <div class="d-flex align-items-center justify-content-center flex-wrap">
                    @if(!empty($generalSettings['site_phone']))
                        <div class="d-flex align-items-center text-white font-14">
                            <i data-feather="phone" width="20" height="20" class="mr-10"></i>
                            {{ $generalSettings['site_phone'] }}
                        </div>
                    @endif

                    @if(!empty($generalSettings['site_email']))
                        <div class="border-left mx-5 mx-lg-15 h-100"></div>

                        <div class="d-flex align-items-center text-white font-14">
                            <i data-feather="mail" width="20" height="20" class="mr-10"></i>
                            {{ $generalSettings['site_email'] }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
<!--<div class="gradient-overlay position-absolute w-100 h-100" style="top: 0; left: 0;  z-index: 1;"></div> -->
</footer>
</div>
