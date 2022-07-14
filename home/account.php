<html lang="en">
    <head>
        <title>Waqar noble pharmacy</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/realeases/v5.8.1/css/all.css">
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="image/favicon.PNG" sizes="16x16" type="image/png">
        <link rel="stylesheet" href="mobile-style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .logo1 {
                width:15%;
            }
            .jumbotron-fluid1{
                position:fixed;
                top:15%;
                bottom:50%;
                background-color:red;
                overflow:hidden;
                right: 16px;
                font-size: 8px;
                width:150px;
                height:130px;
                z-index:3;
            }
            .containermixed {
                margin:5px 5px auto;
            }
            .btnspeak{
                text-decoration:none;
                border-radius:30px;
                text-align:center;
                margin-left:35%;
                margin-right:50%;
            }
            #voicelist{
                width:130px;
                height:25px;
            }
            #txtinput{
                width:130px;
                height:50px;
                top:5px;
            }
        @media only screen and (max-width: 760px),
  (min-device-width: 768px) and (max-device-width: 1024px)  {

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}
	
	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
	}
	.nav-link{
	    right:100%;
	}
	</style>
    </head>
  
    <body>
    <?php 
error_reporting(0);
require_once("config.php");
if(!isset($_SESSION["login_sess"])){
    header("location:login.php");
}
$email=$_SESSION["login_email"];
$findresult = mysqli_query($dbc, "SELECT * FROM users WHERE email='$email'");
if($res = mysqli_fetch_array($findresult)){
    $username = $res['username'];
    $fname = $res['fname'];
    $lname = $res['lname'];
    $email = $res['email'];
}


   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
   
   include("config.php");

if(isset($_POST['but_upload'])){
 
  $name = $_FILES['file']['name'];
  $target_dir = "upload/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
     // Upload file
     if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)){
        // Insert record
        $query = "insert into images(name) values('".$name."')";
        mysqli_query($con,$query);
     }

  }
 
}
?>
        <header>
      <nav class="navbar">
        <a class="navbar-brand" href="#"><img src="logo.JPG" alt="waqar logo" class="logo1"></a>
                <class="nav-item">
                    <a class="nav-link" href="home.html">Home</a>
        </div>
    </nav>

    <div class="container text-center">
        <div class="row">
            <div class="col-md-7">
                <h1 id="ben">Waqar noble pharmacy</h1>
                <p>Your Satisfaction is my best priority.</p>
                <button class="btn btn-light px-5 py-2">Learn more</button>
            </div>
        </div>
    </div>
    </header>
    
    <div class="logo-img" style="text-align:center; padding-top:10vmin; padding-bottom:5vmin;">
        <img src="image/logo.JPG" alt="waqar pharmacy" class="logo"></div>
    <div class="container">
    <form action="login_process.php" method="POST" style="background:blue;">
        <div class="jumbotron">
                <div class="card-body">
                    <h5 class="card-title"><p style="color:blue; font-size:30px;">WELCOME! <span style="color:blue; font-size:25px;"><?php echo $username; ?></span></p></h5>
                    <table class="table table-dark table-hover" style="text-align:center;">
                        <thead>
                            <tr>
                                <th>
                                    <th scope="col">#</th>
                                    <th scope="col">My details</th>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>1</th>
                                <td>First Name</td>
                                <td><?php echo $fname; ?></td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>Last name</td>
                                <td><?php echo $lname;?></td>
                            </tr>
                            <tr>
                                <th>3</th>
                                <td>Username</td>
                                <td><?php echo $username;?></td>
                            </tr>
                            <tr>
                                <th>4</th>
                                <td>Email</td>
                                <td><?php echo $email;?></td>
                            </tr>
                        </tbody>
                    </table>
            </div>
        </div>
        <div class="col-md-6">
                        <a href="home.html"><span style="color:white; float:right; font-size:25px; cursor:pointer;">Go to site</span></a>
                        <a href="logout.php"><span style="color:white; font-size:25px; cursor:pointer;">Logout</span></a>
                        </div>
                    </div>
                </form>
    </div>
            <div class="col-md-12">
            <form action = "" method = "POST" enctype = "multipart/form-data" 
            style="text-align:center; background:red;">
            <h3 style="color:white;">Any previous precription given by the doctor? If yes, Upload it.</h3>
         <div class="input">
            <input type = 'file' name = 'file' 
            style=" display: inline-block; cursor: pointer;"/>
         <input type = 'submit' name='but_upload' id = "submit" value='save name' class="btn btn-primary"/>
        </div>
         <ul style="list-style-type: none; margin: 0; padding: 0;">
            <li>Sent file: <?php echo $_FILES['file']['name'];  ?>
            <li>File size: <?php echo $_FILES['file']['size'];  ?>
            <li>File type: <?php echo $_FILES['file']['type'] ?>
         </ul>
      </form>
            </div>
        </div>
    </div>
    
    <footer class="footer">
        <div class="container-fluid p-0">
            <div class="row text-left">
                <div class="col-md-5 col-md-5">
                    <h1 class="footer-header">About us</h1>
                    <p class="text-muted">Waqar pharrmacy is a telehealth company that digitizes Pharmacare, using technology to make health care services accessible, and allowing us to remotely manage our patient’s healthcare. </p>
                    <p class="pt-4 text-muted"> We have a large pool of well-trained pharmacists and health professionals who are available on dial to counsel any of our customers without any hassle. </p>
                </div>
                <div class="col-md-5">
                    <h1>WHY US</h1>
                    <p class="text-muted">
                        <ol>
                            <li>Variety of Products - Find products and prescriptions by just a single click</li>
                            <li>Affordable Health Items - We offer a wide array of drugs and quality health products that are cost effective</li>
                        </ol>
                    </p>
                </div>
                <div class="col-md-2 col-sm-12">
                    <h4>FOLLOW US</h4>
                    <p class="text-muted">let us be social</p>
                    <div class="column">
                        <div class="social">
                        <!-- Facebook -->
                            <a class="btn btn-primary" style="background-color: #3b5998;" href="#!" role="button"
                              ><i class="fa fa-facebook-f"></i
                            ></a>

                            <!-- Twitter -->
                            <a class="btn btn-primary" style="background-color: #55acee;" href="#!" role="button"
                              ><i class="fa fa-twitter"></i
                            ></a>

                            <!-- Google -->
                            <a class="btn btn-primary" style="background-color: #dd4b39;" href="#!" role="button"
                              ><i class="fa fa-google"></i
                            ></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
        <div class="jumbotron-fluid1">
        <div class="containermixed">
        <h6> Select Voice: </h6> <select id='voiceList'></select><br>

    <input id='txtInput' /><br>
    <button id='btnSpeak' class="btnspeak">Speak!</button>
    </div>
    </div>
    <script>
        var txtInput = document.querySelector('#txtInput');
        var voiceList = document.querySelector('#voiceList');
        var btnSpeak = document.querySelector('#btnSpeak');
        var synth = window.speechSynthesis;
        var voices = [];

        PopulateVoices();
        if(speechSynthesis !== undefined){
            speechSynthesis.onvoiceschanged = PopulateVoices;
        }

        btnSpeak.addEventListener('click', ()=> {
            var toSpeak = new SpeechSynthesisUtterance(txtInput.value);
            var selectedVoiceName = voiceList.selectedOptions[0].getAttribute('data-name');
            voices.forEach((voice)=>{
                if(voice.name === selectedVoiceName){
                    toSpeak.voice = voice;
                }
            });
            synth.speak(toSpeak);
        });

        function PopulateVoices(){
            voices = synth.getVoices();
            var selectedIndex = voiceList.selectedIndex < 0 ? 0 : voiceList.selectedIndex;
            voiceList.innerHTML = '';
            voices.forEach((voice)=>{
                var listItem = document.createElement('option');
                listItem.textContent = voice.name;
                listItem.setAttribute('data-lang', voice.lang);
                listItem.setAttribute('data-name', voice.name);
                voiceList.appendChild(listItem);
            });

            voiceList.selectedIndex = selectedIndex;
        }
    </script>
        <script src="home/jquery/jquery-3.5.1.min.js"></script>
        <script src="home/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>