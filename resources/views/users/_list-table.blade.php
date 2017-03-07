<table class="table table-striped">
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td width="40%">
                    {{ $user->name }}
                </td>
                <td>
                    {{ $user->email }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>