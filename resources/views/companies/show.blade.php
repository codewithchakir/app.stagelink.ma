<h1>company detail</h1>

<form>
    <input type="text" name="name" value="{{$company->name}}" disabled>
    <input type="text" name="address" value="{{$company->address}}" disabled>
    <input type="email" name="email" value="{{$company->email}}" disabled>
    <input type="text" name="phone" value="{{$company->phone}}" disabled>
    <input type="text" name="ICE" value="{{$company->ICE}}" disabled>
    
</form>
<a href="{{route('companies.edit', $company->id)}}">edit</a>
<form action="{{route('companies.destroy', $company->id)}}" method="post">
    @method('DELETE')
    @csrf
    <button type="submit">delete</button>
</form>