
<!-- MENU START -->



<div class="nav">

    <div class="menu">
      <li><a href="./index.php">Home</a></li>
      <?php if (isset($_SESSION['userAccount'])) {
        try {
            ?>
      <li><a href="./filmsoverview.php">Films overzicht</a></li>
      <li><a href="./addfilm.php">Film Toevoegen</a></li>
      <li><a href="./addnumber.php">Exemplaar Toevoegen</a></li>
      <li><a href="./searchbynumber.php">Zoek op nummer</a></li>
      <li><a href="./leanandbring.php">Huren/ Terugbrengen</a></li>



   
    
        
    
     <span style="margin-left: auto;">
            <?php print $_SESSION['user'];
        } catch (UserNotFoundException $e) {
        }
        ; ?>
         
        </span>
        <li> <a href="./logout.php">Log Out </a></li>
    <?php }
    
    else { ?>
        <li><a href="./login.php">Login</a></li>
        <li> <a href="./login.php">Sing Up</a></li>
 <?php  }?>
 </div>
</div><div class="break">
            
        </div>
<!-- MENU END -->