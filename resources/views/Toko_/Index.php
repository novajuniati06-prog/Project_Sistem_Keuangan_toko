<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FinanceTech</title>
    <style>
.container {
  display: flex;
  gap: 20px;
}
.col {
  flex: 1;
}
</style>
</head>
<body>

<form action="/submit" method="POST">
  <div class="container">

    <div class="col">
      <h4>Selamat Datang</h4>
      <input type="text" name="username" placeholder="username"><br>
      <input type="text" name="password" placeholder="password">
    </div>

    <div class="col">
      <h4>Selamat Datang</h4>
      <input type="text" name="username" placeholder="username"><br>
      <input type="text" name="password" placeholder="password">
    </div>

  </div>

  <button type="submit">Submit</button>
</form>

</body>
</html>