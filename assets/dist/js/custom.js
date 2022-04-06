var controleCampo = 1;

function adicionarCampo() {
  controleCampo++;
  document
    .getElementById("form_endereco")
    .insertAdjacentHTML(
      "beforeend",
      '<div class="row mb-2 endereco"><div class="col-sm-3"><div class="card-body"><div class="form-group"><label for="exampleInputEmail1">cep:</label><input type="text" class="form-control" name="cep-' +
        controleCampo +
        '" value="" /></div></div></div><div class="col-sm-3"><div class="card-body"><div class="form-group"><label for="exampleInputEmail1">Número:</label><input type="text" class="form-control" name="numero-' +
        controleCampo +
        '" value="" /></div></div></div><div class="col-sm-3"><div class="card-body"><div class="form-group"><label for="exampleInputEmail1">Bairro:</label><input type="text" class="form-control" name="bairro-' +
        controleCampo +
        '" value="" /></div></div></div><div class="col-sm-3"><div class="card-body"><div class="form-group"><label for="exampleInputEmail1">Cidade:</label><input type="text" class="form-control" name="cidade-' +
        controleCampo +
        '" value="" /></div></div></div></div>'
    );
  document.getElementById("qnt_campo").value = controleCampo;
}
