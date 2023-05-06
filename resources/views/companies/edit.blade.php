<h1>edit company</h1>

<form action="{{route('companies.update', $company->id)}}" method="POST">
    @method('PUT')
    @csrf
    <input type="text" name="name" value="{{$company->name}}">
    <input type="text" name="address" value="{{$company->address}}">
    <input type="email" name="email" value="{{$company->email}}">
    <input type="text" name="phone" value="{{$company->phone}}">
    <input type="text" name="ICE" value="{{$company->ICE}}">
    <button type="submit">update company</button>
</form>