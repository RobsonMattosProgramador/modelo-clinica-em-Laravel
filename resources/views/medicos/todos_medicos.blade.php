<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de todos os Médicos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">Olá <strong>{{ Auth::user()->name }}</strong></p>

                    <div class="p-6 text-gray-900">

                        <div class="p-3 bg-gray-100 rounded-lg mb-4">
                            {{ $medicos->links() }} <!--link paginação-->
                        </div>

                        <table class="table-auto w-full">
                            <thead class="bg-gray-100 text-left">
                            <tr>
                                <th class="p-2">Nome</th>
                                <th>Telefone</th>
                                <th>Email</th>
                                <th>Especialidade</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($medicos as $medico)
                                <tr class="hover:bg-gray-100">
                                    <td class="p-2">{{ $medico->nome }}</td>
                                    <td>{{ $medico->telefone }}</td>
                                    <td>{{ $medico->email }}</td>
                                    <td>
                                        @foreach($medico->especialidades as $especialidade)
                                            {{ $especialidade->nome }}<br>
                                        @endforeach
                                    </td>
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
