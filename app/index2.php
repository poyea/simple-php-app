<html>
   <head>
      <title>WRITE AND READ FORM</title>
   </head>
   <body>
      <h1>Ops DEMO (<font color="red">With</font> persistent volume)</h1>
      <a href="index.php">switch to normal</a>
      <p>WRITE</p>
      <form action="index2.php?set=true" method="POST">
         <input name="field1" type="text" style="line-height: 5em;" />
         <input type="submit" name="submit" value="Save Data">
      </form>
      <br />
      <p>READ</p>
      <form action="index2.php?get=true" method="POST">
         <input type="submit" name="get" value="Get Data">
      </form>
   </body>
   <?php
      function runWrite(){
              if(isset($_POST['field1'])){
                      $data = $_POST['field1'] . "\r\n";
                      $ret = file_put_contents('mnt/saved.txt', $data, FILE_APPEND | LOCK_EX);
                      if($ret === false){
                              die('There was an error writing this file');
                      }
                      else{
                              echo "$ret bytes written to file<br/>";
                      }
              }
              else{
                      die('no post data to process');
              }
      }
      
      if (isset($_GET['set'])){
              runWrite();
      }
      
      
      function runRead(){
              ob_end_clean();
              echo "<br/>";
              $file = new SplFileObject('mnt/saved.txt');
              while (!$file->eof()) {
                      echo $file->fgets();
                      echo "<br/>";
              }
              $file = null;
              echo "<br/>";
      }
      
      if (isset($_GET['get'])){
              runRead();
      }
      ?>
</html>
