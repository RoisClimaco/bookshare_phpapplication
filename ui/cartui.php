    <div class="row ml-5">
        <div>
          <br><br>
          <!-- Books currently pending -->
          <h2>Books in cart</h2>
            <table class="table table-hover" style="margin: 0px; height: 100%; width: 100%;">
                <thead>
                    <tr>
                        <th>Book Title</th>
                        <th class="text-center">Owner</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once 'class/logic/cart-setup.php';
                    $cartSetup = new cartSetup();
                    $cartSetup->setupBorrowedBooksCart();
                    ?>
                  </table>


                    <!-- Books requiring user action -->
                    <br><br>
                    <h2>Pending Resolution</h2>
                      <table class="table table-hover" style="margin: 0px; height: 100%; width: 100%;">
                          <thead>
                              <tr>
                                  <th>Book Title</th>
                                  <th class="text-center">Borrower</th>
                                  <th> </th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                            $cartSetup->setupOwnedBooksCart();
                            ?>
                </tbody>
            </table>
        </div>
    </div>
