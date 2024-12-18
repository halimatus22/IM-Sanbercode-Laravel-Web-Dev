<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 1 - Halimatus Sya'diyah</title>
</head>
<body>
    <h1>Buat Account Baru</h1>
    <form action="/welcome" method="POST">
        @csrf
        <label>First Name</label><br><br>
        <input type="text" name="firstname"><br><br>
        <label>Last Name</label><br><br>
        <input type="text" name="lastname"><br><br>
        <label>Gender</label><br><br>
        <input type="radio" name="gender" value="Male"> Male <br>
        <input type="radio" name="gender" value="Female"> Female <br>
        <input type="radio" name="gender" value="Other"> Other <br>
        <label>Nationality</label><br><br>
        <select name="Nationality" >
            <option value="1">Indonesia</option><br>
            <option value="2">malaysia</option><br>
            <option value="3">vietnam</option><br>
            <option value="4">brunei</option><br>
        </select><br><br>
        <label>Language Spoken</label><br><br>
        <input type="checkbox" name="language" > Bahasa Indonesia <br>
        <input type="checkbox" name="language" > English <br>
        <input type="checkbox" name="language" > Other <br><br>
        <label> Bio : </label><br><br>
        <textarea name="bio" rows="10" cols="30"></textarea><br><br>
        <button type="submit">Submit</button>
    </form>

</body>
</html>