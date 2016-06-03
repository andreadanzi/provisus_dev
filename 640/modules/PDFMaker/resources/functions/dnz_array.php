<?php


if (!function_exists('maxDateCFArray')) {

    function maxDateCFArray($name) {
        global $PDFContent;
        $date_array = array();
        foreach ($PDFContent->PDFMakerCFArray[$name] as $value) {
            $date_val = strtotime(trim($value));
            $date_array[] = date( "Y-m-d" , $date_val); 
        }
        sort($date_array,SORT_STRING);
	    $first_day = $date_array[0];
        return date('d.m.Y',strtotime($first_day));
    }

}

if (!function_exists('minDateCFArray')) {

    function minDateCFArray($name) {
        global $PDFContent;

        $date_array = array();
        foreach ($PDFContent->PDFMakerCFArray[$name] as $value) {
            $date_val = strtotime(trim($value));
            $date_array[] = date( "Y-m-d" , $date_val); 
        }
        sort($date_array,SORT_STRING);
	    $last_day = end($date_array);
        return date('d.m.Y',strtotime($last_day));
    }

}


if (!function_exists('betweenDateCFArray')) {

    function betweenDateCFArray($name) {
        global $PDFContent;

        $date_array = array();
        foreach ($PDFContent->PDFMakerCFArray[$name] as $key => $value) {
            $date_val = strtotime(trim($value));
            $date_array[$key] = date( "Y-m-d" , $date_val); 
        }
        sort($date_array,SORT_STRING);
	    $first_day = $date_array[0];
	    $last_day = end($date_array);	    
	    $between = $first_day . " - " . $last_day;
        return date('d.m.Y',strtotime($first_day)) . ' - ' . date('d.m.Y',strtotime($last_day));
    }

}


?>
