<?php

/** Include path * */
set_include_path(get_include_path() . PATH_SEPARATOR . 'PHPExcel/Classes/');
include 'PHPExcel/IOFactory.php';

include_once("DB_connector.php");

// header('Content-Type: text/xml');
header('Content-Type: application/json');


$columns = array("A", "Z");

$target_dir = "uploads/";

$target_file = $target_dir . basename($_FILES["file-3"]["name"]);
// unlink($target_file);
if (move_uploaded_file($_FILES["file-3"]["tmp_name"], $target_file)) {

}

$objPHPExcel = PHPExcel_IOFactory::load($target_file);
$objPHPExcel->setActiveSheetIndexByName("Sheet1");
$worksheet = $objPHPExcel->getActiveSheet();


// print_r($worksheet);

// $cellCus = $worksheet->getCell("C2")->getValue();

$mainArray = Array();
for ($i=2; $i < 2000; $i++) { 
    $validate = 0;

    if ($worksheet->getCell("A".$i)->getValue() == "I") {

        $rowArray = Array();

        array_push($rowArray, $worksheet->getCell("B".$i)->getValue());
        array_push($rowArray, $worksheet->getCell("C".$i)->getValue());
        array_push($rowArray, $worksheet->getCell("D".$i)->getValue());
        array_push($rowArray, $worksheet->getCell("E".$i)->getValue());

        $sql = "SELECT REF FROM m_author where name = '" . $worksheet->getCell("F".$i)->getValue() . "'";
        $result = $conn->query($sql);
        $row = $result->fetch();
        if ($row['REF'] == null) {
            ++$validate;
        }
        array_push($rowArray, $worksheet->getCell("F".$i)->getValue());

        array_push($rowArray, $worksheet->getCell("G".$i)->getValue());
        array_push($rowArray, $worksheet->getCell("H".$i)->getValue());
        array_push($rowArray, $worksheet->getCell("I".$i)->getValue());


        array_push($rowArray, $validate);
        
        array_push($mainArray, $rowArray);

    }

}


echo json_encode($mainArray);


?>
