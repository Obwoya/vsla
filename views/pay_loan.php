<div>

 
        <div class="col-sm-offset-3 col-sm-7">
          <div class="col-sm-10" style="padding-top: 10%;">
            <h2 class="text-center">Pay Loan</h2>
            <p class="text-center text-muted"><?php if($status != 'fail')echo $status; ?></p><br><br>

            <form role="form" method="post">
                
                <div class="col-sm-6 col-xs-6 ">
                <div class="form-group">
                	<label>Bank Slip</label>
                  <input type="text" class="form-control" placeholder="Bank Slip" name='bankslip'>
                </div>
                </div>
                <div class="col-sm-6 col-xs-6">
                <div class="form-group">
                	<label>Amount</label>
                  <input type="text" class="form-control" placeholder="Amount" name="amount">
                </div>
                </div>
                
               
	 <div class="text-right">
                	<input type="hidden" name="action" value="sub">
                <input type="submit" class="btn btn-primary" value="Submit"></div></div>
                               </form>

          </div>
        </div>
        </div>
      
