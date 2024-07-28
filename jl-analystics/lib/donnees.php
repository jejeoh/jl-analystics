<?php
session_start();

if(!isset($_SESSION["jl-analystics"]["vue"])):

?>

<script src="every.js"></script>

<?php
endif;

$_SESSION["jl-analystics"]["vue"] = 1;
