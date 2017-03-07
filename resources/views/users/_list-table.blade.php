<table class="table table-striped">
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td width="40%">
                    {{ $user->name }}
                </td>
                <td>
                    <a href="mailto:{{ $user->email }}">
                        {{ $user->email }}
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>