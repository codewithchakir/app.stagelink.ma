<h1>create new company</h1>

<form action="{{route('companies.store')}}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="company name">
    <input type="text" name="address" placeholder="company address">
    <input type="email" name="email" placeholder="company email">
    <input type="text" name="phone" placeholder="company phone number">
    <input type="text" name="ICE" placeholder="company ICE">
    <button type="submit">add company</button>
</form>