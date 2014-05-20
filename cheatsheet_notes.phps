<?php

/* ------  Give me one record  ---------  */
$sql= "SELECT filmName, filmDescription FROM movies WHERE filmID = 10";
$stmt = $pdo->query($sql);
$row =$stmt->fetchObject();
echo $row->filmName;
echo $row->filmDescription;

/* ------  Give me the whole lot  ---------  */
$sql= "SELECT * FROM movies";
foreach($pdo->query($sql) as $row){
      echo "<li>{$row['filmName']}</li>";
}


/* ------  One row from user input using prepare  ---------  */
$sql= "SELECT filmID, filmName, filmDescription, filmImage, filmPrice, filmReview FROM movies WHERE filmID = :filmID";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':filmID', $filmID, PDO::PARAM_INT);
$stmt->execute();
$row =$stmt->fetchObject();
//output
echo $row->filmName;


/* ------  Multiple rows from user input using prepare  ---------  */
$filmName = "%".$_GET['filmName']."%";
$sql= "SELECT * FROM movies WHERE filmName LIKE :filmName";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':filmName', $filmName, PDO::PARAM_STR);
$stmt->execute();
$total = $stmt->rowCount();
//output
while ($row = $stmt->fetchObject()) {
// or could use
// while ( $row = $stmt->fetch( PDO::FETCH_OBJ ) ) {
    echo $row->filmName;
}


/* ------  INSERT  ---------  */
$sql = "INSERT INTO movies(filmName,
            filmDescription,
            filmImage,
            filmPrice,
            filmReview) VALUES (
            :filmName,
            :filmDescription,
            :filmImage,
            :filmPrice,
            :filmReview)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':filmName', $_POST['filmName'], PDO::PARAM_STR);
$stmt->bindParam(':filmDescription', $_POST['filmDescription'], PDO::PARAM_STR);
$stmt->bindParam(':filmImage', $_POST['filmImage'], PDO::PARAM_STR);
// use PARAM_STR although a number
$stmt->bindParam(':filmPrice', $_POST['filmPrice'], PDO::PARAM_STR);
$stmt->bindParam(':filmReview', $_POST['filmReview'], PDO::PARAM_STR);
$stmt->execute();


/* ------  Get Last Insert ID  ---------  */
$stmt->execute();
$newId = $pdo->lastInsertId();

/* ------  UPDATE  ---------  */
$sql = "UPDATE movies SET filmName = :filmName,
            filmDescription = :filmDescription,
            filmImage = :filmImage,
            filmPrice = :filmPrice,
            filmReview = :filmReview
            WHERE filmID = :filmID";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':filmName', $_POST['filmName'], PDO::PARAM_STR);
$stmt->bindParam(':filmDescription', $_POST['$filmDescription'], PDO::PARAM_STR);
$stmt->bindParam(':filmImage', $_POST['filmImage'], PDO::PARAM_STR);
// use PARAM_STR although a number
$stmt->bindParam(':filmPrice', $_POST['filmPrice'], PDO::PARAM_STR);
$stmt->bindParam(':filmReview', $_POST['filmReview'], PDO::PARAM_STR);
$stmt->bindParam(':filmID', $_POST['filmID'], PDO::PARAM_INT);
$stmt->execute();


/* ------  DELETE  ---------  */
$sql = "DELETE FROM movies WHERE filmID =  :filmID";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':filmID', $_POST['filmID'], PDO::PARAM_INT);
$stmt->execute();

?>