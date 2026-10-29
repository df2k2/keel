<?php
// Fixture for bin/check-forbidden.sh: each line below must be caught.
$a = eval( 'return 1;' );
$b = $_GET['x'];
$c = wp_remote_get( 'https://example.com' );
