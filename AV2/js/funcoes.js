inserir = function() {
  let objProduto = document.getElementById("formProduto");
  let xmlHttp = new XMLHttpRequest();
  xmlHttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      alert(this.responseText);
      location = "insereProduto.html";
    }
  }
  xmlHttp.open("GET", "main.php?act=insert" + "&nome=" + objProduto.nome.value + "&num=" + objProduto.num.value +
  "&fabricante=" + objProduto.fabricante.value + "&preco=" + objProduto.preco.value + "&estoque=" +
  objProduto.estoque.value + "&categoria=" + objProduto.categ.value + "&tipo=" + objProduto.tipo.value +
  "&peso=" + objProduto.peso.value + "&data=" + objProduto.data.value + "&descricao=" + objProduto.descricao.value, true);
  xmlHttp.send();
  console.log("requisição enviada");
}

alterar = function() {
    let objProduto = document.getElementById("formProduto");
    let xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        alert(this.responseText);
        location = "alterarProduto.html";
      }
    }
    xmlHttp.open("GET", "main.php?act=alter" + "&nome=" + objProduto.nome.value + "&num=" + objProduto.num.value +
    "&fabricante=" + objProduto.fabricante.value + "&preco=" + objProduto.preco.value + "&estoque=" +
    objProduto.estoque.value + "&categoria=" + objProduto.categ.value + "&tipo=" + objProduto.tipo.value +
    "&peso=" + objProduto.peso.value + "&data=" + objProduto.data.value + "&descricao=" + objProduto.descricao.value, true);
    xmlHttp.send();
    console.log("requisição enviada");
}

preencheAlterar = function(){
    let codigo = document.getElementById("formCodigo");
    let objProduto = document.getElementById("formProduto");
    let displayForm = document.getElementById("campo");

    let xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() {

      if (this.readyState == 4 && this.status == 200) {

        let objBack = JSON.parse(this.responseText);
        console.log(objBack);

        objProduto.style.display = "";
        displayForm.style.display = "none";

        objProduto.nome.value = objBack['nome'];
        objProduto.num.value = objBack['cod_barras'];
        objProduto.preco.value = objBack['preco'];
        objProduto.estoque.value = objBack['qtd'];
        objProduto.tipo.value = objBack['tipo'];
        objProduto.categ.value = objBack['categoria'];
        objProduto.peso.value = objBack['peso'];
        objProduto.data.value = objBack['data'];
        objProduto.descricao.value = objBack['descricao'];
        objProduto.fabricante.value = objBack['fabricante'];

      }

    }
    xmlHttp.open("GET", "main.php?act=alterar" + "&num=" + codigo.num.value, true);
    xmlHttp.send();
    console.log("requisição enviada");

}

listar = function(){
  let xmlHttp = new XMLHttpRequest();
  xmlHttp.onreadystatechange = function() {

    if (this.readyState == 4 && this.status == 200) {

      let objBack = JSON.parse(this.responseText);
      let table = document.getElementById("tabelaLista");
      let idCorpo = document.getElementById("corpoTabela");
      console.log(objBack);

      objBack['prod'].forEach(function (objeto) {
        var tr = document.createElement('tr');
        for (var campo in objeto) {

          var testaStatus = objeto.status;
          if(testaStatus == "ATIVO"){

            if(campo == "nome" || campo == "cod_barras" || campo == "categoria" || campo == "preco" || campo == "qtd"){
              var td = document.createElement('td');
              td.innerHTML = objeto[campo];
              tr.appendChild(td);
            }

          }

        };

        idCorpo.appendChild(tr);
      });

    }

  }

  xmlHttp.open("GET", "main.php?act=list", true);
  xmlHttp.send();
  console.log("requisição enviada");

}

listaUm = function(){
  let codigo = document.getElementById("formCodigo");
  let xmlHttp = new XMLHttpRequest();
  xmlHttp.onreadystatechange = function() {

    if (this.readyState == 4 && this.status == 200) {

      let objBack = JSON.parse(this.responseText);
      console.log(objBack);

      let table = document.getElementById("tabelaLista");
      let idCorpo = document.getElementById("corpoTabela");
      let displayForm = document.getElementById("campo");
      let idTabela = document.getElementById("divTabela");
      
      idTabela.style.display = "";
      displayForm.style.display = "none";

      var testaStatus = objBack.status;
      var tr = document.createElement('tr');
      if (testaStatus == "ATIVO"){

        for (var campo in objBack) {

          if(campo == "nome" || campo == "cod_barras" || campo == "categoria" || campo == "preco" || campo == "qtd"){

            var td = document.createElement('td');
            td.innerHTML = objBack[campo];
            tr.appendChild(td);

          }
          idCorpo.appendChild(tr);
        };

      } else {
        alert("Produto não encontrado!");
      }

    }

  }

  xmlHttp.open("GET", "main.php?act=listOne" + "&num=" + codigo.num.value, true);
  xmlHttp.send();
  console.log("requisição enviada");

}

deleta = function(){
  let codigo = document.getElementById("formCodigo");
  let xmlHttp = new XMLHttpRequest();
  xmlHttp.onreadystatechange = function() {

    if (this.readyState == 4 && this.status == 200) {

      alert(this.responseText);
      location = "removeProduto.html";

    }

  }

  xmlHttp.open("GET", "main.php?act=remove" + "&num=" + codigo.num.value, true);
  xmlHttp.send();
  console.log("requisição enviada");
}
