<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Contatos</title>
    @vite([
        'resources/css/app.css',
        'resources/ts/script.ts'
    ])
</head>
<body>
    <main>
        <div id="title">
            <h1>
                Lista de contatos
            </h1>
        </div>
        <div id="content">
            <table>
                <thead>
                    <tr>
                        <div id="add_contato_container">
                            <button id="add_contato_btn">
                                Criar novo contato
                            </button>
                        </div>
                    </tr>
                    <tr>
                        <th>
                            Nome
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Telefone
                        </th>
                        <th>
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < sizeof($data); $i++)
                        <x-tableRowData row_id="{{ $i }}" nome="{{ $data[$i]['nome_contato'] }}" email="{{ $data[$i]['email_contato'] }}" telefone="{{ $data[$i]['telefone_contato'] }}">
                            <x-slot:delete_icon>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                            </x-slot:delete_icon>
                        </x-tableRowData>
                    @endfor
                </tbody>
            </table>
        </div>
    </main>
    <section id="modal_container">
        <div id="modal">
            <div id="exit_container">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                </button>
            </div>
            <div id="form_container">
                <div id="form">
                    <div class="input_container">
                        <div id="label_container">
                            <label for="nome_contato">
                                Nome:
                            </label>
                        </div>
                        <input type="text" name="nome_contato" id="nome_contato_input" required>
                    </div>
                    <div class="input_container">
                        <div id="label_container">
                            <label for="email_contato">
                                Email:
                            </label>
                        </div>
                        <input type="email" name="email_contato" id="email_contato_input" required>
                    </div>
                    <div class="input_container">
                        <div id="label_container">
                            <label for="telefone_contato">
                                Telefone:
                            </label>
                        </div>
                        <input type="tel" name="telefone_contato" id="telefone_contato_input" required>
                    </div>
                    <div id="submit_container">
                        <button id="btn_submit">
                            Criar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
