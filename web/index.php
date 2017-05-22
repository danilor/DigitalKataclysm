<?php
/********************************************************************************
                                DIGITAL KATACLYSM
                                 MAIN INDEX FILE
 *******************************************************************************/
require __DIR__ . '/../autoload.php';
/*
 * Right after this "require" sentence, we should be able to
 * access the APP variable
 */

$APP;
echo $BLADE->view()->make('start')->render();

?>