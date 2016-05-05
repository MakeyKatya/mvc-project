<div class="container">
    <h1 align="center">Users</h1>
    <hr />
    <div class="col-sm-6">
        <h3><b>Create a User</b></h3>

        <form role="form" method="post" action="<?php echo URL; ?>user/create">
            <div class="form-group">
                <label for="login">Login:</label>
                <input type="text" name="login" class="form-control">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" name="password">
            </div>
            <label>Role</label>
            <select name="role" class="form-control">
                <option value="default">Default</option>
                <option value="admin">Admin</option>
                <option value="owner">Owner</option>
            </select>
            <br/>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
    <div class="col-sm-6"><img class="img-responsive" src="<?php echo URL;?>public/images/user.jpg" ></div>
</div>

<hr />
<div class="container">
    <h3><b>Current Users</b></h3>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Login</th>
                <th>Role</th>
                <th colspan="2">Modifications</th>
            </tr>
            </thead>
            <?php
                foreach($this->userList as $key=>$value){

                    echo '<tr>';
                    echo '<td>'.$value['id'].'</td>';
                    echo '<td>'.$value['login'].'</td>';
                    echo '<td>'.$value['role'].'</td>';
                    echo '<td><a href="'.URL.'user/edit/'.$value['id'].'">Edit</a></td>
                          <td><a href="'.URL.'user/delete/'.$value['id'].'">Delete</a></td>';
                    echo '</tr>';

                }
            ?>
        </table>
</div>
