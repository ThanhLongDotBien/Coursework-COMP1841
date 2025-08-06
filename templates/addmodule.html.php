<div class="form-create-question">
  <h2>Add New Module</h2>
  <form action="" method="post" novalidate>

    <div class="form-group">
      <label for="Modulename">Module Name</label>
      <textarea id="Modulename" name="Modulename" class="form-control" rows="1" placeholder="Enter module name" required></textarea>
    </div>

    <div class="form-group">
      <button type="submit" name="submit" onclick="return confirmAdd()" class="btn">Add Module</button>
    </div>

     <script>
    function confirmAdd() {
    return confirm("Are you sure you want to update");
    }
    </script>

  </form>
</div>
