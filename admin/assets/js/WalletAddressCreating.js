			$(document).ready(function(){
                $("#addressGeneratingBTC").click(function(){
                     var btc_wallet_address='<?php echo $BTC_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalBTC").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableBTC").modal('show');
                    }
                 });
                $("#BTCButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $BTC_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalBTC").modal('hide'); 
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_btcwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
			$(document).ready(function(){
                $("#addressGeneratingETH").click(function(){
                     var btc_wallet_address='<?php echo $ETH_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalETH").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableETH").modal('show');
                    }
                 });
                $("#ETHButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $ETH_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalETH").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_ethwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
			$(document).ready(function(){
                $("#addressGeneratingLTC").click(function(){
                     var btc_wallet_address='<?php echo $LTC_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalLTC").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableLTC").modal('show');
                    }
                 });
                $("#LTCButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $LTC_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalLTC").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_ltcwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
			$(document).ready(function(){
                $("#addressGeneratingBCH").click(function(){
                     var btc_wallet_address='<?php echo $BCH_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalBCH").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableBCH").modal('show');
                    }
                 });
                $("#BCHButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $BCH_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalBCH").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_bchwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
	$(document).ready(function(){
                $("#addressGeneratingADC").click(function(){
                     var btc_wallet_address='<?php echo $ADC_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalADC").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableADC").modal('show');
                    }
                 });
                $("#ADCButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $ADC_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalADC").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_adcwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
		$(document).ready(function(){
                $("#addressGeneratingBCN").click(function(){
                     var btc_wallet_address='<?php echo $BCN_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalBCN").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableBCN").modal('show');
                    }
                 });
                $("#BCNButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $BCN_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalBCN").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_bcnwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
		$(document).ready(function(){
                $("#addressGeneratingBITB").click(function(){
                     var btc_wallet_address='<?php echo $BITB_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalBITB").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableBITB").modal('show');
                    }
                 });
                $("#BITBButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $BITB_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalBITB").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_bitbwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
		$(document).ready(function(){
                $("#addressGeneratingBLK").click(function(){
                     var btc_wallet_address='<?php echo $BLK_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalBLK").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableBLK").modal('show');
                    }
                 });
                $("#BLKButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $BLK_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalBLK").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_blkwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
			$(document).ready(function(){
                $("#addressGeneratingBRK").click(function(){
                     var btc_wallet_address='<?php echo $BRK_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalBRK").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableBRK").modal('show');
                    }
                 });
                $("#BRKButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $BRK_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalBRK").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_brkwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
			$(document).ready(function(){
                $("#addressGeneratingCLOAK").click(function(){
                     var btc_wallet_address='<?php echo $CLOAK_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalCLOAK").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableCLOAK").modal('show');
                    }
                 });
                $("#CLOAKButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $CLOAK_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalCLOAK").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_cloakwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
			$(document).ready(function(){
                $("#addressGeneratingCRW").click(function(){
                     var btc_wallet_address='<?php echo $CRW_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalCRW").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableCRW").modal('show');
                    }
                 });
                $("#CRWButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $CRW_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalCRW").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_crwwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
			$(document).ready(function(){
                $("#addressGeneratingCURE").click(function(){
                     var btc_wallet_address='<?php echo $CURE_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalCURE").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableCURE").modal('show');
                    }
                 });
                $("#CUREButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $CURE_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalCURE").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_curewallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
			$(document).ready(function(){
                $("#addressGeneratingDASH").click(function(){
                     var btc_wallet_address='<?php echo $DASH_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalDASH").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableDASH").modal('show');
                    }
                 });
                $("#DASHButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $DASH_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalDASH").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_dashwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
			$(document).ready(function(){
                $("#addressGeneratingDCR").click(function(){
                     var btc_wallet_address='<?php echo $DCR_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalDCR").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableDCR").modal('show');
                    }
                 });
                $("#DCRButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $DCR_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalDCR").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_dcrwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
            $(document).ready(function(){
                $("#addressGeneratingDGB").click(function(){
                     var btc_wallet_address='<?php echo $DGB_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalDGB").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableDGB").modal('show');
                    }
                 });
                $("#DGBButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $DGB_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalDGB").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_dgbwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
            $(document).ready(function(){
                $("#addressGeneratingDOGE").click(function(){
                     var btc_wallet_address='<?php echo $DOGE_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalDOGE").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableDOGE").modal('show');
                    }
                 });
                $("#DOGEButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $DOGE_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalDOGE").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_dogewallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
            $(document).ready(function(){
                $("#addressGeneratingEBST").click(function(){
                     var btc_wallet_address='<?php echo $EBST_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalEBST").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableEBST").modal('show');
                    }
                 });
                $("#EBSTButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $EBST_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalEBST").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_ebstwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
            $(document).ready(function(){
                $("#addressGeneratingETC").click(function(){
                     var btc_wallet_address='<?php echo $ETC_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalETC").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableETC").modal('show');
                    }
                 });
                $("#ETCButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $ETC_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalETC").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_etcwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
            $(document).ready(function(){
                $("#addressGeneratingEXP").click(function(){
                     var btc_wallet_address='<?php echo $EXP_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalEXP").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableEXP").modal('show');
                    }
                 });
                $("#EXPButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $EXP_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalEXP").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_expwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            }); 
			$(document).ready(function(){
                $("#addressGeneratingGCR").click(function(){
                     var btc_wallet_address='<?php echo $GCR_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalGCR").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableGCR").modal('show');
                    }
                 });
                $("#GCRButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $GCR_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalGCR").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_gcrwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
			 $(document).ready(function(){
                $("#addressGeneratingGLD").click(function(){
                     var btc_wallet_address='<?php echo $GLD_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalGLD").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableGLD").modal('show');
                    }
                 });
                $("#GLDButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $GLD_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalGLD").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_gldwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
			$(document).ready(function(){
                $("#addressGeneratingGRS").click(function(){
                     var btc_wallet_address='<?php echo $GRS_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalGRS").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableGRS").modal('show');
                    }
                 });
                $("#GRSButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $GRS_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalGRS").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_grswallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });

            $(document).ready(function(){
                $("#addressGeneratingKMD").click(function(){
                     var btc_wallet_address='<?php echo $KMD_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalKMD").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableKMD").modal('show');
                    }
                 });
                $("#KMDButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $KMD_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalKMD").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_kmdwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });

            $(document).ready(function(){
                $("#addressGeneratingLEO").click(function(){
                     var btc_wallet_address='<?php echo $LEO_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalLEO").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableLEO").modal('show');
                    }
                 });
                $("#LEOButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $LEO_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalLEO").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_leowallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });

            $(document).ready(function(){
                $("#addressGeneratingLSK").click(function(){
                     var btc_wallet_address='<?php echo $LSK_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalLSK").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableLSK").modal('show');
                    }
                 });
                $("#LSKButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $LSK_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalLSK").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_lskwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });

            $(document).ready(function(){
                $("#addressGeneratingMUE").click(function(){
                     var btc_wallet_address='<?php echo $MUE_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalMUE").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableMUE").modal('show');
                    }
                 });
                $("#MUEButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $MUE_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalMUE").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_muewallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });

            $(document).ready(function(){
                $("#addressGeneratingNAV").click(function(){
                     var btc_wallet_address='<?php echo $NAV_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalNAV").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableNAV").modal('show');
                    }
                 });
                $("#NAVButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $NAV_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalNAV").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_navwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
            $(document).ready(function(){
                $("#addressGeneratingNLC2").click(function(){
                     var btc_wallet_address='<?php echo $NLC2_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalNLC2").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableNLC2").modal('show');
                    }
                 });
                $("#NLC2ButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $NLC2_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalNLC2").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_nlc2wallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });

            $(document).ready(function(){
                $("#addressGeneratingNMC").click(function(){
                     var btc_wallet_address='<?php echo $NMC_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalNMC").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableNMC").modal('show');
                    }
                 });
                $("#NMCButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $NMC_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalNMC").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_nmcwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
            $(document).ready(function(){
                $("#addressGeneratingNXS").click(function(){
                     var btc_wallet_address='<?php echo $NXS_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalNXS").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableNXS").modal('show');
                    }
                 });
                $("#NXSButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $NXS_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalNXS").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_nxswallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });

            $(document).ready(function(){
                $("#addressGeneratingNXT").click(function(){
                     var btc_wallet_address='<?php echo $NXT_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalNXT").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableNXT").modal('show');
                    }
                 });
                $("#NXTButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $NXT_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalNXT").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_nxtwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });

            $(document).ready(function(){
                $("#addressGeneratingONX").click(function(){
                     var btc_wallet_address='<?php echo $ONX_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalONX").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableONX").modal('show');
                    }
                 });
                $("#ONXButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $ONX_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalONX").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_onxwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });

            $(document).ready(function(){
                $("#addressGeneratingPINK").click(function(){
                     var btc_wallet_address='<?php echo $PINK_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalPINK").modal('show');
                    }
                    else{
                        $("#walletAddressAvailablePINK").modal('show');
                    }
                 });
                $("#PINKButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $PINK_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalPINK").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_pinkwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
            $(document).ready(function(){
                $("#addressGeneratingPIVX").click(function(){
                     var btc_wallet_address='<?php echo $PIVX_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalPIVX").modal('show');
                    }
                    else{
                        $("#walletAddressAvailablePIVX").modal('show');
                    }
                 });
                $("#PIVXButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $PIVX_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalPIVX").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_pivxwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
			$(document).ready(function(){
                $("#addressGeneratingPOSW").click(function(){
                     var btc_wallet_address='<?php echo $POSW_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalPOSW").modal('show');
                    }
                    else{
                        $("#walletAddressAvailablePOSW").modal('show');
                    }
                 });
                $("#POSWButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $POSW_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalPOSW").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_poswwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
            $(document).ready(function(){
                $("#addressGeneratingPOT").click(function(){
                     var btc_wallet_address='<?php echo $POT_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalPOT").modal('show');
                    }
                    else{
                        $("#walletAddressAvailablePOT").modal('show');
                    }
                 });
                $("#POTButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $POT_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalPOT").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_potwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
            $(document).ready(function(){
                $("#addressGeneratingPPC").click(function(){
                     var btc_wallet_address='<?php echo $PPC_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalPPC").modal('show');
                    }
                    else{
                        $("#walletAddressAvailablePPC").modal('show');
                    }
                 });
                $("#PPCButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $PPC_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalPPC").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_ppcwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
            $(document).ready(function(){
                $("#addressGeneratingPROC").click(function(){
                     var btc_wallet_address='<?php echo $PROC_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalPROC").modal('show');
                    }
                    else{
                        $("#walletAddressAvailablePROC").modal('show');
                    }
                 });
                $("#PROCButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $PROC_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalPROC").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_procwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
            $(document).ready(function(){
                $("#addressGeneratingPURA").click(function(){
                     var btc_wallet_address='<?php echo $PURA_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalPURA").modal('show');
                    }
                    else{
                        $("#walletAddressAvailablePURA").modal('show');
                    }
                 });
                $("#PURAButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $PURA_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalPURA").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_purawallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
            $(document).ready(function(){
                $("#addressGeneratingQRK").click(function(){
                     var btc_wallet_address='<?php echo $QRK_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalQRK").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableQRK").modal('show');
                    }
                 });
                $("#QRKButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $QRK_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalQRK").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_qrkwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
            $(document).ready(function(){
                $("#addressGeneratingQTUM").click(function(){
                     var btc_wallet_address='<?php echo $QTUM_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalQTUM").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableQTUM").modal('show');
                    }
                 });
                $("#QTUMButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $QTUM_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalQTUM").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_qtumwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });       
            $(document).ready(function(){
                $("#addressGeneratingSMART").click(function(){
                     var btc_wallet_address='<?php echo $SMART_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalSMART").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableSMART").modal('show');
                    }
                 });
                $("#SMARTButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $SMART_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalSMART").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_smartwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
            $(document).ready(function(){
                $("#addressGeneratingSTRAT").click(function(){
                     var btc_wallet_address='<?php echo $STRAT_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalSTRAT").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableSTRAT").modal('show');
                    }
                 });
                $("#STRATButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $STRAT_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalSTRAT").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_stratwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
            $(document).ready(function(){
                $("#addressGeneratingSTV").click(function(){
                     var btc_wallet_address='<?php echo $STV_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalSTV").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableSTV").modal('show');
                    }
                 });
                $("#STVButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $STV_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalSTV").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_stvwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
            $(document).ready(function(){
                $("#addressGeneratingSYS").click(function(){
                     var btc_wallet_address='<?php echo $SYS_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalSYS").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableSYS").modal('show');
                    }
                 });
                $("#SYSButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $SYS_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalSYS").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_syswallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
            $(document).ready(function(){
                $("#addressGeneratingUBQ").click(function(){
                     var btc_wallet_address='<?php echo $UBQ_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalUBQ").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableUBQ").modal('show');
                    }
                 });
                $("#UBQButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $UBQ_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalUBQ").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_ubqwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
            $(document).ready(function(){
                $("#addressGeneratingVOX").click(function(){
                     var btc_wallet_address='<?php echo $VOX_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalVOX").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableVOX").modal('show');
                    }
                 });
                $("#VOXButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $VOX_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalVOX").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_voxwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
            $(document).ready(function(){
                $("#addressGeneratingVTC").click(function(){
                     var btc_wallet_address='<?php echo $VTC_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalVTC").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableVTC").modal('show');
                    }
                 });
                $("#VTCButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $VTC_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalVTC").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_vtcwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
            $(document).ready(function(){
                $("#addressGeneratingWAVES").click(function(){
                     var btc_wallet_address='<?php echo $WAVES_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalWAVES").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableWAVES").modal('show');
                    }
                 });
                $("#WAVESButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $WAVES_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalWAVES").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_waveswallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
            $(document).ready(function(){
                $("#addressGeneratingXCP").click(function(){
                     var btc_wallet_address='<?php echo $XCP_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalXCP").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableXCP").modal('show');
                    }
                 });
                $("#XCPButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $XCP_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalXCP").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_xcpwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
            $(document).ready(function(){
                $("#addressGeneratingXMR").click(function(){
                     var btc_wallet_address='<?php echo $XMR_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalXMR").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableXMR").modal('show');
                    }
                 });
                $("#XMRButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $XMR_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalXMR").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_xmrwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
            $(document).ready(function(){
                $("#addressGeneratingXVG").click(function(){
                     var btc_wallet_address='<?php echo $XVG_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalXVG").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableXVG").modal('show');
                    }
                 });
                $("#XVGButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $XVG_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalXVG").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_xvgwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
            $(document).ready(function(){
                $("#addressGeneratingZEC").click(function(){
                     var btc_wallet_address='<?php echo $ZEC_wallet_address;?>';
                    if(btc_wallet_address==''){
                     $("#addressGeneratingModalZEC").modal('show');
                    }
                    else{
                        $("#walletAddressAvailableZEC").modal('show');
                    }
                 });
                $("#ZECButtonForWalletAddress").click(function(){
                    var btc_wallet_address='<?php echo $ZEC_wallet_address;?>';
                    if(btc_wallet_address=='')
                    {
                        $("#addressGeneratingModalZEC").modal('hide');
                        //alert('preparing');
                        $.ajax({
                        type:'POST',
                        data:{btc_wallet_address:btc_wallet_address},
                        url: '<?php echo base_url(); ?>user_profile/create_zecwallet_address',
                        beforeSend: function () {
                            $(".processingGif").show();
                        },
                        complete: function () {
                                $(".processingGif").hide();
                            },
                        success:function(result)
                        {
                            $('#result1').html(result);
                            alert(result);
                            document.location.reload();
                        }
                        });
                    }     
                });
            });
            