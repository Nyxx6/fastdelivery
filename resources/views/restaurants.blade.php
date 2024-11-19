<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Restaurants') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"  id="scrolldiv">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Display error messages -->
                    @if (session('error'))
                        <div class="mb-4 text-sm text-red-600">
                            {{ __('auth.rest') }}
                        </div>
                    @endif
                    <x-input-label>Rechercher</x-input-label>
                    <!-- Search form -->
                    <form action="{{ route('restaurants.index') }}" method="GET">
                        <div class="flex my-2">
                            <input type="text" name="q" placeholder="..."
                                class="py-2 px-2 text-md border border-gray-200 rounded-l focus:outline-none"
                                value="{{ request('q') }}" />
                            <x-primary-button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4 text-right">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>
                            </x-primary-button>
                        </div>
                    </form>
                    <table class="table-auto w-full text-sm whitespace-nowrap mb-4" id="sortable-table">
                        <thead>
                            <tr class="text-left">
                                @php
                                    $columns = [
                                        'nom' => 'Resto',
                                        'note' => 'Note',
                                        'type' => 'Type',
                                        'region' => 'Region',
                                    ];
                                @endphp

                                @foreach ($columns as $field => $title)
                                    <th class="border px-6 py-4 cursor-pointer" data-sort-column="{{ $field }}">
                                        <div class="flex items-center">
                                            <span>{{ $title }}</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="w-4 h-4 ml-1 sort-arrow">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </div>
                                    </th>
                                @endforeach
                                
                                <th class="border px-6 py-4 cursor-pointer">
                                    <div class="flex items-center">
                                        <span>Action</span>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($restaurants as $restaurant)
                                <tr>
                                    <td class="border px-6 py-4"><strong>{{ $restaurant->nom }}</strong></td>
                                    <td class="border px-6 py-4">{{ $restaurant->note }}</td>
                                    <td class="border px-6 py-4">{{ $restaurant->type }}</td>
                                    <td class="border px-6 py-4">{{ $restaurant->region }}</td>
                                    <td class="border px-6 py-4">
                                        <a href="{{ route('restaurant.showProducts', ['restaurant' => $restaurant->id]) }}"
                                            class="text-blue-500 hover:underline">Commander</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination links -->
                    {{ $restaurants->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const table = document.getElementById('sortable-table');
            const headers = table.querySelectorAll('th[data-sort-column]');

            headers.forEach(header => {
                header.addEventListener('click', () => {
                    const column = header.getAttribute('data-sort-column');
                    const order = header.getAttribute('data-sort-order') === 'asc' ? 'desc' : 'asc';
                    header.setAttribute('data-sort-order', order);
                    sortTableByColumn(table, column, order);
                });
            });

            function sortTableByColumn(table, column, order) {
                const tbody = table.querySelector('tbody');
                const rows = Array.from(tbody.querySelectorAll('tr'));

                const columnIndex = Array.from(headers).findIndex(header => header.getAttribute(
                    'data-sort-column') === column);

                rows.sort((rowA, rowB) => {
                    const cellA = rowA.children[columnIndex].innerText.trim();
                    const cellB = rowB.children[columnIndex].innerText.trim();

                    if (!isNaN(cellA) && !isNaN(cellB)) {
                        return order === 'asc' ? cellA - cellB : cellB - cellA;
                    }

                    return order === 'asc' ? cellA.localeCompare(cellB) : cellB.localeCompare(cellA);
                });

                while (tbody.firstChild) {
                    tbody.removeChild(tbody.firstChild);
                }

                tbody.append(...rows);

                headers.forEach(header => {
                    const arrow = header.querySelector('.sort-arrow');
                    if (header.getAttribute('data-sort-column') === column) {
                        arrow.style.transform = order === 'asc' ? 'rotate(180deg)' : 'rotate(0deg)';
                    } else {
                        header.removeAttribute('data-sort-order');
                        arrow.style.transform = 'rotate(0deg)';
                    }
                });
            }
        });
    </script>
</x-app-layout>
