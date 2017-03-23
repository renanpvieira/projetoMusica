</body>
<?php
    if(isset($scriptsJs))
    {
       foreach($scriptsJs as $js)
       {
           echo '<script type="text/javascript" src="' . base_url('content/js/' . $js)  . '"></script>';
       }
    }
?>
</html>