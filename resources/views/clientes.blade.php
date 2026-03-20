<x-app-layout>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="text-center">{{ __('Carregando clientes...') }}</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.location.href = '{{ route('clientes.index') }}';
    </script>
</x-app-layout>
