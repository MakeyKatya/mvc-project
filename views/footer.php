<br/>
<br/>
<div id="footer">
    <hr />
    <b>(C)Footer</b>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
<?php
if(isset($this->js)){
    foreach($this->js as $js){
        echo '<script src="'.$js.'"></script>';
    }
}
?>
</body>
</html>