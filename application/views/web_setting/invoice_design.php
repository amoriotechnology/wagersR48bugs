

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />









<?php 
echo base_url() ;


?>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<!-- Add new customer start -->
<style type="text/css">
.panel-body{
  padding:25px;
}
    .dot1 {
  height: 25px;
  width: 25px;
  background-color: #D7163A;

  display: inline-block;
}
.colorpad:hover;
{

 color: #f4511e;
}
.dot2 {
  height: 25px;
  width: 25px;
  background-color: #720303;

  display: inline-block;
}
.dot3 {
  height: 25px;
  width: 25px;
  background-color: #71D716;

  display: inline-block;
}
.dot4 {
  height: 25px;
  width: 25px;
  background-color: #3616D7;

  display: inline-block;
}
.dot5 {
  height: 25px;
  width: 25px;
  background-color: #D7B916;

  display: inline-block;
}
.dot6 {
  height: 25px;
  width: 25px;
  background-color: #D79A16;

  display: inline-block;
}
#templates>img:hover
{

background-color: orange;
border: 1px solid orange;
}
#templates>img
{
    width: 50%;
}
#templatetext
{
    margin-left:20px;
     font-size: 10px;
    font-style: italic;
    font-family: ui-monospace;
}
.logo-9 i{
    font-size:80px;
    position:absolute;
    z-index:0;
    text-align:center;
    width:100%;
    left:0;
    top:-10px;
    color:#34495e;
    -webkit-animation:ring 2s ease infinite;
    animation:ring 2s ease infinite;
}
.logo-9 h1{
    font-family: 'Lora', serif;
    font-weight:600;
    text-transform:uppercase;
    font-size:40px;
    position:relative;
    z-index:1;
    color:#e74c3c;
    text-shadow: 3px 3px 0 #fff, -3px -3px 0 #fff, 3px -3px 0 #fff, -3px 3px 0 #fff;
}
   .logo-9{
    position:relative;
}
   /*//side*/
.bar {
  float: left;
  width: 25px;
  height: 3px;
  border-radius: 4px;
  background-color: #4B9CDB;
}
.load-10 .bar {
  animation: loadingJ 2s cubic-bezier(0.17, 0.37, 0.43, 0.67) infinite;
}
@keyframes loadingJ {
  0%,
  100% {
    transform: translate(0, 0);
  }
  50% {
    transform: translate(80px, 0);
    background-color: #F5634A;
    width: 170px;
  }
}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('Invoice Design') ?></h1>
<small><?php echo display('') ?></small>
        <ol class="breadcrumb"   style=" border: 3px solid #D7D4D6;"   >
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('web_settings') ?></a></li>
                <li class="active" style="color:orange;" ><?php echo display('Invoice Design') ?></li>
                <div class="load-wrapp">
       <div class="load-10">
         <div class="bar"></div>
       </div>
       </div>
            </ol>
        </div>
    </section>

    <section class="content">
        <!-- Alert Message -->      
        <?php
        $message = $this->session->userdata('message');
        if (isset($message)) {
            ?>
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $message ?>                    
            </div>
            <?php
            $this->session->unset_userdata('message');
        }
        $error_message = $this->session->userdata('error_message');
        if (isset($error_message)) {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error_message ?>                    
            </div>
            <?php
            $this->session->unset_userdata('error_message');
        }
        ?>



        <!-- New customer -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                      <div class="container">
                          <div class="row">
                              <div class="col-sm-4  "> <div class="panel panel-default">

                                <label><?php echo display('Invoice Header') ?></label>

    <div class="panel-body"> <input type="text" class='form-control' onblur="header(this.value)" name="header" id='header'>
        <br>
        <img src="<?php echo base_url().'assets/images/templatelogo.png'; ?>" id='template' style='width: 17%;'>  <?php echo display('Dive in with Template' )?>
        <br><br>

            <table id="templateformart">
                <tr>
                    <td>
                        <a href=<?php echo base_url('Cinvoice/updateinvoicedesign/1').'/'.$_SESSION['user_id']; ?> id='templates' ><img  src="data:image/png;base64,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"></a>
                        <p   id='templatetext'   >Classic</p>
                    </td>
                    <td><a href="<?php echo base_url('Cinvoice/updateinvoicedesign/2').'/'.$_SESSION['user_id'];; ?> " id='templates'><img  src="data:image/png;base64,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"></a><p   id='templatetext'   >Mild</p></td>
                    <td><a href="<?php echo base_url('Cinvoice/updateinvoicedesign/3').'/'.$_SESSION['user_id']; ?> " id='templates'><img  src="data:image/png;base64,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"></a><p   id='templatetext'   >Trendy</p></td>
                                        <td><a href="<?php echo base_url('Cinvoice/updateinvoicedesign/4').'/'.$_SESSION['user_id']; ?> " id='templates'><img  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHwAAACmCAYAAAAYu+v3AAAAAXNSR0IArs4c6QAACiZJREFUeAHtnVtvG8cVx8+uKFIUFd0pWbJzcdTaiYtckIc8FAXcp36Jfo+iH6Fov1FfjAB9KFCgRQDXdiI7iePKsixTtK0LJd62exgTkKXh8sx4h9w9/A9gUxzOnp3z/+3cd2cDisOdO/+81o66f42C6PcU0QbHIShRIKBdovCbUjj1p9u3v34SMOxW1P2WKFpW4iLcMCkQUL0UTn9R4JLNsFdXlujWzS0qlYqm5IjLqQJnzSbdf/CI9mv1pWa39bewV43HzgB2TokOyXapWKRPP9l6kyq4HfbbbJTsIcrl+GeGHgQBRVF0JcyxH8i6gwIA7iBang8B8DzTc8h7weGYtw5pNlt00jgl7g2GQRj38qepMlumqampt9LhSzYUcALe6XTpyc4u7T2v0evDo0uehGFIS4vztLmxRlfWVi/9jojxKWANfPfZPn3/6DE14xI9KHS7XaodvOz9++nnHbp1Y4vm5+cGJUf8CBUQt+FRRPRg+0e6e387EfbFvB8eHtO//nOXdvf2L/6E72NQQFzCH2z/QP/beeaURS7xd+9tE1f169UVkY14zChK55qIx6WTGETAd57uOcM+L+p/7z/sdejmKrPnoy/93Wq16OCgfik+zYhKpUJzc5U0TebC1tAqvd3u0PYPj1NxptPp0PcPf0rFFoy4KTAU+OMnO9Rqtd2sG47izlz95WvDL4gahQJDq/Rney9Szwfb5GHboDA9PU2rq7K2fpCNYfFBPGcwiSER+MlJozepkrYw+7UD+pQ+TjSLiZtEeZx/TLzMj+MZNB/h7KxJ3HNHGL0CicAZjK9w6tG2rzxrsJtYpfscqybZ5tLfaDS86sv9hGK8TjxpIRF4qTjtTY8k2zx8Ozo69nZuNszj8EkEnlilV4ZMkLgSKZdnerNursfjOHcFEkt4eabUm41Ku7RVV5NvkOXqvlQquXslOLJQmMzl20TgrNvG+iptp1y9ss2kUCgUaHFxISkJfnNUILFKZ5sfXNtI9dbltXjxZP49LJU68nrnw4YC5xWuT359/Z1PxAampwt041cfpWILRtwUGAqczXKp/Pij993O8OaoMAzo89/cJO4XIIxPgaFteD9rW9ff7/WsH/34M9/f3I8WfXLJ/uzWDVpeQrssEsxjIjFwzsP1D6/G7W+FvouXOI+PT0TZ4keYbsZNwmw8FEMYvwJWwDm7K8uL9Nuvv+zdssQ3MR7UXxLf1Hg+FOMJGwa9eWUtcVXs/DH4ezQKWAPvZ2tjvRoP2aq96p3nxZvxvyBup/mRJX60BSGbCjgD77vDkyTcEUNnrK9Itj9FvfRsu4Dc2SgA4DZqKUgL4Aog2rgA4DZqKUgL4Aog2rgA4DZqKUgL4Aog2rgA4DZqKUgrnng5qL/yco+6Ag3H6gJvvpD0UMfFzImB85Oje/u1i8fj+5gVuLq57gc4L5rwoghCthRYXBj8yJYpp+ISzlcSQv4VQKct/wytPABwK7nynxjA88/QygMAt5Ir/4kBPP8MrTwAcCu58p8YwPPP0MoDALeSK/+JxRMv7KrtAwhpypO0gUCa57H103e+kjR3ObcYeLvdplq8Gc+4wtpatber/yjOv7//QnRx8y4Sy8tL3rLED3scHV3evLh/QhdNUKX31ZuQTwCfENB9N8VVOj+k73uzvH6mTJ8u7ZXJjiRuZSV5h4q+Dd95mo3XumcSnrZ1Ob8YODs5KZvlZcVPBpp2XlCl94vrhHwC+ISA7rsprtJ5szzee3Xcgds13obEZ5DuWjU1FVK5XPaWFd43Pmk3TJf93q2AHx/73SxPohx3YnwDPzk5EY/DfQLnN0Ylac776Nl23PwWFQlBpBmpAuISzleS783yJJ7bXtESmxfT8KYGkm1sfG/ux/aTNHfRQgychweTslnewkI2Nh9i2EnAL16oku+o0iUqKUoD4IpgSlwBcIlKitKI23BeHvX9LrF30ZXbugXLpzAGne/5c9lbFHl9wffyaNKwrFpdtR6WiYGzOEmL8YPEG1283e6Qw/KVFV/Tzgeq9GHklf0uLuE8LPNZfb2rrmnOvi0tLYqy4zIOFhl+k4jfHJH0AKfL+cXA2Tjf0jMJISt+8kWc5oXM7FClT8IVfM5HAD8nxiT8Ka7SeXn09PRsJJrwsmPaU4o2GZcuA3N1m3QLks05TWl5KMwrZoMCLxXbBivgh4eHtvad0vP7xMYJnG8NlgyHuK33CZzXwpNuU+ZOnW3HDVW60yWZ34PEJXyUvXSewRpnkJ5fms7VF27a0h4xiJXN+jjcVVTTcVmZb5iZmYmbjHRfHYIq3URccRyAK4Zrcg3ATaoojgNwxXBNrgG4SRXFcQCuGK7JNQA3qaI4DsAVwzW5BuAmVRTHAbhiuCbXANykiuI4AFcM1+QagJtUURwH4IrhmlwDcJMqiuMAXDFck2sAblJFcRyAK4Zrcg3ATaoojgNwxXBNrgG4SRXFcQCuGK7JNQA3qaI4DsAVwzW5BuAmVRTHAbhiuCbXANykiuI4AFcM1+QagJtUURwH4IrhmlwDcJMqiuMAXDFck2sAblJFcRyAK4Zrcg3ATaoojgNwxXBNrgG4SRXFcQCuGK7JNQA3qaI4DsAVwzW5BuAmVRTHAbhiuCbXANykiuI4AFcM1+QagJtUURwH4IrhmlwDcJMqiuMAXDFck2sAblJFcRyAK4Zrcg3ATaoojgNwxXBNrgG4SRXFceK3Gj1+8pRevR7Ni+oU6526a8vxm5Cvba6L7YqBv3p1SHv7NbFhJByNAr+8O80D8A8/uEpX1quj8QJnEStQLpfEaTmhuIQvzM9ZGUbibCqATls2uXjLFYB7kzabhgE8m1y85Urchnc6HXo9xmHZUjz8yHKo11+KssdvC56bq4jSnp6eUaPRGJjWRRMxcH6BerPZHHhy3z/w+W1fju47T337NtoEQf+o4Z9cyJI0d9EEVfpw3VWlEJfwMAzjqmh8Q7Oslm6+GjhvUm34PezSUCxy9T9YcxdNrIBXKrPSvE5cOh/acHvP/9IMqNLTVDMHtsQlnDsIrVbbi0uFwhRxk4HgXwExcO4x1ut1Lzman3+PyuWyF9ujMtpuywoDt7vSdrzbjajb7Qx04ZeFk4E/G38QAzcejcieAlz71WoHIjVKpSItLsrmFHgMfnR0NNDu2lrVeqhqBdylVzgwt/hhLAqIgXP1wVcUQr4VEAPPt5t+c8813/r6Wuon4aFe2sM9dI1Tx5RtgwCebT6p5w7AU5c02wYBPNt8Us8dgKcuabYNAni2+aSeOwBPXdJsGwTwbPNJPXdhfMfNU7Z6eja+25dS9woG31LgLGbL8/0U0G4h/u8ORfTHew8e0q2bW8ST+wh6FGDY97571HMoiII7wd//8e/NoNX4Nr4AVvW4CU8uKhDP/r4IS8GXvXsoe9Cbp38him7H620bFxPje44ViKLduC7/JirO/PkPv/uq13zn2Btk3VaB/wPRzABeRCnD6gAAAABJRU5ErkJggg=="></a><p   id='templatetext'   >Professional</p></td>

                
               
                </tr>
            </table>
<br>
<br>

          
             <img src="<?php echo base_url().'assets/images/coloricon.png'; ?>" id='templatecolor' style='width: 15%;'>  <?php echo display('Template Color')?>
        <br><br>
        <?php
        $colors = array("CadetBlue"=>"5F9EA0",
"SteelBlue"=>"4682B4",
"LightSteelBlue"=>"B0C4DE",
"LightBlue"=>"ADD8E6",
"PowderBlue"=>"B0E0E6",
"LightSkyBlue"=>"87CEFA",
"SkyBlue"=>"87CEEB",
"CornflowerBlue"=>"6495ED",
"DeepSkyBlue"=>"00BFFF",
"DodgerBlue"=>"1E90FF",
"RoyalBlue"=>"4169E1",
"Blue"=>"0000FF",
"MediumBlue"=>"0000CD",
"DarkBlue"=>"00008B",
"Navy"=>"000080",
"MidnightBlue"=>"191970",
"Brown Colors"=>"",
"Color Name"=>"HEX",
"Cornsilk"=>"FFF8DC",
"BlanchedAlmond"=>"FFEBCD",
"Bisque"=>"FFE4C4",
"NavajoWhite"=>"FFDEAD",
"Wheat"=>"F5DEB3",
"BurlyWood"=>"DEB887",
"Tan"=>"D2B48C",
"RosyBrown"=>"BC8F8F",
"SandyBrown"=>"F4A460",
"GoldenRod"=>"DAA520",
"DarkGoldenRod"=>"B8860B",
"Peru"=>"CD853F",
"Chocolate"=>"D2691E",
"Olive"=>"808000",
"SaddleBrown"=>"8B4513",
"Sienna"=>"A0522D",
"Brown"=>"A52A2A",
"Maroon"=>"800000",
"White Colors"=>"",
"Color Name"=>"HEX",
"White"=>"FFFFFF",
"Snow"=>"FFFAFA",
"HoneyDew"=>"F0FFF0",
"MintCream"=>"F5FFFA",
"Azure"=>"F0FFFF",
"AliceBlue"=>"F0F8FF",
"GhostWhite"=>"F8F8FF",
"WhiteSmoke"=>"F5F5F5",
"SeaShell"=>"FFF5EE",
"Beige"=>"F5F5DC",
"OldLace"=>"FDF5E6",
"FloralWhite"=>"FFFAF0",
"Ivory"=>"FFFFF0",
"AntiqueWhite"=>"FAEBD7",
"Linen"=>"FAF0E6",
"LavenderBlush"=>"FFF0F5",
"MistyRose"=>"FFE4E1",
"Grey Colors"=>"",
"Color Name"=>"HEX",
"Gainsboro"=>"DCDCDC",
"LightGray"=>"D3D3D3",
"Silver"=>"C0C0C0",
"DarkGray"=>"A9A9A9",
"DimGray"=>"696969",
"Gray"=>"808080",
"LightSlateGray"=>"778899",
"SlateGray"=>"708090",
"DarkSlateGray"=>"2F4F4F",
"Black"=>"000000",
"Lavender" =>"E6E6FA",	
"Thistle"=>"D8BFD8",	
"Plum"=>"DDA0DD",	
"Violet"=>"EE82EE",	
"Orchid"=>"DA70D6",	
"Fuchsia"=>"FF00FF",	
"Magenta"=>"FF00FF",	
"MediumOrchid"=>"BA55D3",	
"MediumPurple"=>"9370DB",	
"BlueViolet"=>"8A2BE2",
"DarkViolet"=>"9400D3",	
"DarkOrchid"=>"9932CC",	
"DarkMagenta"=>"8B008B",	
"Purple"=>"800080",
"RebeccaPurple"=>"663399",
"Indigo"=>"4B0082",	
"MediumSlateBlue"=>"7B68EE",	
"SlateBlue"=>"6A5ACD",	
"DarkSlateBlue"=>"483D8B",
"GreenYellow"=>"ADFF2F",	
"Chartreuse"=>"7FFF00",	
"LawnGreen"=>"7CFC00	",
"Lime"=>"00FF00",
"LimeGreen"=>"32CD32",	
"PaleGreen"=>"98FB98",	
"LightGreen"=>"90EE90",
"MediumSpringGreen"=>"00FA9A",	
"SpringGreen"=>"00FF7F",	
"MediumSeaGreen"=>"3CB371",	
"SeaGreen"=>"2E8B57",	
"ForestGreen"=>"228B22",	
"Green"=>"008000",	
"DarkGreen"=>"006400",	
"YellowGreen"=>"9ACD32",	
"OliveDrab"=>"6B8E23	",
"Olive"=>"808000",	
"DarkOliveGreen"=>"556B2F",	
"MediumAquamarine"=>"66CDAA	",
"DarkSeaGreen"=>"8FBC8F",
"LightSeaGreen"=>"20B2AA",	
"DarkCyan"=>"008B8B",	
"Teal"=>"008080",
"Black"=>"000000",

);


?>
        <table width="200" border="1" id="colorcombo">
  <tbody>
    <?php 
foreach ($colors as $key => $value)

{
?>
    <tr>
     <td  style="background-color:#<?php echo $value; ?>;" onclick="dot('<?php echo $value; ?>')" > <a class='colorpad' style="color:#000;margin-left: 30%;"  ><?php echo $key; ?></a></td>
     
    </tr>
   <?php 
}
   ?>
    
  
  </tbody>
</table>

    </div>
  </div>    </div>
            <?php
            //////////////Design one///////////// 
            if($template==1)
            {
            ?>

        <div class="col-sm-8" > <div class="panel panel-default">
    <div class="panel-body">
        
        <div class="row">
        
              <div class="col-sm-3" id='company_info'>
                  
                  <?php echo display('Company name') ?>:<?php echo $cname; ?><br>
                  <?php echo display('Address') ?>:<?php echo $address; ?><br>
                  <?php echo display('Email') ?>:<?php echo $email; ?><br>
                  <?php echo display('Contact') ?>:<?php echo $mobile; ?><br>
              </div>
            <div class="col-sm-6 text-center"><h3><?php echo $header; ?></h3></div>
            <div class="col-sm-3"><img src="<?php echo  base_url().$invoice_logo; ?>" style='width: 40%;'></div>
        </div>
        <div class="row">
            <br>
            <br>

<br>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Commercial</td>
    <td>Date</td>
    <td>Total Due</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>enclosed</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Material</td>
    <td>Description</td>
    <td>Qty</td>
    <td>Rate</td>
    <td>Amount</td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
</table>

<!--   <br><button type="button"  class="btnclr btn m-b-5 m-r-2"   style="color:white;background-color: #337ab7;border-color: #2e6da4;"  data-toggle="modal" data-target="#myModal">-->
<!--Preview-->
<!--</button>-->
        </div>
    </div>
  </div></div>

            <?php 

            }
    elseif($template==2)
    {
            ?>
          <div class="col-sm-8" > <div class="panel panel-default">
    <div class="panel-body">
        
        <div class="row">
            <div class="col-sm-3"><img src="<?php echo base_url().$invoice_logo; ?>" style='width: 40%;'>
               
              </div>
            <div class="col-sm-5 text-center"><h3><?php echo $header; ?></h3></div>
           <div class="col-sm-4" id='company_info'>
                  
                   <?php echo display('Company name') ?>:<?php echo $cname; ?><br>
                  <?php echo display('Address') ?>:<?php echo $address; ?><br>
                  <?php echo display('Email') ?>:<?php echo $email; ?><br>
                  <?php echo display('Contact') ?>:<?php echo $mobile; ?><br>
              </div>
        </div>

        <div class="row">

            <div class="col-sm-6"></div>
            
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Commercial</td>
    <td>Date</td>
    <td>Total Due</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>enclosed</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Material</td>
    <td>Description</td>
    <td>Qty</td>
    <td>Rate</td>
    <td>Amount</td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
</table>

<!--   <br><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">-->
<!--Preview-->
<!--</button>-->
        </div>
    </div>
  </div></div>

            <?php 
                   }
    elseif($template==3)
    {
        ?>
    <div class="col-sm-8" > <div class="panel panel-default">
    <div class="panel-body">
        
        <div class="row">


               
            <div class="col-sm-3 text-center" style="text-align: left;"><h3><?php echo $header; ?></h3></div>
            

            <div class="col-sm-4" style="text-align: center;"><img src="<?php echo  base_url().$invoice_logo; ?>" style='width: 40%;'>              </div>

          


              <!-- </div> -->

           <div class="col-sm-3" id='company_info'>
                  
                  <?php echo display('Company name') ?>:<?php echo $cname; ?><br>
                  <?php echo display('Address') ?>:<?php echo $address; ?><br>
                  <?php echo display('Email') ?>:<?php echo $email; ?><br>
                  <?php echo display('Contact') ?>:<?php echo $mobile; ?><br>
           
              </div>
        </div>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-sm-8"><table width="348" height="79" border="1" style="color: #000;">
  <tr>
    <td width="204" height="30" style="background-color:#<?php echo $color; ?>;"><b><?php echo display('BILL TO') ?> </b> </td>
  </tr>
  <tr>
    <td>Amorio</td>
  </tr>
</table>
<br>
<br>


</div>
          
            </div>
            
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Commercial</td>
    <td>Date</td>
    <td>Total Due</td>
    <td>enclosed</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    
  </tr>
</table>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Material</td>
    <td>Description</td>
    <td>Qty</td>
    <td>Rate</td>
    <td>Amount</td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
</table>


<!--   <br><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">-->
<!--Preview-->
<!--</button>-->
        </div>
    </div>
  </div></div>
        <?php
               }
    elseif($template==4)
    {
    ?>
 <div class="col-sm-8" > 
    <div class="panel panel-default">
    <div class="panel-body">
        
        <div class="row">
            <div class="col-sm-3"><br>
               
              </div>
            <div class="col-sm-6 text-center"><h3><?php echo $header; ?></h3></div>
            <div class="col-sm-3"><img src="<?php echo  base_url().$invoice_logo; ?>" style='width: 40%;'></div>
        </div>
        <div class="row">
 
<br>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Commercial</td>
    <td>Date</td>
    <td>Total Due</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>enclosed</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Material</td>
    <td>Description</td>
    <td>Qty</td>
    <td>Rate</td>
    <td>Amount</td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
</table>

<!--   <br><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">-->
<!--Preview-->
<!--</button>-->
        </div>
    </div>
  </div></div>
    <?php 
           }
    else
    {
    ?>
    <div class="col-sm-8" > <div class="panel panel-default">
    <div class="panel-body">
        
        <div class="row">
            <div class="col-sm-3"><br>
               
              </div>
            <div class="col-sm-6 text-center"><h3><?php echo $header; ?></h3></div>
            <div class="col-sm-3"><img src="<?php echo  base_url().$invoice_logo; ?>" style='width: 40%;'></div>
        </div>
        <div class="row">

<br>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Commercial</td>
    <td>Date</td>
    <td>Total Due</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>enclosed</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Material</td>
    <td>Description</td>
    <td>Qty</td>
    <td>Rate</td>
    <td>Amount</td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
</table>

<!--   <br><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">-->
<!--Preview-->
<!--</button>-->
        </div>
    </div>
  </div></div>
    <?php 

}
?>
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content" style='width:1200px;'>

      <!-- Modal Header -->
   

      <!-- Modal body -->
      <div >
      <?php
            //////////////Design one///////////// 
            if($template==1)
            {
            ?>

        <div class="col-sm-8" > <div class="panel panel-default">
    <div class="panel-body">
        
        <div class="row">
        
              <div class="col-sm-3" id='company_info'>
                  
                  Company name:<?php echo $cname; ?><br>
                  Address:<?php echo $address; ?><br>
                  Email:<?php echo $email; ?><br>
                  Contact:<?php echo $mobile; ?><br>
              </div>
            <div class="col-sm-6 text-center"><h3><?php echo $header; ?></h3></div>
            <div class="col-sm-3"><img src="<?php echo  base_url().$logo; ?>" style='width: 40%;'></div>
        </div>
        <div class="row">
            <br>
            <br>
            <table width="348" height="79" border="1" style="color: #000;">
  <tr>
    <td width="204" height="30" style="background-color:#<?php echo $color; ?>;"><b>BILL TO </b> </td>
  </tr>
  <tr>
    <td>fdfdsdsf</td>
  </tr>
</table>
<br>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Commercial</td>
    <td>Date</td>
    <td>Total Due</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>enclosed</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Material</td>
    <td>Description</td>
    <td>Qty</td>
    <td>Rate</td>
    <td>Amount</td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
</table>

   <br><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">
   Close
</button>
        </div>
    </div>
  </div></div>

            <?php 

            }
    elseif($template==2)
    {
            ?>
          <div class="col-sm-8" > <div class="panel panel-default">
    <div class="panel-body">
        
        <div class="row">
            <div class="col-sm-2"><img src="<?php echo  base_url().$logo; ?>" style='width: 40%;'>
               
              </div>
            <div class="col-sm-6 text-center"><h3><?php echo $header; ?></h3></div>
           <div class="col-sm-4" id='company_info'>
                  
                  Company name:<?php echo $cname; ?><br>
                  Address:<?php echo $address; ?><br>
                  Email:<?php echo $email; ?><br>
                  Contact:<?php echo $mobile; ?><br>
              </div>
        </div>

        <div class="row">
            <div class="col-sm-6"><table width="348" height="79" border="1" style="color: #000;">
  <tr>
    <td width="204" height="30" style="background-color:#<?php echo $color; ?>;"><b>BILL TO </b> </td>
  </tr>
  <tr>
    <td>fdfdsdsf</td>
  </tr>
</table>
<br>
<br>


</div>
            <div class="col-sm-6"></div>
            
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Commercial</td>
    <td>Date</td>
    <td>Total Due</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>enclosed</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Material</td>
    <td>Description</td>
    <td>Qty</td>
    <td>Rate</td>
    <td>Amount</td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
</table>

   <br><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">
   Close
</button>
        </div>
    </div>
  </div></div>

            <?php 
                   }
    elseif($template==3)
    {
        ?>
    <div class="col-sm-8" > <div class="panel panel-default">
    <div class="panel-body">
        
        <div class="row">
            <div class="col-sm-2"><img src="<?php echo  base_url().$logo; ?>" style='width: 40%;'>
               
              </div>
            <div class="col-sm-6 text-center"><h3><?php echo $header; ?></h3></div>
           <div class="col-sm-4" id='company_info'>
                  
           
              </div>
        </div>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-sm-8"><table width="348" height="79" border="1" style="color: #000;">
  <tr>
    <td width="204" height="30" style="background-color:#<?php echo $color; ?>;"><b>BILL TO </b> </td>
  </tr>
  <tr>
    <td>fdfdsdsf</td>
  </tr>
</table>
<br>
<br>


</div>
            <div class="col-sm-4 " id="">Company namea:<?php echo $cname; ?><br>
                  Address:<?php echo $address; ?><br>
                  Email:<?php echo $email; ?><br>
                  Contact:<?php echo $mobile; ?><br>
              </div></div>
            
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Commercial</td>
    <td>Date</td>
    <td>Total Due</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>enclosed</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Material</td>
    <td>Description</td>
    <td>Qty</td>
    <td>Rate</td>
    <td>Amount</td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
</table>


   <br><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">
   Close
</button>
        </div>
    </div>
  </div></div>
        <?php
               }
    elseif($template==4)
    {
    ?>
 <div class="col-sm-8" > 
    <div class="panel panel-default">
    <div class="panel-body">
        
        <div class="row">
            <div class="col-sm-3"><br>
               
              </div>
            <div class="col-sm-6 text-center"><h3><?php echo $header; ?></h3></div>
            <div class="col-sm-3"><img src="<?php echo  base_url().$logo; ?>" style='width: 40%;'></div>
        </div>
        <div class="row">
            <table width="348" height="79" border="1" style="color: #000;">
  <tr>
    <td width="204" height="30" style="background-color:#<?php echo $color; ?>;"><b>BILL TO 4</b> </td>
  </tr>
  <tr>
    <td>fdfdsdsf</td>
  </tr>
</table>
<br>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Commercial</td>
    <td>Date</td>
    <td>Total Due</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>enclosed</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Material</td>
    <td>Description</td>
    <td>Qty</td>
    <td>Rate</td>
    <td>Amount</td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
</table>

   <br><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">
   Close
</button>
        </div>
    </div>
  </div></div>
    <?php 
           }
    else
    {
    ?>
    <div class="col-sm-8" > <div class="panel panel-default">
    <div class="panel-body">
        
        <div class="row">
            <div class="col-sm-3"><br>
               
              </div>
            <div class="col-sm-6 text-center"><h3><?php echo $header; ?></h3></div>
            <div class="col-sm-3"><img src="<?php echo  base_url().$logo; ?>" style='width: 40%;'></div>
        </div>
        <div class="row">
            <table width="348" height="79" border="1" style="color: #000;">
  <tr>
    <td width="204" height="30" style="background-color:#<?php echo $color; ?>;"><b>BILL TO 5</b> </td>
  </tr>
  <tr>
    <td>fdfdsdsf</td>
  </tr>
</table>
<br>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Commercial</td>
    <td>Date</td>
    <td>Total Due</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>enclosed</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Material</td>
    <td>Description</td>
    <td>Qty</td>
    <td>Rate</td>
    <td>Amount</td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
</table>

<!--   <br><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">-->
<!--Close-->
<!--</button>-->
        </div>
    </div>
  </div></div>
    <?php 

}
?>
  </div>

      <!-- Modal footer -->
     

    </div>
  </div>
</div>


                            </div>
                          </div>
                      </div>
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>










    </section>
</div>
<?php
$csrf = array(
  'name' => $this->security->get_csrf_token_name(),
  'hash' => $this->security->get_csrf_hash()
);

?>
<!-- Add new customer end -->

<script type="text/javascript">
    ////////////Show & Hide///////////

    $('#templateformart').hide();
    $('#colorcombo').hide();
    $('#uploadlogo').hide();
    $('#template').click(function(){
        $("#templateformart").toggle();
    });
     $('#templatecolor').click(function(){
        $("#colorcombo").toggle();
    });
      $('#templatelogo').click(function(){
        $("#uploadlogo").toggle();

    });
      /////////////Ajax////////////////////



///////////////Ajax Dot////////
var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
function dot(value)
{
    var uid='<?php echo $_SESSION['user_id']; ?>';
    var tokenHash=jQuery("input[name=csrf_test_name]").val();
$.ajax({
  method: "POST",
  url:"<?php echo base_url(); ?>Cweb_setting/update_templates",

  data: { value: value, id: uid ,input:"color",'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'},
 success:function (result) {

  
    //    alert('Color '+result);  
      location.reload();
    
      
  }});
 }
 function header(value)
{
    var uid='<?php echo $_SESSION['user_id']; ?>';
    var tokenHash=jQuery("input[name=csrf_test_name]").val();
$.ajax({
  method: "POST",
url:"<?php echo base_url(); ?>Cweb_setting/update_templates",
  data: { value: value, id: uid ,input:"header",'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'},
 success:function (result) {

  
        //  alert('Color '+result);  
        location.reload();
    
      
  }});
 }
    

</script>
<!-- The Modal -->
  <div class="modal" id="myModal" >
  <div class="modal-dialog" style="width:1250px;height:1250px;">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <!--<h4 class="modal-title">Invoice Header</h4>-->
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
      <div class="col-sm-6 text-center"><?php echo $header; ?></div>
            <div class="col-sm-3"><img src="<?php echo base_url().$logo; ?>" style='width: 40%;'></div>
      <br/>
      <table width="348" height="79" border="1">
  <tr>
    <td width="204" height="30" style="background-color:#<?php echo $color; ?>;color:white;"><b>BILL TO</b> </td>
  </tr>
  <tr>
    <td>fdfdsdsf</td>
  </tr>
</table>
<br>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;color: white;">
    <td>Commercial</td>
    <td>Date</td>
    <td>Total Due</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>enclosed</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;color: white;">
    <td>Material</td>
    <td>Description</td>
    <td>Qty</td>
    <td>Rate</td>
    <td>Amount</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
  </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


