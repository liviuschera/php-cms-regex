<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Home</title>
</head>

<body>
   <h1>Welcome</h1>
   <p>Hello <?php echo htmlspecialchars($name); ?>!</p>

   <ul>
      <?php foreach ($colours as $colour): ?>
      <li><?php echo htmlspecialchars($colour); ?>
      </li>
      <?php endforeach; ?>
   </ul>
</body>

</html>