<?
// ini_set("display_errors",1); 
include "./header.php";
require_once ('./base/mysqldb.php');

$name['Name'] = "";
$introduce_cm['Introduce_cm'] = "";
$address['Address'] = "";
$time_work['Time_work'] = "";
$tel['Tel'] = "";
$text1['Text1'] = "";
$text2['Text2'] = "";
$text3['Text3'] = "";
$text4['Text4'] = "";
$text5['Text5'] = "";
$image['Image'] = [];
$qrcode_1['QR_1'] = "";
$qrcode_2['QR_2'] = "";
$lat['Lat'] = "";
$log['Log'] = "";
$memory['Memory'] = "";
$date_Memory['Date_Memory'] = "";
$flag['Flag'] = "";
$data['Image'] = [];
$caterogy['Caterogy'] ="";
$s_id = "";
$id = '';
$restaurant_s_id = [];

if (isset($_REQUEST["id"])) {
   $s_id = $_REQUEST["id"];
   // echo "ID: ".$s_id;
  }


if (!empty($_POST)) {

    $caterogy['Caterogy'] = $_POST['Caterogy'];
    $name['Name'] = $_POST['Name'];
    $introduce_cm['Introduce_cm'] = $_POST['Introduce_cm'];
    $address['Address'] = $_POST['Address'];
    $time_work['Time_work'] = $_POST['Time_work'];
    $tel['Tel'] = $_POST['Tel'];
    $text1['Text1'] = $_POST['Text1'];
    $text2['Text2'] = $_POST['Text2'];
    $text3['Text3'] = $_POST['Text3'];
    $text4['Text4'] = $_POST['Text4'];
    $text5['Text5'] = $_POST['Text5'];
    $image['Image'] = $_POST['Image'];
    $qrcode_1['QR_1'] = $_POST['QR_1'];
    $qrcode_2['QR_2'] = $_POST['QR_2'];
    $lat['Lat'] = $_POST['Lat'];
    $log['Log'] = $_POST['Log'];
    $memory['Memory'] = $_POST['Memory'];
    $date_Memory['Date_Memory'] = $_POST['Date_Memory'];
    $flag['Flag'] = $_POST['Flag'];

   if ($s_id!="") {
  //update

    $sql = "UPDATE `restaurant` SET `Caterogy`='".$caterogy['Caterogy']."',`Name`='".$name['Name']."',`Introduce_cm`='".$introduce_cm['Introduce_cm']."',`Address`='".$address['Address']."',`Time_work`='".$time_work['Time_work']."',`Tel`='".$tel['Tel']."',`Text1`='".$text1['Text1']."',`Text2`='".$text2['Text2']."',`Text3`='".$text3['Text3']."',`Text4`='".$text4['Text4']."',`Text5`='".$text5['Text5']."',`Image`='".$image['Image']."',`QR_1`='".$qrcode_1['QR_1']."',`QR_2`='".$qrcode_2['QR_2']."',`Lat`='".$lat['Lat']."',`Log`='".$log['Log']."',`Memory`='".$memory['Memory']."',`Date_Memory`='".$date_Memory['Date_Memory']."',`Flag`='".$flag['Flag']."' WHERE id=".$s_id;
    
    execute($sql);

     $uploads_dir = './uploads_image';
    // echo $image['Image'];
    foreach ($_FILES["Image"]['error'] as $key => $error) {

      if ($error == UPLOAD_ERR_OK) {
         
          // echo $error;
          // echo "Yeah !";
            $tmp_name = $_FILES["Image"]["tmp_name"][$key];
            // basename() may prevent filesystem traversal attacks;
            // further validation/sanitation of the filename may be appropriate
            $name = basename($_FILES["Image"]["name"][$key]);

            move_uploaded_file($tmp_name, "$uploads_dir/$name");
            $detail = [];
            $detail["UploadName"] =$name;
            $detail["UploadType"] =$_FILES["Image"]["type"][$key];
            $detail["UploadPath"] = "$uploads_dir/$name";
            
            array_push($data["Image"],$detail);
        }
    }
    
    foreach ($data["Image"] as $key => $update_img) {

     $sql = "UPDATE `image` SET `Image_Name`='".$update_img["UploadName"]."',`Image_Type`='".$update_img["UploadType"]."',`Image_Path`='".$update_img["UploadPath"]."' WHERE ID_Restaurant=".$s_id;

     execute($sql);
     // print_r($sql);
     // echo "Yeal";
    }

  }else{
    //insert
        // echo "OK!";
  	$sql = "INSERT INTO `restaurant`(`Caterogy`, `Name`, `Introduce_cm`, `Address`, `Time_work`, `Tel`, `Text1`, `Text2`, `Text3`, `Text4`, `Text5`, `Image`, `QR_1`, `QR_2`, `Lat`, `Log`, `Memory`, `Date_Memory`, `Flag`, `Date`) VALUES ('".$caterogy["Caterogy"]."','".$name["Name"]."','".$introduce_cm["Introduce_cm"]."','".$address["Address"]."','".$time_work["Time_work"]."','".$tel['Tel']."','".$text1['Text1']."','".$text2['Text2']."','".$text3['Text3']."','".$text4['Text4']."','".$text5['Text5']."','".$image['Image']."','".$qrcode_1['QR_1']."','".$qrcode_2['QR_2']."','".$lat['Lat']."','".$log['Log']."','".$memory['Memory']."','".$date_Memory['Date_Memory']."','".$flag['Flag']."',now())";

    // echo $sql;
    // execute($sql);
    $lastID =  execute_getID($sql);

    $uploads_dir = './uploads_image';
    // echo $image['Image'];
    foreach ($_FILES["Image"]['error'] as $key => $error) {

      if ($error == UPLOAD_ERR_OK) {
         
          // echo $error;
          // echo "Yeah !";
            $tmp_name = $_FILES["Image"]["tmp_name"][$key];
            // basename() may prevent filesystem traversal attacks;
            // further validation/sanitation of the filename may be appropriate
            $name = basename($_FILES["Image"]["name"][$key]);

            move_uploaded_file($tmp_name, "$uploads_dir/$name");
            $detail = [];
            $detail["UploadName"] =$name;
            $detail["UploadType"] =$_FILES["Image"]["type"][$key];
            $detail["UploadPath"] = "$uploads_dir/$name";
            
            array_push($data["Image"],$detail);
        }
    }
       // echo "<pre>";
       // print_r($data["Image"]);
       // echo "<pre/>";
    if ($lastID > 0) {
      foreach ($data['Image'] as $key => $value) {
       $sql = "INSERT INTO `image`(`ID_Restaurant`, `Image_Name`, `Image_Type`, `Image_Path`) VALUES ('".$lastID."','".$value["UploadName"]."','".$value["UploadType"]."','".$value["UploadPath"]."')";

       execute($sql);

      }
    }
  }
header('Location: ./manage.php');
  }
    
  if (isset($_GET['id'])) {
  $id = $_GET['id'];

   $sql = "SELECT * FROM `restaurant` WHERE id=".$id;

   // echo $sql;

    $restaurant_s_id = executeResult($sql);

    foreach ($restaurant_s_id as $key => $value) {

    $caterogy['Caterogy'] = $value['Caterogy'];
    $name['Name'] = $value['Name'];
    $introduce_cm['Introduce_cm'] = $value['Introduce_cm'];
    $address['Address'] = $value['Address'];
    $time_work['Time_work'] = $value['Time_work'];
    $tel['Tel'] = $value['Tel'];
    $text1['Text1'] = $value['Text1'];
    $text2['Text2'] = $value['Text2'];
    $text3['Text3'] = $value['Text3'];
    $text4['Text4'] = $value['Text4'];
    $text5['Text5'] = $value['Text5'];
    $image['Image'] = $value['Image'];
    $qrcode_1['QR_1'] = $value['QR_1'];
    $qrcode_2['QR_2'] = $value['QR_2'];
    $lat['Lat'] = $value['Lat'];
    $log['Log'] = $value['Log'];
    $memory['Memory'] = $value['Memory'];
    $date_Memory['Date_Memory'] = $value['Date_Memory'];
    $flag['Flag'] = $value['Flag'];
    }
}
else{
  $id = '';
}




include "./template/update.html";

include "./footer.php";

?>