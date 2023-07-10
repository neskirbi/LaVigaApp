
<!-- Modal -->
<div class="modal fade" id="HacerPedido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{('ValidarCodigo')}}" method="post">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmar Pedido</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                      <label for="codigo">Código</label>
                      <input required type="text" class="form-control" id="codigo" name="codigo" placeholder="Código" maxlength="10">
                  </div>
              </div>
              <div class="col-md-12">
                  <a type="button" class="btn btn-info btn-block" onclick="SolicitarCodigo('{{GetToken()}}');" style="color:#fff;">Solicitar Código</a>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-info" >Confirmar</button>
        </div>
      </div>
    </form>
    
  </div>
</div>