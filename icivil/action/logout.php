<?php
    session_start();
    // if(isset($_COOKIE)){
    //     // Deleting cookies
    //     setcookie("6f8993775dbcde17a519b3e130aedd2b",null, time()+ 1,'/','.levaal.com',0,1);
    //     setcookie("bf329241f8793340e06358a7e714e270",null, time()+ 1,'/','.levaal.com',0,1);
    //     setcookie("remember",null, time()+ 1,'/','.levaal.com',0,1);
    //     setcookie("d99ae8fde35c274fb42325a5186bd253",null, time()+ 1,'/','.levaal.com',0,1);
    // }
    session_destroy();
    header('location:../../index.php');
?>