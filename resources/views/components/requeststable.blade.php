<table class="table table-striped table-hover rounded shadow">
    <thead class="table-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome Utente</th>
            <th scope="col">Email</th>
            <th scope="col">Richiesta</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roleRequests as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    {{-- Mostra il ruolo richiesto --}}
                    <span class="badge bg-secondary">{{ ucfirst($role) }}</span>
                </td>
                <td>
                    @switch($role)
                        @case('Amministratore')
                            <form action="{{ route('admin.setAdmin', $user) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success btn-sm rounded-pill">Attiva</button>
                            </form>
                            @break

                        @case('Revisore')
                            <form action="{{ route('admin.setRevisor', $user) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-warning btn-sm rounded-pill">Attiva</button>
                            </form>
                            @break

                        @case('Redattore')
                            <form action="{{ route('admin.setWriter', $user) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-info btn-sm rounded-pill">Attiva</button>
                            </form>
                            @break
                    @endswitch
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

