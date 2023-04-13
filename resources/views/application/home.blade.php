
@extends('partials.main')
@section('content')

    <section class="contact-section section-padding" id="section_6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 mx-auto">
                    <h2 class="text-center mb-4">Painel administrativo de clientes</h2>
                    <nav class="d-flex justify-content-center">
                        <div class="nav nav-tabs align-items-baseline justify-content-center" id="nav-tab"
                            role="tablist">
                            <button class="nav-link active" id="nav-cad-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-cad" type="button" role="tab"
                                aria-controls="nav-cad" aria-selected="false">
                                <h5>Cadastrar</h5>
                            </button>

                            <button class="nav-link" id="nav-manager-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-manager" type="button" role="tab"
                                aria-controls="nav-manager" aria-selected="false">
                                <h5>Gerenciar</h5>
                            </button>
                        </div>
                    </nav>
                    <div class="tab-content shadow-lg mt-5" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-cad" role="tabpanel"
                            aria-labelledby="nav-cad-tab">
                            <form class="cad-form mb-5 mb-lg-0" role="form" id="cad-form">
                                <div class="cad-form-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="nome">Nome:</label>
                                            <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome do cliente" required>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="cpf">CPF:</label>
                                            <input type="text" name="cpf" id="cpf" class="form-control" placeholder="999.999.999-99" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="data_nascimento">Data de nascimento:</label>
                                            <input class="form-control" type="date" id="data_nascimento" name="data_nascimento" required>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="sexo">Sexo:</label>
                                            <select class="form-select" id="sexo" name="sexo" required>
                                                <option selected>Selecione o sexo do cliente</option>
                                                <option value="masculino">Masculino</option>
                                                <option value="feminino">Feminino</option>
                                              </select>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <label for="endereco">Endereço:</label>
                                            <input type="text" name="endereco" id="endereco" class="form-control" placeholder="Endereço do cliente" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="estado">Estado:</label>
                                            <select class="form-select" id="estado" name="estado" required>
                                                <option selected>Selecione o Estado do cliente</option>
                                                <option value="CE">CE</option>
                                              </select>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="cidade">Cidade:</label>
                                            <select class="form-select" id="cidade" name="cidade" required>
                                                <option selected>Selecione a cidade do cliente</option>
                                                <option value="Fortaleza">Fortaleza</option>
                                                <option value="Eusébio">Eusébio</option>
                                              </select>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-lg-4 col-md-10 col-8 ms-auto d-flex justify-content-end"> 
                                          <button type="submit" class="btn btn-primary">Cadastrar</button>
                                          <button type="reset" class="btn btn-danger ms-2">Limpar</button>
                                        </div>
                                      </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="nav-manager" role="tabpanel" aria-labelledby="nav-manager-tab">
                            <div class="row mb-5">
                                <form class="consulta-form mb-5 mb-lg-0" role="form" id="consulta-form">
                                    <div class="consulta-form-body">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-4">
                                                <label for="nome">Cliente:</label>
                                                <input type="text" name="nome" id="nome-consulta" class="form-control" placeholder="Consulta por nome do cliente">
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-4">
                                                <label for="cpf">CPF:</label>
                                                <input type="text" name="cpf" id="cpf-consulta" class="form-control" placeholder="999.999.999-99">
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-4">
                                                <label for="data_nascimento">Data de nascimento:</label>
                                                <input class="form-control" type="date" id="data_nascimento-consulta" name="data_nascimento">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-lg-4 col-md-4 col-4">
                                                <label for="sexo">Sexo:</label>
                                                <select class="form-select" id="sexo-consulta" name="sexo" required>
                                                    <option selected disabled>Consulta por sexo do cliente</option>
                                                    <option value="masculino">Masculino</option>
                                                    <option value="feminino">Feminino</option>
                                                  </select>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-4">
                                                <label for="estado">Estado:</label>
                                                <select class="form-select" id="estado-consulta" name="estado" required>
                                                    <option selected disabled>Consulta por Estado do cliente</option>
                                                    <option value="CE">CE</option>
                                                  </select>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-4">
                                                <label for="cidade">Cidade:</label>
                                                <select class="form-select" id="cidade-consulta" name="cidade" required>
                                                    <option selected disabled>Consulta por cidade do cliente</option>
                                                    <option value="Fortaleza">Fortaleza</option>
                                                    <option value="Eusébio">Eusébio</option>
                                                  </select>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-lg-4 col-md-10 col-8 ms-auto d-flex justify-content-end"> 
                                              <button type="submit" class="btn btn-primary">Consultar</button>
                                              <button type="reset" class="btn btn-danger ms-2">Limpar</button>
                                            </div>
                                          </div>
                                    </div>
                                </form>
                            </div>

                            <div class="row">
                                <table class="table table-responsive" id="example">
                                    <thead>
                                        <tr>
                                            <th width="10%">Ações</th>
                                            <th width="12.5%">Nome</th>
                                            <th width="12.5%">CPF</th>
                                            <th width="10%">Sexo</th>
                                            <th width="12.5%">Nascimento</th>
                                            <th width="22.5%">Endereço</th>
                                            <th width="12%">Cidade</th>
                                            <th width="10%">Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                    
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="info-table">
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex justify-content-end">
                                    <div id="pagination-links">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination" id="pagination-nav">
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
            
        $(document).ready(function(){

            getPage("page=" + 1);
            
            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                var page = $(this).attr('href').split('?')[1];
                getPage(page);
            });
            
            $('#cpf').mask('000.000.000-00');
            $('#cpf-consulta').mask('000.000.000-00');

            $('form.cad-form').submit(function(event) {

                showLoading();

                event.preventDefault(); 

                var form_data = $(this).serialize(); 
                
                $.ajax({
                    type: 'POST',
                    url: 'api/cliente/cadastrar',
                    data: form_data,
                    success: function(response) {
                        hideLoading();
                        showToast(response);
                        setTimeout(() => {
                            window.location.reload();
                        }, 800);
                    },
                    error: function(error) {
                        hideLoading();
                        showToast(JSON.parse(error.responseText));
                    }
                });
            });


            $('form.consulta-form').submit(function(event) {

                showLoading();

                event.preventDefault(); 

                var form_data = $(this).serialize(); 

                if(form_data == "") {
                    hideLoading();
                    return;
                }

                getPage("page=" + 1, form_data);

            });
        });

    </script> 
@endsection

