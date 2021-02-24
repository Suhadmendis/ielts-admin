<?php

session_start();


require_once ("DB_connector.php");


date_default_timezone_set('Asia/Colombo');

if ($_GET["Command"] == "generate") {
    header('Content-Type: application/json');

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT employee_ref FROM sys_info";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $no = $row['employee_ref'];
    $tmpinvno = "000000" . $row["employee_ref"];
    $lenth = strlen($tmpinvno);
    $no = trim("EMP/") . substr($tmpinvno, $lenth - 7);


    $en_name = "Employee";

    $objArray = Array();
    array_push($objArray,$no,$en_name);

    echo json_encode($objArray);


}




if ($_GET["Command"] == "save_item") {



    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $sql = "SELECT employee_ref FROM sys_info";
        $resul = $conn->query($sql);
        $row = $resul->fetch();
        $no = $row["employee_ref"];
        $tmpinvno = "000000" . $row["employee_ref"];
        $lenth = strlen($tmpinvno);
        $no1 = trim("EMP/") . substr($tmpinvno, $lenth - 7);


        $REF_GET = $_GET['REF'];
        // $name =$_GET['name'];
        $sql    = "SELECT  `REF` FROM `m_employee`  WHERE REF = '" . $REF_GET . "'";
        $result = $conn->query($sql);
        $row    = $result->fetchall();

        if (isset($REF_GET) && count($row) >= 1) {


            $sql    = "UPDATE `m_employee` SET `name`='" . $_GET['name']. "',`designation_ref`='" . $_GET['designation_ref'] . "',`nic`='" . $_GET['nic'] . "',`vehicle_number`='" . $_GET['vehicle_number'] . "' WHERE REF = '" . $REF_GET . "'";
            $result = $conn->query($sql);
            $conn->commit();
            echo 'Updated successfully';

        }else{

            $sql = "Insert into m_employee(REF,designation_ref, name, nic,vehicle_number, user)values
                        ('" . $no1 . "' ,'" . $_GET['designation_ref'] . "' ,'" . $_GET['name'] . "' ,'" . $_GET['nic'] . "' ,'" . $_GET['vehicle_number'] . "' ,'" . $_SESSION['UserName'] . "')";
            $result = $conn->query($sql);


            $no2 = $no + 1;
            $sql = "update sys_info set employee_ref = $no2 where employee_ref = $no";
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

    $sql = "select * from m_employee where REF= '" . $REF . "'";

    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {
        $sqlss = "SELECT * FROM m_designation where REF = '" . $row['designation_ref'] . "'";
        $results = $conn->query($sqlss);
        $rows = $results->fetch();

        $row['designation_name'] = $rows['designation'];
        $ResponseXML .= "<objSup><![CDATA[" . json_encode($row) . "]]></objSup>";
    }

    $ResponseXML .= "<IDF><![CDATA[" . $_GET['IDF'] . "]]></IDF>";

    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}
