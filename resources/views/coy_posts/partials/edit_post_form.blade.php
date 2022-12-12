<section>
   <header>
      <h2 class="text-lg font-medium text-gray-900">
         {{ __('Create New Job Listing') }}
      </h2>

      <p class="mt-1 text-sm text-gray-600">
         {{ __("Put a new job out there and recruit for ") }} <b>{{ Auth::user()->name }}</b>
      </p>
   </header>

   <form id="send-verification" method="post" action="{{ route('verification.send') }}">
      @csrf
   </form>

   <form method="post" action="{{ route('coy-post.store') }}" class="mt-6 space-y-6" novalidate>
      @csrf

      {{-- Job Title --}}
      <div>
         <x-input-label for="job_title" :value="__('Job Title')" />
         <x-text-input id="job_title" name="job_title" type="text" class="mt-1 block w-full"
            :value="old('job_title', $post->job_title)" required autofocus autocomplete="job_title" />
         <x-input-error class="mt-2" :messages="$errors->get('job_title')" />
      </div>


      {{-- keywords --}}
      <div>
         <x-input-label for="keywords" :value="__('keywords')" />
         <x-text-input id="keywords" name="keywords" type="text" class="mt-1 block w-full"
            :value="old('keywords', $post->keywords)" required autofocus autocomplete="keywords" />
         <x-input-error class="mt-2" :messages="$errors->get('keywords')" />
      </div>

      {{-- About Us --}}
      <div>
         <x-input-label for="about_us" :value="__('About Us')" />
         <textarea name="about_us" id="about_us" rows="5"
            class="mt-1 block w-full">{{ old('about_us', $post->about_us) }}</textarea>
      </div>


      {{-- Responsibilities --}}
      <div>
         <x-input-label for="responsibilities" :value="__('Job Responsibilities')" />
         <textarea autocomplete="responsibilities" name="responsibilities" id="responsibilities" rows="10"
            class="mt-1 block w-full">{{ old('responsibilities', $post->responsibilities) }}</textarea>
         <x-input-error class="mt-2" :messages="$errors->get('responsibilities')" />
      </div>


      {{-- payment info --}}
      <div>

         <div>
            <x-input-label for="payment_info" :value="__('Payment info')" />
            <textarea autocomplete="payment_info" name="payment_info" id="payment_info" rows="10"
               class="mt-1 block w-full">{{ old('payment_info', $post->payment_info) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('payment_info')" />
         </div>
      </div>


      {{-- Benefits --}}
      <div>
         <x-input-label for="benefits" :value="__('Benefits')" />
         <textarea autocomplete="benefits" name="benefits" id="benefits" rows="10"
            class="mt-1 block w-full">{{ old('benefits', $post->benefits) }}</textarea>
         <x-input-error class="mt-2" :messages="$errors->get('benefits')" />
      </div>

      {{-- details --}}
      <div>
         <x-input-label for="details" :value="__('Details')" />
         <textarea autocomplete="details" name="details" id="details" rows="10"
            class="mt-1 block w-full">{{ old('details', $post->details) }}</textarea>
         <x-input-error class="mt-2" :messages="$errors->get('details')" />
      </div>

      {{-- requirements --}}
      <div>
         <x-input-label for="requirements" :value="__('Requirements')" />
         <textarea autocomplete="requirements" name="requirements" id="requirements" rows="10"
            class="mt-1 block w-full">{{ old('requirements', $post->requirements) }}</textarea>
         <x-input-error class="mt-2" :messages="$errors->get('requirements')" />
      </div>

      {{-- Location --}}
      <div>
         <x-input-label for="location" :value="__('Location')" />
         <x-text-input id="location" name="location" type="text" class="mt-1 block w-full"
            :value="old('location', $post->location)" required autofocus autocomplete="location" />
         <x-input-error class="mt-2" :messages="$errors->get('location')" />
      </div>

      {{-- Coy Website --}}
      <div>
         <x-input-label for="coy_website" :value="__('Company Website')" />
         <x-text-input id="coy_website" name="coy_website" type="text" class="mt-1 block w-full"
            :value="old('coy_website', $post->coy_website)" required autofocus autocomplete="coy_website" />
         <x-input-error class="mt-2" :messages="$errors->get('coy_website')" />
      </div>

      <div class="flex items-center gap-4">
         <x-primary-button>{{ __('Save') }}</x-primary-button>

         @if (session('status') === 'student-record-updated')
         <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
            class="text-sm text-gray-600">{{ __('Saved.') }}</p>
         @endif
      </div>
   </form>
</section>