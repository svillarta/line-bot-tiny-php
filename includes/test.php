<html>
<body>
    <h1>hi</h1>
</body>
</html>

// <?php
// include 'handshake.php';
// userMessage ='pay';
//     $query = mysqli_query($connection,"SELECT * FROM questionAndAnswer  WHERE questions LIKE '%$userMessage%' LIMIT 5");
//     $arrays = array();
//         while($result = mysqli_fetch_assoc($query)){
//             $dataResult .=  $result['questions']." ".PHP_EOL.$result['answers'].PHP_EOL." ".PHP_EOL;
//             $questionData = array(
//                 "type" => "text", 
//                 "text" => $result['questions'],
//                 "wrap" => true,
//                 "weight" => "bold", 
//                 "size" => "md", 
//                 "color" => "#7AD80F" 
//             );
//             $newLine = array(
//                 "type" => "text", 
//                 "text" => " ", 
//                 "color" => "#aaaaaa", 
//                 "size" => "lx", 
//                 "flex" => 1  
//             );
//             $answerData = array(
//                 "type" => "text", 
//                 "text" => $result['answers'], 
//                 "color" => "#aaaaaa", 
//                 "size" => "sm", 
//                 "flex" => 1  
//             );
//             $arrays = array($questionData,$newLine,$answerData);
//         }
//         console.log($arrays);
// ?>