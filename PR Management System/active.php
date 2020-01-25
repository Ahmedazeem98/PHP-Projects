<?php include 'config/config.php'; ?>
<?php include 'libraries/Database.php'; ?>
<?php

// create database object
$db = new Database;

// get Archived doctors
$query = "SELECT * FROM doctors WHERE status = 1";
$doctors = $db->select($query);

 ?>

<?php include('includes/header.php'); ?>
    </header>
        <section id="showcase">
            <div class="container">
              <br>
              <table class="table table-light">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                    <th scope="col">Code</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Communications</th>
                    <th scope="col">videos</th>
                  </tr>
                </thead>
                <tbody>
                <?php while($doctor = $doctors->fetch_assoc()) : ?>
                  <tr>
                    <th scope="row"><?php echo $doctor['id'] + 1; ?></th>
                    <td><?php echo $doctor['name']; ?></td>
                    <td>
                      <a href="edit.php?id=<?php echo $doctor['id'];?>&action=1&page=active"><button type="button" class="btn btn-secondary">Edit</button></a>
                      <a href="edit.php?id=<?php echo $doctor['id'];?>&action=2&page=active"><button type="button" class="btn btn-secondary">Delete</button></a>
                      </td>
                    <td><?php echo $doctor['code']; ?></td>
                    <td><?php echo $doctor['mobile']; ?></td>
                    <td><?php echo $doctor['number_of_communications']; ?></td>
                    <td><?php echo $doctor['number_of_videos']; ?></td>
                  </tr>
                <?php endwhile; ?>
                </tbody>
              </table>
            </div>
        </section>
        <div class="last">

        </div>
</body>
</html>
