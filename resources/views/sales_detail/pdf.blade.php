

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>pdf formatted bill</title>

    <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <style type="text/css">

      
      #phone strong{
          border-left: 1.5px solid #000;
          padding: 4px;
      }
      
      .bill_title{
          align-content: center;
      }
  #bill-heading{
    font-size: 2em;

  }

   #two{
    float: left;
    color: blue;
   
  }

  #name{
    display: inline;
    
    font: serif;
    font-size: 30px;
  }

  #name2{
    display: inline;
   
    font-style: italic;

  }
  #add{
    font-size: 13px
  
  }

  #sign{
    color: #000;
      
  }

  #line{
    color: #000;
  }
      @media print{
          .printbtn{
              display: none;
          }
          
      }

  </style>





    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
  <script type="text/javascript" src="http://gc.kis.scr.kaspersky-labs.com/1B74BD89-2A22-4B93-B451-1C9E1052A0EC/main.js" charset="UTF-8"></script></head>

  <body>

<div class="container" style="margin-top:5px;" >
      
      <div class="row">
          <div class="col-md-8">
          <p id="bill-heading">Ahmad <i>Supermarket</i></p>
          </div>
          
          <div class="col-md-4">
              <button class="btn btn-success printbtn" onclick="window.print();">Print</button>
              </div>
          
          </div>
        
        <div class="row">
      
                  <div class="col-md-2"> @foreach($sales as $sale)

                      <strong>Bill number:</strong>
                  </div>

                  <div class="col-md-10">
                      <p>{{ $sale->bill_no}}</p>
                  </div>
            </div>
       

 <div class="row">
       <div class="col-md-2">
        
                     <strong>Customer:</strong>
                 </div>

                 <div class="col-md-10">
         
                     <p> {{ $sale->customer->name}}</p>

                  </div>

       </div>  

       
            <div class="row">
                 <div class="col-md-2">
                      <strong>Date:</strong>
                 </div>

            <div class="col-md-10">

                 <p> {{ $sale->date}}</p> 

                   @endforeach
            </div>

            </div>
      

  </div>

 

  <!--<img src="{{ URL::asset('pharmacylogo.png') }}" height="80" width="60"> 

  -->



  <br>


  
  
   
      <div class="container" style="border-bottom:2px solid #000">
  
    <table class="table">
       <thead>
         <tr>
           <th>S No.</th>
           <th>Barcode</th>
           <th>Name</th>
           <th>Quantity</th>
           <th>Unit_price</th>
           <th>Total_price</th>
         </tr>
       </thead>
      <tbody>
      <?php 

      $total = 0;

      ?>
 
        @foreach($sale_details as $details)
          
  
       <tr>
         <td>{{$loop->iteration}}</td>
         <td>{{$details->product->barcode}}</td>
         <td>{{$details->product->name}}</td>
         <td>{{$details->quantity}}</td>
         <td>{{$details->unit_price}}</td>
         <td>{{$details->total_price}}</td>
       </tr>
       
       <?php
           $total += $details->total_price;

       ?>
      
       @endforeach
    
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
         <td class="total" ><strong>total</strong></td>
         <td class="total"><strong>{{$total}}</strong></td>
         
       </tr>
     <br>
    
     </tbody>

    
    
   </table>

        <div  class="sign" align="right">
       <span id="sign" >Customer signature</span>
       <span id="line">_____________</span>
            <br>
            <br>
</div>

</div>
    <div class="container" style="margin-top:8px;">
        <p id="phone"><strong>Phone:</strong>&nbsp;0788188491<strong> Email:</strong> &nbsp;ahmad2014nisar@gmail.com
        <strong>facebook: </strong>&nbsp; nesar ahmad <strong> Address:</strong> &nbsp;Mirwais Medan, Kabul, Afghanistan
        </p>
    </div>
 
  <script src="{{asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
 
  </body>
</html>
