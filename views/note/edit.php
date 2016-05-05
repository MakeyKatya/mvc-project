<div class="container">
    <h1 align="center">Notes</h1>
    <hr />
    <h3><b>Edit a Note</b></h3>

    <form role="form" method="post" action="<?php echo URL ;?>note/editSave/<?php echo $this->note['id'];?>">
        <div class="form-group">
            <label for="title">Title of a note:</label>
            <input type="text" name="title" class="form-control" value="<?php echo $this->note['title'];?>">
        </div>
        <div class="form-group">
            <label for="content">Note's content:</label>
            <textarea name="content" class="form-control"><?php echo $this->note['content'];?></textarea>
        </div>
        <br/>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>

</div>