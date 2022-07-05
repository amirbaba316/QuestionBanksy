<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" 
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" 
    crossorigin="anonymous">
    <style>
        #ques{
            min-height: 450px;
        }
    </style>
    <title>MCQ's</title>
</head>

<body>
    <?php include "partials/_dbconnect.php" ?>
    <?php include "partials/_header.php" ?>

    <div class="container mt-sm-5 my-1" id="ques">
    <?php
        $method = $_SERVER['REQUEST_METHOD'];
        $answer = array();
        if($method=='GET'){
            $cat_name = $_GET['category_name'];
            $sql      = 'SELECT * FROM `questions` WHERE category="Indian History"';
            $result   = mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result)){
                $sno=$row['sno'];
                $question=$row['question'];
                $option_1=$row['option_1'];
                $option_2=$row['option_2'];
                $option_3=$row['option_3'];
                $option_4=$row['option_4'];
                $answer[$sno]=$row['answer'];
                echo '
                <div class="card my-3">
                    <div class="card-header">
                    <h5> ' . $sno . '. ' . $question . '</h5>
                    </div>
                <div class="card-body">
                    <form method="post" action="'. $_SERVER['REQUEST_URI'] . '">
                        <ol type ="a" class=" card-text ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                        <li class="options">
                            <input type="radio" name="radio" value="'. $option_1 .'"/>
                            <span class="checkmark"></span>
                            ' . $option_1 . '
                        </li><br>
                        <li class="options">
                            <input type="radio" name="radio" value="'. $option_2 .'"/>
                            <span class="checkmark"></span>
                            ' . $option_2 . '
                        </li><br>
                        <li class="options">
                            <input type="radio" name="radio" value="'. $option_3 .'"/>
                            <span class="checkmark"></span>
                            ' . $option_3 . '
                        </li><br>
                        <li class="options">
                            <input type="radio" name="radio" value="'. $option_4 .'"/>
                            <span class="checkmark"></span>
                            ' . $option_4 . '
                        </li>
                        <br>
                        </ol>
                    <p name>'. $answer[$sno] .'</p>
                    <input type="hidden" name="answer" value="'. $answer[$sno] .'"/>
                    <button type="submit" class="btn btn-dark"> Submit </button
                </form>
                </div>
            </div>';
            }
        }
        else{
            
            $ans_1 = $_POST['radio'];
            $ans_2 = $_POST[''];
            echo " <p> $ans_1 </p> ";
            echo " <p> $ans_2 </p> ";
            if($ans_1==$ans_2){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                     <strong>Correct!</strong> 
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
            }
            else{
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                     <strong>Wrong!</strong>
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
            }

        }
        $length = count($answer);
        for ($i = 1; $i < $length+1; $i++) {
          print $answer[$i];
        }
        
    ?>
    </div>



        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
        </script>

        <?php include "partials/_footer.php" ?>
</body>

</html>