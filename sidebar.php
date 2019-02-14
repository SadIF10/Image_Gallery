<div class = "scroll">
    CATEGORIES: <br />
     <ul>
        <?php
         $q = "SELECT id,category FROM categories";
         $conn = new mysqli("localhost", "root", "", "registered") or die(mysql_error());         
         if ($result = $conn->query($q)) {
             /* fetch associative array */
             while ($row = $result->fetch_assoc()) {
                 echo '<li><a class="lib" href="category-view.php?category='.$row['category'].'">'.$row['category'].'</a></li>';
             }
         }
         ?>
     </ul>
</div>
