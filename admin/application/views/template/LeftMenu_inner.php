<?php
$activePage = $_SERVER['REQUEST_URI'];
$activePage = explode("/", $activePage);
$activePage = $activePage[2];
?>    
<div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="/assets/images/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                <a href="#" class="simple-text">
                    Tej  Coin
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li <?php if($activePage == 'dashboard'){ echo "class='active'"; } ?>>
                        <a href="<?php echo base_url()?>dashboard">	
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                	<li <?php if($activePage == 'Transactions'){ echo "class='active'"; } ?>>
                        <a href="<?php echo base_url()?>Transactions/">	
                            <i class="material-icons">Transactions</i>
                            <p>Transactions</p>
                        </a>
                    </li>
                </ul>
            	<ul class="nav">
                	<li <?php if($activePage == 'User_Details'){ echo "class='active'"; } ?>>
                        <a href="<?php echo base_url()?>User_Details/">
                            <i class="material-icons">person</i>
                            <p>User Details</p>
                        </a>
                    </li>
                	<li <?php if($activePage == 'Admin_setting'){ echo "class='active'"; } ?>>
                        <a href="<?php echo base_url()?>Admin_setting/">
                            <i class="material-icons">Admin setting</i>
                            <p>Admin setting</p>
                        </a>
                    </li>
                	<li <?php if($activePage == 'Kyc_request'){ echo "class='active'"; } ?>>
                        <a href="<?php echo base_url()?>Kyc_request/">
                            <i class="material-icons">Kyc</i>
                            <p>Kyc Request</p>
                        </a>
                    </li>
                	<li <?php if($activePage == 'BankDetails'){ echo "class='active'"; } ?>>
                        <a href="<?php echo base_url()?>BankDetails/">
                            <i class="material-icons">Bank Details</i>
                            <p>Bank Details</p>
                        </a>
                    </li>
                	<li <?php if($activePage == 'Sell_request'){ echo "class='active'"; } ?>>
                        <a href="<?php echo base_url()?>Sell_request/">
                            <i class="material-icons">Sell request From Bank</i>
                            <p>Sell request From Bank</p>
                        </a>
                    </li>
                	<li <?php if($activePage == 'Paypal'){ echo "class='active'"; } ?>>
                        <a href="<?php echo base_url()?>Paypal/">
                            <i class="material-icons">Sell request From Paypal</i>
                            <p>Sell request From Paypal</p>
                        </a>
                    </li>
                	<li <?php if($activePage == 'Shopping_request'){ echo "class='active'"; } ?>>
                        <a href="<?php echo base_url()?>Shopping_request/">
                            <i class="material-icons">Shopping Request</i>
                            <p>Shopping Request</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>