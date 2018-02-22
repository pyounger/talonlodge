<?php
class App_Model_Gallery extends App_Model_Common_Gallery
{

    public function decodeCover()
    {
        if (!is_array($this->cover))
            $this->cover = json_decode($this->cover, true);
    }

}
?>