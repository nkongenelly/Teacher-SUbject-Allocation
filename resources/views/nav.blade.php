<nav>
<form action="/search" method="POST">
{{csrf_field()}}
    <div>
    <input type="text" placeholder="search with First Name" name="firstName">
    <button type="submit">Go</button>
    </div>
    
</form>
</nav>