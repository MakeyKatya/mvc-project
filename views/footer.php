</div>
<div id="footer">
    <hr />
    <b>Footer</b>
</div>
<script src="../public/js/jquery.js"></script>
<script src="../public/js/custom.js"></script>
<?php
    if(isset($this->js)){
        foreach($this->js as $js){
            echo '<script src="'.$js.'"></script>';
        }
    }
?>
</body>
</html>