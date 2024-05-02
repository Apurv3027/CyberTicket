<x-app-layout>
    <div align="center" style="background-color:Yellow">
    <h1 font-size: 8em>Admin Dashboard</h1>
</div>
<div align="center">
    <form action="" method="POST">
        @csrf
<label>Name</label><br>
<input type="text" name="name" required=""><br>
<label>Email</label><br>
<input type="email" name="email" required=""><br>
<label>Password</label><br>
<input type="password" name="password" required=""><br>
</form>

</div>
</x-app-layout>


