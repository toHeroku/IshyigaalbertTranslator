
<!DOCTYPE html>
<html>
<head>

	<title>ISHYIGA TRANSLATION OF WORDS</title>
	<style >
            .title {
  color: #eee;
  font-family: sans-serif;
  font-size: 36px;
  font-weight: 600;
  margin-top: 30px;
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

		th{  font-size: 2em;
  border-left: 5px solid dodgerblue;
  padding: 10px;
  color: #000;
  letter-spacing: 5px;
  margin-bottom: 60px;
  font-weight: bold;
  padding-left: 10px;
	
		}
                .table1{
                    background-color: white;
                }

                h1{
                    font-size: 2em;
  border-left: 5px solid dodgerblue;
  padding: 10px;
  color: #000;
  letter-spacing: 5px;
  margin-bottom: 60px;
  font-weight: bold;
  padding-left: 10px;
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
p{
	color: black;
	font-family: verdana;
	 font-size: 25px;
}
a{
    text-decoration: none;
    color: black;
    font-size: 15px;
    }
	</style>
	<link rel="shortcut icon"  href="icon.jfif">
</head>
<body>
	<center>
<table width="100%" cellspacing="20" border="0">
<tr>
    <td class="home"><a href="index.php">Home</a></td><td></td>
    <td class="newword" style=""><a href="newdata.php">Insert  New Word</a> </td>
  </tr>
  </table>
	<p >ISHYIGA TRANSLATION OF WORDS</p>
	 
		<form method="post">
			
       
                    <div class="table1" width="100" height="100" cellspacing="100" border="0">
				<tr ><td colspan="2"><h1 center;> Translation Panel</h1></tr>
	<tr>			
	
	<td><!-- <select name="status" id="status" onchange="sayIt()">
				<option name="gura">V_Gura</option>
				<option name="tuma">V_Rangura</option>
				<option name="rangura">V_Gurisha</option>
				<option name="Gurisha">V_Tuma</option>
				
			</select> -->
                <select name="word" id="val" style="background:#deecf6">
                             <option value="0"> <b>Select Variable of Word </b></option>
    <?php
        include "conn.php";  // Using database connection file here
        $records = mysqli_query($db, "SELECT * From indimi");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['id'] ."'>" .$data['variable'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
			</td>
			<td>To be translated to :</td>
			<td>
				<select name="status"style="background:#deecf6">
			    <option value="0"> Select language </option>
				<option value="1">Kinyarwanda</option>
				<option value="2">French</option>
				<option value="3">English</option>
				<option value="4">Swahili</option>
				
			</select></td>
			<td>
                            </br></br><button name="translate" style="color: black;border-color: white;border-style:dashed;padding: 12px;background-color: dodgerblue;">Translate</button>
                   </td>
     </tr>
     <tr>
		 <?php 
		 $result=[];
		 if(isset($_POST['translate']))
		 {	
			$result[0] = " ";
			 $language = $_POST['status'];
			 $word = $_POST['word'];
			 if(($language == 0) || ($word == 0))
			 {
				 $result[0] = "choose valid data";

			 }
			 else {
				 
				$query_select_indimi= mysqli_query($db, "SELECT * FROM indimi where id='$word'");
				if(mysqli_num_rows($query_select_indimi) > 0)
				{
					$result[0] = "one element found";

					$data_re = $query_select_indimi->fetch_array();

			if($language == 1)
			{
				$result[0] = $data_re['kinyarwanda'];
			}
			else if ($language == 2)
			{
				$result[0] = $data_re['french'];
			}	else if ($language == 3)
			{
				$result[0] = $data_re['english'];
			}	else if ($language == 4)
			{
				$result[0] = $data_re['swahili'];
			}
			else{
				$result[0]="couldn't find";
			}
				}
				else{
					$result[0] = "no element found";
				}

			 }

			
	
				
			

		
?> 
         <td><big><br>RESULT IS:  </br></big></td><td><label></label><br><?php echo $result[0];?></br></td><?php
		 }

		 
		 ?>
   
    
     </tr>

          
                   
     </table></div>
                   
<!-- <label name="selected" id="selected">hjjfj</label>
 <script>
 function sayIt(){
	const variable=document.getElementById("status").value;
	document.getElementsByName("selected").value=variable;
	return variable;
}

// </script>-->
<br><br><br><br><big>Algorithm Inc.2022 </big></br></br></br></br>
<br><img src="copyright.png"width="45" height="40"></br>
</center>
</body>


</html>			


