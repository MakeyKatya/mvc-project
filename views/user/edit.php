<div class="container">
    <h1 align="center">Notes</h1>
    <hr />
    <h3><b>Edit a User</b></h3>

    <form role="form" method="post" action="<?php echo URL ;?>user/editSave/<?php echo $this->user['id'];?>">
        <div class="form-group">
            <label for="login">Login:</label>
            <input type="text" name="login" class="form-control" value="<?php echo $this->user['login'];?>">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="text" name="password" class="form-control" />
        </div>
        <label>Role</label>
        <select name="role" class="form-control">
            <option value="default" <?php if($this->user['role'] == 'DEFAULT') echo 'selected';?>>Default</option>
            <option value="admin" <?php if($this->user['role'] == 'ADMIN') echo 'selected';?>>Admin</option>
            <option value="owner" <?php if($this->user['role'] == 'OWNER') echo 'selected';?>>Owner</option>
        </select>
        <br/>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>

</div>