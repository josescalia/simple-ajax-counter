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
class PhpVoter {

    function readVote($file) {
        if(file_exists($file)){
            $handle = fopen($file, 'r+');
            $countVote = fread($handle, 512);
            fclose($handle);
            return $countVote;
        }else{
            //if file not exist create one and retun the process from beginning
            $handle = fopen($file, 'w');
            fwrite($handle, 0);
            fclose($handle);
            return $this->readVote($file);
        }
    }

    /*
     * This function should always called before the readVote call first
     * */
    function doVote($file){
        if(file_exists($file)){
            $handle = fopen($file, 'r+');
        }
        $countVote = fread($handle, 512);
        fseek($handle, 0);
        fwrite($handle, $countVote+1);
        fclose($handle);
    }
}