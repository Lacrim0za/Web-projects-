<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
date_default_timezone_set('Asia/Manila'); // Set to your local timezone if needed

// Display current date and time
echo "Today is " . date("Y.m.d") . "<br>";
echo "Day: " . date("l") . "<br>";
echo "Current Time: " . date("H:i:s") . "<br><br>";

// Get current datetime
$now = new DateTime();

// Start of year
$startOfYear = new DateTime($now->format("Y-01-01"));
$monthsPassed = $now->format("n") - 1; // Months since January

// Start of current month
$startOfMonth = new DateTime($now->format("Y-m-01"));
$daysPassed = (int)$now->diff($startOfMonth)->format("%a");
$weeksPassed = floor($daysPassed / 7);

// Start of today
$startOfDay = new DateTime($now->format("Y-m-d 00:00:00"));
$timeDiff = $now->getTimestamp() - $startOfDay->getTimestamp();
$hours = floor($timeDiff / 3600);
$minutes = floor(($timeDiff % 3600) / 60);
$seconds = $timeDiff % 60;

// Output
echo "Months since start of the year: " . $monthsPassed . "<br>";
echo "Weeks since start of the month: " . $weeksPassed . "<br>";
echo "Days since start of the month: " . $daysPassed . "<br>";
echo "Hours passed today: " . $hours . "<br>";
echo "Minutes passed this hour: " . $minutes . "<br>";
echo "Seconds passed this minute: " . $seconds . "<br>";
?>
</body>
</html>