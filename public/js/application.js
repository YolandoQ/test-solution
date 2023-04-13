function getPage(page, unique) {

    showLoading();

    let mountUrl = "api/cliente/consulta?" + page;
    if(unique) {
        mountUrl += "&" + unique;
    }

    $.ajax({
        method: "GET",
        url: mountUrl,
        success: (e) => {

            $("tbody").html("")
            e.data.data.forEach(element => {
                $("tbody").append(`
                    <tr id=${element.id}>
                        <td>
                        <div class="d-flex">
                            <button type="button" onclick="redirectUpdate(${element.id})" class="btn btn-primary" title="Editar"><i class="bi bi-pencil-square"></i></button>
                            <button type="button" onclick="deletarCadastro(${element.id})" class="btn btn-danger ms-1" title="Excluir"><i class="bi bi-trash"></i></button>
                        </div>
                        </td>
                        <td>${element.nome}</td>
                        <td>${element.cpf}</td>
                        <td>${element.sexo}</td>
                        <td>${element.data_nascimento}</td>
                        <td>${element.endereco}</td>
                        <td>${element.cidade}</td>
                        <td>${element.estado}</td>
                    </tr>
                `)
            });

            $("#pagination-nav").html("");
            let consulta = "";
            if(localStorage.getItem("consulta")) {
                consulta = localStorage.getItem("consulta");
            }
            e.data.links.forEach(link => {
                $("#pagination-nav").append(`
                    <li class="page-item ${link.active ? "active" : ""}"><a class="page-link" href="${link.url}">${link.label}</a></li>
                `)
            })

            $("#info-table").html("");
            $("#info-table").append(`
                <p> Exibindo de ${e.data.from} até ${e.data.to} do total de ${e.data.total} registros </p>
            `);

            hideLoading();
        },
        error: (e) => {
            $("tbody").html("")
            $("#pagination-nav").html("");
            $("#info-table").html("");
            $("#info-table").append(`
                <p> Não foi possível renderizar a tabela </p>
            `);

            hideLoading();
            showToast(JSON.parse(e.responseText));
        }
    })
}

function deletarCadastro(id) {
    if(confirm("Tem certeza que deseja excluir esse registro?")) {

        showLoading();

        let mountUrl = "api/cliente/deletar/" + id;

        $.ajax({
            method: "DELETE",
            url: mountUrl,
            success: (e) => {
                hideLoading();
                $("#" + id).hide();
                showToast(e);

            },
            error: (e) => {
                hideLoading();
                showToast(JSON.parse(e.responseText));
            }
        });    
    }
}

function redirectUpdate(id) {
    window.location.replace("atualizacao-cadastral/" + id);
}

function showToast(response) {
    const toast = $("#myToast");
    const isSuccess = response.success == true ? true : false;

    toast.removeClass(isSuccess ? "bg-danger" : "bg-success").addClass(isSuccess ? "bg-success" : "bg-danger");
    toast.find(".toast-header strong").text(isSuccess ? "Tudo certo!" : "Ops!Algo errado.");
    toast.find(".toast-body").html("");
    toast.find(".toast-body").text(response.message);
    if(response.errors) { 
        for (let key in  response.errors) {
            for (let i = 0; i < response.errors[key].length; i++) {
                toast.find(".toast-body").append(`</br> - ${response.errors[key][i]}`);
            }
        }
    }

    toast.toast("show");
}

function showLoading() {
    $(".spinner").show();
    $("#backdrop").addClass("blur");
}

function hideLoading() {
    $(".spinner").hide();
    $("#backdrop").removeClass("blur");
}