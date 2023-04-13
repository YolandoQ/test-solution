
@extends('partials.main')
@section('content')

    <section class="contact-section section-padding" id="section_6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 mx-auto">
                    <h2 class="text-center mb-4">Mantenha as informações atualizadas</h2>
                    <nav class="d-flex justify-content-center">
                        <div class="nav nav-tabs align-items-baseline justify-content-center" id="nav-tab"
                            role="tablist">
                            <button class="nav-link active" id="nav-cad-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-cad" type="button" role="tab"
                                aria-controls="nav-cad" aria-selected="false">
                                <h5>Atualização de clientes</h5>
                            </button>
                        </div>
                    </nav>
                    <div class="tab-content shadow-lg mt-5" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-cad" role="tabpanel"
                            aria-labelledby="nav-cad-tab">
                            <form class="update-form mb-5 mb-lg-0" role="form" id="update-form">
                                <div class="update-form-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="nome">Nome:</label>
                                            <input type="text" name="nome" id="nome-update" class="form-control" placeholder="Nome do cliente">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="cpf">CPF:</label>
                                            <input type="text" name="cpf" id="cpf-update" class="form-control" placeholder="999.999.999-99">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="data_nascimento">Data de nascimento:</label>
                                            <input class="form-control" type="date" id="data_nascimento-update" name="data_nascimento">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="sexo">Sexo:</label>
                                            <select class="form-select" id="sexo-update" name="sexo">
                                                <option selected>Selecione o sexo do cliente</option>
                                                <option value="masculino">Masculino</option>
                                                <option value="feminino">Feminino</option>
                                              </select>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <label for="endereco">Endereço:</label>
                                            <input type="text" name="endereco" id="endereco-update" class="form-control" placeholder="Endereço do cliente">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="estado-update">Estado:</label>
                                            <select class="form-select" id="estado-update" name="estado">
                                                <option selected>Atualize o Estado do cliente</option>
                                              </select>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="cidade-update">Cidade:</label>
                                            <select class="form-select" id="cidade-update" name="cidade">
                                                <option selected>Atualize a cidade do cliente</option>

                                              </select>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-lg-4 col-md-10 col-8 ms-auto d-flex justify-content-end"> 
                                          <button type="submit" class="btn btn-primary">Atualizar</button>
                                          <button type="reset" class="btn btn-danger ms-2">Limpar</button>
                                        </div>
                                      </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>

        showLoading()

        $(document).ready(function(){
            let id 
            let nome_update
            let cpf_update
            let data_nascimento_update
            let sexo_update
            let endereco_update
            let estado_update
            let cidade_update
            let url = window.location.href;
            let numero = url.match(/\d+$/);
            if (numero !== null) {
                id = numero[0];
            } else {
                alert("Não foi possível identificar esse cliente");
                window.location.assign("/");
            }

            $.ajax({
                type: 'GET',
                url: '/api/cliente/consulta?id=' + id,
                success: function(response) {
                    hideLoading();
                    showToast(response);

                    nome_update = response.data.data[0].nome;
                    cpf_update = response.data.data[0].cpf;
                    data_nascimento_update = response.data.data[0].unformatted_date;
                    sexo_update = response.data.data[0].sexo;
                    endereco_update = response.data.data[0].endereco;
                    estado_update = response.data.data[0].estado;
                    cidade_update = response.data.data[0].cidade;

                    $("#nome-update").val(nome_update);
                    $("#cpf-update").val(cpf_update);
                    $("#data_nascimento-update").val(data_nascimento_update);
                    $("#sexo-update").val(sexo_update.toLowerCase());
                    $("#endereco-update").val(endereco_update);
                    $("#estado-update").val(estado_update);
                    $("#cidade-update").val(cidade_update);
                },
                error: function(error) {
                    hideLoading();
                    showToast(JSON.parse(error.responseText));
                }
            });

            $('#cpf').mask('000.000.000-00');
            $('#cpf-consulta').mask('000.000.000-00');

            $('form.update-form').submit(function(event) {

                showLoading();

                event.preventDefault(); 

                let form_data = $(this).serialize(); 
                
                $.ajax({
                    type: 'PUT',
                    url: '/api/cliente/atualizar/' + id,
                    data: form_data,
                    success: function(response) {
                        hideLoading();
                        showToast(response);
                        setTimeout(() => {
                            window.location.assign("/");
                        }, 1500);
                    },
                    error: function(error) {
                        hideLoading();
                        showToast(JSON.parse(error.responseText));
                    }
                });
            });


            $("#estado-update").change(function() {
                if ($(this).val()) {
                    let sigla_estado = $(this).val();

                    $.ajax({
                        method: "GET",
                        url: `/api/resources/cidades/?uf=${sigla_estado}`,
                        success: (e) => {
                            $("#cidade-update").html("");
                            e.data.forEach(element => {
                                $("#cidade-update").append(
                                    `<option value="${element.m_nome}">${element.m_nome}</option>`
                                )
                            });

                        }
                    })
                }
            })

            $.ajax({
                method: "GET",
                url: `/api/resources/estados`,
                success: (e) => {
                    e.data.forEach(estado => {
                        $("#estado-update").append(
                            `<option value="${estado.uf_sigla}">${estado.uf_sigla}</option>`
                        )
                        if (estado.uf_sigla == estado_update) {
                            $("#estado-update").append(
                                `<option value="${estado.uf_sigla}" selected>${estado.uf_sigla}</option>`
                            )
                        }
                    })

                    $.ajax({
                        method: "GET",
                        url: "/api/resources/cidades?uf=CE",
                        success: (e) => {
                            e.data.forEach(cidade => {
                                $("#cidade-update").append(
                                    `<option value="${cidade.m_nome}">${cidade.m_nome}</option>`
                                )
                                if (cidade.m_nome == cidade_update) {
                                    $("#cidade-update").append(
                                        `<option value="${cidade.m_nome}" selected>${cidade.m_nome}</option>`
                                    )
                                }
                            })
                        },
                        error: (e) => {
                            showToast(JSON.parse(e.responseText))
                        }
                    })
                },
                error: (e) => {
                    showToast(JSON.parse(e.responseText))
                }
            })

        });

    </script> 
@endsection

