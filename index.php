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
        // print('Logged out!');
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



        // direktorijos,kurioje dirbama, nuskaitymas
        // $curdir=getcwd();
        // echo "$curdir <br><br>";

        print('<h2>Explorer content:</h2>');
        

        

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
                    <input type="hidden" name="delete" value="">
                    <input class="delete" type="submit" value="Delete" onclick="msg()">
                    </form>')
                 //DOWNLOAD BUTTON
                    . (is_dir($path . $file) ? '': 
                    '<form action="" method="post">
                    <input type="hidden" name="download" value="">
                    <input class="download" type="submit" value="Download">
                    </form>').
                    '</td>');

                print('</tr>');
            }
        }
        print('</table>');

    //DELETE FILES LOGIC
            $files = [''];
            
            foreach ($files as $file) {
                if (file_exists($file)) {
                    unlink($file);
                } else {
                    // File not found.
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
        
              
       
     
        
    
    //BACK BUTTON
  
       
        // $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
        // echo "<a class='back' href='$url'>Back</a>";
        ?>
        <a href = "javascript:history.back()">Back to previous page</a>
    
    <!-- CREATE DIRECTORY BUTTON -->
    
    <form action="/FsExplorerPHP" method="get">
        <input type="hidden" name="path" value="<?php print($_GET['path'])?>"> 
        <input placeholder="Name of new directory" type="text" name="createfolder">
        <button type="submit">Submit</button>
    </form>

</body>
<script>
    function msg() {
        alert("HEY!!! Stop clicking, It's not working yet!");
        alert("Ok, ok... It was a joke! File will be deleted by pressing 'OK' ");
    };
</script>
</html>