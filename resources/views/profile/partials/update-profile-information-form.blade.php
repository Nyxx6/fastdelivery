<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('auth.profinfo') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("auth.profedit") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <!-- Name -->
        <div>
            <x-input-label for="nom" :value="__('auth.ln')" />
            <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom', $user->nom)" required
                autofocus autocomplete="family-name" />
            <x-input-error :messages="$errors->get('nom')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="prenom" :value="__('auth.fn')" />
            <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom', $user->prenom)"
                required autofocus autocomplete="given-name" />
            <x-input-error class="mt-2" :messages="$errors->get('prenom')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="adresse" :value="__('auth.city')" />
            <x-text-input id="adresse" class="block mt-1 w-full" type="text" name="adresse" :value="old('adresse', $user->adresse)"
                required autocomplete="street-address" />
            <x-input-error :messages="$errors->get('adresse')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="genre" :value="__('auth.gr')" />
            <x-select id="genre" class="block mt-1 w-full" name="genre" :value="old('genre', $user->genre)" required>
                <option value="Inconnu" {{ $user->genre === 'Inconnu' ? 'selected' : '' }}>{{ __('auth.x') }}</option>
                <option value="Homme" {{ $user->genre === 'Homme' ? 'selected' : '' }}>{{ __('auth.m') }}</option>
                <option value="Femme" {{ $user->genre === 'Femme' ? 'selected' : '' }}>{{ __('auth.f') }}</option>
            </x-select>
            <x-input-error :messages="$errors->get('genre')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="date_naissance" :value="__('auth.db')" />
            <x-text-input id="date_naissance" class="block mt-1 w-full" type="date" name="date_naissance"
                :value="old('date_naissance', $user->date_naissance)" required />
            <x-input-error :messages="$errors->get('date_naissance')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="resto_fav" :value="__('auth.restf')" />
            <x-text-input id="resto_fav" class="block mt-1 w-full" type="text" name="resto_fav"
                :value="old('resto_fav', $user->resto_fav)" required />
            <x-input-error :messages="$errors->get('resto_fav')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="tel" :value="__('auth.tel')" />
            <x-text-input id="tel" class="block mt-1 w-full" type="text" name="tel" :value="old('tel', $user->tel)"
                required autofocus autocomplete="tel" />
            <x-input-error :messages="$errors->get('tel')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="operateur" :value="__('auth.op')" />
            <x-text-input id="operateur" class="block mt-1 w-full" type="text" name="operateur" :value="old('operateur', $user->operateur)"
                required autofocus autocomplete="operateur" />
            <x-input-error :messages="$errors->get('operateur')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('auth.emailverif') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('auth.sub') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
    <br>
    <a href="{{ route('profile.download-pdf') }}" class="btn btn-primary text-blue-500 hover:underline">{{ __('auth.pdf') }}</a>
</section>
