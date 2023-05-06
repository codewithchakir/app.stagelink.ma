<h1>all registered companies</h1>

<table border="1px solid">
    <tr>
        <th>name</th>
        <th>address</th>
        <th>email</th>
        <th>phone</th>
        <th>ICE</th>
        <th>action</th>
    </tr>
    @foreach ($companies as $company)
        <tr>
            <td>{{$company->name}}</td>
            <td>{{$company->address}}</td>
            <td>{{$company->email}}</td>
            <td>{{$company->phone}}</td>
            <td>{{$company->ICE}}</td>
            <td>
                <a href="{{route('companies.edit', $company->id)}}">edit</a>
                <form action="{{route('companies.destroy', $company->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit">delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>