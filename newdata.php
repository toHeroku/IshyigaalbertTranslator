<!DOCTYPE html>
<html lang="en">
  
<head>
    <title>Storing words
       
      
   
    </title>
    
</head>
<style>
a{
    text-decoration: none;
    color: black;
    font-size: 15px;
    }
    .newword{
                     text-align: center;
   margin-top: 20px;
  background: #1DA1F2;
  height: 40px;
  border-radius: 20px;
  cursor: pointer;
  font-weight: 900;
  box-shadow: 6px 6px 6px #cbced1, -6px -6px 6px white;
  transition: 0.5s;

                }
                .home{
                    text-align: center;
   margin-top: 20px;
  background: #1DA1F2;
  height: 40px;
  border-radius: 20px;
  cursor: pointer;
  font-weight: 900;
  box-shadow: 6px 6px 6px #cbced1, -6px -6px 6px white;
  transition: 0.5s; 
                }
                		body {
   margin: 0;
  padding: 0;
  box-sizing: border-box;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
   background: linear-gradient(45deg, greenyellow, dodgerblue);
   font-family: "Sansita Swashed", cursive;
                }
    
</style>

<body>
    <center>
    <table width="100%" cellspacing="20" border="0">
<tr>
    <td class="home" style="background:#4daeeb"><a href="index.php">Home</a></td><td></td>
    <td class="newword"><a href="newdata.php">Insert new word</a> </td>
  </tr>
  </table>
        <h1>Save New variable ID </h1>
        <?php
include "conn.php"; // Using database connection file here

if(isset($_POST['submit']))
{       
    $variable = $_POST['variable'];
    $kinyarwanda= $_POST['kinyarwanda'];
        $french = $_POST['french'];
        $english= $_POST['english'];
        $swahili = $_POST['swahili'];
        

    $insert = mysqli_query($db,"INSERT INTO `indimi`(`variable`, `kinyarwanda`, `french`, `english`, `swahili`) 
    VALUES ('$variable','$kinyarwanda','$french','$english','$swahili')");

    if(!$insert)
    {
        echo mysqli_error();
    }
    else
    {
        echo "Records added successfully.";
    }
}

mysqli_close($db); // Close connection
?>
  
        <form  method="post">
              
              
<table bgcolor="white" width="50%" cellspacing="20" border="0">
               <tr> <td><label for="variable">Variable</label></td>
                <td><input type="text" name="variable" id="var"></td>
            </tr>
  
             <tr>
               <td> <label for="kinyarwanda">Kinyarwanda</label></td>
                <td><input type="text" name="kinyarwanda" id="kinya"></td>
            </tr>
  
  <tr>
               <td> <label for="french">French</label></td>
               <td> <input type="text" name="french" id="fre"></td>
            </tr>
  
  <tr>              
                 <td><label for="english">English</label></td>
               <td> <input type="text" name="english" id="eng"></td>
                  </tr>
               <tr>
                 <td><label for="swahili">Swahili</label></td>
             <td>   <input type="text" name="swahili" id="swah"></td>
            </tr>
   
           <tr>              
        <td></td><td><input type="submit" name="submit" value="Submit" style="color: black;border-color: white;border-style:dashed;padding: 12px;background-color: dodgerblue;"> </td></tr>
            </table>
        </form>
    </center>
</body>
  
</html>