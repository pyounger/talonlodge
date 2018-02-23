<?php
class App_Model_Photo extends App_Model_Common_Photo
{

    public function decodeVersions()
    {
        if (!is_array($this->versions))
            $this->versions = json_decode($this->versions, true);
    }

}
?>