<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">

</head>
<body style="display:flex;">
    @include('components.sidebar')
    <main style="">
        <div id="btn-controladores">
          
        </div>
        <div id="container-principal">
            <div style="width: 100%; height:30px; display:flex; text-align:center;">
            <p class="titulo-categoria" style="width: 25%;">UI</p>
            <p class="titulo-categoria" style="width: 25%;">NUI</p>
            <p class="titulo-categoria" style="width: 25%;">UNI</p>
            <p class="titulo-categoria" style="width: 25%;">NUNI</p>

            </div>
            <div id="container-tarefas">
              <div class="container-tarefa-categoria">
                {{-- <p class="titulo-categoria">UI <span style="font-size: 10px">⚠️</span></p> --}}
                @foreach ($tarefaUi as $tarefaUi)
                  <div class="item-lista">
                    <div style="background-color: ; width: 100%;">
                    {{-- <input type="checkbox"> --}} 
                    {{$tarefaUi->nome}}
                    </div>
                    <div class="tag-categorias">
                      @if (!is_null($tarefaUi->cat_pessoal))
                      <p class="tagPessoal">Pessoal</p>
                      @endif
                      @if (!is_null($tarefaUi->cat_academico))
                      <p class="tagAcademico">Acadêmico</p>
                      @endif
                      @if (!is_null($tarefaUi->cat_viagens))
                      <p class="tagViagens">Viagens</p>
                      @endif
                      @if (!is_null($tarefaUi->cat_profissional))
                      <p class="tagProfissional">Profissional</p>
                      @endif
                    </div>
                  </div>     
                @endforeach
              </div>
              <div class="container-tarefa-categoria">
                {{-- <p class="titulo-categoria">NUI</p> --}}
                {{-- <div class="item-lista"><input type="checkbox">teste </div> --}}
                @foreach ($tarefaNui as $tarefaNui)

                <div class="item-lista">
                  <div style="background-color: ; width: 100%;">
                  {{-- <input type="checkbox"> --}} 
                  {{$tarefaNui->nome}}
                  </div>
                  <div class="tag-categorias">
                  @if (!is_null($tarefaNui->cat_pessoal))
                  <p class="tagPessoal">Pessoal</p>
                  @endif
                  @if (!is_null($tarefaNui->cat_academico))
                  <p class="tagAcademico">Acadêmico</p>
                  @endif
                  @if (!is_null($tarefaNui->cat_viagens))
                  <p class="tagViagens">Viagens</p>
                  @endif
                  @if (!is_null($tarefaNui->cat_profissional))
                  <p class="tagProfissional">Profissional</p>
                  @endif
                  </div>
                </div>     
                @endforeach
              </div>
              <div class="container-tarefa-categoria">
                {{-- <p class="titulo-categoria">UNI</p> --}}
                @foreach ($tarefaUni as $tarefaUni)
                <div class="item-lista">
                  <div style="background-color: ; width: 100%;">
                  {{-- <input type="checkbox"> --}} 
                  {{$tarefaUni->nome}}
                  </div>
                  <div class="tag-categorias">
                  @if (!is_null($tarefaUni->cat_pessoal))
                  <p class="tagPessoal">Pessoal</p>
                  @endif
                  @if (!is_null($tarefaUni->cat_academico))
                  <p class="tagAcademico">Acadêmico</p>
                  @endif
                  @if (!is_null($tarefaUni->cat_viagens))
                  <p class="tagViagens">Viagens</p>
                  @endif
                  @if (!is_null($tarefaUni->cat_profissional))
                  <p class="tagProfissional">Profissional</p>
                  @endif
                  </div>
                </div>   
                @endforeach
              </div>
              <div class="container-tarefa-categoria">
                {{-- <p class="titulo-categoria">NUNI</p> --}}
                @foreach ($tarefaNuni as $tarefaNuni)
                <div class="item-lista">
                  <div style="background-color: ; width: 100%;">
                  {{-- <input type="checkbox"> --}} 
                  {{$tarefaNuni->nome}}
                  </div>
                  <div class="tag-categorias">
                  @if (!is_null($tarefaNuni->cat_pessoal))
                  <p class="tagPessoal">Pessoal</p>
                  @endif
                  @if (!is_null($tarefaNuni->cat_academico))
                  <p class="tagAcademico">Acadêmico</p>
                  @endif
                  @if (!is_null($tarefaNuni->cat_viagens))
                  <p class="tagViagens">Viagens</p>
                  @endif
                  @if (!is_null($tarefaNuni->cat_profissional))
                  <p class="tagProfissional">Profissional</p>
                  @endif
                  </div>
                </div>      
                @endforeach
              </div>
            </div>
            <button id="openModal">+ Adicionar Tarefa</button>
        </div>
    </main>

    <!-- Modal -->
    <div id="myModal" class="modal" style="display: none">
        <div class="modal-content" style="margin-top: 50px; height:75%; width:50%;">
          <span class="close" id="closeModal" style="padding-left: 95%;">&times;</span>
          <h2 style="text-align: center">Nova Atividade</h2>
          <p style="text-align: center; margin-bottom:40px;">Cadastre uma nova atividade e te ajudaremos a organiar sua vida.</p>
          <div id="cadastro-tarefa" style="background-color: ; width:100%; height: 100%; display:flex;">
            <!-- form começando aqui -->
            <form style="display: flex; flex-direction:column; width: 100%;" action="{{ route('cadastro.tarefa') }}" method="POST">
            @csrf
            <div id="org-form1" style="width:100%; display:flex;">
            <!-- lado esquerdo -->
            <div id="form-l" style="background-color:; width: 65%; height: 100%; padding-left:5%;">
              <div class="mb-3">
                <label for="nomeTarefa" class="form-label">Tarefa</label>
                <input type="text" class="form-control" id="nomeTarefa" name="nomeTarefa" placeholder="Iniciar um curso de inglês, viajar para Salvador...">
              </div>
              <div class="mb-3">
                <label for="descricaoTarefa" class="form-label">Descrição da tarefa:</label>
                <textarea class="form-control" id="descricaoTarefa" name="descricaoTarefa" rows="3"></textarea>
              </div>
              <div class="row">
                <div class="col">
                  <label for="prazoTarefa" class="form-label">Prazo:</label>
                  <input type="date" class="form-control" id="prazoTarefa" name="prazoTarefa" placeholder="First name" aria-label="First name">
                </div>
                <div class="col">
                  <label for="nivelTarefa" class="form-label">Nível:</label>
                  <select class="form-select" id="nivelTarefa" name="nivelTarefa" aria-label="Default select example">
                    <option selected></option>
                    <option value="1">UI - Urgente + Importante</option>
                    <option value="2">NUI - Não Urgente + Importante</option>
                    <option value="3">UNI - Urgente + Não Importante</option>
                    <option value="4">NUNI - Não Urgente + Não Importante</option>
                  </select>
                </div>
              </div>
            </div>
            <!-- lado direito -->
            <div id="form-r" style="background-color: ; width: 35%; height: 100%;">
              <h3 style="text-align: center">Categorias</h3>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="catProfissional" name="catProfissional">
                <label class="form-check-label" for="catProfissional">
                  Profissional
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="catAcademico" name="catAcademico">
                <label class="form-check-label" for="catAcademico">
                  Acadêmico
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="catViagens" name="catViagens">
                <label class="form-check-label" for="catViagens">
                  Viagens
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="catPessoal" name="catPessoal">
                <label class="form-check-label" for="catPessoal">
                  Pessoal
                </label>
              </div>
            </div>
            </div>
            <div id="org-form2" style="background-color: blanchedalmond; margin:auto;margin-top:40px;">
            <button type="submit" id="btn-form-tarefa">Confirmar Tarefa</button>
            </div>
            </form>
          </div>

    </div>
      

<!-- Certifique-se de incluir o jQuery no seu projeto -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
  // Quando o botão "Abrir Modal" é clicado, mostra o modal
  $("#openModal").click(function() {
    $("#myModal").css("display", "flex");
  });

  // Quando o botão "Fechar" (X) é clicado, fecha o modal
  $("#closeModal").click(function() {
    $("#myModal").css("display", "none");
  });

  // Quando o usuário clica fora do modal, fecha o modal
  $(window).click(function(event) {
    if (event.target == $("#myModal")[0]) {
      $("#myModal").css("display", "none");
    }
  });
});
</script>
</body>
</html>