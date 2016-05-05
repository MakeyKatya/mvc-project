<div class="container">
    <h1 align="center">Notes</h1>
    <hr />
    <div class="col-lg-6">
        <h3><b>Create a Note</b></h3>
        <hr />
        <form role="form" method="post" action="<?php echo URL; ?>note/create">
            <div class="form-group">
                <label for="title">Title of a note:</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="content">Note's content:</label>
                <textarea name="content" class="form-control"></textarea>
            </div>
            <br/>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
    <div class="col-lg-6">
        <img class="img-responsive" src="<?php echo URL;?>public/images/note.jpg" >
    </div>
</div>
    <hr />
    <div class="container">
        <h3><b>Current Notes</b></h3>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Content</th>
                <th>Created at</th>
                <th colspan="2">Modifications</th>
            </tr>
            </thead>
        <?php
            foreach($this->noteList as $key=>$value){

                echo '<tr>';
                echo '<td>'.$value['id'].'</td>';
                echo '<td>'.$value['title'].'</td>';
                echo '<td>'.$value['content'].'</td>';
                echo '<td>'.$value['created_at'].'</td>';
                echo '<td><a href="'.URL.'note/edit/'.$value['id'].'">Edit</a></td>
                      <td><a href="'.URL.'note/delete/'.$value['id'].'">Delete</a></td>';
                echo '</tr>';

            }
        ?>
        </table>
    </div>

</div>
