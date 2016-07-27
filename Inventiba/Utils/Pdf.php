<?php

class Inventiba_Utils_Pdf implements Inventiba_Utils_File {

   private $_titles = array();
   private $_rows = array();
   private $_file;
   private $_lib;

   public function __construct() {
      require_once(dirname(__FILE__) . '/../../html2pdf/html2pdf.class.php');
      $this->_lib = new HTML2PDF('L', 'Legal', 'es');
   }

   public function addTitle($title) {
      $this->_titles[] = $title;
   }

   public function nameFile($file) {
      $this->_file = $file;
   }

   public function addRow($row) {

      $this->_rows[] = $row;
   }

   public function addTitles($titles) {
      foreach ($titles as $title) {
         $this->addTitle($title);
      }
   }

   public function createFile($titulo = null) {
      $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
      try {
         $view = $viewRenderer->view;
         $content = $view->partial("orders/templateorder.phtml", ['order' => $this->_rows]);
         $this->_lib->WriteHTML($content);
         $name_file = $titulo["id"] . "_" . str_replace("", "_", $titulo["name"]);
         $this->_lib->Output('pdf_order/' . $this->_file . '/' . $name_file . '.pdf', 'F');
      } catch (HTML2PDF_exception $e) {
         echo $e;
         exit;
      }
   }

   public function getTitles() {
      return $this->_titles;
   }

   public function getRows() {
      return $this->_rows;
   }

}

?>
