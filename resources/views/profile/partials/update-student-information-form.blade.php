<section>
   <header>
      <h2 class="text-lg font-medium text-gray-900">
         {{ __('Student Record Information') }}
      </h2>

      <p class="mt-1 text-sm text-gray-600">
         {{ __("Update your account's profile information and email address.") }}
      </p>
   </header>

   <form id="send-verification" method="post" action="{{ route('verification.send') }}">
      @csrf
   </form>

   <form method="post" action="{{ route('student.update') }}" class="mt-6 space-y-6" novalidate>
      @csrf
      @method('patch')

      {{-- First name --}}
      <div>
         <x-input-label for="fname" :value="__('First Name')" />
         <x-text-input id="fname" name="fname" type="text" class="mt-1 block w-full"
            :value="old('fname', !$user->isLearner() ?: $user->getStudent('fname'))" required autofocus
            autocomplete="fname" />
         <x-input-error class="mt-2" :messages="$errors->get('fname')" />
      </div>


      {{-- Last name --}}
      <div>
         <x-input-label for="lname" :value="__('Last Name')" />
         <x-text-input id="lname" name="lname" type="text" class="mt-1 block w-full"
            :value="old('lname', !$user->isLearner() ?: $user->getStudent('lname'))" required autofocus
            autocomplete="lname" />
         <x-input-error class="mt-2" :messages="$errors->get('lname')" />
      </div>


      {{-- Age name --}}
      <div>
         <x-input-label for="age" :value="__('Age')" />
         <x-text-input id="age" name="age" type="text" class="mt-1 block w-full"
            :value="old('age', !$user->isLearner() ?: $user->getStudent('age'))" required autofocus
            autocomplete="age" />
         <x-input-error class="mt-2" :messages="$errors->get('age')" />
      </div>


      {{-- DOB --}}
      <div>
         <x-input-label for="dob" :value="__('Date of Birth')" />
         <x-text-input id="dob" name="dob" type="text" class="mt-1 block w-full"
            :value="old('dob', !$user->isLearner() ?: $user->getStudent('dob'))" required autofocus
            autocomplete="dob" />
         <x-input-error class="mt-2" :messages="$errors->get('dob')" />
      </div>


      {{-- Mat No --}}
      <div>
         <x-input-label for="mat_no" :value="__('Mat No.')" />
         <x-text-input id="mat_no" name="mat_no" type="text" class="mt-1 block w-full"
            :value="old('mat_no', !$user->isLearner() ?: $user->getStudent('mat_no'))" required autofocus
            autocomplete="mat_no" />
         <x-input-error class="mt-2" :messages="$errors->get('mat_no')" />
      </div>


      {{-- Department --}}
      <div>
         <x-input-label for="mat_no" :value="__('Department')" />
         <x-text-input id="dept" name="dept" type="text" class="mt-1 block w-full" :value="old('dept', !$user->isLearner() ?: $user->getStudent('dept'))"
            required autofocus autocomplete="dept" />
         <x-input-error class="mt-2" :messages="$errors->get('dept')" />
      </div>

      {{-- Exco --}}
      {{-- <div>
         <x-input-label for="exco" :value="__('Exco')" />
         <x-text-input id="exco" name="exco" type="text" class="mt-1 block w-full" :value="old('exco', !$user->isLearner() ?: $user->getStudent('exco'))"
            required autofocus autocomplete="exco" />
         <x-input-error class="mt-2" :messages="$errors->get('exco')" />
      </div> --}}


      {{-- Average GPA --}}
      <div>
         <x-input-label for="avg_gpa" :value="__('Average GPA')" />
         <x-text-input id="avg_gpa" name="avg_gpa" type="text" class="mt-1 block w-full"
         :value="old('avg_gpa', !$user->isLearner() ?: $user->getStudent('avg_gpa'))" required autofocus autocomplete="avg_gpa" />
         <x-input-error class="mt-2" :messages="$errors->get('avg_gpa')" />
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