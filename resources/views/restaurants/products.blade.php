<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('auth.prod') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"  id="scrolldiv">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Display error messages -->
                    @if (session('error'))
                        <div class="mb-4 text-sm text-red-600">
                            {{ __('auth.prode') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="mb-4 text-sm text-green-600">
                            {{ __('auth.prods') }}
                        </div>
                    @endif

                    <table class="table-auto w-full text-sm whitespace-nowrap mb-4" id="sortable-table">
                        <thead>
                            <tr class="text-left">
                                <th class="border px-6 py-4 cursor-pointer" data-sort-column="nom">
                                    <div class="flex items-center">
                                        <span>Produit</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="w-4 h-4 ml-1 sort-arrow">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </th>
                                <th class="border px-6 py-4 cursor-pointer" data-sort-column="prix">
                                    <div class="flex items-center">
                                        <span>Prix</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="w-4 h-4 ml-1 sort-arrow">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </th>
                                <th class="border px-6 py-4">
                                    <div class="flex items-center">
                                        <span>Action</span>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $produit)
                                <tr>
                                    <td class="border px-6 py-4" data-column="nom"><strong>{{ $produit['nom'] }}</strong></td>
                                    <td class="border px-6 py-4" data-column="prix">{{ $produit['prix'] }}</td>
                                    <td class="border px-6 py-4">
                                        <!-- Form to create a commande -->
                                        <form action="{{ route('commandes.store', ['restaurant' => $restaurant->id]) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id_produit" value="{{ $produit['id'] }}">
                                            <input type="hidden" name="prix" value="{{ $produit['prix'] }}">
                                            <button type="submit" class="text-blue-500 hover:underline">{{ __('auth.sub') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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

                rows.sort((rowA, rowB) => {
                    const cellA = rowA.querySelector(`td[data-column="${column}"]`).innerText.trim();
                    const cellB = rowB.querySelector(`td[data-column="${column}"]`).innerText.trim();

                    if (!isNaN(cellA) && !isNaN(cellB)) {
                        return order === 'asc' ? parseFloat(cellA) - parseFloat(cellB) : parseFloat(cellB) - parseFloat(cellA);
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
