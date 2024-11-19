<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="nom" :value="__('auth.ln')" />
            <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required
                autofocus autocomplete="family-name" />
            <x-input-error :messages="$errors->get('nom')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="prenom" :value="__('auth.fn')" />
            <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')"
                required autofocus autocomplete="given-name" />
            <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="adresse" :value="__('auth.city')" />
            <x-text-input id="adresse" class="block mt-1 w-full" type="text" name="adresse" :value="old('adresse')"
                required autocomplete="street-address" />
            <x-input-error :messages="$errors->get('adresse')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="genre" :value="__('auth.gr')" />
            <x-select id="genre" class="block mt-1 w-full" name="genre" :value="old('genre')"
                required>
                <option value="Inconnu" selected>{{ __('auth.x') }}</option>
                <option value="Homme">{{ __('auth.m') }}</option>
                <option value="Femme">{{ __('auth.f') }}</option>
            </x-select>
            <x-input-error :messages="$errors->get('genre')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="date_naissance" :value="__('auth.db')" />
            <x-text-input id="date_naissance" class="block mt-1 w-full" type="date" name="date_naissance"
                :value="old('date_naissance')" required />
            <x-input-error :messages="$errors->get('date_naissance')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="tel" :value="__('auth.tel')" />
            <x-text-input id="tel" class="block mt-1 w-full" type="text" name="tel" :value="old('tel')"
                required autofocus autocomplete="tel" />
            <x-input-error :messages="$errors->get('tel')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('auth.pwd')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('auth.cpwd')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="terms">
                <input type="checkbox" name="terms" class="mr-2 leading-tight">
                <span class="text-sm">J'accepte les <a href="https://anpdp.dz/wp-content/uploads/2023/07/%D8%A7%D9%84%D9%86%D8%B8%D8%A7%D9%85-%D8%A7%D9%84%D8%AF%D8%A7%D8%AE%D9%84%D9%8A-%D9%84%D9%84%D8%B3%D9%84%D8%B7%D8%A9-%D8%A7%D9%84%D9%88%D8%B7%D9%86%D9%8A%D8%A9-%D9%84%D8%AD%D9%85%D8%A7%D9%8A%D8%A9-%D8%A7%D9%84%D9%85%D8%B9%D8%B7%D9%8A%D8%A7%D8%AA-%D8%B0%D8%A7%D8%AA-%D8%A7%D9%84%D8%B7%D8%A7%D8%A8%D8%B9-%D8%A7%D9%84%D8%B4%D8%AE%D8%B5%D9%8A_compressed.pdf" class="text-blue-500">termes et conditions</a> ainsi que la <a href="https://anpdp.dz/wp-content/uploads/2023/07/%D8%A7%D9%84%D9%86%D8%B8%D8%A7%D9%85-%D8%A7%D9%84%D8%AF%D8%A7%D8%AE%D9%84%D9%8A-%D9%84%D9%84%D8%B3%D9%84%D8%B7%D8%A9-%D8%A7%D9%84%D9%88%D8%B7%D9%86%D9%8A%D8%A9-%D9%84%D8%AD%D9%85%D8%A7%D9%8A%D8%A9-%D8%A7%D9%84%D9%85%D8%B9%D8%B7%D9%8A%D8%A7%D8%AA-%D8%B0%D8%A7%D8%AA-%D8%A7%D9%84%D8%B7%D8%A7%D8%A8%D8%B9-%D8%A7%D9%84%D8%B4%D8%AE%D8%B5%D9%8A_compressed.pdf" class="text-blue-500">politique de confidentialité</a> du site.</span>
            </x-input-label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('auth.log') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('auth.sub') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
