<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include './head.php'; 
include './nav.php'; ?>
<body>
  <div class="center">
    <div class="wrapper chatbox-container">
      <section class="chat-area">
        <header>
          <?php 
            $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }else{
              header("location: users.php");
            }
          ?>
          <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
          <img src="php/images/<?php echo $row['img']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </header>
        <div id="video-grid">  
          <div class="button">          
            <button class="call" onclick="startCall()"><i class="fas fa-video"></i></button>
            <button class="offcall" onclick="endCall()"><i class="fas fa-times"></i></button> 
          </div>     
        </div>
        <div class="chat-box">
        </div>
        <form action="#" class="typing-area">
          <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
          <input type="text" name="message" class="input-field" placeholder="Ecrivez un message ici..." autocomplete="off">
          <button><i class="fab fa-telegram-plane"></i></button>
        </form>
      </section>
    </div>
  </div>


  <script src="javascript/chat.js"></script>

</body>
</html>
