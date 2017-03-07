<table class="table table-striped">
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>
                    {{ $user->name }}
                </td>
                <td>
                    {{ $user->email }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>