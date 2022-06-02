<!DOCTYPE html>
<html>
  <head>
    <title>Order Form</title>
    <link rel="stylesheet" href="order.css"/>
  </head>
  <body>
    <form method="post" action="checkout.php" id="order">
      <label for"name">Name</label>
      <input type="text" name="name" required/>
      <label for"name">Email</label>
      <input type="email" name="email" required/>
      <input type="submit" value="Place Order"/>
    </form>
  </body>
</html>
