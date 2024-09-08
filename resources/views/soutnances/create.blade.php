<h1>create new soutnance</h1>

<form action="{{route('soutnances.store')}}" method="POST">
    @csrf
    <input type="number" name="prof_id" placeholder="prof id">
    <input type="number" name="student_id" placeholder="student id">
    <input type="datetime" name="date_soutnance" placeholder="2023-05-28 19:52:00">
    <button type="submit">add soutnance</button>
</form>