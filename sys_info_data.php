<?php

session_start();


require_once ("DB_connector.php");


date_default_timezone_set('Asia/Colombo');

if ($_GET["Command"] == "generate") {
   header('Content-Type: application/json');

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT * FROM sys_info";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $no = $row;
  

    $en_name = "System Infomation";

    $objArray = Array();
    array_push($objArray,$row,$en_name);

    echo json_encode($objArray);

   
}




if ($_GET["Command"] == "save_item") {
 

    
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        // $sql = "SELECT category_ref FROM sys_info";
        // $resul = $conn->query($sql);
        // $row = $resul->fetch();
        // $no = $row["category_ref"];
        // $tmpinvno = "000000" . $row["category_ref"];
        // $lenth = strlen($tmpinvno);
        // $no1 = trim("CAT/") . substr($tmpinvno, $lenth - 7);


      

        
        $sql = "update sys_info set COM_NAME = '" . $_GET['COM_NAME'] . "'";
        $result = $conn->query($sql);
        $sql = "update sys_info set COM_EMAIL = '" . $_GET['COM_EMAIL'] . "'";
        $result = $conn->query($sql);
        $sql = "update sys_info set COM_ADD1 = '" . $_GET['COM_ADD1'] . "'";
        $result = $conn->query($sql);
        $sql = "update sys_info set COM_ADD2 = '" . $_GET['COM_ADD2'] . "'";
        $result = $conn->query($sql);
        $sql = "update sys_info set COM_TEL1 = '" . $_GET['COM_TEL1'] . "'";
        $result = $conn->query($sql);
        $sql = "update sys_info set COM_TEL2 = '" . $_GET['COM_TEL2'] . "'";
        $result = $conn->query($sql);
        $sql = "update sys_info set COM_FAX = '" . $_GET['COM_FAX'] . "'";
        $result = $conn->query($sql);
        $sql = "update sys_info set COM_TAX = '" . $_GET['COM_TAX'] . "'";
        $result = $conn->query($sql);

       

         // $no2 = $no + 1;
        // $sql = "update sys_info set category_ref = $no2 where category_ref = $no";
        // $result = $conn->query($sql);

        // $sql = "Insert into sys_log(REF, entry, operation, user, ip)values
        //                 ('" . $no1 . "' ,'entry' ,'SAVE'  ,'" . $_SESSION['UserName'] . "' ,'ip')";
        // $result = $conn->query($sql);



        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

if ($_GET["Command"] == "getForm") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    $REF = $_GET["REF"];

    $sql = "select * from m_category where REF= '" . $REF . "'";

    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {
        $ResponseXML .= "<objSup><![CDATA[" . json_encode($row) . "]]></objSup>";
    }

   $ResponseXML .= "<IDF><![CDATA[" . $_GET['IDF'] . "]]></IDF>";

    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}
