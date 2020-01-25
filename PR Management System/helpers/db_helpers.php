<?php include 'libraries/Database.php'; ?>
<?php 
function Delelte($id){
  $query = "DELETE * FROM doctors WHERE id =".$_GET['id'];
   $db->delete($query);
   header("Location:". $_SERVER['HTTP_REFERER']);
}
function upload_pic($docName){

   $allowExtentions = array('gif', "jpeg", "jpg", "png");
   $name = explode(".", $_FILES['signture']['name']);
   $extention = end($name);
   $type = explode("/", $_FILES['signture']['type']);
   $type = $type[0];
   if($type == 'image' && in_array($extention, $allowExtentions)){

     if($_FILES['signture']['error'] != 0){
       return 0;
     }
     else {
         move_uploaded_file($_FILES['signture']['tmp_name'], "images/"
         .$docName.".".$extention);
         $_SESSION[$docName]=$extention;
         return 1;
      }
    } else {
      return 0;
    }
  }

  function get_last_id($table_name){
    $result = mysql_query("SELECT max(id) FROM $table_name");

    if (!$result) {
        die('Could not query:' . mysql_error());
    }
    
    $id = mysql_result($result, 0, 'id');
    return $id;
  }