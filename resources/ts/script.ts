import RowData from "./RowData";

const rows: NodeListOf<Element> = document.querySelectorAll("tbody tr");
const csrfToken = document
  .querySelector('meta[name="csrf-token"]')
  ?.getAttribute('content') ?? '';
const add_contato_btn = document.querySelector("#add_contato_btn");

rows.forEach((row: Element) => {
    const nome: string = row.querySelector("td.nome")?.textContent ?? '';
    const email: string = row.querySelector("td.email")?.textContent ?? '';
    const tel: string = row.querySelector("td.tel")?.textContent ?? '';

    const data: RowData = {
        row_id: row.getAttribute("id")!,
        nome_contato: nome.trim(),
        email_contato: email.trim(),
        telefone_contato: tel.trim()
    };

    const edit_btn: Element = row.querySelector("td > span#edit_button")!;
    const delete_btn: Element = row.querySelector("td > span#delete_button")!;

    edit_btn.addEventListener("click", () => fetch_edit(data));
    delete_btn.addEventListener("click", () => fetch_delete(data));
});

function fetch_edit(data: RowData) {
    fetch('/', {
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
        },
        method: "POST",
        body: JSON.stringify(data),
    })
    .then(async response => {
        if(response.ok) {
            alert("Contato adicionado");
            return;
        }
        throw new Error(await response.text());
    })
    .catch(error => alert(error.message));
}

function fetch_delete(data: RowData) {

}
