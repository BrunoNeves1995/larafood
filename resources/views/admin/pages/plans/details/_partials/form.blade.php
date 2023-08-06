@csrf
<div class="form-group ">
    <label>Nome:</label>
    <input type="text" class="form-control" name="name" placeholder="nome" value="{{$detail->name ?? old('name') }}">
</div>