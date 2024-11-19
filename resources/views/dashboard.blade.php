<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('auth.home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mt-10 pb-1">
                        <div class="relative">
                            <div class="absolute inset-0 h-1/2 bg-white dark:bg-gray-800"></div>
                            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                                <div class="max-w-4xl mx-auto">
                                    <dl class="rounded-lg bg-white dark:bg-gray-800 shadow-lg sm:grid sm:grid-cols-3">
                                        <div
                                            class="flex flex-col border-b border-gray-100 dark:border-gray-800 p-6 text-center sm:border-0 sm:border-r">
                                            <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                                                Utilisateurs
                                            </dt>
                                            <dd class="order-1 text-5xl font-extrabold text-gray-700">{{ $stats['utilisateurs'] }}</dd>
                                        </div>
                                        <div
                                            class="flex flex-col border-b border-gray-100 dark:border-gray-800 p-6 text-center sm:border-0 sm:border-r">
                                            <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                                                Comptes Actifs
                                            </dt>
                                            <dd class="order-1 text-5xl font-extrabold text-gray-700">{{ $stats['comptesActifs'] }}</dd>
                                        </div>
                                        <div
                                            class="flex flex-col border-b border-gray-100 dark:border-gray-800 p-6 text-center sm:border-0 sm:border-r">
                                            <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                                                Commandes
                                            </dt>
                                            <dd class="order-1 text-5xl font-extrabold text-gray-700">{{ $stats['commandes'] }}</dd>
                                        </div>
                                        <div
                                            class="flex flex-col border-t border-b border-gray-100 dark:border-gray-800 p-6 text-center sm:border-0 sm:border-l sm:border-r">
                                            <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                                                Restaurants
                                            </dt>
                                            <dd class="order-1 text-5xl font-extrabold text-gray-700">{{ $stats['restaurants'] }}</dd>
                                        </div>
                                        <div
                                            class="flex flex-col border-t border-gray-100 dark:border-gray-800 ray-100 p-6 text-center sm:border-0 sm:border-l">
                                            <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                                                Livreurs
                                            </dt>
                                            <dd class="order-1 text-5xl font-extrabold text-gray-700">{{ $stats['livreurs'] }}</dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
