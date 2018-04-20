<?php
$activePage = $_SERVER['REQUEST_URI'];
$activePage = explode("/", $activePage);
$activePage = $activePage[1];
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
                	&nbsp&nbsp<small>Wallet</small> -------------------------------------------------
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
                	&nbsp&nbsp<small>User Accounts</small> ------------------------------------------ 
                	<li <?php if($activePage == 'User_Profile'){ echo "class='active'"; } ?>>
                        <a href="<?php echo base_url()?>User_Profile/">
                            <i class="material-icons">person</i>
                            <p>User Profile</p>
                        </a>
                    </li>
                	<li <?php if($activePage == 'Kyc'){ echo "class='active'"; } ?>>
                        <a href="<?php echo base_url()?>Kyc/">
                            <i class="material-icons">Kyc</i>
                            <p>Kyc</p>
                        </a>
                    </li>
                	<li <?php if($activePage == 'BankDetails'){ echo "class='active'"; } ?>>
                        <a href="<?php echo base_url()?>BankDetails/">
                            <i class="material-icons">BankDetails</i>
                            <p>BankDetails</p>
                        </a>
                    </li>
                	<li <?php if($activePage == 'Shopping'){ echo "class='active'"; } ?>>
                        <a href="<?php echo base_url()?>Shopping/">
                            <i class="material-icons">Shopping</i>
                            <p>Shopping</p>
                        </a>
                    </li>
                	<li <?php if($activePage == 'Recharge'){ echo "class='active'"; } ?>>
                        <a href="<?php echo base_url()?>Recharge/">
                            <i class="material-icons">Recharge</i>
                            <p>Recharge</p>
                        </a>
                    </li>
                	<li <?php if($activePage == 'Bill_pay'){ echo "class='active'"; } ?>>
                        <a href="<?php echo base_url()?>Bill_pay/">
                            <i class="material-icons">Bill Pay</i>
                            <p>Pay Bills</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>