<form action="" method="post" class="form-edit-question">
    <input type="hidden" name="ModuleID" value="<?=$Module['ModuleID'];?>">
    <label for='Modulename'>Type your new module:</label>
    <textarea name="Modulename" rows="1" cols="50">
    <?=$Module['Modulename']?></textarea>

    <input type="submit" name="submit" onclick="return confirmAdd()" value="Update your module">
    <script>
    function confirmAdd() {
    return confirm("Are you sure you want to update");
    }
    </script>
 
</form>