<?php
/**
* Function for create a user passing parameters and add user to the users.txt
* @param $username - User Username
* @param $password - User Password 
* @param $role - User Role
* @param $name - User Name
* @param $surname - User Surname
* @return $result - True if user created, false if not created
**/
function insertUser(string $username,
                    string $password,
                    string $role,
                    string $name,
                    string $surname) : int {
    $filepath = "files/users.txt"; //Filepath of file users.txt
    if(file_exists($filepath)){ //Check if the path exists
        //If exists path, open it
        $handle=fopen($filepath,'a'); //r,w,x,r+,w+...
        if($handle){ //If fopen open path succesfully,enter if
            //Write at end of file the username
            fwrite($handle,"$username;$password;$role;$name;$surname\n"); 
            //Close writer
            fclose($handle);
            //$result = true(User Created)
            $result = true;	
            }
        else{ //Else $result = false(User not Created) and throw exception
            $result = false;
            throw new Exception("No se a podido abrir el archivo");
        }    
    }
    else{ //Else $result = false(User not Created) and throw exception
        $result = false;
        throw new Exception("Archivo de usuarios no creado");
    }
    return $result;
}

/**
* Function for find a user passing parameters and search it on users.txt
* @param $username - User Username
* @param $password - User Password 
* @param $filepath - Path of the file users.txt
* @param $handle - Save the file users.txt
* @param $line - Save a line of $handle
* @return $arrayUser - Return array with user info if found user, Empty Array if not found user
**/
function findUsernamebyUsernameAndPassword(string $username, string $password) : array {
    $arrayUser = []; //Create Empty Array
    $filepath = "files/users.txt"; //Path of users.txt
    if(file_exists($filepath)){ //Check if path exists
        $handle=fopen($filepath,'r'); //r,w,x,r+,w+...
        if($handle){ //If fopen open path succesfully,enter if
            fgets($handle); //Remove header from file
            while(!feof($handle)){ //while doesn't stop until it finishes reading the file
                $line = fgets($handle); //Get line
                $user = explode(";",$line); //Array of user
                if($user[0] == $username && $user[1] == $password){ //Compare the info of user with parameters
                  array_push($arrayUser, $user[0], $user[1], $user[2], $user[3], $user[4]); //Add at the end of array
                }
                else{
                }
            }
            fclose($handle); //Close handle
        }
        else{ //If cant open file throw exception
            throw new Exception("No se a podido abrir el archivo users.txt");
        } 
    }
    else{ //If file not created throw exception
        throw new Exception("Archivo de usuarios no creado");
    }
    return $arrayUser; //Return arrayofUser
}

/**
* Function for return all categories in categories.txt
* @param $arrayCategories - Empty array to save all categories
* @param $filepath - Path of the file categories.txt
* @param $handle - Save the file categories.txt
* @param $line - Save a line of $handle
* @return $arrayCategories - Return array with all categories in categories.txt
**/
function findAllCategories(): array {
    $arrayCategories = []; //Create empty array
    $filepath = "files/categories.txt"; //Path of categories.txt
    if(file_exists($filepath)){ //Check if path exists
        $handle=fopen($filepath,'r'); //r,w,x,r+,w+...
        if($handle){ //If fopen open path succesfully,enter if
            fgets($handle); //Remove header from file
            while(!feof($handle)){ //while doesn't stop until it finishes reading the file
                $line = trim(fgets($handle)); //Get line
                array_push($arrayCategories, $line); //Add at the end of array push a category
            }
            fclose($handle); //Close handle
        }
        else{ //If cant open file throw exception
            throw new Exception("No se a podido abrir el archivo categories.txt");
        } 
    }
    else{ //If file not created throw exception
        throw new Exception("Archivo de categorias no creado");
    }
    return $arrayCategories;
}

/**
* Function for return a array with all dishes with specific category
* @param $indexArrayMenu - Index for the know the position for $arraymenu
* @param $arrayMenu - Empty array to save dishes with specific category
* @param $filepath - Path of the file menu.txt
* @param $handle - Save the file menu.txt
* @param $line - Save a line of $handle
* @return $arrayMenu - Return array with all dishes with specific category;
**/
function findMenuDishByCategory(string $category): array {
    $indexArrayMenu = 0; //Index for arrayMenu
    $arrayMenu = []; //Create empty array
    $filepath = "files/menu.txt"; //Path of categories.txt
    if(file_exists($filepath)){ //Check if path exists
        $handle=fopen($filepath,'r'); //r,w,x,r+,w+...
        if($handle){ //If fopen open path succesfully,enter if
            fgets($handle); //Remove header from file
            while(!feof($handle)){ //while doesn't stop until it finishes reading the file
                $line = trim(fgets($handle)); //Get line
                $menu = explode(";",$line); //Create Array of user with ";" separator for elements
                if($menu[1] == $category){//If categroy of the array of product equals category, add the product to array menu
                    $arrayMenu[$indexArrayMenu] = $menu; //Add the into the menu array the array of the product
                    $indexArrayMenu = $indexArrayMenu + 1;
                }
            }
            fclose($handle); //Close handle
        }
        else{ //If cant open file throw exception
            throw new Exception("No se a podido abrir el archivo menu.txt");
        } 
    }
    else{ //If file not created throw exception
        throw new Exception("Archivo de menu no creado");
    }
    return $arrayMenu;
}

/**
* Function for return a array with all dishes with specific category
* @param $indexArrayMenu - Index for the know the position for $arrayDayMenu
* @param $arrayDayMenu - Empty array to save dishes with specific category in dayMenu
* @param $filepath - Path of the file daymenu.txt
* @param $handle - Save the file daymenu.txt
* @param $line - Save a line of $handle
* @return $arrayDayMenu - Return array with all dishes with specific category in dayMenu;
**/
function findDayMenuByCategory(string $category): array {
    $indexArrayMenu = 0; //Index for arrayMenu
    $arrayDayMenu = []; //Create empty array
    $filepath = "files/daymenu.txt"; //Path of categories.txt
    if(file_exists($filepath)){ //Check if path exists
        $handle=fopen($filepath,'r'); //r,w,x,r+,w+...
        if($handle){ //If fopen open path succesfully,enter if
            fgets($handle); //Remove header from file
            while(!feof($handle)){ //while doesn't stop until it finishes reading the file
                $line = trim(fgets($handle)); //Get line
                $daymenu = explode(";",$line); //Array of user
                if($daymenu[1] == $category){//If categroy of the array of product equals category, add the product to arraydaymenu
                    $arrayDayMenu[$indexArrayMenu] = $daymenu; //Add the into the daymenu array the array of the product
                    $indexArrayMenu = $indexArrayMenu + 1;
                }
            }
            fclose($handle); //Close handle
        }
        else{ //If cant open file throw exception
            throw new Exception("No se a podido abrir el archivo daymenu.txt");
        } 
    }
    else{ //If file not created throw exception
        throw new Exception("Archivo de daymenu no creado");
    }
    return $arrayDayMenu;
}
?>