<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class DateController extends Controller
{
    public function main() {
        // Get date start, end if filled
        $result = [];

        if(isset($_GET['date_start']) && isset($_GET['date_end'])) {
            $date_start = Carbon::createFromFormat('d/m/Y', $_GET['date_start']);
            $date_end = Carbon::createFromFormat('d/m/Y', $_GET['date_end']);

            // a) It should return the number of days between Start Date and End Date (both inclusive).
            $result['a'] = $date_start->diffInDays($date_end)+1;

            // b) It should return the number of days between Start Date and End Date (both inclusive) where the last day of the month fall on a Sunday.
            $result['b'] = 0;
            $result['fridays'] = [];
            for ($d = $date_start; $d->lte($date_end);$d->modify('first day of next month')->endOfMonth()) {
                if($d->isSunday()) {
                    $result['fridays'][] = $d->format('d/m/Y');
                    $result['b'] += 1;
                }
            }
        
        }

        return view('main')->with($result);
    }
}
