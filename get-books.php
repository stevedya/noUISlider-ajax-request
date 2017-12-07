<!--Connect to database-->
<?php include "connect.php"; ?>

<?php
//THE VARIABLES SENT FROM THE XHR GET REQUEST
$valueOne = $_GET['valueOne'];
$valueTwo = $_GET['valueTwo'];

if ($valueOne && $valueTwo) {

    //YOUR SELECT STATEMENT HERE
    $sql = "SELECT * FROM books WHERE price BETWEEN $valueOne AND $valueTwo";

    $result = mysqli_query($con, $sql) or die ("Cannot select from table");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {

            //THE BOOK DETAILS HERE FROM THE TABLE
            $id = $row['id'];
            $name = $row['name'];
            $price = $row['price'];

            // THIS IS YOUR INDIVIDUAL BOOKS INFO CARDS LIKE WITH PICTURES AND STUFF
            $output = "<div class=\"col s12 m6 l4\">
                            <h4>$name</h4>
                            <p><strong>Price: </strong>$price</p>
                        </div>";
            echo $output;
        }
    } else {
        echo "No books found";
    }
}

//This file creates div elements with the info from the database and then the XHR (Ajax) request puts it inside the results div

?>