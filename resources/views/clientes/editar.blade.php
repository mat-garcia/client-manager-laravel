<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('clientes.update', $cliente) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-2 gap-4">

                            <div class="col-span-2">
                                <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                                <input type="text" id="nome" name="nome" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" value="{{ old('nome', $cliente->nome) }}" required>
                                @error('nome')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                                <input type="email" id="email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" value="{{ old('email', $cliente->email) }}" required>
                                @error('email')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="telefone" class="block text-sm font-medium text-gray-700">Telefone</label>
                                <input type="text" id="telefone" name="telefone" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" value="{{ old('telefone', $cliente->telefone) }}" required>
                                @error('telefone')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="cep" class="block text-sm font-medium text-gray-700">CEP</label>
                                <input type="text" id="cep" name="cep" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" value="{{ old('cep', $cliente->cep) }}" required @change="buscarCep()">
                                @error('cep')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="rua" class="block text-sm font-medium text-gray-700">Rua</label>
                                <input type="text" id="rua" name="rua" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" value="{{ old('rua', $cliente->rua) }}" required>
                                @error('rua')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="bairro" class="block text-sm font-medium text-gray-700">Bairro</label>
                                <input type="text" id="bairro" name="bairro" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" value="{{ old('bairro', $cliente->bairro) }}" required>
                                @error('bairro')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="cidade" class="block text-sm font-medium text-gray-700">Cidade</label>
                                <input type="text" id="cidade" name="cidade" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" value="{{ old('cidade', $cliente->cidade) }}" required>
                                @error('cidade')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                                <input type="text" id="estado" name="estado" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" value="{{ old('estado', $cliente->estado) }}" maxlength="2" required>
                                @error('estado')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-6 flex gap-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Atualizar') }}
                            </button>
                            <a href="{{ route('clientes.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Cancelar') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        async function buscarCep() {
            const cep = document.getElementById('cep').value.replace(/\D/g, '');
            
            if (cep.length === 8) {
                try {
                    const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
                    const data = await response.json();
                    
                    if (!data.erro) {
                        document.getElementById('rua').value = data.logradouro || '';
                        document.getElementById('bairro').value = data.bairro || '';
                        document.getElementById('cidade').value = data.localidade || '';
                        document.getElementById('estado').value = data.uf || '';
                    } else {
                        alert('CEP não encontrado!');
                    }
                } catch (error) {
                    console.error('Erro ao buscar CEP:', error);
                }
            }
        }

        document.getElementById('cep').addEventListener('blur', buscarCep);
    </script>
</x-app-layout>
