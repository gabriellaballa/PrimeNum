<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $primeCount = $_POST["primeCount"];
  $lastDigit = $_POST["lastDigit"];
  
  $generatedPrimes = array();
  
  if (in_array($lastDigit, [0, 2, 5])) {
    $generatedPrimes[] = $lastDigit; 
    echo "<h2>Csak egy prímszám van ezzel a számjeggyel!</h2>";
  } else if (in_array($lastDigit, [4, 6, 8])) {
    echo "<h2>Nincs ilyen számjeggyel végződő prímszám!</h2>";
  } else {
    $number = $lastDigit; 
    while (count($generatedPrimes) < $primeCount) {
      if (isPrime($number)) {
        $generatedPrimes[] = $number;
      }
      $number += 10; 
    }
  }
  
  echo "<ul>";
  foreach ($generatedPrimes as $prime) {
    echo "<li>$prime</li>";
  }
  echo "</ul>";
  
}

function isPrime($num) {
  if ($num <= 1) {
    return false;
  }
  for ($i = 2; $i <= sqrt($num); $i++) {
    if ($num % $i == 0) {
      return false;
    }
  }
  return true;
}
?>
