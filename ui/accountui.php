  <div class="container target">
    <div class="row">
        <div class="col-sm-10">
          <br><br>
             <h1 class="">
             <?php
             require_once 'class/logic/account-setup.php';
             $setup = new accountSetup();
             $setup->getUsername();
             ?></h1>

<br>
        </div>
      <div class="col-sm-2"><a href="/users" class="pull-right">
          <br><br>
        <img title="profile image" class="img-circle img-responsive" src="http://www.rlsandbox.com/img/profile.jpg"></a>

        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->
            <ul class="list-group">
                <li class="list-group-item text-muted" contenteditable="false">Profile</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Real name</strong></span>
                      <?php
                      $setup->getRealName();
                      ?>
                    </li>
            </ul>
            <br>
            <ul class="list-group">
                <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i>

                </li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Books Owned:</strong></span>
                  <?php
                  $setup->getBookOwnerCount();
                  ?></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Books borrowed:</strong></span>
                  <?php
                  $setup->getBookBorrowedCount();
                  ?>
                </li>
            </ul>
            <br>
        </div>
        <!--/col-3-->
        <div class="col-sm-9" style="" contenteditable="false">
          <br>
           <div class="panel panel-default">
                <div class="panel-heading"><h2>Books I am borrowing</h2></div>
                <div class="panel-body">
                  <?php
                  $setup->getBookBorrowed();
                  ?>
                </div>
</div>
<br>
<div class="panel panel-default">
     <div class="panel-heading"><h2>Books I am sharing</h2></div>
     <div class="panel-body">
       <?php
       $setup->getBookShared();
       ?>
     </div>
</div>
<form role="form" method="post" action="account.php">
  <br><br>
  <h3>Add Book </h3>
  <div class="form-group">
    <input type="text" name="addBookName" id="addBookName" class="form-control input-lg" placeholder="Book Name">
  </div>
  <div class="form-group">
    <input type="test" name="addBookAuthor" id="addBookAuthor" class="form-control input-lg" placeholder="Book Author">
  </div>
  <input type="submit" class="btn btn-lg btn-info" value="Add Book">
</form>

<form role="form" method="post" action="account.php">
  <br>
  <h3>Remove Book </h3>
  <div class="form-group">
    <input type="text" name="deleteBookName" id="deleteBookName" class="form-control input-lg" placeholder="Book Name">
  </div>
  <input type="submit" class="btn btn-lg btn-danger" value="Remove Book">
</form>
</div>


            <div id="push"></div>
        </div>
</div>
