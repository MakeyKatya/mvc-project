<div class="container">
<h1>Dashboard...Logged in only</h1>

<hr />
    <div class="col-sm-6">

        <form role="form" id="randomInsert" action="../dashboard/xhrInsert" method="post">
            <div class="form-group">
                <label for="login">Add a dashboard note:</label>
                <textarea name="text" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>

    </div>
    <div class="col-sm-6"><img class="img-responsive" src="<?php echo URL;?>public/images/index.jpg" ></div>

    <div class="col-sm-12">
        <br />
        <br />
        <ul class="list-group" id="listInserts">

        </ul>
    </div>
</div>