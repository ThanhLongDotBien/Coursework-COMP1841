<h2>Email</h2>

<form method="post" action="" class="form-email">
    <div class="form-group">
        <label for="content"><strong>Type your message:</strong></label>
        <textarea name="content" rows="5" cols="60" placeholder="Write your message here..." required></textarea>
    </div>

    <div class="form-group">
        <input type="submit" name="submit" onclick="return confirmSend()" value="Send" class="btn">
    </div>

     <script>
    function confirmSend() {
        return confirm("Are you sure you want to send this email?"); 
        }
</script>
</form>
