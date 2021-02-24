<?php

session_start();


require_once ("DB_connector.php");


date_default_timezone_set('Asia/Colombo');

if ($_GET["Command"] == "generate") {
   header('Content-Type: application/json');

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT sub_category_ref FROM sys_info";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $no = $row['sub_category_ref'];
    $tmpinvno = "000000" . $row["sub_category_ref"];
    $lenth = strlen($tmpinvno);
    $no = trim("SUCAT/") . substr($tmpinvno, $lenth - 7);


    $en_name = "Sub Category";

    $objArray = Array();
    array_push($objArray,$no,$en_name);

    echo json_encode($objArray);

   
}




if ($_GET["Command"] == "save_item") {
 

    
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $sql = "SELECT sub_category_ref FROM sys_info";
        $resul = $conn->query($sql);
        $row = $resul->fetch();
        $no = $row["sub_category_ref"];
        $tmpinvno = "000000" . $row["sub_category_ref"];
        $lenth = strlen($tmpinvno);
        $no1 = trim("SUCAT/") . substr($tmpinvno, $lenth - 7);


        $REF_GET = $_GET['REF'];
        // $name =$_GET['name'];
        $sql    = "SELECT  `REF` FROM `m_sub_category`  WHERE REF = '" . $REF_GET . "'";
        $result = $conn->query($sql);
        $row    = $result->fetchall();

        if (isset($REF_GET) && count($row) >= 1) {


            $sql    = "UPDATE `m_sub_category` SET `name`='" . $_GET['name']. "',`category_ref`='" . $_GET['category_ref'] . "',`new_tag`='" . $_GET['new_tag'] . "' WHERE REF = '" . $REF_GET . "'";
            $result = $conn->query($sql);
            $conn->commit();
            echo 'Updated successfully';

        }else{

        $sql = "Insert into m_sub_category(REF,category_ref, name, new_tag, user)values
                        ('" . $no1 . "' ,'" . $_GET['category_ref'] . "' ,'" . $_GET['name'] . "' ,'" . $_GET['new_tag'] . "' ,'" . $_SESSION['UserName'] . "')";
        $result = $conn->query($sql);
        
        
        $no2 = $no + 1;
        $sql = "update sys_info set sub_category_ref = $no2 where sub_category_ref = $no";
        $result = $conn->query($sql);

        $sql = "Insert into sys_log(REF, entry, operation, user, ip)values
                        ('" . $no1 . "' ,'entry' ,'SAVE'  ,'" . $_SESSION['UserName'] . "' ,'ip')";
        $result = $conn->query($sql);



        $conn->commit();
        echo "Saved";
        }
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

    $sql = "select * from m_sub_category where REF= '" . $REF . "'";

    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {
            $sqlss = "SELECT * FROM m_category where REF = '" . $row['category_ref'] . "'";
            $results = $conn->query($sqlss);
            $rows = $results->fetch();

            $row['category_name'] = $rows['category_name'];
        $ResponseXML .= "<objSup><![CDATA[" . json_encode($row) . "]]></objSup>";
    }

   $ResponseXML .= "<IDF><![CDATA[" . $_GET['IDF'] . "]]></IDF>";

    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}
