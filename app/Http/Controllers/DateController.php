<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class DateController extends Controller
{
    public function main() {
        // Get date start, end if filled
        $result = [];

        // Only calculate when set date_start and date_end
        if(isset($_GET['date_start']) && isset($_GET['date_end'])) {
            $date_start = Carbon::createFromFormat('d/m/Y', $_GET['date_start']);
            $date_end = Carbon::createFromFormat('d/m/Y', $_GET['date_end']);

            // a) It should return the number of days between Start Date and End Date (both inclusive).
            $result['a'] = $date_start->diffInDays($date_end)+1;

            // b) It should return the number of days between Start Date and End Date (both inclusive) where the last day of the month fall on a Sunday.
            $result['b'] = 0; // Count days
            $result['sundays'] = []; // Store date string
            // Loop between date and get end of each month
            // Get only end of month
            $b = $date_start->copy()->endOfMonth();
            // Add another day for inclusive date end
            while($b->lte($date_end->copy()->addDay())) {
                // Check if it sunday
                if($b->isSunday()) {
                    $result['sundays'][] = $b->format('d/m/Y');
                    $result['b'] += 1;
                }
                $b->modify('last day of next month');
            }
        
        }

        // Return result to view
        return view('main')->with($result);
    }
}
