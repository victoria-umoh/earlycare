<?php


class DateDiff{

    // TIME DIFFERENCE FUNCTION
    function date_difference($start_date, $finish_date) {
        // Create DateTime objects for the start_date and finish_date
        $start_date = new DateTime($start_date);
        $finish_date = new DateTime($finish_date);
        $currentDateTime = new DateTime();
            if ($start_date <= $currentDateTime) {
                // Calculate the difference between the current date and $finish_date
                $interval = $currentDateTime->diff($finish_date);
            } else {
                // Calculate the difference between $start_date and $finish_date
                $interval = $start_date->diff($finish_date);
            }
                // Return the difference as an array with days, hours, minutes, and seconds
        $timedifference =  array(
            'days' => $interval->days,
            'hours' => $interval->h,
            'minutes' => $interval->i,
            'seconds' => $interval->s
        );
        return $timedifference;
    }

}
?>


<?php


class DateDiff {
    // TIME DIFFERENCE FUNCTION
    function date_difference($start_date, $finish_date, $current_date) {
        // Create DateTime objects for the start_date, finish_date, and current_date
        $start_date = new DateTime($start_date);
        $finish_date = new DateTime($finish_date);
        $current_date = new DateTime($current_date);

        if ($finish_date > $current_date) {
            // Calculate the difference between the current date and $finish_date
            $interval = $current_date->diff($finish_date);

            // Return the difference as an array with days, hours, minutes, and seconds
            $timedifference =  array(
                'days' => $interval->days,
                'hours' => $interval->h,
                'minutes' => $interval->i,
                'seconds' => $interval->s
            );

            return $timedifference;
        } else {
            return "Progress is ended";
        }
    }
}

// Example usage:
// $dateDiff = new DateDiff();
// $start_date = "2023-01-01";
// $finish_date = "2023-12-31";
// $current_date = date("Y-m-d"); // Get the current date

// $result = $dateDiff->date_difference($start_date, $finish_date, $current_date);

// // Output the result
// if (is_array($result)) {
//     return "Days: " . $result['days'] . ", Hours: " . $result['hours'] . ", Minutes: " . $result['minutes'] . ", Seconds: " . $result['seconds'];
// } else {
//     return $result;
// }

?>