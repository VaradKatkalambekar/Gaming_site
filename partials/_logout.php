<?php

session_start();
echo "Logging you Out....Please wait....";

session_destroy();
header("Location: /app")


?>