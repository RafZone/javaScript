<?php
  include 'includes/dbh.inc.php';
  session_start();
  if(isset($_POST['page']))
  {
    getComments($_POST['page'], $conn);
  }

  function getComments($page, $conn)
  {
    if($page == 1)
    {
      echo "<br><br>";
      $sql = "SELECT * FROM meatballscomments";
      $result = mysqli_query($conn, $sql);
      comm($page, $result);
    }
    elseif ($page == 2)
    {
      echo "<br><br>";
      $sql = "SELECT * FROM pancakescomments";
      $result = mysqli_query($conn, $sql);
      comm($page, $result);
    }

    else
    {
      echo "page info not found";
    }

  }

  function comm($page, $result)
  {
    while($row = $result->fetch_assoc())
    {
      echo "<div class = 'comment-box'>";
      echo '<span class = "user">'.$row['user_uid'].'</span><br><br>';
      echo "<p>".htmlspecialchars($row['message'])."</p>";
      echo '<span class = "datef">'.$row['date'].'</span>';

      if(isset($_SESSION['u_id']) && $_SESSION['u_uid'] == $row['user_uid'])
      {
        echo "<br>";
        //echo "<form method = 'POST' action = 'deleteComment.php'>";
        echo "<p id='demo'></p>";
        $commentId = $row['cid'];
        echo "<input type = 'hidden' id = 'cid' value = '".$row['cid']."'>";
        if($page == 1)
          echo "<button class = 'btn' type = 'submit'  onclick= 'deleteFunction($commentId, 1)'>Delete</button>";
        //elseif ($page == 2)
        //  echo "<button class = 'btn' type = 'submit' name = 'pancakesDelete'>Delete</button>";
        else
          echo "errrrooooooorrrrrrrrrr";

        //echo "</form>";
      }

      echo "</div><hr>";
    }
  }
?>

<script>
  function deleteFunction(cid, page)
  {
    //document.getElementById("demo").innerHTML = cid + " ----"+ page;
    $.ajax({
      url: "deleteComment.php",
      type: "POST",
      async: false,
      data: {
        "cid": cid,
        "page": page}
    });
    alert("Your comment has been deleted!");
  }
</script>
