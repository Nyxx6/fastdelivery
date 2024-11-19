<x-select name="language" onchange="this.form.submit()" class="text-black-400 dark:text-gray-400 me-4 switch">
    <option value="en" {{ app()->getLocale() === 'en' ? 'selected' : '' }}>{{ __('auth.en') }}</option>
    <option value="fr" {{ app()->getLocale() === 'fr' ? 'selected' : '' }}>{{ __('auth.fr') }}</option>
</x-select>
