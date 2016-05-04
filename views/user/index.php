<h1 align="center">Users</h1>
<hr />
<h3>Create a User</h3>
<form method="post" action="<?php echo URL; ?>user/create">
    <label>Login</label><input type="text" name="login" />

    <label>Password</label><input type="text" name="password" />

    <label>Role</label>
        <select name="role">
            <option value="default">Default</option>
            <option value="admin">Admin</option>
            <option value="owner">Owner</option>
        </select>
    <br />
    <br />

    <label>&nbsp</label><input type="submit" value="Create" />
</form>

<h3>Current Users</h3>
<table border="1px" width="500px">
<?php
    foreach($this->userList as $key=>$value){

        echo '<tr>';
        echo '<td>'.$value['id'].'</td>';
        echo '<td>'.$value['login'].'</td>';
        echo '<td>'.$value['role'].'</td>';
        echo '<td><a href="'.URL.'user/edit/'.$value['id'].'">Edit</a><br />
                  <a href="'.URL.'user/delete/'.$value['id'].'">Delete</a></td>';
        echo '</tr>';

    }
?>
</table>
