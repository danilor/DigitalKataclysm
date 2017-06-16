<?php
/**
 |******************************************************************************|
 |                              DIGITAL KATACLYSM                               |
 |                               MAIN INDEX FILE                                |
 |******************************************************************************|
 */
ob_start();
require __DIR__ . '/../autoload.php';
/*
 * Right after this "require" sentence, we should be able to
 * access the APP variable and use the execute method that
 * will put everything to work
 */
echo $APP->execute();
ob_end_flush();