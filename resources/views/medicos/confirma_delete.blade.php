<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Deletar cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">Olá <strong>{{ Auth::user()->name }}</strong></p>

                    <p class="mb-4">
                        Gostaria mesmo de excluir o médico <b>{{ $id->nome }}</b><br>
                        Não será possivel desfazer esta ação.
                    </p>
                    <p>
                    <form action="{{ route('medico.destroy', $id->id) }}" method="post">
                       @csrf
                        @method('DELETE')

                        <button type="submit" class="bg-red-500 text-white p-2">Sim</button>
                        <a class="bg-green-500 text-white p-2" href="{{ route('medico.show', $id->id) }}">Não</a>
                    </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
