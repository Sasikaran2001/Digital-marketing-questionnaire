<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tobranding</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link href="style.css" rel="stylesheet" />
  </head>
  <body>
    <?php
        require('data base/conn.php');
      ini_set('display_errors',0);
    session_start();
    if(isset($_POST['uname'])) {
    // general information start
      $username=stripcslashes($_REQUEST['uname']);
      $username=mysqli_real_escape_string($mysqli,$username);
      $business_name=stripcslashes($_REQUEST['bname']);
      $business_name=mysqli_real_escape_string($mysqli,$business_name);
      $email=stripcslashes($_REQUEST['email']);
      $email=mysqli_real_escape_string($mysqli,$email);
      $contact_number=stripcslashes($_REQUEST['phone']);
      $contact_number=mysqli_real_escape_string($mysqli,$contact_number);
      $address=stripcslashes($_REQUEST['address']);
      $address=mysqli_real_escape_string($mysqli,$address);
      date_default_timezone_set("Asia/kolkata");
      $trn_date=date("Y-m-d H:i:s");
      // general information end

            // Reply user's email start
            $company_mail="connect@zewoke.co.uk";
            $subject="Someone has approached us";
            $subject2="Your message was sent to ToBranding";
            $message="Hai,
            We've got your response. We appriciate your time spent in filling our questionnaire so that we can get to know your surface level needs. We'll shortly get back to you!";
            $message2="Name:". $username ." "."
            Number:" . $contact_number;
            $header="From: $email";
            $header2="From: $company_mail";
            $action= mail($company_mail, $subject,$message2,$header);
            $action2=mail($email,$subject2,$message,$header2);
      
            // Reply user's email end
      // site information start
      $describe_your_company_services=stripcslashes($_REQUEST['describe_your_company_services']);
      $describe_your_company_services=mysqli_real_escape_string($mysqli,$describe_your_company_services);
      $nature_of_your_business=stripcslashes($_REQUEST['nature_of_your_business']);
      $nature_of_your_business=mysqli_real_escape_string($mysqli,$nature_of_your_business);
      $target_customer_age=$_REQUEST['target_customer_age'];
      if(!$target_customer_age) {
       $target_customer_age1=null;
     }else{
      $target_customer_age1=implode(',',$target_customer_age);
      $target_customer_age1=mysqli_real_escape_string($mysqli,$target_customer_age1);
     }
      $your_company_goals=stripcslashes($_REQUEST['your_company_goals']);
      $your_company_goals=mysqli_real_escape_string($mysqli,$your_company_goals);
      $prefer_digital_marketing_services=$_REQUEST['prefer_digital_marketing_services'];
      if(!$prefer_digital_marketing_services) {
       $prefer_digital_marketing_services1=null;
     }else{
      $prefer_digital_marketing_services1=implode(',',$prefer_digital_marketing_services);
      $prefer_digital_marketing_services1=mysqli_real_escape_string($mysqli,$prefer_digital_marketing_services1);
     }
     $your_company_competitors=stripcslashes($_REQUEST['your_company_competitors']);
     $your_company_competitors=mysqli_real_escape_string($mysqli,$your_company_competitors);
      $company_advertising_platforms=$_REQUEST['company_advertising_platforms'];
      if(!$company_advertising_platforms) {
       $company_advertising_platforms1=null;
     }else{
      $company_advertising_platforms1=implode(',',$company_advertising_platforms);
      $company_advertising_platforms1=mysqli_real_escape_string($mysqli,$company_advertising_platforms1);
     }
     $company_website_platforms=$_REQUEST['company_website_platforms'];
     if(!$company_website_platforms) {
      $company_website_platforms1=null;
    }else{
     $company_website_platforms1=implode(',',$company_website_platforms);
     $company_website_platforms1=mysqli_real_escape_string($mysqli,$company_website_platforms1);
    }

      $breif_description_design=stripcslashes($_REQUEST['brief_description_design']);
      $breif_description_design=mysqli_real_escape_string($mysqli,$breif_description_design);
      // site information end


      $query="INSERT into `client_info`(username,business_name,email,contact_number,address,trn_date,describe_your_company_services,nature_of_your_business,target_customer_age,your_company_goals,prefer_digital_marketing_services,your_company_competitors,company_advertising_platforms,company_website_platforms,bries_description_plan) VALUES('$username','$business_name','$email','$contact_number','$address','$trn_date','$describe_your_company_services','$nature_of_your_business','$target_customer_age1','$your_company_goals','$prefer_digital_marketing_services1','$your_company_competitors','$company_advertising_platforms1','$company_website_platforms1','$breif_description_design')";
      $result=mysqli_query($mysqli,$query) or die (mysqli_error($mysqli));
      if($result) {
        ?><div class="d-flex justify-content-center mt-5">
        <div class='mt-5 px-5 text-center user-alert container-opacity py-5'><h2 id="demo" class=''></h2><a class="btn btn-outline-light border-3 fs-4" href="https://calendly.com/sujita-g/consulting ">Fix Your Oppointment</a></div></div>
<script>

var txt;
if (confirm("Want to talk more? Fix an oppointment with us!")) {
txt = "Thank you! We appriciate the time<br> you spent filling our form.";
} else {
txt = "Thank you! We appriciate the time<br> you spent filling our form.<br> You'll soon hear it back from us!";
}
document.getElementById("demo").innerHTML = txt;
</script>

<?php
}else{
echo"0";
}
}else{
      ?> 
    <section class="bg-top">
    <section class="container rounded-4 container-opacity px-5">
      <div class="d-flex justify-content-center flex-wrap py-4">
      <div class="display-5 fw-normal col-lg-6 col-12 text-start">Branding Questionnaire</div>
      <div class="col-lg-6 col-12 text-end pt-2"><img class="col-6" src="img/logo-3.png"></div>
      </div>
      
    <form action="" method="post" name="main-form">
        <div class="py-3">
          <!-- General questions start -->
          <section class="border-white border-bottom border-2 py-2">
            <div class="fs-2 fw-bold py-3">Genral Information</div>
            <!-- single question start -->
            <div class="py-2 row form-group fs-3">
                <div class="col-md-6 fw-normal"> <label for="uname">Name:</label></div>
                <div class="col-md-6 text-start"><input type="text" id="uname" name="uname" placeholder="Enter your name" required></div>
              </div>
              <!-- single question end -->

               <!-- single question start -->
              <div class="py-2 row form-group fs-3">
                <div class="col-md-6 fw-normal "><label for="bname">Business Name:</label></div>
                <div class="col-md-6 text-start"><input type="text" id="bname" name="bname" placeholder=""></div>
              </div>
              <!-- single question end -->

               <!-- single question start -->
              <div class="py-2 row form-group fs-3">
                <div class="col-md-6 fw-normal "><label for="phone">Contact Number:</label></div>
                <div class="col-md-6 text-start"><input type="number" id="phone" name="phone" placeholder="" required></div>
              </div>
              <!-- single question end -->

               <!-- single question start -->
              <div class="py-2 row form-group fs-3">
                <div class="col-md-6 fw-normal "><label for="email">Contact Email:</label></div>
                <div class="col-md-6 text-start"><input type="email" id="email" name="email" placeholder="" required></div>
              </div>
              <!-- single question end -->

               <!-- single question start -->
              <div class="py-2 row form-group fs-3">
                <div class="col-md-6 fw-normal "><label for="address">Address:</label></div>
                <div class="col-md-6 text-start"><textarea name="address" id="address" rows="4" cols="28"></textarea> </div>
              </div>
            </section>
            <!-- single question end -->
             <!-- General questions end -->
    <!-- Site questions start -->              
            <section class="border-2 border-bottom border-white py-3">
              <div class="fs-2 fw-bold py-3">Company Details</div>
               <!-- single question start -->
              <div class="py-2 row form-group fs-3">
                <div class="col-md-6 fw-normal"><label for="describe_your_company_services">Describe your company services and products</label></div>
                <div class="col-md-6 text-start"><textarea name="describe_your_company_services" id="describe_your_company_services" rows="3" cols="28"></textarea> </div>
              </div>
              <!-- single question end -->

               <!-- single question start -->
                <div class="py-2 row form-group fs-3">
                  <div class="col-md-6 fw-normal "><label for="nature_of_your_business">What is the nature of your business?</label></div>
                  <div class="col-md-6 text-start"><textarea name="nature_of_your_business" id="nature_of_your_business" rows="3" cols="28"></textarea> </div>  
                </div>
                <!-- single question end -->
                <!-- single question start -->
                <div class="py-2 row form-group fs-3 py-3">
                    <div class="col-md-6 fw-normal "><label for="target_customer_age">What was your target customer age group?
                    </label></div>
                    <div class="col-md-6 text-start form-group"><label class="input-radio">10-15 years of age
                      <input type="checkbox" name="target_customer_age[]" value="10-15 years of age">
                      <span class="checkmark"></span>
                    </label><br>
                    <label class="input-radio">15-23 years of age
                      <input type="checkbox" name="target_customer_age[]" value="10-15 years of age">
                      <span class="checkmark"></span>
                    </label><br>
                  </label>
                  <label class="input-radio">23-35 years of age
                    <input type="checkbox" name="target_customer_age[]" value="10-15 years of age">
                    <span class="checkmark"></span>
                  </label><br>
                  <label class="input-radio">35-50 years of age
                    <input type="checkbox" name="target_customer_age[]" value="10-15 years of age">
                    <span class="checkmark"></span>
                  </label><br>
                  <label class="input-radio">50-70 years of age
                    <input type="checkbox" name="target_customer_age[]" value="10-15 years of age">
                    <span class="checkmark"></span>
                  </label><br>
                  <label class="input-radio">70 years of age and above
                    <input type="checkbox" name="target_customer_age[]" value="70 years of age and above">
                    <span class="checkmark"></span>
                  </label>
    </div>
              </div>
              <!-- single question end -->
                              <!-- single question start -->
                              <div class="py-2 row form-group fs-3">
                  <div class="col-md-6 fw-normal "><label for="your_company_goals">What are your company's goals?</label></div>
                  <div class="col-md-6 text-start"><textarea name="your_company_goals" id="your_company_goals" rows="3" cols="28"></textarea> </div>  
                </div>
                <!-- single question end -->
                               <!-- single question start -->
                               <div class="py-2 row form-group fs-3 py-3">
                    <div class="col-md-6 fw-normal "><label for="prefer_digital_marketing_services">Which of these digital marketing services do you prefer?
                    </label></div>
                    <div class="col-md-6 text-start form-group"><label class="input-radio">Social media marketing
                      <input type="checkbox" name="prefer_digital_marketing_services[]" value="Social media marketing">
                      <span class="checkmark"></span>
                    </label><br>
                    <label class="input-radio">Search Engine optimization
                      <input type="checkbox" name="prefer_digital_marketing_services[]" value="Search Engine optimization">
                      <span class="checkmark"></span>
                    </label><br>
                  </label>
                  <label class="input-radio">Influencer marketing
                    <input type="checkbox" name="prefer_digital_marketing_services[]" value="Influencer marketing">
                    <span class="checkmark"></span>
                  </label>
                  <label class="input-radio">Content marketing
                    <input type="checkbox" name="prefer_digital_marketing_services[]" value="Content marketing">
                    <span class="checkmark"></span>
                  </label>
                  <label class="input-radio">Inbound marketing
                    <input type="checkbox" name="prefer_digital_marketing_services[]" value="Inbound marketing">
                    <span class="checkmark"></span>
                  </label>
                  <label class="input-radio">Outbound marketing
                    <input type="checkbox" name="prefer_digital_marketing_services[]" value="Outbound marketing">
                    <span class="checkmark"></span>
                  </label>
                  <label class="input-radio">Affilate marketing
                    <input type="checkbox" name="prefer_digital_marketing_services[]" value="Affilate marketing">
                    <span class="checkmark"></span>
                  </label>
                  <label class="input-radio">Mobile marketing
                    <input type="checkbox" name="prefer_digital_marketing_services[]" value="Mobile marketing">
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
              <!-- single question end -->
                 <!-- single question start -->
                <div class="py-2 row form-group fs-3">
                  <div class="col-md-6 fw-normal "><label for="your_company_competitors">Can you name some of your company's competitors</label></div>
                  <div class="col-md-6 text-start"><input type="text" id="your_company_competitors" name="your_company_competitors" placeholder=""></div>
                </div>
                <!-- single question end -->
               <!-- single question start -->
               <div class="py-2 row form-group fs-3 py-3">
                    <div class="col-md-6 fw-normal "><label for="company_advertising_platforms">What are your company's advertising platforms?
                    </label></div>
                    <div class="col-md-6 text-start form-group"><label class="input-radio">You tube
                      <input type="checkbox" name="company_advertising_platforms[]" value="You tube">
                      <span class="checkmark"></span>
                    </label>
                    <label class="input-radio">Face book
                      <input type="checkbox" name="company_advertising_platforms[]" value="Face book">
                      <span class="checkmark"></span>
                    </label>
                  </label>
                  <label class="input-radio">Instagram
                    <input type="checkbox" name="company_advertising_platforms[]" value="Instagram">
                    <span class="checkmark"></span>
                  </label>
                  <label class="input-radio">Twitter
                    <input type="checkbox" name="company_advertising_platforms[]" value="Twitter">
                    <span class="checkmark"></span>
                  </label>
                  <label class="input-radio">LinkedIn
                    <input type="checkbox" name="company_advertising_platforms[]" value="LinkedIn">
                    <span class="checkmark"></span>
                  </label>
                  <label class="input-radio">Others
                    <input type="checkbox" name="company_advertising_platforms[]" value="Others">
                    <span class="checkmark"></span>
                  </label>
    </div>
              </div>
              <!-- single question end -->               <!-- single question start -->
               <div class="py-2 row form-group fs-3 py-3">
                    <div class="col-md-6 fw-normal "><label for="company_website_platforms">What was your company website platform?
                    </label></div>
                    <div class="col-md-6 text-start form-group"><label class="input-radio">Wordpress
                      <input type="checkbox" name="company_website_platforms[]" value="Wordpress">
                      <span class="checkmark"></span>
                    </label>
                    <label class="input-radio">Web.com
                      <input type="checkbox" name="company_website_platforms[]" value="Web.com">
                      <span class="checkmark"></span>
                    </label>
                  </label>
                  <label class="input-radio">Square space
                    <input type="checkbox" name="company_website_platforms[]" value="Square space">
                    <span class="checkmark"></span>
                  </label>
                  <label class="input-radio">Blue host
                    <input type="checkbox" name="company_website_platforms[]" value="Blue host">
                    <span class="checkmark"></span>
                  </label>
                  <label class="input-radio">Big commerce
                    <input type="checkbox" name="company_website_platforms[]" value="LinkedIn">
                    <span class="checkmark"></span>
                  </label>
                  <label class="input-radio">Not sure
                    <input type="checkbox" name="company_website_platforms[]" value="Not sure">
                    <span class="checkmark"></span>
                  </label>
    </div>
              </div>
              <!-- single question end -->
                 <!-- single question start -->
                 <div class="py-2 row form-group fs-3">
                  <div class="col-md-6 fw-normal "><label for="brief_description_design">Please give a brief description of the plan you have in mind and any other information that would be useful.</label></div>
                  <div class="col-md-6 text-start"><textarea name="brief_description_design" id="brief_description_design" rows="3" cols="28"></textarea> </div>
                </div>
              <!-- single question end -->
  
   <!-- Site questions end -->  
            </section>

              <div class="text-center my-3"> <button class=" btn btn-outline-light border-3 fs-3" type="submit" name="submit" value="Submit">Submit</button></div>
          </div>
      </form>
                </section>
      <?php $mysqli -> close(); } ?>
    
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
