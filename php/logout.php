<?php

session_start();

session_destroy();

header("Location: ../login/index.php");
exit();
?> <?php

session_start();

session_destroy();

echo "TESTE LOGOUT";

// header("Location: ../login/index.php");
// exit();