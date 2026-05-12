   <?php 
// Indexed array
$numbers= array(10,20,30,40,50,60);
// $numbers=[10,34,43 ];
// echo "$numbers[4]";
// echo "<pre>";
// print_r($numbers);
// echo "</pre>";


// foreach ($numbers as $key => $value) {
// echo "$key : $value <br>";
// }


//Associative array
// associative array =  key => value pairs

// $employee=[
//     "haris"=>"Software Developer",
//     "owais"=>"Mern Stack Developer",
//     "ebad"=>"Php/Laravel Developer",
//     "afzal"=>"Python Developer",
//     "usama"=>"Java Developer",
// ];

// echo $employee['afzal'];

// echo "<pre>";
// print_r($employee);
// echo "</pre>";

// echo $employee['afzal'];


// foreach ($employee as $name => $profession) {
// echo ucwords($name)." works as a <b> $profession </b><br>";
// }

// Multidimensional  Indexed array


//
// $result = [

//  ["Hasan",25,77],
//  ["Haroon",19,65],
//  ["Shakeel",21,75],
//    ["Shahzaib",22,92],  
//     ["Wasamat",24,78],
//     ["Safeer",25,54]

// ];


// echo $result[4][0]

// [ [   [   [ ] ] ] ]


//Multidimensional indexed array
$result=[

    ["haris",15,90,"A-1"],

    ["imam",16,56,"b"],

    ["zoraiz",17,65,"b"],

    ["jameel",15,90,"A-1"],
   
];


// echo $result[0][2];
// echo $result[2][0];
// echo $result[3][3];


// echo "<pre>";
// print_r($result);
// echo "</pre>";


// echo $result[3][0];
// echo $result[5][0];


echo "<table border=1 cellpadding=5px>
<caption><h2>Student Result</h2></caption>
<tr>
    <th>Name</th>
    <th>Age</th>
    <th>Percentage</th>
    <th>Grade</th>

</tr>
 ";

foreach ($result as $key => $value) {
   echo "<tr>";
foreach ($value as $key1 => $value1) {
   echo "<td>$value1</td>";
}
   echo "</tr>";
}

echo "</table>";




// foreach($result as $key => $value){
// echo "<tr>";
// foreach($value as $key1 => $value1){
//    echo "<td>$value1 </td>";
// }
// echo "</tr>";
// }
//     echo "</table>";

// // //Multidimensional Associative array
    
    
$marks=[

    "haris"=>["Computer"=>88,"Maths"=>100,"Physics"=>75],
    "owais"=>["Computer"=>75,"Maths"=>88,"Physics"=>65],
    "ebad"=>["Computer"=>60,"Maths"=>55,"Physics"=>90],
    "afzal"=>["Computer"=>98,"Maths"=>95,"Physics"=>45],
    "usama"=>["Computer"=>18,"Maths"=>25,"Physics"=>35]

];
// echo $marks['afzal']['Physics'];
// echo "<pre>";
// print_r($marks);
// echo "</pre>";

// echo $marks['ebad']['Physics'];



echo "<table border=1 cellpadding=5px>
<caption><h2>Student Result</h2></caption>
<tr>
    <th>Name</th>
    <th>Computer</th>
    <th>Maths</th>
    <th>Physics</th>

</tr>
 ";

foreach ($marks as $names => $value) {
   echo "<tr>";
   echo "<td>$names</td>";

foreach ($value as $key1 => $value1) {
   echo "<td>$value1</td>";
}
   echo "</tr>";
}
echo "</table>";

    
    ?>