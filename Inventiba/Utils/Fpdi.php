<?php

class Inventiba_Utils_Fpdi {

   private $_pdf;
   private $_file;
   private $_text = array();
   private $_font = array();
   private $_weight = array();
   private $_size = array();
   private $_x = array();
   private $_y = array();
   private $_space=array();

   public function __construct() {
      require_once(ROOT . '/library/fpdf/fpdf.php');
      require_once(ROOT . '/library/fpdi/fpdi.php');
      $this->_pdf = new FPDI();
   }

   public function writeinPage($text, $x, $y, $family, $weight, $size,$space) {
     
	  $this->_pdf->SetFont($family, $weight, $size);
         $this->_pdf->SetTextColor(0, 0, 0);
         $this->_pdf->SetXY($x, $y);
         $this->_pdf->Write($space, $text);
     
   }
   public function constructPdf($file, $page) {
      $this->_pdf->AddPage();
      $this->_pdf->setSourceFile($file);
      $tplIdx = $this->_pdf->importPage($page);
      $this->_pdf->useTemplate($tplIdx, null, null, null, null, true);
   }
   
   public function getDates($text, $x, $y, $family, $weight, $size,$space) {
      $this->_text[] = $text;
      $this->_font[] = $family;
      $this->_weight[] = $weight;
      $this->_size[] = $size;
      $this->_x[] = $x;
      $this->_y[] = $y;
      $this->_space[]=$space;
   }
   public function fileName($name){
      $this->_file=$name;
   }
   public function savePdf($folder) {
      foreach ($this->_text as $value => $text) {
         $this->_pdf->SetFont($this->_font[$value], $this->_weight[$value], $this->_size[$value]);
         $this->_pdf->SetTextColor(0, 0, 0);
         $this->_pdf->SetXY($this->_x[$value], $this->_y[$value]);
         $this->_pdf->Write($this->_space[$value], $text);
      }
      $this->_pdf->Output($folder.'/'.$this->_file.'.pdf', 'F');
   }
     public function savePdfOnly($folder) {
      
    
      $this->_pdf->Output($folder.'/'.$this->_file.'.pdf', 'F');
   }
   
}
