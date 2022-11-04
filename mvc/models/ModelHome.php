<?php

class ModelHome extends DB
{
    public function getSlider() {
        $sql = 'SELECT * FROM images WHERE page="Home" AND key_image="Home_slide"';
        return $this->pdo_query($sql);
    }

    public function getAbout() {
        $sql = 'SELECT * FROM images WHERE page="Home" AND key_image="About_company"';
        return $this->pdo_query_one($sql);
    }

    public function getQualityCeylon()
    {
        $sql = 'SELECT * FROM images WHERE page="Home" AND key_image="Quality_ceylon"';
        return $this->pdo_query_one($sql);
    }
}
