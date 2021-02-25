function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('rua').value = (conteudo.logradouro);
        document.getElementById('bairro').value = (conteudo.bairro);
        document.getElementById('cidade').value = (conteudo.localidade);
        document.getElementById('estado').value = (conteudo.uf);
    } //end if.
    else {
        //CEP não Encontrado.
        alert("CEP não encontrado.");
        this.limpa_formulário_cep();
    }
}

function soNumero(num) {
    //so aceita numero.
    let str = document.getElementById(num).value;
    let res = str.replace(/\D/g, "");
    document.getElementById(num).value = res;
    if (num == "cep") {

        let a = document.getElementById(num).value;
        let b = a.replace(/^(\d{5})(\d)/, "$1-$2");
        document.getElementById(num).value = b;
    }
    if (num == "cpf") {
        let a = document.getElementById(num).value;
        let b = a.replace(/^(\d{3})(\d{3})(\d{3})(\d{1})/, "$1.$2.$3-$4");
        document.getElementById(num).value = b;
    }
}

function modoEscuro() {
    let checkBox = document.getElementById("customSwitch1");
    if (checkBox.checked == false) {
        document.body.style.backgroundColor = "rgb(230,230,245)";
        document.body.style.color = "rgb(0,0,0)";
        document.querySelector("footer").style.backgroundColor = "rgb(1,125,197)";
        document.querySelector("header").style.backgroundColor = "rgb(1,125,197)";
        document.querySelector("svg").style.color = "rgb(0,0,0)";
        document.querySelector("#md").innerHTML = "Modo Normal Ativo";
        for (let i = 0; i < 5; i++) {
            document.querySelectorAll("#faixaetaria")[i].style.backgroundColor = "rgb(255,255,255)";
            document.querySelectorAll(".table")[i].style.color = "rgb(21,25,29)";
        };



    }
    if (checkBox.checked == true) {
        document.body.style.backgroundColor = "rgb(54,57,64)";
        document.body.style.color = "rgb(255,255,255)";
        document.querySelector("footer").style.backgroundColor = "rgb(18,41,54)";
        document.querySelector("header").style.backgroundColor = "rgb(18,41,54)";
        document.querySelector("svg").style.color = "rgb(0,0,0)";
        document.querySelector("#md").innerHTML = "Modo Escuro Ativado";
        for (let i = 0; i < 5; i++) {
            document.querySelectorAll("#faixaetaria")[i].style.backgroundColor = "rgb(52,58,64)";
            document.querySelectorAll(".table")[i].style.color = "rgb(255,255,255)";
        };


    }

}
function modoEscuro1() {
    document.body.style.backgroundColor = "rgb(54,57,64)";
    document.body.style.color = "rgb(255,255,255)";
    document.querySelector("footer").style.backgroundColor = "rgb(18,41,54)";
    document.querySelector("header").style.backgroundColor = "rgb(18,41,54)";
    let cadastro = document.getElementById("cadastro");
    let noticia = document.getElementById("noticia");
    if (noticia) {
        document.getElementById("noticia").style.color = "rgb(0,0,0)";
    };
    if (cadastro) {
        document.querySelector("svg").style.color = "rgb(0,0,0)";
        document.querySelector("#botaonovafoto").style.color = "rgb(0,0,0)";
        document.querySelector("#md").innerHTML = "Modo Escuro Ativado";
        for (let i = 0; i < 5; i++) {
            document.querySelectorAll("#faixaetaria")[i].style.backgroundColor = "rgb(52,58,64)";
            document.querySelectorAll(".table")[i].style.color = "rgb(255,255,255)";
        };
    };



}


let cadastro = {

    cep: {

        pesquisacep: function (valor) {

            //Nova variável "cep" somente com dígitos.
            let cep1 = valor.replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep1 != "") {

                //Expressão regular para validar o CEP.
                let validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep1)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('rua').value = "...";
                    document.getElementById('bairro').value = "...";
                    document.getElementById('cidade').value = "...";
                    document.getElementById('estado').value = "...";


                    //Cria um elemento javascript.
                    let script = document.createElement('script');

                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/' + cep1 + '/json/?callback=meu_callback';

                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);

                } //end if.
                else {
                    //cep é inválido.

                    alert("Formato de CEP inválido.");
                    this.limpa_formulário_cep();
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                this.limpa_formulário_cep();

            }

        },
        limpa_formulário_cep: function () {
            //Limpa valores do formulário de cep.
            document.getElementById('cep').value = ("");
            document.getElementById('rua').value = ("");
            document.getElementById('bairro').value = ("");
            document.getElementById('cidade').value = ("");
            document.getElementById('uf').value = ("");

        }

    },
    senha: {
        confirmacao: function () {
            let senha = document.getElementById('senha').value;
            let senha1 = document.getElementById('senha1').value;
            if (senha != senha1) {
                document.getElementById('senha').value = ("");
                document.getElementById('senha1').value = ("");
                document.getElementById('senha').focus();
            }
        }
    }


}
function liberar() {
    document.querySelectorAll("#fieldset")[0].removeAttribute("disabled");
    document.querySelectorAll("#fieldset")[1].removeAttribute("disabled");


}

function nova() {
    document.querySelector("#novafoto").setAttribute("type", "file");
    document.querySelector("#botaonovafoto").remove();


}

