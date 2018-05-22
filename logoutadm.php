<?php session_start(); ?>
<html><body>
<?php
        session_destroy();

        header('Location: index.php')
        ?>
        
</body>
</html>
