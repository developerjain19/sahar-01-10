<?php
function sendmail($company ,$username, $password)
{

 return '
  <html>

<body style="box-sizing: border-box; background: #ffffff;
background: linear-gradient(to bottom, #ffffff 0%,#e1e8ed 100%); height: 100%; margin: 0; background-repeat: no-repeat; background-attachment: fixed;
        background: url(backgroundimg.jpg);">

    <div class=content style=" @media (min-width:600px) {
    max-width: 100%;
      margin: 0 auto;
    }">
        <div class="wrapper-1" style="width: 100%;
    // height: 120vh;
    display: flex;
    flex-direction: column;
    background: #ffffff;
    background: linear-gradient(to bottom, #ffffff 0%, #e1e8ed 100%);
    box-shadow: 4px 8px 40px 8px rgba(88, 146, 255, 0.2);
    height: initial;
        max-width: 100%;
        margin: 0 auto;
        margin-top: 50px;
  ">

            <div class="wrapper-2" style="padding: 30px;
      text-align: justify; background: #ffffff;
    background: linear-gradient(to bottom, #ffffff 0%, #e1e8ed 100%);">

              
                <h1 style="font-family: Kaushan Script;
        font-size: 3.5rem;
        letter-spacing: 3px;
        color: #005b6a;
        margin: 0;
        margin-bottom: 30px;
        text-align: center;  @media (min-width:360px) {
       font-size: 3.5rem;
      }">Thank you !</h1>
                <br>
                <p style="margin: 0;
        font-size: 1.3em;
        color: rgb(80, 79, 79);
        font-family: Source Sans Pro;
        letter-spacing: 1px;">नमस्ते ' . $company . '!
  हम आपका हमारी Sahar Directory परिवार में दिल से स्वागत करते है ! Sahar Directory एक free plateform है जो आपको अपनी डिजिटल पहचान बनाने में मदद करता है। और हम जानते हैं कि आज की दुनिया में हमारे लिए डिजिटल रूप से मजबूत होना कितना महत्वपूर्ण है। और हम आपको पूरी तरह से मुफ्त में डिजिटल रूप से मजबूत बनने में मदद करते हैं। यहां आप अपनी वेबसाइट और डिजिटल विजिटिंग कार्ड बिल्कुल मुफ्त प्राप्त कर सकते हैं। तो तैयार हो जाइए खुद को एक डिजिटल पहचान देने और अपने लक्ष्यों तक पहुंचने के लिए। आप अपने बिज़नेस को फ्री में लिस्ट कीजिये हमारे साथ और बनाइये अपनी एक डिजिटल पहचान ताकि जयादा से जयादा लोगो तक आपकी पहुंच हो सके और आपका बिज़नेस तरक्की करे !
  निचे आपके अकाउंट की जानकारी शेयर की जा रही है :
   <br>
  Login Url :<span style=" color: #ffa800;
          font-weight: 700;"> '.base_url().'login. </span><br>
                  
  Your  Username is  - <span style=" color: #ffa800;
          font-weight: 700;">'.$username.'</span> <br>
  Your  Password is  - <span style=" color: #ffa800;
          font-weight: 700;">'.$password.'</span> <br>
                </p>
                <p>   अगर आप डेमो देखना चाहते है की हम आपको क्या दे रहे है तो आप निचे दिए लिंक पर क्लिक कीजिये :
  http://sahardirectory.com/sahar/rewari/information-tech/sahardirectory
  हम आपको निचे दिए गए लिंक में वीडियो के माध्यम से भी बताना चाहेंगे की आप कैसे अपने अकाउंट को setup कर सकते है !
  ........(youtube.com )..........
  अगर आप को अभी भी कोई भी समस्या आ रही है अपने अकाउंट से सम्बंधित तो आप हमें हमारे निचे दिए गए Social Media के links के माध्यम से सम्पर्क कर सकते है</p>
                
                
                <br> <br>
                <div class="go-home" style="
        display: block !important;
        margin: 30px 0; @media (min-width:360px) {
      
        margin-bottom: 20px;
        margin-top: 30px;
     
    }">
                 
                </div>
            </div>
            <div class="footer-like" style=" margin-top: auto;
      background: #D7E6FE;
      padding: 6px;
      text-align: center;">
                <p style="margin: 0;
        padding: 4px;
        color: #5892FF;
        font-family: Source Sans Pro;
        letter-spacing: 1px;"> <a href="'.base_url().'" style="text-decoration: none;
      color: #006573;
      font-weight: 600;">अगर आप को अभी भी कोई भी समस्या आ रही है अपने अकाउंट से सम्बंधित तो आप हमें हमारे निचे दिए गए Social Media के links के माध्यम से सम्पर्क कर सकते है
  <br>Facebook : https://www.facebook.com/sahardirectory
  <br>Instagram : https://www.instagram.com/sahardirectory
  <br>Linkedin : https://www.linkedin.com/SaharDirectory
  <br>Email : hello sahardirectorycom
  <br>Support No.: +91 7419272427
  <br>Thanks
  <br>Team Sahar Directory  </a>
                </p>
            </div>
        </div>
    </div>
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Source+Sans+Pro" rel="stylesheet">
</body>

</html>';
}


function checkoutmail($username)
{
    
     return '
  <html>

<body style="box-sizing: border-box; background: #ffffff;
background: linear-gradient(to bottom, #ffffff 0%,#e1e8ed 100%); height: 100%; margin: 0; background-repeat: no-repeat; background-attachment: fixed;
        background: url(backgroundimg.jpg);">

    <div class=content style=" @media (min-width:600px) {
    max-width: 1000px;
      margin: 0 auto;
    }">
        <div class="wrapper-1" style="width: 100%;
    height: 100vh;
    display: flex;
    flex-direction: column;
    background: #ffffff;
    background: linear-gradient(to bottom, #ffffff 0%, #e1e8ed 100%);
    box-shadow: 4px 8px 40px 8px rgba(88, 146, 255, 0.2);
    height: initial;
        max-width: 620px;
        margin: 0 auto;
        margin-top: 50px;
  ">

            <div class="wrapper-2" style="padding: 30px;
      text-align: justify; background: #ffffff;
    background: linear-gradient(to bottom, #ffffff 0%, #e1e8ed 100%);">

                <div style="display: block; text-align: center;">
                    <img src="'.base_url().'assets/logo.webp" alt="SaharDirectory " style="height: 50px;">
                </div>
                <h1 style="font-family: Kaushan Script;
        font-size: 3.5rem;
        letter-spacing: 3px;
        color: #005b6a;
        margin: 0;
        margin-bottom: 30px;
        text-align: center;  @media (min-width:360px) {
       font-size: 3.5rem;
      }">Thank you !</h1>
                <h6 style="margin: 0;
        font-size: 1.3em;
        color: rgb(80, 79, 79);
        font-family: Source Sans Pro;
        letter-spacing: 1px;">Hey '.$username.'! </h6><br>
                <p style="margin: 0;
        font-size: 1.3em;
        color: rgb(80, 79, 79);
        font-family: Source Sans Pro;
        letter-spacing: 1px;">
        
        
        We just Wanted to say Thanks for Being a Valued Customers<br>

          We Have Received Your Order. <br> Your Order ID is - <span style=" color: #ffa800;
          font-weight: 700;">'.rand(10,100).'</span> <br>

          Once Your Order Shiped,
          We will send you a message with a Tracking Number and Link to track it. <br>

          If you have any Questions, Drop us a note. We are here to help! 
                
                
                <br> <br>
                <div class="go-home" style="text-align: center !important;
        display: block !important;
        margin: 30px 0; @media (min-width:360px) {
      
        margin-bottom: 20px;
        margin-top: 30px;
     
    }">
                 
                </div>
            </div>
            <div class="footer-like" style=" margin-top: auto;
      background: #D7E6FE;
      padding: 6px;
      text-align: center;">
                <p style="margin: 0;
        padding: 4px;
        color: #5892FF;
        font-family: Source Sans Pro;
        letter-spacing: 1px;"> <a href="'.base_url().'" style="text-decoration: none;
      color: #006573;
      font-weight: 600;">SaharDirectory </a>
                </p>
            </div>
        </div>
    </div>
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Source+Sans+Pro" rel="stylesheet">
</body>

</html>';
}


