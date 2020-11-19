@include('admin.includes.alerts')
@csrf
<div class="form-group">
    <input type="text" class="form-control" name="name" placeholder="Nome da atividade"value="{{$activity-> name ?? old('name')}}">
</div>
<div class="form-group">
    <input type="text" class="form-control" name="description" placeholder="Descrição da ativadade"value="{{$activity-> description ?? old('description')}}">
</div>
<div class="form-group">
    <button type="Enviar" class="btn btn-success">Criar</button>
</div>