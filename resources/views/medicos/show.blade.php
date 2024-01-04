<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes do medico') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">Olá <strong>{{ Auth::user()->name }}</strong></p>

                    <p class="mb-4">
                        Exibindo detalhes do médico {{ $medico->nome }}
                    </p>
                    <p>
                        <a href="{{ route('meus.medicos', Auth::user()->id) }}" class="bg-blue-500 text-white p-2">Meus médicos</a>
                        <a href="{{ route('medico.edit', $medico->id) }}" class="bg-green-500 text-white p-2">Editar Cadastro médico </a>
                        <a href="{{ route('confirma.delete', $medico->id) }}" class="bg-red-500 text-white p-2" style="margin-left: 5px;">Deletar Cadastro médico </a>
                    </p>
                </div>
                <div class="p-6 text-gray-900">
                    <p><strong>Nome: </strong>{{ $medico->nome }}</p>
                    <p><strong>Email: </strong>{{ $medico->email }}</p>
                    <p><strong>Telefone: </strong>{{ $medico->telefone }}</p>

                </div>


            </div>
        </div>
    </div>
</x-app-layout>
