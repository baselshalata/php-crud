<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>php crud</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
</head>

<body>
  <div class="container my-5">
    <h2>list of customer</h2>
    <a class="btn btn-primary" href="/myshop/create.php" role="button">NEW CUSTOMER</a>
    <br />
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Address</th>
          <th>Created_At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <!-- ex:bill gates -->
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "myshop";

        //creating connection
        $connection = new mysqli($servername, $username, $password, $database);
        if ($connection->connect_error) {
          die("Connection failed:" . $connection->connect_error);
        }

        // read all row from database table
        $sql = "SELECT * FROM customer";
        $result = $connection->query($sql);
        if (!$result) {
          die("invalid query: " . $connection->error);
        }

        while ($row = $result->fetch_assoc()) {
          echo '<tr>';
          echo "<td>" . $row['id'] . "</td>";
          echo '<td>' . $row['name'] . '</td>';
          echo '<td>' . $row['email'] . '</td>';
          echo '<td>' . $row['phone'] . '</td>';
          echo '<td>' . $row['address'] . '</td>';
          echo '<td>' . $row['create_at'] . '</td>';
          echo '<td>' . "<a class='btn btn-primary btn-sm' href='/myshop/edit.php?id= $row[id]'>Edit</a>";
          echo "<a class='btn btn-danger btn-sm' href='/myshop/delete.php?id= $row[id]'>Delete</a>" . '</td>';
          echo '</tr>';
        }

        ?>
        <!-- <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td>
             <a class="btn btn-primary btn-sm" href="/myshop/edit.php">Edit</a>
            <a class="btn btn-danger btn-sm" href="/myshop/delete.php">Delete</a> 
          </td>
        </tr> -->
      </tbody>


    </table>
  </div>
</body>

</html>