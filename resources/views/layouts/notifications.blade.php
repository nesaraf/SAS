<?php 
               $notif =0;
               $low_amount=0;
               $low_date=0;
               $critical_date = 0;
              foreach($products as $product ){

       
                if($product->amount <= 10){
                   $low_amount++;
                 }



              $date1 = Date('y-m-d');
              $Exp_date = $product->exp_date;
              //$date1 = Date('2018-04-08');
              $dStart = new DateTime($Exp_date);
                $dEnd  = new DateTime($date1);
                $dDiff = $dEnd->diff($dStart);
                $final_dateDays = $dDiff->format('%R').$dDiff->days;
            // echo $dDiff->format('%R'); // use for point out relation: smaller/greater
            //     echo $dDiff->days;

                 if($final_dateDays<365 && $final_dateDays>183 ){
                  
                      $low_date++;  
                   }

                   if($final_dateDays<183){
                    $critical_date++;
                   }


                }

                $notif = $critical_date+$low_date+$low_amount;
           

           echo 
              '<span class="label label-danger">'.$notif.'</span>  
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have &nbsp'.$notif.' &nbsp notifications</li>


                <li>

                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="'.route("CriExpDate").'">
                      <i class="fa fa-calendar " style="color:#ff0000;"></i> you have &nbsp<span style="color:#ff0000; text-decoration: underline;">'.$critical_date.' '.'</span>&nbsp items whit critical expiration date.
                    </a>
                  </li>
                  <li> <a href="'.route("LowAmount").'">
                      <i class="fa fa-battery-1"  style="color:#cc6600;"></i> &nbsp<span style="color:#cc6600; text-decoration: underline;">'.$low_amount.'</span>&nbsp items whit low amount.
                    </a>
                  </li>
                  <li>
                    <a href="'.route("LowExpDate").'">
                      <i class="glyphicon glyphicon-calendar" style="color:#cc6600;"></i> there is &nbsp<span style="color:#cc6600; text-decoration: underline;">'.$low_date.'</span>&nbsp items whit low expiration date.
                    </a>
                  </li>
                </ul>
              </li>'
                



                ?>   