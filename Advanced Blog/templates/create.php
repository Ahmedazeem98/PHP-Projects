<?php include('includes/header.php'); ?>

  <form role="form" method="post" action="create.php">
    <div class="form-group">
      <label>Topic Title</label>
      <input type="text" name="title" class="form-control" placeholder="Enter Topic Title">
    </div>
    <div class="form-group">
      <label>Category</label>
      <select class="form-control" name = "category">
        <?php foreach($categories as $category) :?>
          <option value="<?php echo $category->id; ?>"> <?php echo $category->name; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label>Topic Body</label>
      <textarea class="form-group" name="body" rows="8" cols="80"
      placeholder="Enter Topic Body" id="body"></textarea>
      <script>CKEDITOR.replace('body');</script>
    </div>
    <button name="create" type="submit" class="btn btn-primary">Submit</button>
  </form>

<?php include('includes/footer.php'); ?>
