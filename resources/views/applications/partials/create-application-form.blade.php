<section>
   <header>
      @if (session('status') === 'application-created-successfully')
      <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
         class="text-sm text-gray-600">{{ __('Saved.') }}</p>
      @endif

      @if (session('status') === 'application-already-exists')
      <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
         class="text-sm text-gray-600">{{ __('You have already applied for this job.') }}</p>
      @endif


      
      <h2 class="text-lg font-medium text-gray-900">
         {{ __('Student Job Application Form') }}
      </h2>

      <p class="mt-1 text-sm text-gray-600">
         {{ __("Kindly upload the links to your credentials online, using Google Drive.") }}
      </p>
   </header>

   <form id="send-verification" method="post" action="{{ route('verification.send') }}">
      @csrf
   </form>

   <form method="post" action="{{ route('application.store', ['post' => $post->id]) }}" class="mt-6 space-y-6">
      @csrf

      <p class="font-medium text-red-800">
         Instruction : <br>
         <span class="text-sm">
            kindly upload all your documents or credentials to Google Drive or Google Docs before filling this form.
            After uploading them, enter the generated links here to share the files remotely.
            Please be informed that this form does not accept files, it only processes web links
         </span>
      </p>

      {{-- CV online --}}
      <div>
         <x-input-label for="cv_url" :value="__('CV (Link to remote file on Google Drive)')" />
         <input type="url" id="cv_url" name="cv_url" type="text" class="mt-1 block w-full" :value="old('cv_url')"
            required autofocus autocomplete="cv_url" />
         <x-input-error class="mt-2" :messages="$errors->get('cv_url')" />
      </div>


      {{-- Cover Letter --}}
      <div>
         <x-input-label for="cover_letter" :value="__('Cover letter (Link to remote file on Google Drive)')" />
         <input type="url" id="cover_letter" name="cover_letter" type="text" class="mt-1 block w-full"
            :value="old('cover_letter')" required autofocus autocomplete="cover_letter" />
         <x-input-error class="mt-2" :messages="$errors->get('cover_letter')" />
      </div>


      <div class="flex items-center gap-4">
         <x-primary-button>{{ __('Save') }}</x-primary-button>

         @if (session('status') === 'application-created-successfully')
         <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
            class="text-sm text-gray-600">{{ __('Saved.') }}</p>
         @endif
      </div>
   </form>
</section>