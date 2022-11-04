
<?php

// echo "<pre>";
// print_r($data);
// exit;

$this->getLayoutBlock("header", $data, 'admin');

$this->getLayoutBlock("sidebar", $data, 'admin');

$this->getLayoutBlock("content", $data, 'admin');

$this->getLayoutBlock("footer", $data, 'admin');
