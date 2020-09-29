<?php
    session_start();

    //LOGIN
    $msg = '';
    if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {	
       if ($_POST['username'] == 'Vikas' && $_POST['password'] == '123') {
          $_SESSION['logged_in'] = true;
          $_SESSION['username'] = 'Vikas';
       } else {
          $msg = 'Something wrong with username or password';
       }
    }

    // LOGOUT
    if(isset($_GET['action']) and $_GET['action'] == 'logout'){
        session_start();
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        unset($_SESSION['logged_in']);
        header("Location: index.php");
    }
    //DELETE FILES LOGIC
    
    if(isset($_POST['delete'])){
        $deleting = './' . $_GET["path"] . $_POST['delete']; 
        $deletingFiles = str_replace("&nbsp;", " ", htmlentities($deleting, null, 'utf-8'));
        if(is_file($deletingFiles)){
            if (file_exists($deletingFiles)) {
                unlink($deletingFiles);
            }
        }
    }
    //DIRECTORY CREATE LOGIC
        
            
        if(isset($_GET["createfolder"])){
            if($_GET["createfolder"] != ""){
                $creDir = './' . $_GET["path"] . $_GET["createfolder"];
                if (!is_dir($creDir)) mkdir($creDir, "0777", true); 
            }
            
            $url = preg_replace("/(&?|\??)createfolder=(.+)?/", "", $_SERVER["REQUEST_URI"]);
            header('Location: ' . urldecode($url));
        }

    //FILES TO DOWNLOAD LOGIC
    if(isset($_POST['download'])){
        $file='./' . $_GET["path"] . $_POST['download'];
        $download_file = str_replace("&nbsp;", " ", htmlentities($file, null, 'utf-8'));
        ob_clean();
        ob_start();
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename=' . basename($download_file));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($download_file));
        ob_end_flush();
        readfile($download_file);
        exit;
    }
    //FILES TO UPLOAD LOGIC
      
      if(isset($_FILES['fileupld'])){
        $errors= array();
        $file_name = $_FILES['fileupld']['name'];
        $file_size = $_FILES['fileupld']['size'];
        $file_tmp = $_FILES['fileupld']['tmp_name'];
        $file_type = $_FILES['fileupld']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['fileupld']['name'])));
        
        $extensions= array("png", "txt");
        
        if(in_array($file_ext , $extensions) === false){
           $errors[] = "extension not allowed, please choose  PNG or TXT file.";
        }
        
        if($file_size > 2097152) {
           $errors[] = 'File size must be below 2 MB';
        }
        
        if(empty($errors)==true) {
           move_uploaded_file($file_tmp, './' . $_GET["path"] . $file_name);
        }else{
            print('<br>');
            print_r($errors);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Files Explorer</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    
</style>
<body>
    <?php 
     if(!$_SESSION['logged_in'] == true){
        print('<h2 class="fas fa-lock">Enter Username and Password</h2>');
        print('<form class="login-box" action = "" method = "post">');
        print('<h4>'. $msg . '</h4>');
        print('<input class="textbox" type = "text" name = "username" placeholder = "username = Vikas" required autofocus></br>');
        print('<input class="textbox" type = "password" name = "password" placeholder = "password = 123" required>');
        print('<button class = "btn" type = "submit" name = "login">Login</button>');
        print('</form>');
        die();   
     }
        print('<h6 class="logbtn">Click here to <a  href = "index.php?action=logout"> logout.</h6>');

     
        print('<p class="exp">Explorer content:</p>');
        
        // PATH FIND WHERE'R FILES
            $path= './' . $_GET["path"];
            $files = scandir($path);

        print('<table><th>Type</th><th>Name</th><th>Actions</th>');
        foreach ($files as $file) {
            if (substr($file, 0, 1)!=='.') {
                print('<tr>');
                    print('<td>'. (is_dir($path . $file) ? "Dir" : "File") . '</td>');
                    print('<td>' . (is_dir($path . $file) 
                    ? '<a href="' . (isset($_GET['path']) 
                            ? $_SERVER['REQUEST_URI'] . $file . '/' 
                            : $_SERVER['REQUEST_URI'] . '?path=' . $file . '/') . '">' . $file . '</a>'
                    : $file). '</td>');    
                 //DELETE BUTTON
                    print('<td>'. (is_dir($path . $file) ? '': 
                    '<form action="" method="post">
                    <input type="hidden" name="delete" value='. str_replace(' ', '&nbsp;', $file) . '>
                    <input class="delete" type="submit" value="Delete" onclick="msg()">
                    </form>')
                 //DOWNLOAD BUTTON
                    . (is_dir($path . $file) ? '': 
                    '<form action="" method="post">
                    <input type="hidden" name="download" value='. str_replace(' ', '&nbsp;', $file) . '>
                    <input class="download" type="submit" value="Download">
                    </form>').
                    '</td>');

                print('</tr>');
            }
        }
        print('</table>');   
        
        ?>

    <!-- BACK BUTTON -->
        
        <a class='back' onclick="goBack()">Back </a>
        

    <!-- CREATE DIRECTORY BUTTON -->
    <form class="submitf"  action="<?php $path ?>" method="get">
        <input  type="hidden" name="path" value="<?php print($_GET['path'])?>"> 
        <input  placeholder="Name of new directory" type="text" name="createfolder">
        <button class= "subbtn" type="submit">Submit</button>
    </form>

    <!-- CREATE CHOOSE AND UPLOAD BUTTON -->
    
    <form class="choose" action="" method="post" enctype="multipart/form-data">
            <input type="file" name="fileupld" id="file">
            <button type="submit">Upload file</button>
            <p class="notification">Allows to use only PNG and TXT formats</p>
        </form>



</body>
<script>
    function goBack() {
        window.history.back();
    }
    function msg() {
        alert("HEY!!! Stop clicking, It's not working yet!");
        alert("Meh...It was a joke! File will be deleted by pressing 'OK' ");
    };
</script>
</html>
