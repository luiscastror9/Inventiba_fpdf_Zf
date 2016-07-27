<?php

class Inventiba_Utils_String {
    
    public static function cleanString ($string){
        
        $string = trim ($string);
        $string = strip_tags($string);
        $string = preg_replace('/(À|Á|Â|Ã|Ä|Å|à|á|â|ã|ä|å|@)/','a',$string);
        $string = preg_replace('/(È|É|Ê|Ë|è|é|ê|ë)/','e',$string);
        $string = preg_replace('/(Ì|Í|Î|Ï|ì|í|î|ï)/','i',$string);
        $string = preg_replace('/(Ò|Ó|Ô|Õ|Ö|Ø|ò|ó|ô|õ|ö|ø)/','o',$string);
        $string = preg_replace('/(Ù|Ú|Û|Ü|ù|ú|û|ü)/','u',$string);
        $string = preg_replace('/(Ç|ç)/','c',$string);
        $string = preg_replace('/(Ñ|ñ)/','n',$string);
        $string = preg_replace('/(ÿ|Ý)/','y',$string);
        $string = preg_replace('/(\~|\^|\!|\#|\$|\%|\^|\&|\*|\(|\)|\_|\-|\+|\=|\<|\>|\?|\`|\,|\.|\/|\\|\|)/','',$string);
        $string = strtolower ($string);
        $string = preg_replace('/\s+/',' ', $string);
        $string = preg_replace("[ ]",".",$string);
        
	    return $string;
	}
      
    public static function createRandomString($length = 8){
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $string;
    }
    
    public static function cutString($text, $size = 0)
    {
        if(strlen($text) > $size and $size > 0) {
            return substr($text, 0, strpos($text, " ", $size - 3))."...";
        } 
        return $text;
    }
    
    public static function truncate($text, $size = 0)
    {
        if(strlen($text) > $size and $size > 0)
        {
            $parts = preg_split('/([\s\n\r]+)/', $text, null, PREG_SPLIT_DELIM_CAPTURE);
            $parts_count = count($parts);

            $length = 0;
            $last_part = 0;
            for (; $last_part < $parts_count; ++$last_part) {
              $length += strlen($parts[$last_part]);
              if ($length > $size) { break; }
            }

            $text = implode(array_slice($parts, 0, $last_part))."...";
        }
        return $text;
    }
}
?>
