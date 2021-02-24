<?php

session_start();


require_once ("DB_connector.php");


date_default_timezone_set('Asia/Colombo');

if ($_GET["Command"] == "generate") {
    header('Content-Type: application/json');

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT vessel_ref FROM sys_info";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $no = $row['vessel_ref'];
    $tmpinvno = "000000" . $row["vessel_ref"];
    $lenth = strlen($tmpinvno);
    $no = trim("VESSEL/") . substr($tmpinvno, $lenth - 7);


    $en_name = "Vessel";

    $objArray = Array();
    array_push($objArray,$no,$en_name);

    echo json_encode($objArray);


}






if ($_GET["Command"] == "save_item") {



    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $sql = "SELECT vessel_ref FROM sys_info";
        $resul = $conn->query($sql);
        $row = $resul->fetch();
        $no = $row["vessel_ref"];
        $tmpinvno = "000000" . $row["vessel_ref"];
        $lenth = strlen($tmpinvno);
        $no1 = trim("VESSEL/") . substr($tmpinvno, $lenth - 7);


        $REF_GET = $_GET['REF'];
        // $name =$_GET['name'];
        $sql    = "SELECT  `REF` FROM `m_vessel`  WHERE REF = '" . $REF_GET . "'";
        $result = $conn->query($sql);
        $row    = $result->fetchall();

        if (isset($REF_GET) && count($row) >= 1) {


            $sql    = "UPDATE `m_vessel` SET `name`='" . $_GET['name']. "',`company_ref`='" . $_GET['company_ref'] . "',`flag`='" . $_GET['flag'] . "',`imo_number`='" . $_GET['imo_number']. "',`call_sign`='" . $_GET['call_sign']  . "' WHERE REF = '" . $REF_GET . "'";
            $result = $conn->query($sql);
            $conn->commit();
            echo 'Updated successfully';

        }else{

            $sql = "Insert into m_vessel(REF,company_ref, name, flag,imo_number,call_sign, user)values
                        ('" . $no1 . "' ,'" . $_GET['company_ref'] . "' ,'" . $_GET['name'] . "' ,'" . $_GET['flag'] . "' ,'" . $_GET['imo_number']. "' ,'" . $_GET['call_sign'] . "' ,'" . $_SESSION['UserName'] . "')";
            $result = $conn->query($sql);


            $no2 = $no + 1;
            $sql = "update sys_info set vessel_ref = $no2 where vessel_ref = $no";
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



if ($_GET["Command"] == "cancel_imb") {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $REF_GET = $_GET["REF"];
        $cancel = 1;

        $sql = "UPDATE `m_vessel` SET `cancel`='" . $cancel . "' WHERE REF = '" . $REF_GET . "'";
        $result = $conn->query($sql);
        $conn->commit();
        echo "Canceled";

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

    $sql = "select * from m_vessel where REF= '" . $REF . "'";

    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {
        $sqlss = "SELECT * FROM m_company where REF = '" . $row['company_ref'] . "'";
        $results = $conn->query($sqlss);
        $rows = $results->fetch();

        $row['company_name'] = $rows['name'];
        $ResponseXML .= "<objSup><![CDATA[" . json_encode($row) . "]]></objSup>";
    }

    $ResponseXML .= "<IDF><![CDATA[" . $_GET['IDF'] . "]]></IDF>";

    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}
