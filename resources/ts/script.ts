import ContatoData from "./ContatoData";


const csrfToken = document
  .querySelector('meta[name="csrf-token"]')
  ?.getAttribute('content') ?? '';

const rows: NodeListOf<Element> = document.querySelectorAll("tbody tr");
const add_contato_btn = document.querySelector("#add_contato_btn")!;
const close_add_contato_btn = document.querySelector("div#exit_container button")!;
const modal = document.getElementById("modal_container")!;
const btn_submit = document.querySelector("button#btn_submit")!;

const emailRegex = /^[a-z0-9.]+@[a-z0-9]+\.[a-z]+\.([a-z]+)?$/i;
const telefoneRegex = /^(\([0-9]{2}\))([0-9]{4,5})([0-9]{4})/i;

btn_submit.addEventListener("click", () => {
    const email_contato: string = document.getElementById("email_contato_input")?.value;
    if(emailRegex.test(email_contato)) {
        alert("Email inválido: " + email_contato);
        return;
    }
    const telefone_contato: string = document.getElementById("telefone_contato_input")?.value;
    if(telefoneRegex.test(telefone_contato)) {
        alert("Telefone inválido: " + telefone_contato);
        return;
    }

    const nome_contato: string = document.getElementById("nome_contato_input")?.value;

    const data: ContatoData = {
        nome_contato: nome_contato,
        email_contato: email_contato,
        telefone_contato: telefone_contato
    }

    fetch_create(data);

});

add_contato_btn.addEventListener("click", () => {
    modal.style.display = "flex";
});

close_add_contato_btn.addEventListener("click", () => {
    modal.style.display = "none";
});

rows.forEach((row: Element) => {
    const email: string = row.querySelector("td.email")?.textContent ?? '';

    const delete_btn: Element = row.querySelector("td > span#delete_button")!;

    delete_btn.addEventListener("click", () => fetch_delete(email.trim()));
});

function fetch_create(data: ContatoData) {
    fetch('/', {
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
        },
        method: "POST",
        body: JSON.stringify(data),
    })
    .then(async response => {
        if(response.status == 201) {
            return response.json();
        }
        throw new Error(await response.json());
    })
    .then(json => {
        alert(json.message);
        window.location.href = "/";
        return;
    })
    .catch(error => {
        alert("Erro ao criar");
        console.log(error.error);
    });
}

function fetch_delete(email: string) {
    fetch('/', {
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
        },
        method: "DELETE",
        body: JSON.stringify({
            email_contato: email
        }),
    })
    .then(async response => {
        if(response.status == 202) {
            return response.json();
        }
        throw new Error(await response.json());
    }).then(json => {
        alert(json.message);
        window.location.href = "/";
        return;
    })
    .catch(error => {
        alert("Erro ao deletar");
        console.log(error.error);
    });
}
