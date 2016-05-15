<?php if (!defined('BASEPATH')) exit('No permitir el acceso directo al script');
/**
 * File contain the class that support the update and crop
 */

    class Crop_Library {
    
        /**
         * Function save and crop file image
         * 
         * @param type $source      Image source
         * @param type $basename    Image basename
         * @param type $target_dir  Final directory
         * @param type $new_width
         * @param type $new_height
         * @return type
         */
        public function thumbnail($source, $basename, $target_dir, $new_width, $new_height) {

            if ($_FILES[$source]["name"] == Null){
                $message = "Select one file to upload.";
                return;
            }
            
            $temp_dir = "upload";
                
            $target_file = $temp_dir . basename($_FILES[$source]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
                
            $check = getimagesize($_FILES[$source]["tmp_name"]);
            if($check !== false) {
                $message = "El archivo es una imagen - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $message = "El archivo no es una imagen.";
                $uploadOk = 0;
            }
        
            // Check file size
            if ($_FILES[$source]["size"] > 500000) {
                $message .= "Su imagen es demasiado grande.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType == "jpg" || $imageFileType == "jpeg") {
                $message .= "El archivo tiene el formato correcto.";
                $uploadOk = 1;
            } else {
                $message .= "Lo sentimos, pero soloarchivos JPG, JPEG están permitidos.";
                $uploadOk = 0;
            }
                
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $message .= "La imagen no pudo subirse.";
            // if everything is ok, try to upload file
            } else { 
                    
                $target_file = $temp_dir . $basename . '.jpg';
                    
                move_uploaded_file($_FILES[$source]["tmp_name"], $target_file);
                        
                list($width, $height) = getimagesize($target_file);
                $new_file = imagecreatefromjpeg($target_file);
                                                
                $thumb = $target_dir . $basename . '.jpg';
                $true_color = imagecreatetruecolor($new_width, $new_height);
                imagecopyresampled($true_color, $new_file, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                imagejpeg($true_color, $thumb, 100);
                unlink($target_file);
                        
                $message .= "La imagen ". basename( $_FILES[$source]["name"]). " se ha subido correctamente.";
                        
            }
            $data['message'] = $message;

        }
    }
    
?>