<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Clientes') }}
            </h2>
            <a href="{{ route('clientes.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                {{ __('Novo Cliente') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           

            @if ($clientes->isEmpty())
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 text-center">
                        <p>{{ __('Nenhum cliente cadastrado.') }}</p>
                        <a href="{{ route('clientes.create') }}" class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Cadastrar Cliente') }}
                        </a>
                    </div>
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="px-4 py-2 text-left">Nome</th>
                                        <th class="px-4 py-2 text-left">E-mail</th>
                                        <th class="px-4 py-2 text-left">Telefone</th>
                                        <th class="px-4 py-2 text-left">CEP</th>
                                        <th class="px-4 py-2 text-left">Cidade</th>
                                        <th class="px-4 py-2 text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clientes as $cliente)
                                        <tr class="border-t hover:bg-gray-50">
                                            <td class="px-4 py-2">{{ $cliente->nome }}</td>
                                            <td class="px-4 py-2">{{ $cliente->email }}</td>
                                            <td class="px-4 py-2">{{ $cliente->telefone }}</td>
                                            <td class="px-4 py-2">{{ $cliente->cep }}</td>
                                            <td class="px-4 py-2">{{ $cliente->cidade }}</td>
                                            <td class="px-4 py-2 text-center">
                                                <a href="{{ route('clientes.edit', $cliente) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded mr-2">
                                                    {{ __('Editar') }}
                                                </a>
                                                <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" class="inline" onsubmit="return confirm('Tem certeza que deseja deletar este cliente?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">
                                                        {{ __('Deletar') }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
