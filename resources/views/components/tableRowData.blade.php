@props([
    'row_id',
    'nome',
    'email',
    'telefone',
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
        <span id="delete_button">
            {{ $delete_icon }}
        </span>
    </td>
</tr>
