function adicionarAutor(){
    let select = document.getElementById("autorSelect");
    let valor = select.value;
    let nome = select.options[select.selectedIndex].text;
    if (document.getElementById("a"+valor) == null){
        let inputCheckBox = document.createElement("input")
        let label = document.createElement("label");

        inputCheckBox.type = "checkbox";
        inputCheckBox.name = "autor[]";
        inputCheckBox.value = valor;
        inputCheckBox.id = "a"+valor;
        inputCheckBox.className = "btn-check";

        label.htmlFor = "a"+valor;
        label.innerText = nome;
        label.className = "btn btn-outline-primary";

        document.querySelector("#autor-tags").prepend(event.target.value, label);
        document.querySelector("#autor-tags").prepend(event.target.value, inputCheckBox);
        document.querySelector("#a"+valor).setAttribute("checked", "")
    } 
}

function adicionarGenero(){
    let select = document.getElementById("generoSelect");
    let valor = select.value;
    let nome = select.options[select.selectedIndex].text;
    if (document.getElementById("g"+valor) == null){
        let inputCheckBox = document.createElement("input")
        let label = document.createElement("label");

        inputCheckBox.type = "checkbox";
        inputCheckBox.name = "genero[]";
        inputCheckBox.value = valor;
        inputCheckBox.id = "g"+valor;
        inputCheckBox.className = "btn-check";

        label.htmlFor = "g"+valor;
        label.innerText = nome;
        label.className = "btn btn-outline-primary";

        document.querySelector("#genero-tags").prepend(event.target.value, label);
        document.querySelector("#genero-tags").prepend(event.target.value, inputCheckBox);
        document.querySelector("#g"+valor).setAttribute("checked", "")
    }
}