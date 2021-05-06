<?php
	
	require "../core/ClientC.php";
  require "../entities/Admin.php";
  require "../core/AdminC.php";
	session_start();

	if(isset($_POST['Seconnecter']))
	{
		$Identiconnect= htmlspecialchars($_POST['email']);
		$password=sha1($_POST['pass']);
		if(!empty($Identiconnect) AND !empty($password))
		{
			$client= new ClientC;
      $admin= new Admin($Identiconnect,$password);
      $adminC = new AdminC;
			$existance= $client->Seconnecter($Identiconnect,$password);
      $Information_Connect=$existance->fetch();
      $existanceadmin= $adminC->Seconnecter($admin);
      $Information_Admin= $existanceadmin->fetch();
			if($existance->rowCount()!=0 AND $Information_Connect['Confirme']==1)
			{
				
				$_SESSION['id'] = $Information_Connect['id'];
				$_SESSION['Nom'] = $Information_Connect['Nom'];
				$_SESSION['Prenom'] = $Information_Connect['Prenom'];
				$_SESSION['Email']=$Information_Connect['Email'];
				$_SESSION['Pseudo'] = $Information_Connect['Pseudo'];
				$_SESSION['DateNaissance'] = $Information_Connect['DateNaissance'];
				header("Location:Profile.php?id=".$_SESSION['id']);
			}
			if ($existanceadmin->rowCount()!=0)
			{
				$_SESSION['Admin']= $Information_Admin['Login'];
        header("Location:indexDashboard.php?Admin=Admin");
			}
      if($Information_Connect['Confirme']==0)
      {
        $error="Veuillez confirmer votre compte";
      }
      if($existance->rowCount()==0)
      {
        $error="Email/Pseudo ou Mot De Passe érroné";
      }

		}
		else 
		{
			$error="Tous les champs doivent être remplis !";
		}
	}
?>
<!doctype html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/faviconb170.png?12626281137656706160" type="image/png" />
  <title>
    Account &ndash; dudu-demo-02
  </title>

  <meta property="og:type" content="website">
  <meta property="og:title" content="Account">
  <meta property="og:url" content="login.html">
  
  <meta property="og:image" content="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/logob170.png?12626281137656706160">
  <meta property="og:image:secure_url" content="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/logob170.png?12626281137656706160">
  


<meta property="og:site_name" content="dudu-demo-02">



<meta name="twitter:card" content="summary">





  <!-- Helpers ================================================== -->
  <link rel="canonical" href="login.html">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="theme-color" content="#ff5894">
  
  <!-- CSS ================================================== -->
  <link href="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/timber.scssb170.css?12626281137656706160" rel="stylesheet" type="text/css" media="all" />
  <link href="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/fonts.minb170.css?12626281137656706160" rel="stylesheet" type="text/css" media="all" />  
  <link href="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/styleb170.css?12626281137656706160" rel="stylesheet" type="text/css" media="all" />   
  <link href="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/settingsb170.css?12626281137656706160" rel="stylesheet" type="text/css" media="all" />
  <link href="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/prettyPhotob170.css?12626281137656706160" rel="stylesheet" type="text/css" media="all" />
  <link href="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/jquery.hotspotb170.css?12626281137656706160" rel="stylesheet" type="text/css" media="all" />
  <link href="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/owl-carouselb170.css?12626281137656706160" rel="stylesheet" type="text/css" media="all" />  
  <link href="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/slick.scssb170.css?12626281137656706160" rel="stylesheet" type="text/css" media="all" />
  <link href="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/slick-themeb170.css?12626281137656706160" rel="stylesheet" type="text/css" media="all" />
  <link href="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/flex-sliderb170.css?12626281137656706160" rel="stylesheet" type="text/css" media="all" />
  <link href="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/magnific-popupb170.css?12626281137656706160" rel="stylesheet" type="text/css" media="all" /> 
   <link href="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/animateb170.css?12626281137656706160" rel="stylesheet" type="text/css" media="all" /> 
  
  
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Barlow+Semi+Condensed:300,300italic,400,600,400italic,600italic,700,700italic,800,800italic">
  
  
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Barlow+Semi+Condensed:300,300italic,400,600,400italic,600italic,700,700italic,800,800italic">
  
  
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Barlow+Semi+Condensed:300,300italic,400,600,400italic,600italic,700,700italic,800,800italic">
  


  <!-- Header hook for plugins ================================================== -->

<link rel="stylesheet" media="screen" href="../../cdn.shopify.com/s/files/1/2664/1702/t/2/compiled_assets/stylesb170.css?12626281137656706160">
<script id="sections-script" defer="defer" data-sections="header-model-8" src="../../cdn.shopify.com/s/files/1/2664/1702/t/2/compiled_assets/scriptsb170.js?12626281137656706160"></script>

  <script src="../../code.jquery.com/jquery-3.2.1.min.js"></script>  
  <script src="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/jquery-2.2.0.minb170.js?12626281137656706160" type="text/javascript"></script>
  <script src="../../ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script> 
  
  <script src="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/jquery-cookie.minb170.js?12626281137656706160" type="text/javascript"></script>
  <script src="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/modernizr.minb170.js?12626281137656706160" type="text/javascript"></script>
  <script src="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/jquery.flexslider.minb170.js?12626281137656706160" type="text/javascript"></script>
 
  
  <script src="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/jquery.stickyb170.js?12626281137656706160" type="text/javascript"></script>  
  

  
  <script src="../../cdn.shopify.com/s/assets/themes_support/shopify_common-040322ee69221c50a47032355f2f7e6cbae505567e2157d53dfb0a2e7701839c.js" type="text/javascript"></script>
  
  <script src="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/bootstrap.minb170.js?12626281137656706160" type="text/javascript"></script> 
  

  

   <script>
  // Wait for window load
	$(window).load(function() {		
     var loader = $( '.se-pre-con' );
		if ( loader.length ) {
			$( window ).on( 'beforeunload', function() {
				loader.fadeIn( 500, function() {
					loader.children().fadeIn( 100 )
				});
			});
			loader.fadeOut(1500 );
			loader.children().fadeOut();
		}
     
     });
   </script> 
  

</head>

<body id="account" class="template-customers-login" >
  <div class="se-pre-con"></div> 
  <div id="PageContainer"></div>   
  <div class="quick-view"></div>         
  
  <div id="shopify-section-header-model-8" class="shopify-section"><div data-section-id="header-model-8" data-section-type="header-type-8" class="header-type-8">  
      
  <div id="SearchDrawer" class="search-bar drawer drawer--top search-bar-type-3">
  <div class="search-bar__table">
    <form action="https://dudu-demo-02.myshopify.com/search" method="get" class="search-bar__table-cell search-bar__form" role="search">
      <input type="hidden" name="type" value="product">
      <div class="search-bar__table">
        <div class="search-bar__table-cell search-bar__icon-cell">
          <button type="submit" class="search-bar__icon-button search-bar__submit">
            <span class="zmdi zmdi-search" aria-hidden="true"></span>
          </button>
        </div>
        <div class="search-bar__table-cell">
          <input type="search" id="SearchInput" name="q" value="" placeholder="Search..." aria-label="Search..." class="search-bar__input">
        </div>
      </div>
    </form>
    <div class="search-bar__table-cell text-right">
      <button type="button" class="search-bar__icon-button search-bar__close js-drawer-close">
        <span class="zmdi zmdi-close" aria-hidden="true"></span>
      </button>
    </div>
  </div>
</div>
  
  <header class="site-header">
    <div class="header-sticky">
      <div id="header-landing" class="sticky-animate">
        <div class="wrapper">
          <div class="grid--full site-header__menubar"> 

            
  <div class="h1 grid__item wide--one-sixth post-large--one-sixth large--one-sixth site-header__logo" itemscope itemtype="http://schema.org/Organization">
    <a href="../index.html" style="max-width: 450px;">
      <img class="normal-logo" src="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/logob170.png?12626281137656706160" alt="dudu-demo-02" itemprop="logo">
    </a>
    
    
  </div>

   
            <div class="grid__item wide--five-sixths post-large--five-sixths large--five-sixths menubar-section">
              <div class="menu-tool medium-down--hide">
                          <div class="menu-tool">
            <div class="container"> 
              
              <ul class="site-nav">
                                
                
                

                

                <li >
                  <a class="" href="../index.html">
                    Home
                    
                  </a> 	    
                  
                  
                  <ul class="site-nav-dropdown">
                    
                  </ul>
                  
                </li>
                                
                
                

                

                <li >
                  <a class="" href="../collections/all.html">
                    Herbal
                    
                  </a> 	    
                  
                  
                  <ul class="site-nav-dropdown">
                    
                  </ul>
                  
                </li>
                                
                
                

                

                <li >
                  <a class="" href="../products/vega-hair-back-combing-brush.html">
                    Treatment
                    
                  </a> 	    
                  
                  
                  <ul class="site-nav-dropdown">
                    
                  </ul>
                  
                </li>
                                
                
                

                

                <li >
                  <a class="" href="../collections.html">
                    Catalog
                    
                  </a> 	    
                  
                  <div class="site-nav-dropdown">                               
                    
                    
                    <div class="container style_1">
                      <div class="col-1 parent-mega-menu">
                        
                      </div>

                        
                      <div class="col-2">
                        
                        <div class="col-left">
                          
                            




                          
                        </div>
                        

                        <div class="col-right">
                          
                          
                          <a href="#">
                            <img src="../../cdn.shopify.com/s/assets/no-image-2048-5e88c1b20e087fb7bbe9a3771824e743c244f437e4f8ba93bbf7b11b53f7824c.gif" alt=""/>
                          </a>
                        </div>
                      </div>
                      
                      
                    </div>
                    <script type="text/javascript">
                      $('.dropdown.mega-menu').hover(function(){  
                        $('.main-content').addClass('call-overlay');
                      },function(){   
                        $('.main-content').removeClass('call-overlay');
                      });
                    </script>
                  </div>      
                  
                </li>
                                
                
                

                

                <li class="dropdown ">
                  <a class="" href="../pages/produit-us.html">
                    Pages
                    <i class="zmdi zmdi-caret-down"></i>
                  </a> 	    
                  
                  
                  <ul class="site-nav-dropdown">
                    
                    <li >                    
                      <a href="../pages/produit-us.html" class="">               
                        <span>               
                          produit Us                
                        </span>
                        
                      </a>
                      <ul class="site-nav-dropdown">
                        
                      </ul>
                    </li>
                    
                    <li >                    
                      <a href="../pages/contact-us.html" class="">               
                        <span>               
                          Contact Us                
                        </span>
                        
                      </a>
                      <ul class="site-nav-dropdown">
                        
                      </ul>
                    </li>
                    
                  </ul>
                  
                </li>
                                
                
                

                

                <li >
                  <a class="" href="../blogs/news.html">
                    Blog
                    
                  </a> 	    
                  
                  
                  <ul class="site-nav-dropdown">
                    
                  </ul>
                  
                </li>
                
              </ul>
            </div>
          </div>
              </div>

              <div class="menu-icon">         
                <div class="header-bar__module cart header_cart">
                  
                  <!-- Mini Cart Start -->
<div class="baskettop">
  <div class="wrapper-top-cart">
    <a href="javascript:void(0)" id="ToggleDown" class="icon-cart-arrow">
      
      <i class="fa fa-shopping-basket" aria-hidden="true"></i>
      <div class="detail">
        <div id="cartCount"> 
          0
        </div>
      </div>
      

      
      
      
     
       
      
     
      
      
     
     
      
    </a> 
    <div id="slidedown-cart" style="display:none"> 
      <!--  <h3>Shopping cart</h3>-->
      <div class="no-items">
        <p>Your cart is currently empty!</p>
        <p class="text-continue"><a class="btn" href="javascript:void(0)">Continue shopping</a></p>
      </div>
      <div class="has-items">
        <ul class="mini-products-list">  
          
        </ul>
        <div class="summary">                
          <p class="total">
            <span class="label">Cart total:</span>
            <span class="price"><span class=money>$0.00</span></span> 
          </p>
        </div>
        <div class="actions">
          <button class="btn" onclick="window.location='../cart.html'"><i class="icon-check"></i>Check Out</button>
          <button class="btn text-cart" onclick="window.location='../cart.html'"><i class="icon-basket"></i>View Cart</button>
        </div>
      </div>
    </div>
  </div>
</div> <!-- End Top Header -->  
                   
                </div> 
                                
                <div class="header-search">
                  <div class="header-search">
                    <a href="../search.html" class="site-header__link site-header__search js-drawer-open-top">
                      <span class="fa fa-search" aria-hidden="true"></span>
                    </a>
                  </div>
                </div>
                  


                <ul class="menu_bar_right">
                  <li>
                    <div class="slidedown_section">
                      <a  id="Togglemodal" class="icon-cart-arrow"><i class="fa fa-bars"></i></a>
                      <div id="slidedown-modal">
                        <div class="header-panel-top">
                          <ul>
                            <li class="currency dropdown-parent uppercase currency-block">
                                  
                              <a class="currency_wrapper dropdown-toggle" href="javascript:;" data-toggle="dropdown">
  <span class="currency_code"><i class="flag-usd"></i>USD</span><span class="fa fa-angle-down"></span>
  </a>

<ul class="currencies flag-dropdown-menu">
    
  
  
    <li class="currency-USD  active ">
      <a href="javascript:;"><i class="flag-usd"></i><span>USD</span></a>
      <input type="hidden" value="USD">
    </li>
  
  
   
  
    <li class="currency-EUR ">
      <a href="javascript:;"><i class="flag-eur"></i><span>EUR</span></a>
      <input type="hidden" value="EUR">
    </li>
  
  
  
  
    <li class="currency-GBP ">
      <a href="javascript:;"><i class="flag-gbp"></i><span>GBP</span></a>
      <input type="hidden" value="GBP">
    </li>
  
  
  
  
    <li class="currency-AUD ">
      <a href="javascript:;"><i class="flag-aud"></i><span>AUD</span></a>
      <input type="hidden" value="AUD">
    </li>
  
  
  
  
    <li class="currency-INR ">
      <a href="javascript:;"><i class="flag-inr"></i><span>INR</span></a>
      <input type="hidden" value="INR">
    </li>
  
    
  
  
  
   
  
  
  
  
  
  
  
  
  
  
  
  </ul>


<select class="currencies_src hide" name="currencies" style="display:none">
  
  
  <option data-currency="USD"  selected  value="USD">USD</option> 
  
  
  
  <option data-currency="EUR"  value="EUR">EUR</option> 
  
  
  
  <option data-currency="GBP"  value="GBP">GBP</option> 
  
  
  
  <option data-currency="AUD"  value="AUD">AUD</option> 
  
  
  
  <option data-currency="INR"  value="INR">INR</option> 
  
   
  
  
  
  
  
  
  
  
  
</select>





                              
                            </li>


                                    
                            <li>
                              <div class="customer_account">                          
                                <ul>
                                  
                                  
                                  <li>
                                    <a href="Login.php" title="Log in">Log in</a>
                                  </li>
                                  <li>
                                    <a href="Inscription.php" title="Create account">Create account</a>
                                  </li>          
                                    
                                   
                                     
                                  <li>
                                     <a class="wishlist" href="../pages/wishlist.html" title="Wishlist">Wishlist</a>
 
                                  </li>
                                   
                                </ul>
                              </div>    
                            </li>
                             
                          </ul>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div> 
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="mobile-nav-section wide--hide post-large--hide large--hide">
    <button type="button" class="mobile-nav-trigger" id="MobileNavTrigger">
      <i class="icon-menu" aria-hidden="true"></i> <span>  Menu </span>
    </button>  
  </div>
  <ul id="MobileNav" class="mobile-nav wide--hide">
  
                                
  
  <li class="mobile-nav__link" aria-haspopup="true">
    
      <a href="../index.html" class="mobile-nav">
        Home
      </a>
    
  </li>
                  
  
  <li class="mobile-nav__link" aria-haspopup="true">
    
      <a href="../collections/all.html" class="mobile-nav">
        Herbal
      </a>
    
  </li>
                  
  
  <li class="mobile-nav__link" aria-haspopup="true">
    
      <a href="../products/vega-hair-back-combing-brush.html" class="mobile-nav">
        Treatment
      </a>
    
  </li>
                  
  
  <li class="mobile-nav__link" aria-haspopup="true">
    
      <a href="../collections.html" class="mobile-nav">
        Catalog
      </a>
    
  </li>
                  
  
  <li class="mobile-nav__link" aria-haspopup="true">
    
      <a href="../pages/produit-us.html">
        Pages
        
      </a>
    <span class="mobile-nav__sublist-trigger"><span class="mobile-nav__sublist-expand">
 
  <span class="fallback-text">+</span>
</span>
<span class="mobile-nav__sublist-contract">
  <span class="fallback-text">-</span>
</span></span>
      <ul class="mobile-nav__sublist">  
        
           
        
            <li class="mobile-nav__sublist-link">
              <a href="../pages/produit-us.html">produit Us</a>
             </li>
         
         
		
           
        
            <li class="mobile-nav__sublist-link">
              <a href="../pages/contact-us.html">Contact Us</a>
             </li>
         
         
		
      </ul>
    
  </li>
                  
  
  <li class="mobile-nav__link" aria-haspopup="true">
    
      <a href="../blogs/news.html" class="mobile-nav">
        Blog
      </a>
    
  </li>
  

  
  
</ul>

  <style> 
    /* Top block */
    .header-type-8 .top_bar { background: ; }
    .header-type-8 .top_bar li, .header-type-8 .top_bar span { color:;}     
    .header-type-8 .top_bar a { color:;}    
    .header-type-8 .top_bar a:hover { color:;}    
    .header-type-8 .header-bar__module.cart .baskettop a.icon-cart-arrow #cartCount { background: #3f2803;color:#ffffff;}
    .header-type-8 .header-bar__module.cart .baskettop a.icon-cart-arrow:hover #cartCount { background: #ff5894;color:#ffffff;}

    /* Logo block */
    .header-type-8 .site-header__logo a { color:#3f2803;}
    .header-type-8 .site-header__logo a:hover { color:#ff5894;}    


    /* Menu  block */
       .header-type-8 .site-header__menubar,.header-type-8 .is-sticky .site-header__menubar  { background:#fff; }  

    
    .header-type-8 .menu-tool ul li {color: ;}
    .header-type-8 .menu-tool ul li a {color:#3f2803;}  
    .header-type-8 .menu-tool ul li a:hover,.header-type-8 .menu-tool .site-nav > li > a.current:hover {color:#ff5894;} 
    .header-type-8 .menu-tool .site-nav >  li > a.current {color:#ff5894;} 
    .header-type-8 .site-nav-dropdown { background: #fff;}
    .header-type-8 .site-nav-dropdown .inner > a {color: #3f2803;}    
    .header-type-8 .site-nav-dropdown .inner > a:hover {color: #ff5894;}    
    .header-type-8 .site-nav-dropdown .inner .dropdown a,.header-type-8 .menu-tool .site-nav .site-nav-dropdown li a  {color: #000;}
    .header-type-8 .site-nav-dropdown .inner .dropdown a:hover,.header-type-8 .menu-tool .site-nav .site-nav-dropdown li a:hover {color: #ff5894;}

    /* Dropdown block */
    .header-type-8 .menubar-section #Togglemodal i {color: #3f2803;}
    .header-type-8 .menubar-section #Togglemodal i:hover {color: #ff5894;}
    .header-type-8 #slidedown-modal {background: #ffffff;}
    .header-type-8 #slidedown-modal ul li a {color:#3f2803;} 
    .header-type-8 #slidedown-modal ul li a:hover {color:#ff5894;} 

    /* Search block */     
    .header-type-8 .search-bar input[type="search"] {color:#3f2803;} 
    .header-type-8 .header-search span  {color:#3f2803;} 
    .header-type-8 .header-search span:hover {color:#ff5894;} 
    .header-type-8 .search-bar__form button,.header-type-8 .search-bar__icon-button { color:#3f2803;}
    .header-type-8 .search-bar__form button:hover,.header-type-8 .search-bar__icon-button:hover { color:#ff5894;}

    .header-type-8 .search-bar input[type="search"]::-webkit-input-placeholder  { /* Chrome/Opera/Safari */
      color:#3f2803;
    }
    .header-type-8 .search-bar input[type="search"]::-moz-placeholder { /* Firefox 19+ */
      color:#3f2803;
    }
    .header-type-8 .search-bar input[type="search"]:-ms-input-placeholder { /* IE 10+ */
      color:#3f2803;
    }
    .header-type-8 .search-bar input[type="search"]:-moz-placeholder { /* Firefox 18- */
      color:#3f2803;
    }

    /* Cart Summary block */

    .header-type-8 #slidedown-cart .actions, .header-type-8  #slidedown-cart  {background: #ffffff;}
    .header-type-8 .header-bar__module a {color:#3f2803;} 
    .header-type-8 .header-bar__module.cart .baskettop a.icon-cart-arrow i { color: #3f2803;}
    .header-type-8 .header-bar__module.cart .baskettop a.icon-cart-arrow:hover i {color: #ff5894;}
    .header-type-8 .header-bar__module a:hover {color:#ff5894;} 
    .header-type-8 .header-bar__module .btn {color:#ffffff;background: #ff5894;} 
    .header-type-8 .header-bar__module .btn:hover {color:#ffffff;background: #3f2803;} 
    .header-type-8 #slidedown-cart li { border-bottom:1px solid #e4e4e4; }


    /* Currency block */
    .header-type-8 .tbl-list>li.currency .flag-dropdown-menu  {background: ;}
    .header-type-8 .flag-dropdown-menu li a span {color: ;}
    .header-type-8 .flag-dropdown-menu li a:hover span {color:;}  
    .header-type-8  #slidedown-cart .total .price, .header-type-8 #minicart_total {color:#3f2803;}   



    /* Header borders */
    .header-type-8 .site-nav>li>a:before {background: #e4e4e4; }

    @media(max-width:767px){ 

      .header-type-8 .site-header__menubar { background:#fff; } 
    }
  </style> 
</div>






</div>  
    
   

<nav class="breadcrumb" aria-label="breadcrumbs">
 


  
<h1>Account</h1>
    <a href="../index.html" title="Back to the frontpage">Home</a>

   <span aria-hidden="true" class="breadcrumb__sep">&#47;</span>
   <span>Account</span>

  
</nav>


  
 
 <div class="dt-sc-hr-invisible-large"></div>
  
    <main class="main-content">  
            
      <div class="container">
        
        <div class="grid__item">  
          
          <div class="container">
<div class="grid">

  <div class="grid__item small--text-center">

    
    <div class="note form-success" id="ResetSuccess" style="display:none;">
      We&#39;ve sent you an email with a link to update your password.
    </div>

    <div id="CustomerLoginForm">
      <form method="post" id="customer_login" accept-charset="UTF-8"><input type="hidden" name="form_type" value="customer_login" /><input type="hidden" name="utf8" value="✓" />

        

        

        <label for="CustomerEmail" class="label--hidden">Email</label>
        <input type="text" name="email" id="CustomerEmail" placeholder="Email/Pseudo" autocorrect="off" autocapitalize="off" autofocus>

        

          <label for="CustomerPassword" class="label--hidden">Password</label>
          <input type="password" value="" name="pass" id="CustomerPassword" placeholder="Password" >

          <p>
            <a href="RecuperationMdp.php">Forgot your password?</a>
          </p>

        <?php 
        	if(isset($error))
        	{
          		echo '<font color ="red">'.$error.'</font>';
        	}
        ?>

        <p>
          <input type="submit" class="btn" value="Sign In" name="Seconnecter">
        </p>
        
          <p>
            <a href="Inscription.php" id="customer_register_link">Create account</a>
          </p>
        
        <a href="../index.html">Return to Store</a>

      </form>
    </div>

    
    <div id="RecoverPasswordForm" style="display: none;">

      <div class="section-header section-header--small">
        <h2 class="section-header__title">Reset your password</h2>
      </div>
      <p>We will send you an email to reset your password.</p>

      
      <form method="post" action="https://dudu-demo-02.myshopify.com/account/recover" accept-charset="UTF-8"><input type="hidden" name="form_type" value="recover_customer_password" /><input type="hidden" name="utf8" value="✓" />

        

        
        

        <label for="RecoverEmail" class="label--hidden">Email</label>
        <input type="email" value="" name="email" id="RecoverEmail" placeholder="Email" autocorrect="off" autocapitalize="off">

        <p>
          <input type="submit" class="btn" value="Submit">
        </p>
        <a href="#" onclick="hideRecoverPasswordForm();return false;">Cancel</a>
      </form>

    </div>

    
    

  </div>

</div>

<script>
  /*
    Show/hide the recover password form when requested.
  */
  function showRecoverPasswordForm() {
    document.getElementById('RecoverPasswordForm').style.display = 'block';
    document.getElementById('CustomerLoginForm').style.display='none';
  }

  function hideRecoverPasswordForm() {
    document.getElementById('RecoverPasswordForm').style.display = 'none';
    document.getElementById('CustomerLoginForm').style.display = 'block';
  }

  // Allow deep linking to the recover password form
  if (window.location.hash == '#recover') { showRecoverPasswordForm() }

  // reset_success is only true when the reset form is
  
</script>
</div>		          
        </div>        
        
      </div>
      
      
      <div class="dt-sc-hr-invisible-large"></div>
      
      
    </main>
  
  
  
  <div id="shopify-section-footer-model-7" class="shopify-section">
<div data-section-id="footer-model-7"  data-section-type="Footer-model-7" class="footer-model-7">  
  <footer class="site-footer" style="background:#d3f1f9; ">    
           
    
    
   
    
   

    <div class="container">
      <div class="grid-uniform">
      
      <div class="grid__item wide--one-half post-large--one-half large--one-half medium--one-half">
        <div class="footer-logo">
                    
          <a href="../index.html">
            <img class="normal-footer-logo" src="../../cdn.shopify.com/s/files/1/2664/1702/files/logo_200x4039.png?v=1514295213" alt="dudu-demo-02" />
          </a>
            
                
          <p style="color:#3f2803">Rediscover your true self through Dudu Spa World where you would get soothing spa treatments, relaxing and refreshing body massages.  Indulge in our many splendored aromatherapy and Ayurvedic treatments that will be invigorating and uplifting your spirit!</p> 
          
        </div>
        
        
        <div class="footer_contact_info">
          <ul>
             <li class="address"> <h6 style="color:#3f2803"><span class="fa fa-home"></span></h6>  <p style="color:#3f2803"> 1203 Town Center</p><mark></mark> </li>
            <li><h6 style="color:#3f2803"><span class="fa fa-rocket"></span></h6>
            <p> <a style="color:#3f2803" title="" href="#">support@lovefashion.com</a> </p> 
            <p> <a style="color:#3f2803" title="" href="#"></a> </p> 

            </li>
            
            
          </ul>
          <div class="footer_social_icons">
                  
            <ul class="inline-list social-icons social-links-type-1">
  
    <li>
      <a  class="icon-fallback-text twitt hexagon" target="blank" href="https://twitter.com/shopify" onmouseover="this.style.color='';" onmouseout="this.style.color='';" title="Twitter">
        <span class="fa fa-twitter" aria-hidden="true"></span>       
      </a>
    </li>
  
  
    <li>
      <a  class="icon-fallback-text fb hexagon" target="blank" href="https://www.facebook.com/shopify" onmouseover="this.style.color='';" onmouseout="this.style.color='';" title="Facebook">
        <span class="fa fa-facebook" aria-hidden="true"></span>
        <span class="fallback-text">Facebook</span>
      </a>
    </li>
  
  
  
    <li>
      <a  class="icon-fallback-text google hexagon" target="blank" href="#" onmouseover="this.style.color='';" onmouseout="this.style.color='';" title="Google+" rel="publisher">
        <span class="fa fa-google" aria-hidden="true"></span>
        <span class="fallback-text">Google</span>
      </a>
    </li>
  
  
  
    <li>
      <a  class="icon-fallback-text tumblr" target="blank" href="#" onmouseover="this.style.color='';" onmouseout="this.style.color='';" title="Tumblr">
        <span class="fa fa-tumblr" aria-hidden="true"></span>
        <span class="fallback-text">Tumblr</span>
      </a>
    </li>
  
  
  
  
  
</ul>

            
          </div>
        </div>

      </div>
      
      

      <div class="grid__item wide--one-quarter post-large--one-quarter large--one-half medium--one-half">
        <div class="home-blog">

          
          <h4 style="color:#3f2803">Blogs</h4>
          
               
          <div class="grid__item odd">
            <div class="f_home-blog-image">
              
              <img src="../../cdn.shopify.com/s/files/1/2664/1702/articles/b11_smalldeb4.jpg?v=1514545631" alt="Manicure & Pedicure specialists" />
              
            </div>
            <div class="f_home-blog-content">
              <h6><a href="../blogs/news/every-11th-person-plays-for-free-1.html">Manicure & Pedicure specialists</a></h6>
              <div class="f_blog_content">
                
                <p style="color:#3f2803;" class="blog-date">
                  <i class="zmdi zmdi-calendar"></i> <span data-datetime="2017-12-29"><span class="date">Dec 29 , 2017</span></span>             
                </p>
                
                
                
                
                <p style="color:#3f2803;" class="comments-count"><i class="zmdi zmdi-comments"></i>0</p>
                
                
              </div>
            </div>
          </div>
               
          <div class="grid__item even">
            <div class="f_home-blog-image">
              
              <img src="../../cdn.shopify.com/s/files/1/2664/1702/articles/b8_small1de3.jpg?v=1514545468" alt="Heated pool at Dudu Spa" />
              
            </div>
            <div class="f_home-blog-content">
              <h6><a href="../blogs/news/natural-spa.html">Heated pool at Dudu Spa</a></h6>
              <div class="f_blog_content">
                
                <p style="color:#3f2803;" class="blog-date">
                  <i class="zmdi zmdi-calendar"></i> <span data-datetime="2017-12-29"><span class="date">Dec 29 , 2017</span></span>             
                </p>
                
                
                
                
                <p style="color:#3f2803;" class="comments-count"><i class="zmdi zmdi-comments"></i>0</p>
                
                
              </div>
            </div>
          </div>
               
          <div class="grid__item odd">
            <div class="f_home-blog-image">
              
              <img src="../../cdn.shopify.com/s/files/1/2664/1702/articles/b9_small8964.jpg?v=1514545405" alt="After a refreshing Sauna bath" />
              
            </div>
            <div class="f_home-blog-content">
              <h6><a href="../blogs/news/techniques-for-body-mind-coordination.html">After a refreshing Sauna bath</a></h6>
              <div class="f_blog_content">
                
                <p style="color:#3f2803;" class="blog-date">
                  <i class="zmdi zmdi-calendar"></i> <span data-datetime="2017-12-29"><span class="date">Dec 29 , 2017</span></span>             
                </p>
                
                
                
                
                <p style="color:#3f2803;" class="comments-count"><i class="zmdi zmdi-comments"></i>0</p>
                
                
              </div>
            </div>
          </div>
          
        </div>
      </div>
      

     

      
      <div class="grid__item wide--one-quarter post-large--one-quarter large--one-half medium--one-half"> 
        <div class="instagram">
          
          <h4 style="color:#3f2803;"><span> Instagram Feed</span></h4> 
          
          <input type="hidden" id="token-footer-model-7" value="5505566489.1677ed0.189582a99f7d4ddd9135203f09776949">
          <div class="lush-instagram" data-id="footer-model-7">
            <div id="instafeed-footer-model-7" class="-footer-model-7" data-sort-by="none">              
            </div>
          </div>
        </div>
      </div>
      
      </div>
    </div>
  </footer>
  
  <div class="footer-bottom" style="background:#ffffff;">
    <div class="container">
      
      <p style="color:#3f2803;" class="copyright">Copyright &copy; 2018, dudu-demo-02
        
        <a target="_blank" rel="nofollow" href="https://www.shopify.com/?utm_campaign=poweredby&amp;utm_medium=shopify&amp;utm_source=onlinestore">Powered by Shopify</a>
        
      </p>
      
      
      <div class="footer-icons">        
        <ul class="inline-list payment-icons">
                <li><a href="../cart.html"><img src="../../cdn.shopify.com/s/files/1/2664/1702/files/cirrus-32_small1078.png?v=1514382388" alt="payment_icon_1" /></a></li>
                <li><a href="../cart.html"><img src="../../cdn.shopify.com/s/files/1/2664/1702/files/american-express-32_small27f9.png?v=1514382369" alt="payment_icon_2" /></a></li>
                <li><a href="../cart.html"><img src="../../cdn.shopify.com/s/files/1/2664/1702/files/paypal-32_smallcdbc.png?v=1514382418" alt="payment_icon_3" /></a></li>
                <li><a href="../cart.html"><img src="../../cdn.shopify.com/s/files/1/2664/1702/files/solo-32_smallff8f.png?v=1514382440" alt="payment_icon_4" /></a></li>
                <li><a href="../cart.html"><img src="../../cdn.shopify.com/s/files/1/2664/1702/files/paypal-32_b852b46c-fb7d-4a79-a7b2-9fcbaa700df6_small3add.png?v=1514382461" alt="payment_icon_5" /></a></li>
                            
                            
                            
                            
                            
              </ul>                            
      </div> 
      
    </div>
  </div>
  
  <style>


    .footer-model-7 .short-desc a:hover,.footer-model-7 .site-footer__links li a:hover,.footer-model-7 .site-footer a:hover { color:#ff5894 !important; }
    .footer-model-7 .site-footer .social-icons li a:hover span { border-color:#ff5894;background:#ff5894;color:#ffffff; }
    .footer-model-7 .site-footer .social-icons li a span { border-color:#3f2803;color:#3f2803; }
    .footer-model-7 .copyright a { color:#3f2803; }
    .footer-model-7 .copyright a:hover { color:#ff5894; }
    .footer-model-7 .f_home-blog-content h6 a { color:#3f2803; }
    .footer-model-7 .f_home-blog-content h6 a:hover { color:#ff5894 !important; }
    .footer-model-7 h4 { border-bottom:1px solid rgba(0,0,0,0); }
    .footer-model-7 .site-footer__links li a { border-bottom:1px solid #ffffff; }
    .footer-model-7 .site-footer__links li:last-child a { border-bottom:none; }
}
    .footer-model-7 .site-footer__links li a:hover:before { background:#ff5894; }
    
    
    .lush-instagram .info { background: rgba(63, 40, 3, 0.7); }
    
    




  </style>
  
  <link href="http://cdn.shopify.com/s/files/1/2664/1702/t/2/assets/slick.scss?12626281137656706160" rel="stylesheet" type="text/css" media="all" />
  <script src="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/instagramb170.js?12626281137656706160" type="text/javascript"></script>
  
</div>


</div>
  
  

  <script src="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/timberb170.js?12626281137656706160" type="text/javascript"></script>  
  <script src="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/jquery.inviewb170.js?12626281137656706160" type="text/javascript"></script>
  <script src="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/jquery-easing-1.3b170.js?12626281137656706160" type="text/javascript"></script>   
  <script src="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/themeb170.js?12626281137656706160" type="text/javascript"></script>
  <script src="../../cdn.shopify.com/s/assets/themes_support/option_selection-ea4f4a242e299f2227b2b8038152223f741e90780c0c766883939e8902542bda.js" type="text/javascript"></script>
  <script src="../../cdn.shopify.com/s/assets/themes_support/api.jquery-0ea851da22ae87c0290f4eeb24bc8b513ca182f3eb721d147c009ae0f5ce14f9.js" type="text/javascript"></script>   
  <script src="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/jquery.historyb170.js?12626281137656706160" type="text/javascript"></script>  
  <script src="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/jquery.storageapi.minb170.js?12626281137656706160" type="text/javascript"></script>  
  <script src="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/smartalertb170.js?12626281137656706160" type="text/javascript"></script>
  <script src="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/shopb170.js?12626281137656706160" type="text/javascript"></script>  
  <script src="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/owl.carousel.minb170.js?12626281137656706160" type="text/javascript"></script>
  <script src="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/jquery-ui-totopb170.js?12626281137656706160" type="text/javascript"></script>   
  <script src="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/jquery.tabs.minb170.js?12626281137656706160" type="text/javascript"></script>  
  <script src="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/slickb170.js?12626281137656706160" type="text/javascript"></script>
  
  

   
    
  

  <script>
    window.use_sticky = true;
    window.ajax_cart = true;
    window.money_format = "<span class=money>${{amount}} USD<span>";
    window.shop_currency = "USD";
    window.show_multiple_currencies = true;
    window.enable_sidebar_multiple_choice = true;
    window.loading_url = "../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/loadingb170.gif?12626281137656706160";     
    window.dropdowncart_type = "hover";
    window.file_url = "http://cdn.shopify.com/s/files/1/2664/1702/files/?12626281137656706160";
    window.asset_url = "";
    window.items="Items";
    window.many_in_stock="Many In Stock";
    window.out_of_stock=" Out of stock";
    window.in_stock=" In Stock";
    window.unavailable="Unavailable";
    window.product_name="Product Name";
    window.product_image="Product Image";
    window.product_desc="Product Description";
    window.available_stock="Available In stock";
    window.unavailable_stock="Unavailable In stock";
    window.compare_note="Product Added over 8 product !. Do you want to compare 8 added product ?";
    window.added_to_cmp="Added to compare";
    window.add_to_cmp="Add to compare";
    window.select_options="Select options";
    window.add_to_cart="Add to Cart";
    window.confirm_box="Yes,I want view it!";
    window.cancelButtonText="Continue";
        window.remove="Remove";

	var  compare_list = []; 
  </script>  

  <script src="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/countdownb170.js?12626281137656706160" type="text/javascript"></script>
  <script src="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/jquery.elevatezoomb170.js?12626281137656706160" type="text/javascript"></script>
  
  
  
  
  <!-- Begin quick-view-template -->
<div class="clearfix" id="quickview-template" style="display:none">
  <div class="overlay"></div>
  <div class="content clearfix">
    <div class="product-img images">
      <div class="quickview-featured-image product-photo-container"></div>
      <div class="more-view-wrapper">
        <ul class="product-photo-thumbs quickview-more-views-owlslider">
        </ul>
      </div>
    </div>
    <div class="product-shop summary">
      <div class="product-item product-detail-section">
        <h2 class="product-title"><a>&nbsp;</a></h2>
        <p class="item-text product-description"></p>
        <div class="prices product_price">
          <label>Effective Price:</label>
          <span class="price h2" id="QProductPrice"></span>
          <span class="compare-price" id="QComparePrice"></span>
        </div>
        
        <div class="product-infor">
          <p class="product-inventory"><label>Availability:</label><span></span></p>    
        </div>
        
        <div class="details clearfix">
          <form action="https://dudu-demo-02.myshopify.com/cart/add" method="post" class="variants">
            <select name='id' style="display:none"></select>
            <div class="qty-section quantity-box">
              <label>Quantity:</label>
              <div class="dec button qtyminus">-</div>
              <input type="number" name="quantity" id="Qty" value="1" class="quantity">
              <div class="inc button qtyplus">+</div>
            </div>
            
            
            <div class="total-price">
              <label>Subtotal</label><span></span>
            </div>
            
            
            
            <div class="actions">
                <button type="button" class="add-to-cart-btn btn">
                  Add to Cart
                </button>
              </div>
             
          </form>
        </div>     
      </div>
    </div>  
 <a href="javascript:void(0)" class="close-window"></a> 
  </div>
 
</div>
<!-- End of quick-view-template -->
<script type="text/javascript">  
  Shopify.doNotTriggerClickOnThumb = false; 
                                       
  var selectCallbackQuickview = function(variant, selector) {
      var productItem = jQuery('.quick-view .product-item');
          addToCart = productItem.find('.add-to-cart-btn'),
          productPrice = productItem.find('.price'),
          comparePrice = productItem.find('.compare-price'),
          totalPrice = productItem.find('.total-price span'),
          inventory = productItem.find('.product-inventory');
      if (variant) {
        if (variant.available) {          
          // We have a valid product variant, so enable the submit button
          addToCart.removeClass('disabled').removeAttr('disabled').text('Add to Cart');
          inventory.css("opacity","1");
    
        } else {
          // Variant is sold out, disable the submit button
          addToCart.val('Sold Out').addClass('disabled').attr('disabled', 'disabled');
          inventory.css("opacity","0");
        }
    
        // Regardless of stock, update the product price
        productPrice.html(Shopify.formatMoney(variant.price, "<span class=money>${{amount}}</span>"));
    
        // Also update and show the product's compare price if necessary
        if ( variant.compare_at_price > variant.price ) {
          comparePrice
            .html(Shopify.formatMoney(variant.compare_at_price, "<span class=money>${{amount}}</span>"))
            .show();
          productPrice.addClass('on-sale');
        } else {
          comparePrice.hide();
          productPrice.removeClass('on-sale');
        }
    
    
          var inventoryInfo = productItem.find('.product-inventory span');
          if (variant.available) {
            if (variant.inventory_management == shopify ) {              
              inventoryInfo.text(window.in_stock);
            } else {
              inventoryInfo.text(window.many_in_stock);
            }
          } else {
            inventoryInfo.text(window.out_of_stock);
          }
    
    
    
    
    /*recaculate total price*/
        //try pattern one before pattern 2
        var regex = /([0-9]+[.|,][0-9]+[.|,][0-9]+)/g;
        var unitPriceTextMatch = jQuery('.quick-view .price').text().match(regex);

        if (!unitPriceTextMatch) {
          regex = /([0-9]+[.|,][0-9]+)/g;
          unitPriceTextMatch = jQuery('.quick-view .price').text().match(regex);     
        }

        if (unitPriceTextMatch) {
          var unitPriceText = unitPriceTextMatch[0];     
          var unitPrice = unitPriceText.replace(/[.|,]/g,'');
          var quantity = parseInt(jQuery('.quick-view input[name=quantity]').val());
          var totalPrice = unitPrice * quantity;

          var totalPriceText = Shopify.formatMoney(totalPrice, window.money_format);
          regex = /([0-9]+[.|,][0-9]+[.|,][0-9]+)/g;     
          if (!totalPriceText.match(regex)) {
            regex = /([0-9]+[.|,][0-9]+)/g;
          } 
          totalPriceText = totalPriceText.match(regex)[0];

          var regInput = new RegExp(unitPriceText, "g"); 
          var totalPriceHtml = jQuery('.quick-view .price').html().replace(regInput ,totalPriceText);
          jQuery('.quick-view .total-price span').html(totalPriceHtml);     
          console.log(totalPriceText);
        }
    /*end of price calculation*/
    
    
        Currency.convertAll('USD', jQuery('#currencies').val(), 'span.money', 'money_format');
                            
        /*begin variant image*/
        if (variant && variant.featured_image) {
            var newImage = Shopify.resizeImage(variant.featured_image.src, 'small');
            newImage = newImage.replace(/https?:/,'');
            jQuery('.quick-view .quickview-more-views img').each(function() {
              var grandSize = jQuery(this).attr('src');
              if (grandSize == newImage) {
                jQuery(this).parent().trigger('click');              
                return false;
              }
            });
        }
        /*end of variant image*/ 
      } else {
        // The variant doesn't exist. Just a safegaurd for errors, but disable the submit button anyway
        addToCart.text('Unavailable').addClass('disabled').attr('disabled', 'disabled');
        inventory.css("opacity","0");
      }   
  };  
  
  </script>

  <div class="loading-modal compare_modal">Loading</div>
<div class="ajax-success-compare-modal compare_modal" id="moda-compare" tabindex="-1" role="dialog" style="display:none">
  <div class="overlay"> </div>
    <div class="modal-dialog modal-lg">
      <div class="modal-content content" id="compare-modal">
        <div class="modal-header">

          <h4 class="modal-title">Compare Products</h4>
        </div>
        <div class="modal-body">
          <div class="table-wrapper">
            <table class="table table-hover">
              <thead>
                <tr class="th-compare">
                  <th></th>
                </tr>
              </thead>
              <tbody id="table-compare">

              </tbody>

            </table>
           </div>
        </div>
        <div class="modal-footer">
           <a href="javascript:void(0)" class="close-modal"><i class="zmdi zmdi-close-circle"></i></a>
        </div>         
      </div>
    </div>
  </div>

 
  <div class="loading-modal modal">Loading</div>
<div class="ajax-error-modal modal">
  <div class="modal-inner">
    <div class="ajax-error-title">Error</div>
    <div class="ajax-error-message"></div>
  </div>
</div>
<div class="ajax-success-modal modal">
  	<div class="overlay"></div>
	<div class="content"> 
      
      <p class="added-to-cart info">Added to cart</p>
      <p class="added-to-wishlist info">translation missing: en.products.wishlist.added_to_wishlist</p>
      <div class="ajax-left">        
      <img class="ajax-product-image" alt="modal window" src="../index.html" />
      </div>
      <div class="ajax-right"> 
        <h3 class="ajax-product-title">Product name</h3>
        <span class="ajax_price"></span>
        <div class="success-message added-to-cart"><a href="../cart.html" class="btn"><i class="fa fa-shopping-cart"></i>View Cart</a> </div>  
        <div class="success-message added-to-wishlist"> <a href="../pages/wishlist.html" class="btn"><i class="fa fa-heart"></i>View Wishlist</a></div>                
      </div>
    <a href="javascript:void(0)" class="close-modal"><i class="fa fa-times-circle"></i></a>
 	</div>    
</div>
  
<script src="../../cdn.shopify.com/s/javascripts/currencies.js" type="text/javascript"></script>
<script src="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/jquery.currencies.minb170.js?12626281137656706160" type="text/javascript"></script>

<script type="text/javascript">
  
  jQuery('.currencies li').on('click', function() {
    jQuery('.currencies li').removeClass('active');
    jQuery(this).addClass('active');
    
    var selectedValue = jQuery(this).find('input[type=hidden]').val();
    
    jQuery('.currencies_src option').attr('selected', false);
    jQuery('.currencies_src option[value='+selectedValue+']').attr('selected', true);
    
    Currency.convertAll(Currency.currentCurrency, selectedValue);
    
    
    jQuery('.currency_code').html($(this).find('a').html());
  });
  
 
  Currency.format = 'money_format';
  var shopCurrency = 'USD';
  
  /* Sometimes merchants change their shop currency, let's tell our JavaScript file */
 // Currency.moneyFormats[shopCurrency].money_with_currency_format = "${{amount}} USD";
  Currency.moneyFormats[shopCurrency].money_format = "${{amount}}";

  /* Default currency */
  var defaultCurrency = 'USD';

  /* Cookie currency */
  var cookieCurrency = Currency.cookie.read();
  /* Fix for customer account pages */
  jQuery('span.money span.money').each(function() {
    jQuery(this).parents('span.money').removeClass('money');
  });
  /* Saving the current price */
  jQuery('span.money').each(function() {
    jQuery(this).attr('data-currency-USD', jQuery(this).html());
  });
  // If there's no cookie.
  if (cookieCurrency == null) {
    if (shopCurrency !== defaultCurrency) {
      Currency.convertAll(shopCurrency, defaultCurrency);
    }
    else {
      Currency.currentCurrency = defaultCurrency;
    }
  }
  // If the cookie value does not correspond to any value in the currency dropdown.
  else if (jQuery('[name=currencies]').size() && jQuery('[name=currencies] option[value=' + cookieCurrency + ']').size() === 0) {
    Currency.currentCurrency = shopCurrency;
    Currency.cookie.write(shopCurrency);
  }
  else if (cookieCurrency === shopCurrency) {
    Currency.currentCurrency = shopCurrency;
  }
  else {
    Currency.convertAll(shopCurrency, cookieCurrency);
    jQuery('.currencies li').removeClass('active');
    jQuery('.currencies .currency-'+cookieCurrency).addClass('active');
    jQuery('.currency_code').html(jQuery('.currencies .currency-'+cookieCurrency).find('a').html());
  }
  jQuery('.currencies_src').on("change", function(e) {
      var newCurrency = jQuery(e.currentTarget).find(':selected').attr('value');
    Currency.convertAll(Currency.currentCurrency, newCurrency);
    jQuery('.selected-currency').text(Currency.currentCurrency);
     if($('.template-product').length != 0)
     {
     	  updatePricing();
     }
  }); 
</script>





    
  
<script type="text/javascript">// <![CDATA[
  jQuery(document).ready(function() {    //
    var $modalParent        = jQuery('div.newsletterwrapper'),
        modalWindow         = jQuery('#email-modal'),
        emailModal          = jQuery('#email-modal'),
        modalPageURL        = window.location.pathname; 

    modalWindow = modalWindow.html();
    modalWindow = '<div id="email-modal">' + modalWindow + '</div>';
    $modalParent.css({'position':'relative'});
    jQuery('.wrapper #email-modal').remove();
    $modalParent.append(modalWindow);

    if (jQuery.cookie('emailSubcribeModal') != 'closed') {
      openEmailModalWindow();
    };

    jQuery('#email-modal .btn.close').click(function(e) {
      e.preventDefault();
      closeEmailModalWindow();
    });
    jQuery('body').keydown(function(e) {
      if( e.which == 27) {
        closeEmailModalWindow();
        jQuery('body').unbind('keydown');
      }
    });
    jQuery('#mc_embed_signup form').submit(function() {
      if (jQuery('#mc_embed_signup .email').val() != '') {
        closeEmailModalWindow();
      }
    });

    function closeEmailModalWindow () {
      jQuery('#email-modal .modal-window').fadeOut(600, function() {
        jQuery('#email-modal .modal-overlay').fadeOut(600, function() {
          jQuery('#email-modal').hide();
          jQuery.cookie('emailSubcribeModal', 'closed', {expires:1, path:'/'});
        });
      })
    }
    function openEmailModalWindow () {
      jQuery('#email-modal').fadeIn(600, function() {
        jQuery('#email-modal .modal-window').fadeIn(600);
      });
    }

  });
  // ]]
  // ]]></script>
<div class="newsletterwrapper">
  <div id="email-modal" style="display: none;">
    <div class="modal-overlay"></div>
    <div class="modal-window" style="display: none;">
      <div class="window-window">
        <a class="btn close" title="Close Window"></a>




        <div class="window-content">

          <div class="grid__item post-large one-half">
             <img src="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/popup_newsletter_imgb170.jpg?12626281137656706160" alt="Get to know the latest offers">
          </div>
          <div class="grid__item post-large one-half">
            <div id="mailchimp-email-subscibe">
              <div class="newsletter-title">
                <h2 class="title">Get to know the latest offers</h2>
              </div>
              <p class="message">Subscribe and get notified at first on the latest update and offers!</p>

              <div id="mc_embed_signup">
                

<form action="http://myshopify.us2.list-manage.com/subscribe/post?u=057ce5c6d3419dc4a568a2790&amp;id=78371397b0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank">
  <input type="email" value="" placeholder="Email address" name="EMAIL" id="mail" aria-label="Email address">
  <button type="submit" class="btn" name="subscribe" id="subscribe">Send</button>
</form>

              </div>   
              <span>Note: We do not spam</span>
               <ul class="inline-list social-icons">
  
    <li>
      <a class="icon-fallback-text twitt hexagon" target="blank" href="https://twitter.com/shopify" title="Twitter">
       
     
        <span class="icon-social-twitter" aria-hidden="true"></span>
       
      </a>
    </li>
  
  
    <li>
      <a class="icon-fallback-text fb hexagon" target="blank" href="https://www.facebook.com/shopify" title="Facebook">
        <span class="icon-social-facebook" aria-hidden="true"></span>
        <span class="fallback-text">Facebook</span>
      </a>
    </li>
  
  
  
    <li>
      <a class="icon-fallback-text google hexagon" target="blank" href="#" title="Google+" rel="publisher">
        <span class="icon-social-google" aria-hidden="true"></span>
        <span class="fallback-text">Google</span>
      </a>
    </li>
  
  
  
    <li>
      <a class="icon-fallback-text tumblr" target="blank" href="#" title="Tumblr">
        <span class="icon-social-tumblr" aria-hidden="true"></span>
        <span class="fallback-text">Tumblr</span>
      </a>
    </li>
  
  
  
  
  
</ul>

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
  
  
  <script src="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/wowb170.js?12626281137656706160" type="text/javascript"></script>  
  
  <script src="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/classieb170.js?12626281137656706160"></script>
  <script src="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/latest-productsb170.js?12626281137656706160"></script>
  <script src="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/jquery.prettyPhotob170.js?12626281137656706160"></script>

<script>
  $('.qtyplus').click(function(e){
    e.preventDefault();
    var currentVal = parseInt($('input[name="quantity"]').val());
    if (!isNaN(currentVal)) {
      $('input[name="quantity"]').val(currentVal + 1);
    } else {
      $('input[name="quantity"]').val(1);
    }

  });

  $(".qtyminus").click(function(e) {

    e.preventDefault();
    var currentVal = parseInt($('input[name="quantity"]').val());
    if (!isNaN(currentVal) && currentVal > 0) {
      $('input[name="quantity"]').val(currentVal - 1);
    } else {
      $('input[name="quantity"]').val(1);
    }

  });
</script>
  
  
 <script type="text/javascript">
    $('.quick-view .close-window').click(function() {  			
	$('.quick-view').switchClass("open-in","open-out");
	});
</script>
  <script src="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/uisearchb170.js?12626281137656706160"></script>
  
  
  
  <!-- End Recently Viewed Products -->
    
  
   <script src="../../cdn.shopify.com/s/files/1/2664/1702/t/2/assets/magnific-popupb170.js?12626281137656706160" type="text/javascript"></script>
   <script type="text/javascript">
  if ( $( '.p-video' ).length > 0 ) {
			$( '.jas-popup-url' ).magnificPopup({
				disableOn: 0,
				tLoading: '<div class="loader"><div class="loader-inner"></div></div>',
				type: 'iframe'
			});
		}
     </script>
</body>

<!-- Mirrored from dudu-demo-02.myshopify.com/account/login by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Mar 2018 11:05:31 GMT -->
</html>


