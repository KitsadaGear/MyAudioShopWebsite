<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src = js/function.js></script>
    <title>Audio Shop</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/privacy-style.css">
    
</head>
<body>

    <div class="menubar">
      <a class = menubar_logo>Audio Shop</a>  
      <div class = "menubar-left">
        <a class="home" href="home.php">Home</a>
        <a class = "news" href="news.php">News</a>
          <div class="dropdown">
            <button class="dropbtn">Product
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <a href="mic.php">Microphone</a>
              <a href="#">Speaker</a>
              <a href="#">Power Mix</a>
              <a href="#">Other</a>
            </div>
          </div>
          <div class="dropdown">
            <button class="dropbtn">Transaction
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <a href="#">Deposit Payment</a>
              <a href="#">Full Payment</a>
              <a href="#">Delivery</a>
              <a href="#">Installation work</a>
            </div>
          </div>  
            <a class = "about"href="about.php">About us</a>
            <a class = "contact" href="contact.php">Contact</a>
        </div>
        <div class = "menubar-right">
          <a onclick="document.getElementById('id01').style.display='block'">Login</a>  
          <a onclick="document.getElementById('id02').style.display='block'">Register</a>  
        </div>
     </div>

  <!-- The Modal -->
  <div id="id01" class="modal">
      <!-- Modal Content -->
    <form class="modal-content animate" action="/action_page.php">
      <div class="imgcontainer">
        <span onclick="document.getElementById('id01').style.display='none'"
      class="close" title="Close Modal">&times;</span>
        <img src="img/empty.png" alt="Avatar" class="avatar">
      </div>
  
      <div class="containers">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required id = "myPassword">
        <input type="checkbox" onclick="showLoginPassword()">Show Password
        
        <button type="submit">Login</button>
        <label><input type="checkbox" checked="checked" name="remember"> Remember me</label>
        <div class="container_login" style="background-color:#f1f1f1">
         <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
         <span class="psw">Forgot <a href="forget.php">password?</a></span>
        </div>
      </div>
    </form>

    <script>
      // Get the modal
      var modal = document.getElementById('id01');
      
      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
          if (event.target == modal) {
              modal.style.display = "none";
          }
      }
    </script>


  </div> 
 

  <!-- The Modal -->
<div id="id02" class="modal2">
  <script>
    // Get the modal
    var modal = document.getElementById('id02');
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
  </script>
  <!-- Modal Content -->
  <form class="modal-content animate2" onSubmit = "return checkPassword(this)" >
    <div class="imgcontainer2">
      <span onclick="document.getElementById('id02').style.display='none'"
      class="close2" title="Close Modal">&times;</span>
      <img src="img/empty.png" alt="Avatar" class="avatar2">
    </div>

    <div class="containers2">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required autocomplete="off">
      
      <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
            title="Wrong E-mail pattern" autocomplete="off" required>

            <label for="phone"><b>Phone Number</b></label>
            <input type="text" placeholder="Enter Phone Number" name="phone" pattern=".{8,}"
            title = "Wrong Phone Number pattern" autocomplete="off" required>
        
            <label for="psw2"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw-regis" id = "myRegisPassword" pattern= "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" autocomplete="off" required>
        
            <label for="psw-repeat"><b>Confirm Password</b></label>
            <input type="password" placeholder="Confirm Password" name="psw-confirmed" id = "myRepeatPassword" autocomplete="off" required>

            <input type="checkbox" onclick="showRegisPassword()">Show Password
            <input type="checkbox" onclick="showRepeatPassword()" id = "Confirm_password">Show Confirm-Password
            <input type="file" id="myFile" name="filename">
   
            <p>By creating an account you agree to our <a href="privacy.php">Terms & Privacy</a>.</p>

            <button type="submit" value="submit" >Register</button>

            <div class="container_signin" style="background-color:#f1f1f1">
              <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
              <span class="psw2">Already have an account? <a href="login.php">Sign in</a></span>
            </div>
          </div>
        </form>
    </div>

    <div class="clearfix"></div>

    <header class = "header">
      <div class = "header_area">
        <h1>Term & Policy</h1>
      </div>
    </header> 

    <div class="clearfix"></div>
    
      <div class = "info">
          <div class = "infomation">
            <h1>
              ข้อกำหนดและเงื่อนไข
            </h1>

            <p>
              - ตลอดเว็บไซต์นี้คำว่า "เรา", "ของเรา", "เว็บไซต์" หรือ "Audio Shop" หมายถึง เว็บไซต์ Audio Shop  ส่วนคำว่า "คุณ" หรือ "ท่าน" หมายถึง บุคคลหนึ่งบุคคลใดที่เข้าถึงเว็บไซต์นี้
            </p>

            <p>
              - ข้อกำหนดและเงื่อนไขฉบับนี้ใช้บังคับในเรื่องของการเข้ามามีส่วนร่วมของท่านในฐานะผู้เข้าถึงเว็บไซต์ "เมดไทย" โดยทางเราจะถือว่า ท่านได้ยอมรับข้อกำหนดและเงื่อนด้านล่างนี้แล้ว เมื่อท่านได้ใช้เข้าถึงผ่านทางเว็บไซต์ "เมดไทย"
            </p>

            <p>
              - โปรดทราบว่าทางเราจะใช้ความพยายามทุกวิถีทางเพื่อให้ข้อมูลในเว็บไซต์มีความถูกต้องและครบถ้วย แต่อย่างไรก็ตาม เราจะไม่รับผิดชอบหากข้อมูลที่เราจัดทำขึ้นไม่ถูกต้องหรือสมบูรณ์
            </p>

            <p>
              - ท่านจะต้องไม่กระทำการใด ๆ ที่ไม่เหมาะสม และ / หรือมีการกระทำที่ผิดกฏหมาย หรือเป็นสิ่งต้องห้ามตามกฎหมายในเว็บไซต์นี้ 
            </p>

            <p>
              - ขอบเขตอำนาจศาลและการบังใช้กฎหมาย ให้เป็นไปตามกฎหมายของประเทศไทย
            </p>

            <p>
              - ข้อมูลในเว็บไซต์นี้เป็นข้อมูลที่มีให้ "ตามสภาพเท่าที่เป็น" และ "เท่าที่มีอยู่" เท่านั้น ทางเว็บไซต์จึงไม่รับประกันใด ๆ ไม่ว่าจะเป็นการรับประกันโดยชัดแจ้ง โดยนัย หรือในทางกฎหมาย รวมไปถึงยังไม่รับประกันหรือรับรองว่าเนื้อหาในเว็บไซต์นี้จะสมบูรณ์ถูกต้องและเชื่อถือได้เป็นปัจจุบัน หรือไม่ละเมิดต่อบุคคลที่สาม หรือไม่รับประกันว่าหรือรับรองว่าท่านจะเข้าถึงเว็บไซต์นี้ได้อย่างปลอดภัยและตลอดเวลา
            </p>

            <p>
              - ลิงก์ในเว็บไซต์นี้ อาจนำท่านไปยังเว็บไซต์นอกเครือข่ายได้ ซึ่งทางเว็บไซต์จะไม่รับผิดชอบต่อความถูกต้องของเนื้อหา ความปลอดภัย หรือการทำงานของเว็บไซต์ของบุคคลที่สามได้ โปรดทราบว่าลิงก์ต่าง ๆ ที่มีจัดทำขึ้นด้วยความสุจริตใจ และทางเว็บไซต์จะไม่ขอรับผิดชอบต่อการเปลี่ยนแปลงใด ๆ ที่อาจตามมาในเว็บไซต์ของบุคคลที่สาม และลิงก์ต่าง ๆ ในเว็บไซต์ที่เชื่อมโยงไปยังเว็บไซต์อื่น ๆ ไม่ได้หมายถึงการให้การรับรองจากเว็บไซต์นี้ เราจึงขอให้ท่านอ่านเงื่อนไขและข้อตกลงการใช้ของเว็บไซต์อื่น ๆ ที่ท่านเข้าชมอย่างระมัดระวัง
            </p>

            <p>
              - เราขอสงวนสิทธิ์ในการจำกัด ระงับ หรือยกเลิกสิทธิของท่านในการเข้าถึงหรือการโพสต์ข้อความใด ๆ ในเว็บไซต์นี้ได้โดยไม่ต้องแจ้งให้ทราบ
            </p>

            <h2>
              ข้อปฏิเสธความรับผิด (Disclaimer Policy)
            </h2>

            <p>
              - ข้อมูลต่าง ๆ ในเว็บไซต์เมดไทย บางครั้งอาจไม่ถูกต้องและตรงกับความเป็นจริง หรือมีการสะกดตัวอักษรที่ผิดพลาดไป หรือในส่วนของความน่าเชื่อถือของคำแนะนำ ความคิดเห็นส่วนตัวใด ๆ ของทางเว็บไซต์หรือจากบุคคลที่สาม โดยผ่านข้อความหรือข้อมูลซึ่งได้แสดงในเว็บไซต์นี้ ทางเว็บไซต์จะไม่ขอรับรองถึงความถูกต้องของเนื้อหาภายในเว็บไซต์ใด ๆ ทั้งสิ้น ท่านควรรับทราบว่าท่านอาจเชื่อหรือไม่เชื่อความคิดเห็น คำแนะนำ หรือข้อความในบทความต่าง ๆ ก็ได้แต่ด้วยความเสี่ยงของท่านเอง เพราะเว็บไซต์นี้เป็นเพียงเว็บไซต์ที่ให้เพื่อเสริมสร้างความรู้ความเข้าใจทางด้านสุขภาพแก่ผู้เข้าถึงเท่านั้น
            </p>

            <p>
              - ข้อความ เนื้อหา หรือรูปภาพในบทความที่ปรากฏในเว็บไซต์เมดไทย อาจเป็นข้อมูลที่เป็นความจริงอยู่ในชั่วระยะเวลาหนึ่ง และอาจมีผลการวิจัยใหม่ ๆ ที่อาจเปลี่ยนแปลงไปได้ในภายหลัง จึงอาจทำให้ข้อมูลที่มีอยู่ผิดเพี้ยนหรือแตกต่างออกไปจากความเป็นจริงในปัจจุบันได้ ซึ่งทางเว็บไซต์จะไม่ขอรับผิดชอบถึงผลกระทบที่อาจเกิดขึ้นจากการปฏิบัติตามใด ๆ ทั้งสิ้น หากพบปัญหาดังกล่าวโปรดแจ้งให้เราทราบเพื่อทำการแก้ไขปรับปรุงได้ที่ <a href="contact.html">ติดต่อเรา</a>
            </p>

            <p>
              - การใช้หรือการนำเสนอข้อมูลดังกล่าวภายในเว็บไซต์ หากเกิดความเสียหายแก่ผู้ใช้งานเว็บไซต์หรือแก่บุคคลที่สาม จะไม่ก่อให้เกิดสิทธิความรับผิด และ/หรือ ภาระผูกพันทางกฎหมายระหว่างทางเว็บไซต์ ผู้ใช้งานเว็บไซต์ และบุคคลภายนอก ไม่ว่ากรณีใด ๆ ทั้งสิ้น
            </p>

            <p>
              - บทความต่าง ๆ ในเว็ปไซต์เมดไทยมีไว้เพื่อให้ความรู้แก่ประชาชนทั่วไปที่มีความสนใจในเรื่องสุขภาพความงาม  แต่ความรู้ดังกล่าวไม่สามารถนำไปใช้แทนคำวินิจัยหรือการรักษาทางการแพทย์ได้ ดังนั้นก่อนนำข้อมูลไปใช้ ท่านควรปรึกษาแพทย์หรือผู้เชี่ยวชาญก่อนเพื่อความแน่ใจ
            </p>

            <p>
              - บทความในเว็บไซต์เมดไทยบางบทความอาจเกิดขึ้นจากความรู้ ความเข้าใจ ประสบการณ์ หรือความคิดเห็นของผู้เขียนเอง ทางเว็บไซต์จึงไม่สามารถรับรองได้ถึงความถูกต้องและความสมบูรณ์ของเนื้อหา ดังนั้นท่านควรใชวิจารณญาณในการอ่านด้วยเสมอ เพราะทางเว็บไซต์จะไม่ขอรับผิดชอบถึงผลกระทบหรือผลเสียที่อาจเกิดขึ้นจากการปฏิบัติตามใด ๆ ทั้งสิ้น
            </p>

            <p>
              - ทางเว็บไซต์ไม่สามารถรับรองได้ว่าข้อมูลในเว็บไซต์จะไม่มีข้อผิดพลาดใด ๆ เกิดขึ้น เพราะในความเป็นจริงข้อมูลที่น่าเชื่อถือที่เรานำไปมาใช้อ้างอิง อาจมีข้อผิดพลาดได้
            </p>

            <h3>
              ข้อจำกัดเรื่องค่าเสียหาย (Limitation of Liability)
            </h3>

            <p>
              - ผู้ใช้งานเว็บไซต์ "Audio Shop" ตกลงว่าทางเว็บไซต์จะไม่ต้องรับผิดชอบต่อความเสียหายที่เกิดขึ้นใด ๆ อันหมายความรวมถึงความสูญเสีย และค่าใช้จ่ายที่เกิดขึ้นไม่ว่าโดยตรง หรือโดยอ้อม หรือโดยเพาะเจาะจง หรือโดยบังเอิญ หรือเป็นผลสืบเนื่องมาจากการที่ท่านได้เข้าถึงเว็บไซต์ "Audio Shop" หรือการที่บุคคลใด ๆ ไม่สามารถเข้าถึงได้
            </p>

            <h4>
              ลิขสิทธิ์ตามกฎหมาย (Copyrights)
            </h4>

            <p>
              - ข้อความ เนื้อหา รูปภาพ ไฟล์เสียง หรือส่วนประกอบใด ๆ ทั้งหมดที่ปรากฏบนเว็บไซต์ Audio Shop (เว้นแต่จะระบุไว้ว่าเป็นผลงานของผู้อื่น) เป็นงานเกิดจากการรวบรวบและเรียบเรียงขึ้นใหม่โดยเว็บไซต์เมดไทยทั้งสิ้น ไม่ได้เกิดจากการคัดลอกมาแต่อย่างใด และเป็นงานอันได้รับความคุ้มครองตามกฎหมายทรัพย์สินทางปัญญาโดยชอบด้วยกฏหมาย การนำผลงานไปใช้จึงต้องได้รับอนุญาตจากทางเว็บไซต์
            </p>

            <h5>
              ข้อมูลส่วนบุคคล (Privacy Notes)
            </h5>

            <p>
              - การให้ข้อมูลใด ๆ ก็ตามในเว็บไซต์นี้ถือเป็นความเสี่ยงของตัวท่านเอง และท่านยอมรับว่าการติดตามตรวจสอบการเปลี่ยนใด ๆ ของข้อมูลที่มีอยู่ในเว็บไซต์เป็นความรับผิดชอบของท่านเอง
            </p>

            <p>
              - ข้อมูลส่วนบุคคลที่ท่านได้ให้ หรือใช้ผ่านการประมวลผลของเครื่องคอมพิวเตอร์ที่ควบคุมการทำงานของเว็บไซต์เมดไทยนั้น หมายความว่าท่านได้ยอมรับและได้ตกลงว่าข้อมูลดังกล่าวเป็นสิทธิและกรรมสิทธิ์ของทางเว็บไซต์เมดไทย ซึ่งทางเว็บไซต์จะให้ความคุ้มครองความลับดังกล่าวของท่านเป็นอย่างดีที่สุด และในกรณีที่ข้อมูลส่วนบุคคลดังกล่าวได้ถูกจารกรรมด้วยวิธีการทางอิเล็กทรอนิกส์ (Hacking) และมิได้เกิดจากความประมาทเลินเล่อของทางเว็บไซต์ หรือเกิดสูญหายหรือเสียหายอันเนื่องมาจากเหตุสุดวิสัย ทางเว็บไซต์เมดไทยขอสงวนสิทธิในการปฏิเสธความรับผิดชอบจากเหตุดังกล่าวทั้งหมด
            </p>

            <p>
              - เว็บไซต์ Audio Shop เคารพสิทธิ์และความเป็นส่วนตัวของท่านและได้ให้ความสำคัญเกี่ยวกับการคุ้มครองข้อมูลส่วนบุคคลในเครือข่ายอินเตอร์เน็ตเป็นสำคัญ โดยทางเว็บไซต์ขอให้คำมั่นว่า "ข้อมูลส่วนตัวของสมาชิกทุกท่านจะถูกเก็บรักษาไว้เป็นความลับ และจะไม่อนุญาตหรือเผยแพร่ให้ผู้อื่นเข้าถึงข้อมูลดังกล่าวของท่านได้ ตลอดจนจะไม่เปิดเผยข้อมูลในการติดต่อของท่านต่อสาธารณะและบุคคลที่สามในทุก ๆ กรณี เว้นแต่จะระบุไว้เป็นอย่างอื่น แต่โดยทั่วไปแล้วท่านสามารถเข้าเยี่ยมชมเว็บไซต์ได้โดยมิต้องแจ้งให้ทางเว็บไซต์ทราบว่าท่านคือใคร อีกทั้งยังไม่จำเป็นต้องเปิดเผยข้อมูลส่วนบุคคลต่าง ๆ ของท่าน
            </p>

            <p>
              - ทางเว็บไซต์อาจแบ่งปันข้อมูลรวมทางประชากรศาสตร์หรือจากผลสำรวจซึ่งได้จากเทคโนโลยีการติดตามต่าง ๆ ให้แก่บุคคลที่สามได้ โดยข้อมูลเหล่านี้จะอยู่ในรูปของข้อมูลที่ไม่เปิดเผยรายชื่อและไม่มีข้อมูลส่วนบุคคลของท่านอยู่
            </p>

            <li>
              หมายเหตุ : หากมีข้อสงสัยเพิ่มเติมหรือมีข้อสงสัยเกี่ยวกับเงื่อนไขการใช้งานและนโยบาย โปรด <a href="contact.html">ติดต่อเรา</a>
            </li>


          </div>
        </div>
   
    <footer>
      <p>Copyright by Korrakot Triwichain</p>
    </footer>

    </body>
</html>