<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Date Test</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" crossorigin="anonymous">
        
        <!-- Styles -->
        <style>
            html, body {
                margin: 0;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 40px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title">
                    Test 2 – Number Days PHP
                </div>
                
                <div>
                    <form action="" method="GET">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="date_start">Date Start</label>
                                <input type="text" class="form-control datepicker" id="date_start" name="date_start" aria-describedby="dateStart" placeholder="Select date start" value="{{ $_GET['date_start'] or '01/01/1900' }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date_end">Date End</label>
                                <input type="text" class="form-control datepicker" id="date_end" name="date_end" aria-describedby="dateEnd" placeholder="Select date end" value="{{ $_GET['date_end'] or '01/01/2500' }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Calculate</button>
                    </form>
                </div>

                <hr />

                <!-- Result -->
                @if(isset($_GET['date_start']) && isset($_GET['date_end']))
                    <div>There are <strong>{{ number_format($a) }}</strong> days between <strong>{{ $_GET['date_start'] }}</strong> and <strong>{{ $_GET['date_end'] }}</strong> (both days inclusive)</div>
                    <div>There are <strong>{{ number_format($b) }}</strong> days between <strong>{{ $_GET['date_start'] }}</strong> and <strong>{{ $_GET['date_end'] }}</strong> (both days inclusive) where the last day of the month is a Sunday.</div>
                    <div>And, those dates are:</div>
                    @for($i=0;$i< count($fridays);$i++)
                        <div>{{$i+1}} {{ $fridays[$i] }} Sun</div>
                    @endfor
                @endif
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js" crossorigin="anonymous"></script>
        <script type='text/javascript'>

            $(function() {
                $('.datepicker').each(function() {
                    $(this).datepicker({
                        format: "dd/mm/yyyy",
                        startDate: "01/01/1900",
                        endDate: "01/01/2500", 
                        autoclose: true,
                    });
                });
            });
            
        </script>
    </body>
</html>
