@extends('layout.master')
@section('Judul')
Input Data
@endsection
@section('content')
    
<h1>Buat Account Baru!</h1>
<h3>Sign Up Form</h3>
    <form action="/send" method="POST">
        @csrf
        <label for="">First Name:</label><br><br>
            <input type="text" name="firstName" required><br><br>
        <label for="">Last Name:</label><br><br>
            <input type="text" name="lastName"><br><br>
        <label for="">Gender:</label><br><br>
            <input type="radio" name="gender" value="Male" required> Male <br>
            <input type="radio" name="gender" value="Female" required> Female <br>
            <input type="radio" name="gender" value="Other" required> Other <br><br>
        <label for="">Nasionality:</label><br><br>
            <select name="nasionality" id="" required>
                <option value="Indonesian">Indonesian</option>
                <option value="English">English</option>
                <option value="Malaysia">Malaysia</option>
            </select><br><br>
        <label for="">Languange Spoken</label><br><br>
            <input type="checkbox" name="spoken" value="Bahasa Indonesia"> Bahasa Indonesia <br>
            <input type="checkbox" name="spoken" value="Bahasa Inggris"> Bahasa Inggris <br>
            <input type="checkbox" name="spoken" value="Other"> Other <br><br>
        <label for="">Bio:</label><br><br>
            <textarea name="bio" cols="25" rows="10" required></textarea><br>
        <input type="submit" name="submit" value="Sign Up">
    </form>
@endsection