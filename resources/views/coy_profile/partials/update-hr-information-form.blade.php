<section>
   <header>
      <h2 class="text-lg font-medium text-gray-900">
         {{ __('Human Resources Agent Information') }}
      </h2>

      <p class="mt-1 text-sm text-gray-600">
         {{ __("Update your account's profile information and email address.") }}
      </p>
   </header>

   <form id="send-verification" method="post" action="{{ route('verification.send') }}">
      @csrf
   </form>

   <form method="post" action="{{ route('coy_hr_profile.update') }}" class="mt-6 space-y-6" novalidate>
      @csrf
      @method('patch')

      {{-- First name --}}
      <div>
         <x-input-label for="hr_fname" :value="__('First Name')" />
         <x-text-input id="hr_fname" name="hr_fname" type="text" class="mt-1 block w-full capitalize"
            :value="old('hr_fname', !$user->isCoy() ?: $user->getCoyHR('hr_fname'))" required autofocus
            autocomplete="hr_fname" />
         <x-input-error class="mt-2" :messages="$errors->get('hr_fname')" />
      </div>


      {{-- Last name --}}
      <div>
         <x-input-label for="hr_lname" :value="__('Last Name')" />
         <x-text-input id="hr_lname" name="hr_lname" type="text" class="mt-1 block w-full capitalize"
            :value="old('hr_lname', !$user->isCoy() ?: $user->getCoyHR('hr_lname'))" required autofocus
            autocomplete="hr_lname" />
         <x-input-error class="mt-2" :messages="$errors->get('hr_lname')" />
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