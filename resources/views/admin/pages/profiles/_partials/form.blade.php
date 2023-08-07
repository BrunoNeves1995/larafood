@csrf
@include('admin.includes.alert')
<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{$profile->name ?? old('name') }}">
</div>
<div class="form-group">
    <label>Descrição:</label>
    <input type="text" name="description" class="form-control" placeholder="Descrição:" value="{{$profile->description ?? old('description') }}">
</div>