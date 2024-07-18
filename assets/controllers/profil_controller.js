import { Controller } from "@hotwired/stimulus";

export default class extends Controller {
    static targets = ["form", "btnEdit", "btnCancel", "btnDelete"];

    connect() {
        this.disabledForm();
        console.log(this.btnDeleteTarget.attributes[1]);
        
    }

    disabledForm() {
        const formArray = this.formTarget.childNodes[1];
        Array.from(formArray).forEach((childNode) => {
            if (childNode.nodeType === Node.ELEMENT_NODE) {
                childNode.disabled = true;
            }
        });
        this.btnCancelTarget.classList.add('btn-diplay-none');
        this.btnEditTarget.classList.remove('btn-diplay-none');
    }

    enabledForm() {
        const formArray = this.formTarget.childNodes[1];
        Array.from(formArray).forEach((childNode) => {
            if (childNode.nodeType === Node.ELEMENT_NODE) {
                childNode.disabled = false;
            }
        });
        this.btnCancelTarget.classList.remove('btn-diplay-none')
        this.btnEditTarget.classList.add('btn-diplay-none');
    }


    deleteProfil() {
        const token = this.btnDeleteTarget.getAttribute('value');
        const name = this.btnDeleteTarget.getAttribute('name');
        const uri = window.location.href
        const url = uri + 'delete';
        console.log(token);
        fetch(url, {
            method: 'POST', 
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-Token': token
            },
            body: JSON.stringify({ name: name, token: token })
        })
        .then(response => {
            console.log(response);
            if (response.status != 200) {
                throw new Error('Erreur réseau lors de la requête fetch.');
            }
            window.location.href = uri.replace(/profil\//g, "");
        }).catch(error => console.error(error));
    }
}
