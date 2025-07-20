<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>eStartup Bootstrap Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="<?= getenv('FOLDER_PUBLIC') ?? '' ?>/img/favicon.png" rel="icon">
    <link href="<?= getenv('FOLDER_PUBLIC') ?? '' ?>/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

    <!-- Bootstrap css -->
    <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
    <link href="<?= getenv('FOLDER_PUBLIC') ?? '' ?>/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="<?= getenv('FOLDER_PUBLIC') ?? '' ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= getenv('FOLDER_PUBLIC') ?? '' ?>/lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="<?= getenv('FOLDER_PUBLIC') ?? '' ?>/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= getenv('FOLDER_PUBLIC') ?? '' ?>/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?= getenv('FOLDER_PUBLIC') ?? '' ?>/lib/modal-video/css/modal-video.min.css" rel="stylesheet">

    <link href="<?= getenv('FOLDER_PUBLIC') ?? '' ?>/lib/datatable/css/datatables.bootstrap4.min.css" rel="stylesheet">
    <!--<link href="<?= getenv('FOLDER_PUBLIC') ?? '' ?>/lib/datatable/css/jquery.datatables.min.css" rel='stylesheet'>-->
    <link href="<?= getenv('FOLDER_PUBLIC') ?? '' ?>/lib/datatable/css/buttons.bootstrap.min.css" rel="stylesheet" />
    <link href="<?= getenv('FOLDER_PUBLIC') ?? '' ?>/lib/datatable/css/buttons.dataTables.min.css" rel="stylesheet" />

    <!-- Main Stylesheet File -->
    <link href="<?= getenv('FOLDER_PUBLIC') ?? '' ?>/css/style.css" rel="stylesheet">

    <!-- =======================================================
    Theme Name: eStartup
    Theme URL: https://bootstrapmade.com/estartup-bootstrap-landing-page-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

    <header id="header" class="header header-hide">
        <div class="container">

            <div id="logo" class="pull-left">
                <h1><a href="#body" class="scrollto"><span>e</span>Startup</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="#body"><img src="<?= getenv('FOLDER_PUBLIC') ?? '' ?>/img/logo.png" alt="" title="" /></a>-->
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="#header-section">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features-section">Mis postulaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#digital-marketing-section">Mi Perfil</a>
                    </li>
                    <li class="menu-has-children"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li>
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </header><!-- #header -->

    <!--==========================
    Datatables Section
  ============================-->
    <section id="datatable" class="padd-section wow fadeInUp">

        <div class="container">
            <div class="section-title text-center">

                <h2>Meet With Price</h2>
                <p class="separator">Integer cursus bibendum augue ac cursus .</p>

            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <!--<table id="expendable-data-table" class="table display nowrap table-bordered table-hover" style="width:100%">-->
                                <table id="expendable-data-table" class="table nowrap table-bordered table-hover">
                                    <thead>
                                        <tr class="bg-warning">
                                            <th></th>
                                            <th>First name</th>
                                            <th>Last name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                            <th>Extn.</th>
                                            <th>E-mail</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td class="details-control"><i class="fa fa-play fa-3x"></i></td>
                                            <td>Tiger</td>
                                            <td>Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                            <td>5421</td>
                                            <td>t.nixon@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Garrett</td>
                                            <td>Winters</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>63</td>
                                            <td>2011/07/25</td>
                                            <td>$170,750</td>
                                            <td>8422</td>
                                            <td>g.winters@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Ashton</td>
                                            <td>Cox</td>
                                            <td>Junior Technical Author</td>
                                            <td>San Francisco</td>
                                            <td>66</td>
                                            <td>2009/01/12</td>
                                            <td>$86,000</td>
                                            <td>1562</td>
                                            <td>a.cox@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Cedric</td>
                                            <td>Kelly</td>
                                            <td>Senior Javascript Developer</td>
                                            <td>Edinburgh</td>
                                            <td>22</td>
                                            <td>2012/03/29</td>
                                            <td>$433,060</td>
                                            <td>6224</td>
                                            <td>c.kelly@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Airi</td>
                                            <td>Satou</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>33</td>
                                            <td>2008/11/28</td>
                                            <td>$162,700</td>
                                            <td>5407</td>
                                            <td>a.satou@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Brielle</td>
                                            <td>Williamson</td>
                                            <td>Integration Specialist</td>
                                            <td>New York</td>
                                            <td>61</td>
                                            <td>2012/12/02</td>
                                            <td>$372,000</td>
                                            <td>4804</td>
                                            <td>b.williamson@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Herrod</td>
                                            <td>Chandler</td>
                                            <td>Sales Assistant</td>
                                            <td>San Francisco</td>
                                            <td>59</td>
                                            <td>2012/08/06</td>
                                            <td>$137,500</td>
                                            <td>9608</td>
                                            <td>h.chandler@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Rhona</td>
                                            <td>Davidson</td>
                                            <td>Integration Specialist</td>
                                            <td>Tokyo</td>
                                            <td>55</td>
                                            <td>2010/10/14</td>
                                            <td>$327,900</td>
                                            <td>6200</td>
                                            <td>r.davidson@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Colleen</td>
                                            <td>Hurst</td>
                                            <td>Javascript Developer</td>
                                            <td>San Francisco</td>
                                            <td>39</td>
                                            <td>2009/09/15</td>
                                            <td>$205,500</td>
                                            <td>2360</td>
                                            <td>c.hurst@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Sonya</td>
                                            <td>Frost</td>
                                            <td>Software Engineer</td>
                                            <td>Edinburgh</td>
                                            <td>23</td>
                                            <td>2008/12/13</td>
                                            <td>$103,600</td>
                                            <td>1667</td>
                                            <td>s.frost@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Jena</td>
                                            <td>Gaines</td>
                                            <td>Office Manager</td>
                                            <td>London</td>
                                            <td>30</td>
                                            <td>2008/12/19</td>
                                            <td>$90,560</td>
                                            <td>3814</td>
                                            <td>j.gaines@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Quinn</td>
                                            <td>Flynn</td>
                                            <td>Support Lead</td>
                                            <td>Edinburgh</td>
                                            <td>22</td>
                                            <td>2013/03/03</td>
                                            <td>$342,000</td>
                                            <td>9497</td>
                                            <td>q.flynn@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Charde</td>
                                            <td>Marshall</td>
                                            <td>Regional Director</td>
                                            <td>San Francisco</td>
                                            <td>36</td>
                                            <td>2008/10/16</td>
                                            <td>$470,600</td>
                                            <td>6741</td>
                                            <td>c.marshall@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Haley</td>
                                            <td>Kennedy</td>
                                            <td>Senior Marketing Designer</td>
                                            <td>London</td>
                                            <td>43</td>
                                            <td>2012/12/18</td>
                                            <td>$313,500</td>
                                            <td>3597</td>
                                            <td>h.kennedy@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Tatyana</td>
                                            <td>Fitzpatrick</td>
                                            <td>Regional Director</td>
                                            <td>London</td>
                                            <td>19</td>
                                            <td>2010/03/17</td>
                                            <td>$385,750</td>
                                            <td>1965</td>
                                            <td>t.fitzpatrick@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Michael</td>
                                            <td>Silva</td>
                                            <td>Marketing Designer</td>
                                            <td>London</td>
                                            <td>66</td>
                                            <td>2012/11/27</td>
                                            <td>$198,500</td>
                                            <td>1581</td>
                                            <td>m.silva@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Paul</td>
                                            <td>Byrd</td>
                                            <td>Chief Financial Officer (CFO)</td>
                                            <td>New York</td>
                                            <td>64</td>
                                            <td>2010/06/09</td>
                                            <td>$725,000</td>
                                            <td>3059</td>
                                            <td>p.byrd@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Gloria</td>
                                            <td>Little</td>
                                            <td>Systems Administrator</td>
                                            <td>New York</td>
                                            <td>59</td>
                                            <td>2009/04/10</td>
                                            <td>$237,500</td>
                                            <td>1721</td>
                                            <td>g.little@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Bradley</td>
                                            <td>Greer</td>
                                            <td>Software Engineer</td>
                                            <td>London</td>
                                            <td>41</td>
                                            <td>2012/10/13</td>
                                            <td>$132,000</td>
                                            <td>2558</td>
                                            <td>b.greer@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Dai</td>
                                            <td>Rios</td>
                                            <td>Personnel Lead</td>
                                            <td>Edinburgh</td>
                                            <td>35</td>
                                            <td>2012/09/26</td>
                                            <td>$217,500</td>
                                            <td>2290</td>
                                            <td>d.rios@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Jenette</td>
                                            <td>Caldwell</td>
                                            <td>Development Lead</td>
                                            <td>New York</td>
                                            <td>30</td>
                                            <td>2011/09/03</td>
                                            <td>$345,000</td>
                                            <td>1937</td>
                                            <td>j.caldwell@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Yuri</td>
                                            <td>Berry</td>
                                            <td>Chief Marketing Officer (CMO)</td>
                                            <td>New York</td>
                                            <td>40</td>
                                            <td>2009/06/25</td>
                                            <td>$675,000</td>
                                            <td>6154</td>
                                            <td>y.berry@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Caesar</td>
                                            <td>Vance</td>
                                            <td>Pre-Sales Support</td>
                                            <td>New York</td>
                                            <td>21</td>
                                            <td>2011/12/12</td>
                                            <td>$106,450</td>
                                            <td>8330</td>
                                            <td>c.vance@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Doris</td>
                                            <td>Wilder</td>
                                            <td>Sales Assistant</td>
                                            <td>Sidney</td>
                                            <td>23</td>
                                            <td>2010/09/20</td>
                                            <td>$85,600</td>
                                            <td>3023</td>
                                            <td>d.wilder@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Angelica</td>
                                            <td>Ramos</td>
                                            <td>Chief Executive Officer (CEO)</td>
                                            <td>London</td>
                                            <td>47</td>
                                            <td>2009/10/09</td>
                                            <td>$1,200,000</td>
                                            <td>5797</td>
                                            <td>a.ramos@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Gavin</td>
                                            <td>Joyce</td>
                                            <td>Developer</td>
                                            <td>Edinburgh</td>
                                            <td>42</td>
                                            <td>2010/12/22</td>
                                            <td>$92,575</td>
                                            <td>8822</td>
                                            <td>g.joyce@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Jennifer</td>
                                            <td>Chang</td>
                                            <td>Regional Director</td>
                                            <td>Singapore</td>
                                            <td>28</td>
                                            <td>2010/11/14</td>
                                            <td>$357,650</td>
                                            <td>9239</td>
                                            <td>j.chang@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Brenden</td>
                                            <td>Wagner</td>
                                            <td>Software Engineer</td>
                                            <td>San Francisco</td>
                                            <td>28</td>
                                            <td>2011/06/07</td>
                                            <td>$206,850</td>
                                            <td>1314</td>
                                            <td>b.wagner@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Fiona</td>
                                            <td>Green</td>
                                            <td>Chief Operating Officer (COO)</td>
                                            <td>San Francisco</td>
                                            <td>48</td>
                                            <td>2010/03/11</td>
                                            <td>$850,000</td>
                                            <td>2947</td>
                                            <td>f.green@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Shou</td>
                                            <td>Itou</td>
                                            <td>Regional Marketing</td>
                                            <td>Tokyo</td>
                                            <td>20</td>
                                            <td>2011/08/14</td>
                                            <td>$163,000</td>
                                            <td>8899</td>
                                            <td>s.itou@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Michelle</td>
                                            <td>House</td>
                                            <td>Integration Specialist</td>
                                            <td>Sidney</td>
                                            <td>37</td>
                                            <td>2011/06/02</td>
                                            <td>$95,400</td>
                                            <td>2769</td>
                                            <td>m.house@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Suki</td>
                                            <td>Burks</td>
                                            <td>Developer</td>
                                            <td>London</td>
                                            <td>53</td>
                                            <td>2009/10/22</td>
                                            <td>$114,500</td>
                                            <td>6832</td>
                                            <td>s.burks@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Prescott</td>
                                            <td>Bartlett</td>
                                            <td>Technical Author</td>
                                            <td>London</td>
                                            <td>27</td>
                                            <td>2011/05/07</td>
                                            <td>$145,000</td>
                                            <td>3606</td>
                                            <td>p.bartlett@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Gavin</td>
                                            <td>Cortez</td>
                                            <td>Team Leader</td>
                                            <td>San Francisco</td>
                                            <td>22</td>
                                            <td>2008/10/26</td>
                                            <td>$235,500</td>
                                            <td>2860</td>
                                            <td>g.cortez@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Martena</td>
                                            <td>Mccray</td>
                                            <td>Post-Sales support</td>
                                            <td>Edinburgh</td>
                                            <td>46</td>
                                            <td>2011/03/09</td>
                                            <td>$324,050</td>
                                            <td>8240</td>
                                            <td>m.mccray@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Unity</td>
                                            <td>Butler</td>
                                            <td>Marketing Designer</td>
                                            <td>San Francisco</td>
                                            <td>47</td>
                                            <td>2009/12/09</td>
                                            <td>$85,675</td>
                                            <td>5384</td>
                                            <td>u.butler@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Howard</td>
                                            <td>Hatfield</td>
                                            <td>Office Manager</td>
                                            <td>San Francisco</td>
                                            <td>51</td>
                                            <td>2008/12/16</td>
                                            <td>$164,500</td>
                                            <td>7031</td>
                                            <td>h.hatfield@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Hope</td>
                                            <td>Fuentes</td>
                                            <td>Secretary</td>
                                            <td>San Francisco</td>
                                            <td>41</td>
                                            <td>2010/02/12</td>
                                            <td>$109,850</td>
                                            <td>6318</td>
                                            <td>h.fuentes@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Vivian</td>
                                            <td>Harrell</td>
                                            <td>Financial Controller</td>
                                            <td>San Francisco</td>
                                            <td>62</td>
                                            <td>2009/02/14</td>
                                            <td>$452,500</td>
                                            <td>9422</td>
                                            <td>v.harrell@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Timothy</td>
                                            <td>Mooney</td>
                                            <td>Office Manager</td>
                                            <td>London</td>
                                            <td>37</td>
                                            <td>2008/12/11</td>
                                            <td>$136,200</td>
                                            <td>7580</td>
                                            <td>t.mooney@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Jackson</td>
                                            <td>Bradshaw</td>
                                            <td>Director</td>
                                            <td>New York</td>
                                            <td>65</td>
                                            <td>2008/09/26</td>
                                            <td>$645,750</td>
                                            <td>1042</td>
                                            <td>j.bradshaw@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Olivia</td>
                                            <td>Liang</td>
                                            <td>Support Engineer</td>
                                            <td>Singapore</td>
                                            <td>64</td>
                                            <td>2011/02/03</td>
                                            <td>$234,500</td>
                                            <td>2120</td>
                                            <td>o.liang@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Bruno</td>
                                            <td>Nash</td>
                                            <td>Software Engineer</td>
                                            <td>London</td>
                                            <td>38</td>
                                            <td>2011/05/03</td>
                                            <td>$163,500</td>
                                            <td>6222</td>
                                            <td>b.nash@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Sakura</td>
                                            <td>Yamamoto</td>
                                            <td>Support Engineer</td>
                                            <td>Tokyo</td>
                                            <td>37</td>
                                            <td>2009/08/19</td>
                                            <td>$139,575</td>
                                            <td>9383</td>
                                            <td>s.yamamoto@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Thor</td>
                                            <td>Walton</td>
                                            <td>Developer</td>
                                            <td>New York</td>
                                            <td>61</td>
                                            <td>2013/08/11</td>
                                            <td>$98,540</td>
                                            <td>8327</td>
                                            <td>t.walton@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Finn</td>
                                            <td>Camacho</td>
                                            <td>Support Engineer</td>
                                            <td>San Francisco</td>
                                            <td>47</td>
                                            <td>2009/07/07</td>
                                            <td>$87,500</td>
                                            <td>2927</td>
                                            <td>f.camacho@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Serge</td>
                                            <td>Baldwin</td>
                                            <td>Data Coordinator</td>
                                            <td>Singapore</td>
                                            <td>64</td>
                                            <td>2012/04/09</td>
                                            <td>$138,575</td>
                                            <td>8352</td>
                                            <td>s.baldwin@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Zenaida</td>
                                            <td>Frank</td>
                                            <td>Software Engineer</td>
                                            <td>New York</td>
                                            <td>63</td>
                                            <td>2010/01/04</td>
                                            <td>$125,250</td>
                                            <td>7439</td>
                                            <td>z.frank@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Zorita</td>
                                            <td>Serrano</td>
                                            <td>Software Engineer</td>
                                            <td>San Francisco</td>
                                            <td>56</td>
                                            <td>2012/06/01</td>
                                            <td>$115,000</td>
                                            <td>4389</td>
                                            <td>z.serrano@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Jennifer</td>
                                            <td>Acosta</td>
                                            <td>Junior Javascript Developer</td>
                                            <td>Edinburgh</td>
                                            <td>43</td>
                                            <td>2013/02/01</td>
                                            <td>$75,650</td>
                                            <td>3431</td>
                                            <td>j.acosta@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Cara</td>
                                            <td>Stevens</td>
                                            <td>Sales Assistant</td>
                                            <td>New York</td>
                                            <td>46</td>
                                            <td>2011/12/06</td>
                                            <td>$145,600</td>
                                            <td>3990</td>
                                            <td>c.stevens@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Hermione</td>
                                            <td>Butler</td>
                                            <td>Regional Director</td>
                                            <td>London</td>
                                            <td>47</td>
                                            <td>2011/03/21</td>
                                            <td>$356,250</td>
                                            <td>1016</td>
                                            <td>h.butler@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Lael</td>
                                            <td>Greer</td>
                                            <td>Systems Administrator</td>
                                            <td>London</td>
                                            <td>21</td>
                                            <td>2009/02/27</td>
                                            <td>$103,500</td>
                                            <td>6733</td>
                                            <td>l.greer@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Jonas</td>
                                            <td>Alexander</td>
                                            <td>Developer</td>
                                            <td>San Francisco</td>
                                            <td>30</td>
                                            <td>2010/07/14</td>
                                            <td>$86,500</td>
                                            <td>8196</td>
                                            <td>j.alexander@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Shad</td>
                                            <td>Decker</td>
                                            <td>Regional Director</td>
                                            <td>Edinburgh</td>
                                            <td>51</td>
                                            <td>2008/11/13</td>
                                            <td>$183,000</td>
                                            <td>6373</td>
                                            <td>s.decker@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Michael</td>
                                            <td>Bruce</td>
                                            <td>Javascript Developer</td>
                                            <td>Singapore</td>
                                            <td>29</td>
                                            <td>2011/06/27</td>
                                            <td>$183,000</td>
                                            <td>5384</td>
                                            <td>m.bruce@datatables.net</td>
                                        </tr>

                                        <tr>
                                            <td class="details-control"></td>
                                            <td>Donna</td>
                                            <td>Snider</td>
                                            <td>Customer Support</td>
                                            <td>New York</td>
                                            <td>27</td>
                                            <td>2011/01/25</td>
                                            <td>$112,000</td>
                                            <td>4226</td>
                                            <td>d.snider@datatables.net</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--==========================
    Footer
  ============================-->
    <footer class="footer">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-lg-4">
                    <div class="footer-logo">

                        <a class="navbar-brand" href="#">eStartup</a>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the.</p>

                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-2">
                    <div class="list-menu">

                        <h4>Abou Us</h4>

                        <ul class="list-unstyled">
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Features item</a></li>
                            <li><a href="#">Live streaming</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>

                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-2">
                    <div class="list-menu">

                        <h4>Abou Us</h4>

                        <ul class="list-unstyled">
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Features item</a></li>
                            <li><a href="#">Live streaming</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>

                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-2">
                    <div class="list-menu">

                        <h4>Support</h4>

                        <ul class="list-unstyled">
                            <li><a href="#">faq</a></li>
                            <li><a href="#">Editor help</a></li>
                            <li><a href="#">Contact us</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>

                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-2">
                    <div class="list-menu">

                        <h4>Abou Us</h4>

                        <ul class="list-unstyled">
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Features item</a></li>
                            <li><a href="#">Live streaming</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>

                    </div>
                </div>

            </div>
        </div>

        <div class="copyrights">
            <div class="container">
                <p>&copy; Copyrights eStartup. All rights reserved.</p>
                <div class="credits">
                    <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eStartup
          -->
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>
        </div>

    </footer>



    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="<?= getenv('FOLDER_PUBLIC') ?? '' ?>/lib/jquery/jquery.min.js"></script>
    <script src="<?= getenv('FOLDER_PUBLIC') ?? '' ?>/lib/jquery/jquery-migrate.min.js"></script>
    <script src="<?= getenv('FOLDER_PUBLIC') ?? '' ?>/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= getenv('FOLDER_PUBLIC') ?? '' ?>/lib/superfish/hoverIntent.js"></script>
    <script src="<?= getenv('FOLDER_PUBLIC') ?? '' ?>/lib/superfish/superfish.min.js"></script>
    <script src="<?= getenv('FOLDER_PUBLIC') ?? '' ?>/lib/easing/easing.min.js"></script>
    <script src="<?= getenv('FOLDER_PUBLIC') ?? '' ?>/lib/modal-video/js/modal-video.js"></script>
    <script src="<?= getenv('FOLDER_PUBLIC') ?? '' ?>/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?= getenv('FOLDER_PUBLIC') ?? '' ?>/lib/wow/wow.min.js"></script>


    <script src="<?= getenv('FOLDER_PUBLIC') ?? '' ?>/lib/datatable/js/jquery.datatables.min.js"></script>
    <script src="<?= getenv('FOLDER_PUBLIC') ?? '' ?>/lib/datatable/js/datatables.bootstrap4.min.js"></script>
    <script src="<?= getenv('FOLDER_PUBLIC') ?? '' ?>/lib/datatable/js/dataTables.buttons.min.js"></script>
    <script src="<?= getenv('FOLDER_PUBLIC') ?? '' ?>/lib/datatable/js/buttons.flash.min.js"></script>
    <script src="<?= getenv('FOLDER_PUBLIC') ?? '' ?>/lib/datatable/js/jszip.min.js"></script>
    <script src="<?= getenv('FOLDER_PUBLIC') ?? '' ?>/lib/datatable/js/pdfmake.min.js"></script>
    <script src="<?= getenv('FOLDER_PUBLIC') ?? '' ?>/lib/datatable/js/vfs_fonts.js"></script>
    <script src="<?= getenv('FOLDER_PUBLIC') ?? '' ?>/lib/datatable/js/buttons.html5.min.js"></script>
    <script src="<?= getenv('FOLDER_PUBLIC') ?? '' ?>/lib/datatable/js/buttons.print.min.js"></script>


    <!-- Contact Form JavaScript File -->
    <script src="<?= getenv('FOLDER_PUBLIC') ?? '' ?>/contactform/contactform.js"></script>

    <!-- Template Main Javascript File -->
    <script src="<?= getenv('FOLDER_PUBLIC') ?? '' ?>/js/main.js"></script>

    <script>
        /* Formatting function for row details - modify as you need */
        function format() {
            return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
                '<tr>' +
                '<td>Full name:</td>' +
                '<td>Name...</td>' +
                '</tr>' +
                '<tr>' +
                '<td>Extension number:</td>' +
                '<td>123</td>' +
                '</tr>' +
                '<tr>' +
                '<td>Extra info:</td>' +
                '<td>And any further details here (images etc)...</td>' +
                '</tr>' +
                '</table>';
        };

        $(document).ready(function() {
            //$.noConflict();
            var table = $('#expendable-data-table').DataTable({
                deferRender: true,
                pageLength: <?= getenv('PAGINATION') ?? '' ?>,
                responsive: true,
                order: [],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
                },
                dom: 'Bfrtip',
                buttons: ['copy', 'pdf', {
                    extend: 'excelHtml5',
                    customize: function(xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        $('row c[r^="C"]', sheet).attr('s', '2');
                    }
                }]
            });

            // Add event listener for opening and closing details
            $('#expendable-data-table tbody').on('click', 'td.details-control', function() {
                var tr = $(this).closest('tr');
                var row = table.row(tr);

                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    // Open this row
                    row.child(format(row.data())).show();
                    tr.addClass('shown');
                }
            });
        });
    </script>

</body>

</html>