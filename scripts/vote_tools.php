<?php
/**
 *----------------------------------------------------------------------------------------------------------------------
 *
 * Created by JetBrains PhpStorm.
 * User: Josescalia
 * Date: 9/28/13
 * Time: 12:08 PM
 *----------------------------------------------------------------------------------------------------------------------
 */
require "ClassPhpVoter.php";
$voteTools = new PhpVoter();

$file = $_GET['file_to_read'];
$actType = $_GET['act'];
if ($actType == "write") {
    $voteTools->doVote("../counter-data-source/" . $file);
}

echo "" . $voteTools->readVote("../counter-data-source/" . $file) . " people like this";
?>