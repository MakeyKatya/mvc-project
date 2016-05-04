<h1 align="center">Edit a User</h1>
<hr />

<form method="post" action="<?php echo URL ;?>user/editSave/<?php echo $this->user['id'];?>">
    <label>Login</label><input type="text" name="login" value="<?php echo $this->user['login'];?>" />

    <label>Password</label><input type="text" name="password" />

    <label>Role</label>
        <select name="role">
            <option value="default" <?php if($this->user['role'] == 'DEFAULT') echo 'selected';?>>Default</option>
            <option value="admin" <?php if($this->user['role'] == 'ADMIN') echo 'selected';?>>Admin</option>
            <option value="owner" <?php if($this->user['role'] == 'OWNER') echo 'selected';?>>Owner</option>
        </select>
    <br />
    <br />

    <label>&nbsp</label><input type="submit" value="Create" />
</form>
