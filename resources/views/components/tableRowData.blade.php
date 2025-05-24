@props([
    'row_id',
    'nome',
    'email',
    'telefone',
    'edit_icon',
    'delete_icon'
])

<tr id="row_{{ $row_id }}">
    <td class="nome">
        {{ $nome }}
    </td>
    <td class="email">
        {{ $email }}
    </td>
    <td class="tel">
        {{ $telefone }}
    </td>
    <td>
        <span id="edit_button">
            {{ $edit_icon }}
        </span>
        <span id="delete_button">
            {{ $delete_icon }}
        </span>
    </td>
</tr>
