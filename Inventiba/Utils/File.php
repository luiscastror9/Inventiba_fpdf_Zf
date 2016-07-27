<?php

interface Inventiba_Utils_File {

   public function __construct();

   public function addTitle($title);

   public function addRow($row);

   public function createFile();

   public function addTitles($titles);

   public function getTitles();

   public function getRows();
}

?>
