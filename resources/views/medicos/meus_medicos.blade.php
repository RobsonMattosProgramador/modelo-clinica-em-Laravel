<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Meus medicos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">Olá <strong>{{ Auth::user()->name }}</strong></p>

                    <div class="p-6 text-gray-900">
                        <table class="table-auto w-full">
                            <thead class="bg-gray-100 text-left">
                            <tr>
                                <th class="p-2">Nome</th>
                                <th>Telefone</th>
                                <th>Email</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($medicos as $medico)
                                <tr class="hover:bg-gray-100">
                                    <td class="p-2">{{ $medico->nome }}</td>
                                    <td>{{ $medico->telefone }}</td>
                                    <td>{{ $medico->email }}</td>
                                    <td><a href="{{ route('medico.show', $medico->id) }}"><i
                                                class="fa-solid fa-circle-info"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
