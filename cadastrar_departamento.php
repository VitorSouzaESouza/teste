<?php
//  function read_attribute_file($attribute, $file_name = "file.txt"){
//     $datas = file($file_name);
//     for($_i=0; $_i<sizeof($datas); $_i++){
//         $array = explode(":", $datas[$_i]);
//         if($array[0] == $attribute){
//             $departamentos = explode(",", $array[1]);
//             return $departamentos;
//         }
//     }
//  }

 if(isset($_POST["departamento"])){
    echo "<h2> Departamento ".$_POST["departamento"]." cadastrado</h2>";
    // $file_name = "file.txt";
    // if(!in_array($_POST["departamento"], read_attribute_file("Departamentos"))){
    //     $file = fopen($file_name, "a");
    //     $text = $_POST["departamento"]."\n";
    //     fwrite($file, $text);
    //     fclose($file);
    // }
 }
?>